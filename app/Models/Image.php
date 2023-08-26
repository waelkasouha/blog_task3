<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'post_id',
    ];

    public function posts()
    {
        return $this->BelongsTo(Post::class , 'post_id' , 'id');
    }
}
