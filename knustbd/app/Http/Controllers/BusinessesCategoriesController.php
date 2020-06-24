<?php

namespace App\Http\Controllers;

use App\BusinessCategory;
use App\Business;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BusinessesCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * user defined function route for adding category.
     *
     * @return \Illuminate\Http\Response
     */
    public function sayBusiness() {
        dd('hello');
    }


    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Business $business)
    {
        //
        $business_id = $request->input('businessId');
        $cat_id = null;
        $categories = Category::all();
        $business = Business::find($business_id);

        foreach($business->categories as $object) {
            $business_categories[] = (array) $object;
        }

        // dd($business->categories);

        if(Auth::check()){

            $cat_id = $request->input('category');

            // $is_present = DB::table('business_category')->where('business_id', $business_id)->first();
            $is_present = DB::table('business_category')->where('business_id', $business_id)
            ->where('category_id', $cat_id)
            ->exists();

            if($is_present) {
                dd('This category has been added already!');
            } else {
                $buscat = BusinessCategory::create([
                    'business_id' => $business_id,
                    'category_id' => $cat_id
                    ]);
        
                    if($buscat){
                        return redirect()->route('businesses.index', ['business'=>$business->id])
                        ->with('success', 'Category added successfully');
                    }
            }
            
            // // dd($cat_id);
            // $buscat = BusinessCategory::create([
            //     'business_id' => $business_id,
            //     'category_id' => $cat_id
            //     ]);
    
            //     if($buscat){
            //         return redirect()->route('businesses.index', ['business'=>$business->id])
            //         ->with('success', 'Category added successfully');
            //     }
            
        }
        return back()->withInput()->with('errors', 'Error adding category!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessCategory $businessCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessCategory $businessCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessCategory $businessCategory)
    {
        //


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessCategory $businessCategory)
    {
        //
    }
}
