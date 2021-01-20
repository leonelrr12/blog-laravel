<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relation One to Many Invert
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relation Many to Many
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Relation One to Oner Polimorphyc
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
