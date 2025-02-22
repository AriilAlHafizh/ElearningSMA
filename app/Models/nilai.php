<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "nilai";
    protected $primaryKey = "id";
    protected $fillable = [
       'nilai', 'mapel_id', 'siswa_id'];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class,'mapel_id','id');
    }

    public function siswa()
    {
        return $this->belongsTo(User::class,'siswa_id','id');
    }


}