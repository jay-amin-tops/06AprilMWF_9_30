<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'id';
    public function author(){
        return $this->belongsTo('App\Models\Author');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
