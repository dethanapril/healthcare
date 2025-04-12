<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KebMineralVit extends Model
{
  protected $table = 'kebmineralvit';
  protected $fillable = [
    'Kalsium',
    'Fosfor',
    'Besi',
    'Natrium',
    'Kalium',
    'Tembaga',
    'Seng'
  ];
}
