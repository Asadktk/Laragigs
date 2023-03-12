<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{   
    //Show all listings
    public function index(){    
        // dd(request());

        return view('listings.index', [
            
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    //Show single listing
     public function show(Listing $listing){    
        
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //Create listing
    public function create(){
        return view('listings.create');
    }

    //Store listing Data
    public function store(Request $request){
    // dd($request->file('logo')->store('logos'));
        $formFields = $request->validate([
             'title' => 'required',
             'tags' => 'required',
             'company' => ['required', Rule::unique('listings', 'company')],
             'location' => 'required',
             'email' => ['required', 'email'],
             'description' => 'required',
             'website' => 'required',

             ]    
        );

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    //Show Edit form
    public function edit(Listing $listing){
        return view('listings.edit', ['listing'=>$listing]);
    }

    //Update listing Data
    public function update(Request $request, Listing $listing){
        // dd($request->file('logo')->store('logos'));

        //Make sure the logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

            $formFields = $request->validate([
                 'title' => 'required',
                 'tags' => 'required',
                 'company' => ['required'],
                 'location' => 'required',
                 'email' => ['required', 'email'],
                 'description' => 'required',
                 'website' => 'required',
    
                 ]    
            );
    
            if($request->hasFile('logo')){
                $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            }
            $listing->update($formFields);
    
            return back()->with('message', 'Listing Updated successfully!');
        }

        //Delete Listing
        public function destroy(Listing $listing){

            //Make sure the logged in user is owner
            if($listing->user_id != auth()->id()){
                abort(403, 'Unauthorized Action');
            }

            $listing->delete();

            return redirect('/')->with('message', 'Listing deleting successfully');
        }

        //Manage Listings
        public function manage(){
            return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
        }

}