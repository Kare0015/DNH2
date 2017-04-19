<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends \Tests\TestCase
{
    use DatabaseMigrations;

    public function test_if_category_has_an_id()
    {
        $uut = factory(\App\Category::class)->create();
        $this->assertGreaterThan(0, $uut->id);
    }
    public function test_if_category_has_a_name()
    {
        $uut = factory(\App\Category::class)->create(['name' => '1. Contributie en liggeld leden']);
        $this->assertEquals('1. Contributie en liggeld leden', $uut->name);
    }
    public function test_if_a_category_has_multiple_transactions()
    {
        $transaction1 = factory(\App\Transaction::class)->create(['category_id' => 1]);
        $transaction2 = factory(\App\Transaction::class)->create(['category_id' => 2]);
        $transaction3 = factory(\App\Transaction::class)->create(['category_id' => 3]);
        $transaction4 = factory(\App\Transaction::class)->create(['category_id' => 3]);
        $transaction5 = factory(\App\Transaction::class)->create(['category_id' => 3]);
        $category = factory(\App\Category::class)->create(['id' => 3, 'name' => '03 Water en Electra, inkomsten']);
        $this->assertCount(3, $category->transactions);
    }
}