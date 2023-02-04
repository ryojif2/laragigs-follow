<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{   
    // Show all Listings
    public function index() {
        // dd(request('tag'));
        return view('listings.index', [
        'listings'=> Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // Show single Listing
    public function show(Listing $listing) {
        return view( 'listings.show', [
        'listing' => $listing
        ]); 
    }

   // Show Create Form
   public function create() {
    return view('listings.create');
   }

   // Store Listing Data
   public function store(Request $request) {
        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();
            
        Listing::create($formFields);

        // To create flash message
        // Session::flash('message', 'Listing Created');

        return redirect('/')->with('message', 'Listing created successfully!');
   }

   // Show Edit Form
   public function edit(Listing $listing) {
    // dd($listing);
    return view('listings.edit', ['listing' => $listing]);
   }

   // Update Listing
    public function update(Request $request, Listing $listing) {

        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403,'Unauthorized Action');
        }

        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
            
        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
   }

   // Delete listing
   public function destroy(Listing $listing) {

         // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403,'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
   }

   // Manage Listings
   public function manage() {
    return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
   }

}