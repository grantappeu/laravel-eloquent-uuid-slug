<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GrantAppEu\EloquentUuidSlug\Sluggable;
use Tests\Database\Factories\PostFactory;

final class Post extends Model
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;
    use Sluggable;

    protected $guarded = [];

    protected static function newFactory(): PostFactory
    {
        return PostFactory::new();
    }
}
