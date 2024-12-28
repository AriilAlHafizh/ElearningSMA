<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "materi";
    protected $primaryKey = "id";
    protected $fillable = [
       'nama_kelas', 'nama_mapel','isi_materi','guru_id' ];

    public function guru()
    {
        return $this->belongsTo(Guru::class,'guru_id','id');
    }
}
