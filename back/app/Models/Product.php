<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'image', 'user_id', 'under_category_id', 'description', 'price'
    ];

    public function under_category() {
        return $this->belongsTo(UnderCategory::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
