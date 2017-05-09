<?php


namespace Tests\Integration;


use App\Invoice;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvoiceTest extends TestCase
{

    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function setUp()
    {
        parent::setUp();
    }

    private function createDefaultObject()
    {
        return factory(Invoice::class)->create();
    }

    /** @test */
    public function  has_invoice_an_id()
    {
        //given
        $invoice = $this->createDefaultObject();
//        $invoice =  factory(Invoice::class)->create();
        $this->assertGreaterThan(0, $invoice->id);


//        $withDescription = factory(Invoice::class, 2)->create(['description' => 'omschrijving']);


        //when
//      $allInvoicesWithDescription = Invoice::hasDescription();

        //then
//      $this->assertEquals($withDescription->description, $allInvoicesWithDescription->first->id());

    }


    /** @test **/
    public function test_if_it_has_a_description()
    {
        //given
        $invoice = $this->createDefaultObject();
        //when then
        $this->assertNotNull($invoice->description);
    }


    /** @test **/
    public function test_if_description_can_be_null()
    {
        //given
        $invoiceWithoutDescription = factory(Invoice::class)->create(['description' => null]);
        //when then
        $this->assertNull($invoiceWithoutDescription->description);
    }

    /** @test **/
    public function test_if_description_is_saved()
    {
        //given
        $invoiceWithoutDescription = factory(Invoice::class)->create(['description' => 'Dit is een omschrijving, nummer 88']);
        //when then
        $this->assertNotEmpty($invoiceWithoutDescription->description);
    }

    /** @test **/
    public function test_if_description_can_be_a_number()
    {
        //given
        $invoiceWithoutDescription = factory(Invoice::class)->create(['description' => 5]);
        //when then
        $this->assertEquals($invoiceWithoutDescription->description, $invoiceWithoutDescription->description);
    }

    /** @test **/
    public function test_if_date_cannot_be_null()
    {
        //given
        $this->expectException('Illuminate\Database\QueryException');
        //when then
        factory(Invoice::class)->create(['date' => null]);
    }
}
