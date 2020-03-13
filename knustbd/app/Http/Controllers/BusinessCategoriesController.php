<?php

namespace App\Http\Controllers;

use App\BusinessCategory;
use App\Business;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessCategoriesController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Business $business)
    {
        //
        $cat_id = null;
        $categories = Category::all();
        if(Auth::check()){
            foreach($categories as $category){
                if($category->name == $request->input('category')){
                    $cat_id = $category->id;
                }
            }
            $buscat = BusinessCategory::create([
                'business_id' => $business->id,
                'category_id' => $cat_id
                ]);

                if($buscat){
                    return redirect()->route('businesses.index', ['business'=>$business->id])
                    ->with('success', 'Category added successfully');
                }
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
