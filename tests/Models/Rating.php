<?php

namespace Tests\Models;

use GrantAppEu\EloquentUuidSlug\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\Database\Factories\RatingFactory;

final class Rating extends Model
{
    /** @use HasFactory<RatingFactory> */
    use HasFactory;
    use Sluggable;

    /**
     * @return BelongsTo<Product, self>
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected static function newFactory(): RatingFactory
    {
        return RatingFactory::new();
    }
}
