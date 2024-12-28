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
        'id','nama','gender','email','no_hp','alamat'];
    
        public function materi ()
        {
            return $this->hasMany(Materi::class,'guru_id','id');
        }
}
