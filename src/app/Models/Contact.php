<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'tell',
        'address',
        'building',
        'detail'
    ];
    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}
