<?php

namespace Tests\Models;

use GrantAppEu\EloquentUuidSlug\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tests\Database\Factories\CartFactory;

/**
 * @property int $id
 * @property string $name
 * @property string $code
 */
final class Cart extends Model
{
    /** @use HasFactory<CartFactory> */
    use HasFactory;
    use Sluggable;

    protected $guarded = [];

    public function slugColumn(): string
    {
        return 'code';
    }

    protected function slugWithDashes(): bool
    {
        return true;
    }

    protected static function newFactory(): CartFactory
    {
        return CartFactory::new();
    }
}
