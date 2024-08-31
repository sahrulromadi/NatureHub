<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'image',
        'status',
        'user_id'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Create default status after creating and updating
    protected static function booted(): void
    {
        static::creating(function (Article $article) {
            $article->status = 'Reviewing';
        });

        static::updating(function (Article $article) {
            if (Auth::id() === $article->user_id) {
                $article->status = 'Reviewing';
            }
        });
    }
}
