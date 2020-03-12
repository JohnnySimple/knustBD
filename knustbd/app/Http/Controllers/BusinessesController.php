<?php

namespace App\Http\Controllers;

use App\Business;
use App\Category;
use App\BusinessCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $cat = Category::find($request->input('category'));
        $businesses = Business::all();

        return view('businesses/index', ['cat'=>$cat, 'businesses'=>$businesses]);
    }

    /**
     * user defined function route for searched business.
     *
     * @return \Illuminate\Http\Response
     */
    public function searched(Request $request)
    {
        //
        $cat = Category::find($request->input('category'));
        $categories = Category::all();
        $businesses = Business::all();

        return view('businesses/searched', ['cat'=>$cat, 'businesses'=>$businesses, 'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('businesses/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()){
            $business = Business::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'location' => $request->input('location'),
                'phone' => $request->input('phone'),
                'user_id' => Auth::user()->id
            ]);

            $cat = Category::find($request->input('category1'));

            if(!$cat){
                $category = Category::create([
                    'name' => $request->input('category1')
                ]);
            }

            
            if($business & $category){
                return redirect()->route('businesses', ['business'=>$business->id])
                ->with('success', 'Business added successfully');
            }
        }
        return back()->withInput()->with('errors', 'Error adding a business!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
        $business = Business::find($business->id);

        return view('businesses/show', ['business'=>$business]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        //
    }
}
