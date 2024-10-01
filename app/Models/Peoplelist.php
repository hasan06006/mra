<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peoplelist extends Model
{
    use HasFactory;
    protected $table = 'peoplelists';


    protected $fillable = [
        'name',      
        'Office_id',       
        'is_active',     
    ];

    public function createsby(){
        return $this->belongsTo(User::class, 'created_by','id');
      
    }

    public function updateby(){
        return $this->belongsTo(User::class, 'updated_by','id');
      
    }

}
