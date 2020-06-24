<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
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
     * @param  \App\Business  $business
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $business = Business::find($request->input('commentable_id'));

        if(Auth::check()){
            
            $comment = Comment::create([
                'body' => $request->input('body'),
                'rating' => $request->input('rating'),
                'commentable_type' => $request->input('commentable_type'),
                'commentable_id' => $request->input('commentable_id'),
                'user_id' => Auth::user()->id
            ]);

            $avg_star = 0;

            $comments = $business->comments;
            foreach($comments as $val) {
                $avg_star += $val->rating;
                $avg = $avg_star/count($comments);
                
            }

            $business_update = Business::where('id', $business->id)->
            update([
                'rating' => ceil($avg)
            ]);
            
            if($comment && $business_update){
                return back()->with('success', 'Comment created successfully');
            }

            
        }
        return back()->withInput()->with('errors', 'Error adding review');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
