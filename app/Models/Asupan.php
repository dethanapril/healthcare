<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asupan extends Model
{
  protected $table = 'asupan';
  protected $fillable = [
    'PokokMin',
    'PokokMax',
    'LaukPaukMin',
    'LaukPaukMax',
    'SayurMin',
    'SayurMax',
    'BuahMin',
    'BuahMax'
  ];
}
