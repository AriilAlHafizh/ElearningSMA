<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

enum hari: string
{
    case SENIN = 'senin';
    case SELASA = 'selasa';
    case RABU = 'rabu';
    case KAMIS = 'kamis';
    case JUMAT = 'jumat';
}

