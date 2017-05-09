<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//namespace app toegevoegd om alle leden op te kunnen halen
use App;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = App\Invoice::all();
        $totalInvoices = count($invoices);

        return view('/invoices/index', compact('invoices', 'totalInvoices'));
    }

    public function facturenOverview()
    {
        $members = App\Invoice::all();
        return view('/facturen/overview', compact('members'));

    }

    public function enkelefactuur($id)
    {
        $member = App\Invoice::find($id);
        return view('/facturen/overview', compact('Invoice'));
    }

    public function store(Request $request) {

        // Validates form
        $this->validate ( $request, [
            'description' => 'nullable|max:255',
            'date' => 'required|max:255',

        ] );
        // Creates new Invoice with the info in the request
        $invoice = Invoice::create ( [
            'description' => $request ['description'],
            'date' => $request ['date'],


        ] );
        // Saves this object in the database
        $invoice->save();
        // Redirects to the invoice.index page
        return redirect('/invoices');
    }

    public function update(Request $request, $id)
    {
        // Check if the form was correctly filled in
        $this->validate ( $request, [
            'description' => 'nullable|max:255',
            'date' => 'required|max:255',
        ] );

        //get invoice by id and set the variables
        $invoice = Invoice::findorfail ($id);
        $invoice->description = $request ['description'];
        $invoice->date = $request ['date'];

        // Save the changes in the database
        $invoice->save ();

        // Redirect to the category.index page with a success message.
        return redirect ( 'Invoice' )->with( 'success', $invoice->id. ' is bijgewerkt.' );
    }

    public function destroy($id)
    {
        // Find the Invoice object in the database
        $invoice = Invoice::findorfail ( $id );
        // Remove the Invoice from the database
        $invoice->delete ();
        // Redirect to the Invoice.index page with a success message.
        return redirect ( '/invoices' )->with( 'success', $invoice->id.' is verwijderd.' );
    }
}
