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
       'nama_kelas', 'mapel_id','nama_materi','isi_materi','guru_id' ];

    public function guru()
    {
        return $this->belongsTo(User::class,'guru_id','id');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class,'nilai_id','id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class,'jadwal_id','id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class,'mapel_id','id');
    }
}