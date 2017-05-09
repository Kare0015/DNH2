<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class BoatTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function it_has_an_owner_with_a_member_id()
    {
        $uut = factory(\App\Boat::class)->create();
        $this->assertGreaterThan(0, $uut->member_id);
    }

    /** @test */
    public function it_gives_an_error_when_boat_has_no_owner_with_a_member_id()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $uut = factory(\App\Boat::class)->create(['member_id' => null]);
    }

    /** @test */
    public function it_has_a_length()
    {
        $uut = factory(\App\Boat::class)->create();
        $this->assertGreaterThan(0, $uut->boatlength);
    }

    /** @test */
    public function it_gives_an_error_when_boat_has_no_length()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $uut = factory(\App\Boat::class)->create(['boatlength' => null]);
    }

    /** @test */
    public function it_gives_an_error_when_length_is_negative()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $uut = factory(\App\Boat::class)->create(['boatlength' => -5]);
    }

    /** @test */
    public function it_has_a_name()
    {
        $uut = factory(\App\Boat::class)->create(['boatname' => 'Titanic']);
        $this->assertEquals('Titanic', $uut->boatname);
    }

    /** @test */
    public function it_gives_an_error_when_boat_has_no_name()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $uut = factory(\App\Boat::class)->create(['boatname' => null]);
    }

    /** @test */
    public function it_can_be_a_mainboat()
    {
        $uut = factory(\App\Boat::class)->create(['mainboat' => 1, 'boatname' => 'TRUETRUETRUE']);
        $this->assertEquals(true, $uut->mainboat);
    }

    /** @test */
    public function it_can_be_no_mainboat()
    {
        $uut = factory(\App\Boat::class)->create(['mainboat' => 0, 'boatname' => 'HOIHOIHOI']);
        $this->assertEquals(false, $uut->mainboat);
    }
}
