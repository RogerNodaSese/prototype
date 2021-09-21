<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'publisher',
        'subject',
        'abstract',
        'file',
    ];

    public function authors(){
        return $this->belongsToMany(Author::class);
    }

    public function keywords(){
        return $this->hasMany(Keyword::class);
    }
}
