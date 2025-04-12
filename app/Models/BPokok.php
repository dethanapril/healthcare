<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BPokok extends Model
{
  protected $table = 'bpokok';
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
