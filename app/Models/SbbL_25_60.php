<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SbbL_25_60 extends Model
{
  protected $table = 'sbbl25_60';
  protected $fillable = [
    'TinggiBadan',
    'Min2SD',
    'Plus1SD',
    'EnergiMin',
    'EnergiMax',
    'ProteinMin',
    'ProteinMax',
    'LemakMin',
    'LemakMax',
    'KarboMin',
    'KarboMax',
    'Serat'
  ];
}
