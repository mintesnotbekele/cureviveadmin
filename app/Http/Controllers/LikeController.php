<?php

namespace App\Http\Controllers;

use App\Models\like;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use DB;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $token = $request->bearerToken();
        

        $personalAccessToken = PersonalAccessToken::findToken($token);
        $user = $personalAccessToken->tokenable;

        $post = new like;
        $post->thread = $request->thread;
        $post->owner = $user->id;
        
        $post->save();
        return response()->json([
            'message' => 'successfully liked'
        ]);

    }

    public function likecounter(string $id)
    {
        $replies = DB::table('forum_posts')
        ->select(DB::raw('forum_posts.id,forum_posts.thread_id,forum_posts.content, COUNT(likes.thread) as numoflikes'))
        ->where('forum_posts.thread_id', $id)
        ->join('likes', 'forum_posts.id', '=', 'likes.thread','left')
        ->groupBy('likes.thread','forum_posts.id')
        ->get();
        return $replies;
    }

    public function likedby(Request $request, string $id)
    {
        $token = $request->bearerToken();
        $personalAccessToken = PersonalAccessToken::findToken($token);
        $user = $personalAccessToken->tokenable;
        $liked = DB::table('likes')
        ->where('owner', $user->id)
        ->get();
        return $liked;
    }

    public function myfavourites(Request $request)
    {
        $token = $request->bearerToken();
        $personalAccessToken = PersonalAccessToken::findToken($token);
        $user = $personalAccessToken->tokenable;
        $favourites = DB::table('likes')->join('forum_posts', 'forum_posts.id', '=', 'likes.thread')
        ->where('forum_posts.sequence', '=', 1)
        ->join('forum_threads', 'forum_posts.thread_id', '=', 'forum_threads.id')
        ->where('owner', $user->id)
            ->get();
        return $favourites;
    }

    



    /**
     * Display the specified resource.
     */
    public function show(like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroylikes(Request $request, string $id)
    {
  
         $token = $request->bearerToken();
         $personalAccessToken = PersonalAccessToken::findToken($token);
         $user = $personalAccessToken->tokenable;
         $liked = DB::table('likes')
         ->where('owner', $user->id)->where('thread', $id)
        ->delete();
        return $liked;
    }
}
