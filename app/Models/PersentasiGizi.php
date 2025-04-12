<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersentasiGizi extends Model
{
  protected $table = 'persentasigizi';
  protected $fillable = [
    'ProteinMin',
    'ProteinMax',
    'LemakMin',
    'LemakMax',
    'KarboMin',
    'KarboMax'
  ];
}
