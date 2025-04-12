<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BLaukPauk extends Model
{
  protected $table = 'blaukpauk';
  protected $fillable = [
    'NamaMakanan',
    'Energi',
    'Protein',
    'Karbo',
    'Lemak',
    'Serat',
    'Kalsium',
    'Fosfor',
    'Besi',
    'Natrium',
    'Kalium',
    'Tembaga',
    'Seng',
    'VitA',
    'VitB1',
    'VitB2',
    'VitB3',
    'VitC'
  ];
}
