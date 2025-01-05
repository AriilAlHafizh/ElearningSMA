<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected $table = "siswa";
    protected $primaryKey = "id";
    protected $fillable = [
        'nis','nama','tgl_lahir','gender','email','password','no_hp','alamat','foto','materi_id'];

    public function materi()
    {
        return $this->hasMany(Materi::class,'materi_id','id');
    }
    

}
