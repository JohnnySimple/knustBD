<?php

namespace App\Http\Controllers;

use App\Business;
use App\Category;
use App\BusinessCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $businesses = Business::all();
        // $businesses = DB::table('businesses')->simplePaginate(4);

        return view('businesses/index', ['businesses'=>$businesses]);
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
        
        $target_dir = "../public/imgs/businessImgs/";
        $target_dir = $target_dir . basename($_FILES["businessThumbnail"]["name"]);
        $uploadOk = 1;
        $FileType = pathinfo($target_dir, PATHINFO_EXTENSION);

         // allow certain file formats
        if($FileType != "png" && $FileType != "jpg" && $FileType != "jpeg"){
            echo "Sorry, only jpg, png and jpeg are allowed!";
            $uploadOk = 0;
        }

        if($uploadOk == 0){
            echo "Sorry, your image was not uploaded!";
        } else {
            if(move_uploaded_file($_FILES['businessThumbnail']['tmp_name'], $target_dir)){
                echo "The image " . basename($_FILES['businessThumbnail']['name']) . " is uploaded";
            }
            else {
                echo "Problem uploading image";
            }

            $fileName = basename($_FILES['businessThumbnail']['name']);
        }

        if(Auth::check()){
            $business = Business::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'location' => $request->input('location'),
                'phone' => $request->input('phone'),
                'user_id' => Auth::user()->id,
                'imageName' => $fileName,
                'rating' => 0
            ]);

            
            if($business){
                return redirect()->route('businesses.index', ['business'=>$business->id])
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
        $users = User::all();
        $comms = DB::table('comments')->where('commentable_id', $business->id)->simplePaginate(5);
        $avg_star = 0;
        $avg = 0;
        $comments = $business->comments;
        foreach($comments as $val) {
            $avg_star += $val->rating;
            $avg = $avg_star/count($comments);
            
        }
        // $avg_star = Business::avg($arrays);
     

        return view('businesses.show', ['business'=>$business, 'comms'=>$comms, 'comments'=>$comments, 'users'=>$users, 'avg_star'=>ceil($avg)]);
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

        $business = Business::find($business->id);
        $categories = Category::all()->sortBy('name');

        return view('businesses.edit', ['business'=>$business, 'categories'=>$categories]);
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
