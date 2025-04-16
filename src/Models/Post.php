<?php

namespace Naykel\Postit\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Naykel\Gotime\Enums\PublishedStatus;
use Naykel\Postit\Database\Factories\PostFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory, HasSlug;

    protected static function newFactory()
    {
        return PostFactory::new();
    }

    /**
     * -----------------------------------------------------------------------
     * STATUSES
     * ------------------------------------------------------------------------
     */
    public function isPublished()
    {
        return $this->published_at != null;
    }

    public function status(): PublishedStatus
    {
        if ($this->isPublished()) {
            return PublishedStatus::Published;
        } else {
            return PublishedStatus::Draft;
        }
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            // if a slug exists leave it alone.
            ->skipGenerateWhen(fn () => ! empty($this->slug));
    }
}
