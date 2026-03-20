<?php

namespace Naykel\Postit\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Naykel\Gotime\Enums\PublishedStatus;
use Naykel\Postit\Database\Factories\PostFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory, HasSlug;

    protected $guarded = [];

    protected static function newFactory()
    {
        return PostFactory::new();
    }

    /**
     * Defines the layout a page will use when the show method is called
     */
    const LAYOUTS = [
        'post-default' => 'Default Single Column',
        'post-with-side-image' => 'Post With Side Image',
        'post-with-banner' => 'Post With Banner',
    ];

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

    /**
     * -----------------------------------------------------------------------
     * OTHER
     * ------------------------------------------------------------------------
     */
    public function mainImageUrl()
    {
        return $this->image_path
            ? Storage::disk('content')->url($this->image_path)
            : url('https://placehold.co/400x300');
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
