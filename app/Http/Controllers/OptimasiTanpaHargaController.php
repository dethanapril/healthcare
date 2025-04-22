<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asupan;
use App\Models\BBuah;
use App\Models\BLaukPauk;
use App\Models\BPokok;
use App\Models\BSayur;
use App\Models\KebMineralVit;
use App\Models\PersentasiGizi;
use App\Models\SbbL_0_24;
use App\Models\SbbL_25_60;
use App\Models\SbbP_0_24;
use App\Models\SbbP_25_60;

class OptimasiTanpaHargaController extends Controller
{
    public function optimasi(Request $request)
    {
        set_time_limit(86400);
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jeniskelamin' => 'required|string|in:Laki-laki,Perempuan',
            'tanggallahir' => 'required|date',
            'umur' => 'required|numeric|min:12|max:60',
            'beratbadan' => 'required|numeric|min:0',
            'tinggibadan' => 'required|numeric|min:0',
            'menu' => 'required|string|in:Sehari,Sekali Makan',
            'pokokIds' => 'required|array',
            'laukIds' => 'required|array',
            'sayurIds' => 'required|array',
            'buahIds' => 'array',
        ]);

        // Mengambil ID bahan makanan dari input user
        $bahanPokokIds = $request->pokokIds;
        $bahanLaukIds = $request->laukIds;
        $bahanSayurIds = $request->sayurIds;
        $bahanBuahIds = $request->buahIds ?? [];

        // Mendapatkan data tambahan untuk proses optimasi
        $pilihanMenu = $request->menu;
        $umur = $request->umur;
        $jenisKelamin = $request->jeniskelamin;
        $beratBadan = $request->beratbadan;
        $tinggiBadan = $request->tinggibadan;

        $asupan = Asupan::first();
        $presentasiGizi = PersentasiGizi::first();

        $isSehari = $pilihanMenu == "Sehari";
        $divisor = $isSehari ? 1 : 3;

        list($lowerBound, $upperBound) = $this->calculateBounds($asupan, $divisor, $bahanBuahIds);

        $kelompokUmur = $this->getKelompokUmur($umur);

        $mineralVitData = KebMineralVit::where('KelompokUmur', $kelompokUmur)->first();

        $sbb = $this->getSbbData($jenisKelamin, $umur, $tinggiBadan);
        if ($sbb) {
            $kebGizi = $this->setKebGizi($sbb, $mineralVitData, $presentasiGizi, $divisor, $umur);
        }

        if (isset($sbb)) {
            $this->validateWeight($beratBadan, $sbb->Min2SD, $sbb->Plus1SD);
        }

        // Inisialisasi variabel untuk algoritma optimasi
        $combinationResults = [];
        $population = [];
        $populationSize = 25;
        $dimension = !empty($request->buahIds) ? 4 : 3;
        $maxIterations = 2000;
        $scalingFactor = 0.5;
        $crossoverRate = 0.5;
        $fitness1 = array_fill(0, $populationSize, INF);
        $fitness2 = array_fill(0, $populationSize, INF);
        $globalBestSolution1 = [];
        $globalBestSolution2 = [];
        $globalBestFitness1 = INF;
        $globalBestFitness2 = INF;

        // Membuat kombinasi bahan makanan
        $combinations = $this->generateCombinations($bahanPokokIds, $bahanLaukIds, $bahanSayurIds, $bahanBuahIds);

        // Mendapatkan semua data bahan makanan
        $allBahanData = $this->getAllBahanData();

        // Fungsi helper untuk mendapatkan nama bahan makanan berdasarkan ID
        function getIngredientNames($ids, $data)
        {
            return array_map(function ($id) use ($data) {
                return $data->get($id)?->NamaMakanan; // Asumsi ada kolom 'NamaMakanan'
            }, $ids);
        }

        $allIngredients = array_unique(array_merge(
            getIngredientNames($bahanPokokIds, $allBahanData['pokok']),
            getIngredientNames($bahanLaukIds, $allBahanData['lauk']),
            getIngredientNames($bahanSayurIds, $allBahanData['sayur']),
            !empty($bahanBuahIds) ? getIngredientNames($bahanBuahIds, $allBahanData['buah']) : []
        ));

        $trialResults = []; // Untuk menyimpan hasil per trial
        $totalTrials = 10;

        for ($trial = 1; $trial <= $totalTrials; $trial++) {
            $startTrial = microtime(true);
            $successCount = 0;
            $combinationResults = [];
            // Inisialisasi frekuensi kemunculan untuk semua bahan makanan
            $ingredientFrequency = array_fill_keys($allIngredients, 0);

            foreach ($combinations as $combination) {
                $pokokId = $combination['Pokok'];
                $laukId = $combination['Lauk'];
                $sayurId = $combination['Sayur'];
                $buahId = $combination['Buah'] !== null ? $combination['Buah'] : null;

                $tblBahanPokok = $allBahanData['pokok']->get($pokokId);
                $tblBahanLauk = $allBahanData['lauk']->get($laukId);
                $tblBahanSayur = $allBahanData['sayur']->get($sayurId);
                $tblBahanBuah = $buahId !== null ? $allBahanData['buah']->get($buahId) : null;

                if ($tblBahanPokok && $tblBahanLauk && $tblBahanSayur && ($buahId === null || $tblBahanBuah)) {
                    $bahanPokok = $this->getBahanNutrisi($tblBahanPokok);
                    $bahanLauk = $this->getBahanNutrisi($tblBahanLauk);
                    $bahanSayur = $this->getBahanNutrisi($tblBahanSayur);
                    $bahanBuah = $buahId !== null ? $this->getBahanNutrisi($tblBahanBuah) : [];

                    // Inisialisasi populasi
                    $population = $this->initializePopulation($populationSize, $lowerBound, $upperBound, $dimension);

                    // Menghitung nilai fitnes awal
                    for ($i = 0; $i < $populationSize; $i++) {
                        $fitness1[$i] = $this->hitungFitness1($this->evaluateTotalGizi($population[$i], $bahanPokok, $bahanLauk, $bahanSayur, $bahanBuah), $kebGizi);
                        $fitness2[$i] = $this->hitungFitness2($this->evaluateTotalGizi($population[$i], $bahanPokok, $bahanLauk, $bahanSayur, $bahanBuah), $kebGizi);
                    }

                    $bestIndex1 = array_search(min($fitness1), $fitness1);
                    $bestIndex2 = array_search(min($fitness2), $fitness2);
                    $localBestSolution1 = $population[$bestIndex1];
                    $localBestSolution2 = $population[$bestIndex2];
                    $localBestFitness1 = $fitness1[$bestIndex1];
                    $localBestFitness2 = $fitness2[$bestIndex2];
                    $globalBestFitness1 = $localBestFitness1;
                    $globalBestFitness2 = $localBestFitness2;
                    $globalBestSolution1 = $localBestSolution1;
                    $globalBestSolution2 = $localBestSolution2;

                    // Iterasi untuk menjalankan Algoritma DE
                    $this->runDEAlgorithm(
                        $population,
                        $populationSize,
                        $dimension,
                        $maxIterations,
                        $scalingFactor,
                        $crossoverRate,
                        $lowerBound,
                        $upperBound,
                        $bahanPokok,
                        $bahanLauk,
                        $bahanSayur,
                        $bahanBuah,
                        $kebGizi,
                        $fitness1,
                        $fitness2,
                        $localBestSolution1,
                        $localBestSolution2,
                        $localBestFitness1,
                        $localBestFitness2,
                        $globalBestSolution1,
                        $globalBestSolution2,
                        $globalBestFitness1,
                        $globalBestFitness2
                    );

                    // Mengambil nama bahan makanan
                    $namaBahanPokok = $allBahanData['pokok']->get($pokokId)?->NamaMakanan;
                    $namaBahanLauk = $allBahanData['lauk']->get($laukId)?->NamaMakanan;
                    $namaBahanSayur = $allBahanData['sayur']->get($sayurId)?->NamaMakanan;
                    $namaBahanBuah = $allBahanData['buah']->get($buahId)?->NamaMakanan;

                    // Cek jika kombinasi sukses
                    if ($globalBestFitness1 == 0 && $globalBestFitness2 == 0) {
                        $combinationResults[] = [
                            'BestSolution1' => $globalBestSolution1,
                            'BestSolution2' => $globalBestSolution2,
                            'BestFitness1' => $globalBestFitness1,
                            'BestFitness2' => $globalBestFitness2,
                            'KebutuhanGizi' => $kebGizi,
                            'TotalGizi1' => $this->evaluateTotalGizi($globalBestSolution1, $bahanPokok, $bahanLauk, $bahanSayur, $bahanBuah),
                            'TotalGizi2' => $this->evaluateTotalGizi($globalBestSolution2, $bahanPokok, $bahanLauk, $bahanSayur, $bahanBuah),
                            'NamaBahanPokok' => $namaBahanPokok,
                            'NamaBahanLauk' => $namaBahanLauk,
                            'NamaBahanSayur' => $namaBahanSayur,
                            'NamaBahanBuah' => $namaBahanBuah,
                        ];

                        // Memperbarui frekuensi kemunculan bahan makanan
                        if (isset($ingredientFrequency[$namaBahanPokok])) {
                            $ingredientFrequency[$namaBahanPokok]++;
                        }
                        if (isset($ingredientFrequency[$namaBahanLauk])) {
                            $ingredientFrequency[$namaBahanLauk]++;
                        }
                        if (isset($ingredientFrequency[$namaBahanSayur])) {
                            $ingredientFrequency[$namaBahanSayur]++;
                        }
                        if ($namaBahanBuah && isset($ingredientFrequency[$namaBahanBuah])) {
                            $ingredientFrequency[$namaBahanBuah]++;
                        }
                        $successCount++;
                    }
                }
            }

            $endTrial = microtime(true);
            $trialTime = $endTrial - $startTrial;

            $trialResults[] = [
                'trial' => $trial,
                'waktu' => number_format($trialTime, 2),
                'sukses' => $successCount,
                'ingredient_frequency' => $ingredientFrequency,
            ];
        }

        return view('hasil-trial')->with([
            'trialResults' => $trialResults,
            'totalKombinasi' => count($combinations),
            'request' => $request->all(),
            'allIngredients' => $allIngredients, // Daftar semua bahan makanan
        ]);
    }

    private function calculateBounds($asupan, $divisor, $buahIds)
    {
        $lowerBound = [
            $asupan->PokokMin / $divisor,
            $asupan->LaukPaukMin / $divisor,
            $asupan->SayurMin / $divisor,
        ];
        $upperBound = [
            $asupan->PokokMax / $divisor,
            $asupan->LaukPaukMax / $divisor,
            $asupan->SayurMax / $divisor,
        ];

        if (!empty($buahIds)) {
            $lowerBound[] = $asupan->BuahMin / $divisor;
            $upperBound[] = $asupan->BuahMax / $divisor;
        }
        return [$lowerBound, $upperBound];
    }

    private function getKelompokUmur($umur)
    {
        if ($umur >= 6 && $umur <= 11) return "6-11";
        else if ($umur >= 12 && $umur <= 36) return "12-36";
        else return "37-60";
    }

    private function getSbbData($jenisKelamin, $umur, $tinggiBadan)
    {
        if ($jenisKelamin == "Laki-laki") {
            return $umur <= 24 ? SbbL_0_24::where('TinggiBadan', $tinggiBadan)->first() : SbbL_25_60::where('TinggiBadan', $tinggiBadan)->first();
        } else {
            return $umur <= 24 ? SbbP_0_24::where('TinggiBadan', $tinggiBadan)->first() : SbbP_25_60::where('TinggiBadan', $tinggiBadan)->first();
        }
    }

    private function setKebGizi($sbb, $mineralVit, $presentasiGizi, $divisor)
    {

        return [
            $sbb->EnergiMin / $divisor,
            $sbb->EnergiMax / $divisor,

            $sbb->ProteinMin * ($presentasiGizi->ProteinMin / 100) / $divisor,
            $sbb->ProteinMax * ($presentasiGizi->ProteinMax / 100) / $divisor,

            $sbb->LemakMin * ($presentasiGizi->LemakMin / 100) / $divisor,
            $sbb->LemakMax * ($presentasiGizi->LemakMax / 100) / $divisor,

            $sbb->KarboMin * ($presentasiGizi->KarboMin / 100) / $divisor,
            $sbb->KarboMax * ($presentasiGizi->KarboMax / 100) / $divisor,

            $sbb->Serat / $divisor,
            $sbb->EnergiMax / 1000 * 14 / $divisor,

            $mineralVit->KalsiumMin / $divisor,
            $mineralVit->KalsiumMax / $divisor,
            $mineralVit->BesiMin / $divisor,
            $mineralVit->BesiMax / $divisor,
            $mineralVit->SengMin / $divisor,
            $mineralVit->SengMax / $divisor,
            $mineralVit->TembagaMin / $divisor,
            $mineralVit->TembagaMax / $divisor,
            $mineralVit->FosforMin / $divisor,
            $mineralVit->FosforMax / $divisor,
            $mineralVit->VitCMin / $divisor,
            $mineralVit->VitCMax / $divisor
        ];
    }

    private function validateWeight($beratBadan, $minus2SD, $plus1SD)
    {
        $data = [
            'tblBahanPokok' => BPokok::all(),
            'tblBahanLauk' => BLaukPauk::all(),
            'tblBahanSayur' => BSayur::all(),
            'tblBahanBuah' => BBuah::all(),
        ];

        if ($beratBadan >= $minus2SD && $beratBadan <= $plus1SD) {
            return redirect('/menu')->with($data)->with('message', 'Berat badan anda berada dalam keadaan normal. Pertahankan menu makanan yang anda buat');
        } elseif ($beratBadan > $plus1SD) {
            return redirect('/menu')->with($data)->with('message', 'Berat badan anda melebihi batas keadaan normal.');
        }
    }

    private function generateCombinations($pokok_ids, $lauk_ids, $sayur_ids, $buah_ids)
    {
        $combinations = [];
        foreach ($pokok_ids as $pokok) {
            foreach ($lauk_ids as $lauk) {
                foreach ($sayur_ids as $sayur) {
                    if (!empty($buah_ids)) {
                        foreach ($buah_ids as $buah) {
                            $combinations[] = [
                                'Pokok' => $pokok,
                                'Lauk' => $lauk,
                                'Sayur' => $sayur,
                                'Buah' => $buah,
                            ];
                        }
                    } else {
                        $combinations[] = [
                            'Pokok' => $pokok,
                            'Lauk' => $lauk,
                            'Sayur' => $sayur,
                            'Buah' => null,
                        ];
                    }
                }
            }
        }
        return $combinations;
    }

    private function getAllBahanData()
    {
        $bahanData = [
            'pokok' => BPokok::all()->keyBy('id'),
            'lauk' => BLaukPauk::all()->keyBy('id'),
            'sayur' => BSayur::all()->keyBy('id'),
            'buah' => BBuah::all()->keyBy('id'),
        ];
        return $bahanData;
    }

    private function getBahanNutrisi($bahan)
    {
        return [
            $bahan->Energi,
            $bahan->Protein,
            $bahan->Lemak,
            $bahan->Karbo,
            $bahan->Serat,
            $bahan->Kalsium,
            $bahan->Besi,
            $bahan->Seng,
            $bahan->Tembaga,
            $bahan->Fosfor,
            $bahan->VitC,
        ];
    }

    private function initializePopulation($populationSize, $lowerBound, $upperBound, $dimension)
    {
        $population = [];
        foreach (range(0, $populationSize - 1) as $i) {
            foreach (range(0, $dimension - 1) as $j) {
                $population[$i][$j] = rand((int)$lowerBound[$j], (int)$upperBound[$j]);
            }
        }
        return $population;
    }

    public function hitungFitness1(array $totalGizi, array $kebGizi): int
    {
        // Define the conditions for each nutrient
        $conditions = [
            $totalGizi[0] >= $kebGizi[0] && $totalGizi[0] <= $kebGizi[1],
            $totalGizi[1] >= $kebGizi[2] && $totalGizi[1] <= $kebGizi[3],
            $totalGizi[2] >= $kebGizi[4] && $totalGizi[2] <= $kebGizi[5],
            $totalGizi[3] >= $kebGizi[6] && $totalGizi[3] <= $kebGizi[7],
            $totalGizi[4] >= $kebGizi[8] && $totalGizi[4] <= $kebGizi[9],
            $totalGizi[5] >= $kebGizi[10] && $totalGizi[5] <= $kebGizi[11],
            $totalGizi[6] >= $kebGizi[12] && $totalGizi[6] <= $kebGizi[13],
            $totalGizi[7] >= $kebGizi[14] && $totalGizi[7] <= $kebGizi[15],
            $totalGizi[8] >= $kebGizi[16] && $totalGizi[8] <= $kebGizi[17],
            $totalGizi[9] >= $kebGizi[18] && $totalGizi[9] <= $kebGizi[19],
            $totalGizi[10] >= $kebGizi[20] && $totalGizi[10] <= $kebGizi[21],
        ];

        // Hitung jumlah kondisi yang tidak terpenuhi
        $f_obj1 = count(array_filter($conditions, function ($c) {
            return !$c;
        }));
        return $f_obj1;
    }

    public function hitungFitness2(array $totalGizi, array $kebGizi): float
    {
        $penalties = [];
        for ($i = 0; $i < count($totalGizi); $i++) {
            $min = $kebGizi[$i * 2];       // Batas minimum kebutuhan gizi
            $max = $kebGizi[$i * 2 + 1];   // Batas maksimum kebutuhan gizi
            if ($totalGizi[$i] < $min) {
                // Penalti jika di bawah batas minimum (kuadrat selisih)
                $penalties[$i] = $min - $totalGizi[$i];
            } elseif ($totalGizi[$i] > $max) {
                // Penalti jika melebihi batas maksimum (kuadrat selisih)
                $penalties[$i] = $totalGizi[$i] - $max;
            } else {
                // Tidak ada penalti jika berada dalam rentang
                $penalties[$i] = 0;
            }
        }

        // Hitung fungsi objektif
        $f_obj2 = array_sum($penalties);
        return $f_obj2;
    }

    public function evaluateTotalGizi(array $individual, array $bahanPokok, array $bahanLauk, array $bahanSayur, array $bahanBuah): array
    {
        $hasilHitungBahanPokok = [];
        $hasilHitungBahanLauk = [];
        $hasilHitungBahanSayur = [];
        $hasilHitungBahanBuah = [];
        $totalGizi = [];

        for ($i = 0; $i < count($bahanPokok); $i++) {

            $hasilHitungBahanPokok[$i] = ($individual[0] / 100.0) * $bahanPokok[$i];
            $hasilHitungBahanLauk[$i] = ($individual[1] / 100.0) * $bahanLauk[$i];
            $hasilHitungBahanSayur[$i] = ($individual[2] / 100.0) * $bahanSayur[$i];
            if (!empty($bahanBuah)) {
                $hasilHitungBahanBuah[$i] = ($individual[3] / 100.0) * $bahanBuah[$i];
                $totalGizi[$i] = $hasilHitungBahanPokok[$i] + $hasilHitungBahanLauk[$i] + $hasilHitungBahanSayur[$i] + $hasilHitungBahanBuah[$i];
            } else {
                $totalGizi[$i] = $hasilHitungBahanPokok[$i] + $hasilHitungBahanLauk[$i] + $hasilHitungBahanSayur[$i];
            }
        }
        return $totalGizi;
    }

    private function getRandomIndividualIndex($populationSize, $excludeIndex)
    {
        do {
            $index = rand(0, $populationSize - 1);
        } while ($index === $excludeIndex);

        return $index;
    }

    private function getRandomIndividualIndexWithTwoExclusions($populationSize, $excludeIndex1, $excludeIndex2)
    {
        do {
            $index = rand(0, $populationSize - 1);
        } while ($index === $excludeIndex1 || $index === $excludeIndex2);

        return $index;
    }

    private static function getIndividual($population, $index)
    {
        $dimension = count($population[0]);
        $individual = [];

        for ($j = 0; $j < $dimension; $j++) {
            $individual[] = $population[$index][$j];
        }

        return $individual;
    }

    private static function setIndividual(&$population, $index, $individual)
    {
        $dimension = count($individual);

        for ($j = 0; $j < $dimension; $j++) {
            $population[$index][$j] = $individual[$j];
        }
    }

    private function runDEAlgorithm(
        &$population,
        $populationSize,
        $dimension,
        $maxIterations,
        $scalingFactor,
        $crossoverRate,
        $lowerBound,
        $upperBound,
        $bahanPokok,
        $bahanLauk,
        $bahanSayur,
        $bahanBuah,
        $kebGizi,
        &$fitness1,
        &$fitness2,
        &$localBestSolution1,
        &$localBestSolution2,
        &$localBestFitness1,
        &$localBestFitness2,
        &$globalBestSolution1,
        &$globalBestSolution2,
        &$globalBestFitness1,
        &$globalBestFitness2
    ) {
        for ($iteration = 0; $iteration < $maxIterations; $iteration++) {
            for ($i = 0; $i < $populationSize; $i++) {

                // Memilih 3 individu acak
                $k1 = $this->getRandomIndividualIndex($populationSize, $i);
                $k1x = $this->getIndividual($population, $k1);
                $k2 = $this->getRandomIndividualIndexWithTwoExclusions($populationSize, $i, $k1);
                $k2x = $this->getIndividual($population, $k2);

                // Mutasi
                $mutant = array_fill(0, $dimension, 0);
                for ($j = 0; $j < $dimension; $j++) {
                    $mutant[$j] = (int)($population[$i][$j] + $scalingFactor * ($k1x[$j] - $k2x[$j]));
                }

                // Crossover
                $crossoverMask = array_fill(0, $dimension, false);
                $randomIndex = rand(0, $dimension - 1);

                for ($j = 0; $j < $dimension; $j++) {
                    $crossoverMask[$j] = ($j === $randomIndex) || (mt_rand() / mt_getrandmax()) <= $crossoverRate;
                }

                $randomIndex = rand(0, $dimension - 1);
                $offspring = array_fill(0, $dimension, 0);

                for ($j = 0; $j < $dimension; $j++) {
                    if (!$crossoverMask[$j] || $j == $randomIndex) {
                        $offspring[$j] = $mutant[$j];
                    } else {
                        $offspring[$j] = $population[$i][$j];
                    }
                }

                // Memastikan offspring berada dalam batas
                for ($j = 0; $j < $dimension; $j++) {
                    if ($offspring[$j] > $upperBound[$j]) {
                        $offspring[$j] = $upperBound[$j];
                    } elseif ($offspring[$j] < $lowerBound[$j]) {
                        $offspring[$j] = $lowerBound[$j];
                    }
                }

                // Evaluasi offspring
                $newFitness1 = $this->hitungFitness1($this->evaluateTotalGizi($offspring, $bahanPokok, $bahanLauk, $bahanSayur, $bahanBuah), $kebGizi);
                $newFitness2 = $this->hitungFitness2($this->evaluateTotalGizi($offspring, $bahanPokok, $bahanLauk, $bahanSayur, $bahanBuah), $kebGizi);

                // Seleksi
                if ($newFitness2 <= $fitness2[$i] && $newFitness1 <= $fitness1[$i]) {
                    $this->setIndividual($population, $i, $offspring);
                    $fitness1[$i] = $newFitness1;
                    $fitness2[$i] = $newFitness2;
                }
            }

            $newBestIndex1 = array_search(min($fitness1), $fitness1);
            $newBestIndex2 = array_search(min($fitness2), $fitness2);

            // Update localsolusi dan local best jika fitnes baru lebih kecil dari fitnes lama
            if ($fitness2[$newBestIndex2] <= $localBestFitness2 && $fitness1[$newBestIndex1] <= $localBestFitness1) {
                $localBestSolution1 = $this->getIndividual($population, $newBestIndex1);
                $localBestSolution2 = $this->getIndividual($population, $newBestIndex2);
                $localBestFitness1 = $fitness1[$newBestIndex1];
                $localBestFitness2 = $fitness2[$newBestIndex2];
            }

            // Update global solusi dan global best jika localsolusi dan localbest lebih kecil dari globalsolusi dan globalbest
            if ($localBestFitness1 <= $globalBestFitness1 && $localBestFitness2 <= $globalBestFitness2) {
                $globalBestFitness1 = $localBestFitness1;
                $globalBestFitness2 = $localBestFitness2;
                $globalBestSolution1 = $localBestSolution1;
                $globalBestSolution2 = $localBestSolution2;
            }
        }
    }
}
