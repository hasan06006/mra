<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concernperson extends Model
{
    use HasFactory;
    
    protected $table = 'concernpersons';

    protected $fillable = [
        'name',      
        'description',       
        'is_active',     
    ];

    public function createsby(){
        return $this->belongsTo(User::class, 'created_by','id');
      
    }

    public function updateby(){
        return $this->belongsTo(User::class, 'updated_by','id');
      
    }
}
