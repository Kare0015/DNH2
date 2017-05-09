<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//namespace app toegevoegd om alle leden op te kunnen halen
use App;
use App\Boat;
use App\Member;

class BoatController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    return view('/boats/index', [
      'boats' => Boat::orderBy('id', 'asc')->get(),
    ]);
  }

  public function create()
    {
        return view ( 'boats/create', [
            'members' => Member::orderBy ('firstname', 'asc')->pluck('firstname', 'id'),

        ]);
    }

  public function store(Request $request) {

      // Validates form
      $this->validate ( $request, [
          'boatname' => 'required|max:255',
          'boatlength' => 'required|min:0',
          'member_id' => 'required|max:255',

      ] );
      // Creates new boat with the info in the request
      $boat = boat::create ( [
          'boatname' => $request ['boatname'],
          'boatlength' => $request ['boatlength'],
          'member_id' => $request ['member_id'],
          'mainboat' => $request ['mainboat'],
      ] );

//      $member = Member::find($request ['member_id']);
//      $boat->member()->associate($member);
      // Saves this object in the database
      $boat->save ();
      // Redirects to the boat.index page
      return redirect('/boat');
  }


  public function update(Request $request, $id)
  {
      // Check if the form was correctly filled in
      $this->validate ( $request, [
        'firstname' => 'required|max:255',
        'prefix' => 'nullable',
        'surname' => 'required|max:255',
        'email' => 'required|max:255',
        'street' => 'required|max:255',
        'number' => 'required|max:255',
        'postalCode' => 'required|max:255',
        'city' => 'required|max:255',
      ] );

      $boat = boat::findorfail ($id);
      $boat->firstname = $request ['firstname'];
      $boat->prefix = $request ['prefix'];
      $boat->surname = $request ['surname'];
      $boat->email = $request ['email'];
      $boat->street = $request ['street'];
      $boat->number = $request ['number'];
      $boat->postalCode = $request ['postalCode'];
      $boat->city = $request ['city'];
      // Save the changes in the database
      $boat->save ();

      // Redirect to the category.index page with a success message.
      return redirect ( 'boat' )->with( 'success', $boat->firstname.' '.$boat->prefix.' '.$boat->surname.' is bijgewerkt.' );
  }

  public function show($id)
  {
      return view ( 'boats/show', ['boat' => boat::findOrFail($id),] );
  }

  public function edit($id)
  {
      return view ( 'boats/edit', ['boat' => boat::findOrFail($id),] );
  }

  public function destroy($id)
  {
      // Find the boat object in the database
      $boat = Boat::findorfail ( $id );
      // Remove the boat from the database
      $boat->delete ();
      // Redirect to the boat.index page with a success message.
      return redirect ( '/boat' )->with( 'success', $boat->name.' is verwijderd.' );
  }


  }
