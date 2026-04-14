<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Insight extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'author',
        'featured_image',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (Insight $insight) {
            if (empty($insight->slug)) {
                $insight->slug = Str::slug($insight->title);
            }
        });

        static::updating(function (Insight $insight) {
            if ($insight->isDirty('title') && !$insight->isDirty('slug')) {
                $insight->slug = Str::slug($insight->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->whereNotNull('published_at');
    }

    public function scopeLatest($query)
    {
        return $query->orderByDesc('published_at');
    }
}
