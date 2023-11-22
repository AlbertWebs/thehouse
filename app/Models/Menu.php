<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'price',
        'name',
        'thumbnail'
    ];

    public function categories(){

        return $this->belongsTo('Categories','pro_cat');
    }
}
