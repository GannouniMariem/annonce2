<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class panier extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $with = ['mobilier'];
    
    public function mobilier(){
        return $this->belongsTo(mobilier::class,'id_annonce','id');
    }
}
