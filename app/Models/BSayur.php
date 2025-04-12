<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BSayur extends Model
{
  protected $table = 'bsayur';
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
