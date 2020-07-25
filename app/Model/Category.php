<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $guarded = [];
// protected $fillable = [
//       'name','description', 'image', 'parent_id',
//
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
