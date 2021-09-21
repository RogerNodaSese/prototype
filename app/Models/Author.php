<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'last_name',
        'first_name',
        
    ];

    public function theses(){
        return $this->belongsToMany(Theses::class);
    }
}
