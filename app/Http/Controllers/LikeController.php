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
        $replies = DB::table('likes')->where('thread', $id)->count();
        return $replies;
    }

    public function likedby(Request $request, string $id)
    {
        $token = $request->bearerToken();
        $personalAccessToken = PersonalAccessToken::findToken($token);
        $user = $personalAccessToken->tokenable;

        $liked = DB::table('likes')
        ->where('owner', $user->id)->where('thread', $id)
        ->get();
        return $liked;
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
    public function destroy(Request $request)
    {
        $token = $request->bearerToken();
        $personalAccessToken = PersonalAccessToken::findToken($token);
        $user = $personalAccessToken->tokenable;
    
        $liked = DB::table('likes')->where('owner', $user->id)->delete();
        return $liked;
    }
}
