<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'is_visible'
    ];

    /**
     *  User that create the post
     *
     * @return BelongsTo
     */
    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
