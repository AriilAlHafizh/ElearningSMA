<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "guru";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama','gender','email','password','no_hp','alamat','foto'];
    
        public function materi ()
        {
            return $this->hasMany(Materi::class,'guru_id','id');
        }

        public function jadwal ()
        {
            return $this->hasMany(Jadwal::class,'guru_id','id');
        }    
}
