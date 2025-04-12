<?php

namespace App\Http\Controllers;

use App\Models\BBuah;
use App\Models\BLaukPauk;
use App\Models\BPokok;
use App\Models\BSayur;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [
            'tblBahanPokok' => BPokok::all(),
            'tblBahanLauk' => BLaukPauk::all(),
            'tblBahanSayur' => BSayur::all(),
            'tblBahanBuah' => BBuah::all(),
        ];
        return view('home.index', $viewData);
    }

    public function about()
    {
        return view('home.about');
    }

    public function optimasi()
    {
        $viewData = [
            'tblBahanPokok' => BPokok::all(),
            'tblBahanLauk' => BLaukPauk::all(),
            'tblBahanSayur' => BSayur::all(),
            'tblBahanBuah' => BBuah::all(),
        ];
        // return view('home.optimasi', $viewData);
        return view('home.optimasi-tanpa-harga', $viewData);
    }

    public function impact()
    {
        return view('home.impact');
    }

    public function faq()
    {
        return view('home.faq');
    }
}
