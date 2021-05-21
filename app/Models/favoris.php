<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favoris extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $with = ['mobilier'];
    
    public function mobilier(){
        return $this->belongsTo(mobilier::class,'id_annonce','id');
    }
}
