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
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'detail'
    ];
    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function scopeKeywordSearch($query, $keyword) {
        if(!empty($keyword)) {
            $query->where('first_name', 'like', '%', '$keyword', '%');
            $query->where('last_name', 'like', '%', '$keyword', '%');
            $query->where('email', 'like', '%', '$keyword', '%');
        }
    }

    public function scopeGenderSearch($query, $gender) {
        if(!empty($gender)) {
            $query->where('gender', $gender);
        }
    }

    public function scopeCategorySearch($query, $category) {
        if(!empty($category_id)) {
            $query
        }
    }
}
