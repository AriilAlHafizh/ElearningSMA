<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "jadwal";
    protected $primaryKey = "id";
    protected $fillable = [
       'hari', 'jam_mulai','jam_selesai','materi_id'];

    //    public function guru()
    //    {
    //        return $this->belongsTo(Guru::class,'guru_id','id');
    //    }

       public function materi()
       {
           return $this->belongsTo(Materi::class,'materi_id','id');
       }
}
