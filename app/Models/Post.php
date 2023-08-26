<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'category_id'
    ];
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class , 'category_id' , 'id');
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id')->as('post_tag');
    }
    public function images(): HasMany
    {
        return $this->hasMany(Image::class , 'post_id' , 'id');
    }
}
