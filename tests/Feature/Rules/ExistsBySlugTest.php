<?php

namespace Tests\Feature;

use GrantAppEu\EloquentUuidSlug\Rules\ExistsBySlug;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\Models\Product;
use Tests\TestCase;

final class ExistsBySlugTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testCanValidateModelExistsBySlug(): void
    {
        $product = Product::factory()->create();

        $validator = Validator::make([
            "product_id" => $product->slug,
        ], [
            "product_id" => ["required", new ExistsBySlug(Product::class)],
        ]);

        self::assertFalse($validator->fails());
    }

    public function testCanInvalidateModelThatDoNotExistBySlug(): void
    {
        $validator = Validator::make([
            "product_id" => $this->faker->uuid(),
        ], [
            "product_id" => ["required", new ExistsBySlug(Product::class)],
        ]);

        self::assertTrue($validator->fails());
    }
}
