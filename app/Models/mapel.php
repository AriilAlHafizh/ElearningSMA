<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "mapel";
    protected $primaryKey = "id";
    protected $fillable = [
       'nama_mapel'];

    public function materi()
    {
        return $this->hasMany(Materi::class,'materi_id','id');
    }

}