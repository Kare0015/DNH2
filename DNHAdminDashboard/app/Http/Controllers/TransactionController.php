<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use App\Transaction;
use App\Category;

class TransactionController extends Controller {

    public function store(Request $request) {
        // Check if the form was correctly filled in
        $this->validate ( $request, [
            'transactionname' => 'required|max:255',
            'klantnaam' => 'required|max:255',
            'category_id' =>  'required|integer|max:255'
        ] );
        // Create new User object with the info in the request
        $transactions = Transaction::create ( [
            'transactionname' => $request['transactionname'],
            'amount' => $request['bedrag'],
            'customername' => $request['klantnaam'],
            'category_id' => $request['category_id']
        ] );
        // Save this object in the database
        $transactions->save();
        // Redirect to the user.index page with a success message.
        return redirect('/transactions/translist');
    }

    public function translist(){
        $transactions = App\Transaction::all();
        return view('/transactions/index', compact('transactions'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('transactions/create')->with('categories', $categories);
    }
}
