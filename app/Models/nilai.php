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
       'nilai', 'materi_id'];

    public function materi()
    {
        return $this->belongsTo(Materi::class,'materi_id','id');
    }


}
