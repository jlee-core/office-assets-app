<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Item;
class ItemApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_items(): void
    {
        Item::factory()->count(5)->create();

        $response = $this->get('/api/items');

        $response
            ->assertStatus(200)
            ->assertJsonCount(5, 'data');
    }

    public function test_store_returns_validation_errors(): void {
        $response = $this->postJson('/api/items', [
            'name' => '',
            'category' => '',
            'status' => 'in_use',
        ]);
    }

    public function test_invalid_item_is_not_saved(): void {
        $this->postJson('/api/items', [
            'name' => '',
            'category' => '',
            'status' => 'in_use',
        ]);

        $this->assertDatabaseCount('items', 0);
    }
}