<?php

namespace App\Http\Controllers;

use App\Models\reply;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use DB;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return reply::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function repliedforum(string $id)
    {
        $replies = DB::table('replies')->where('thread', $id)->get();
        return $replies;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $token = $request->bearerToken();
        

        $personalAccessToken = PersonalAccessToken::findToken($token);
        $user = $personalAccessToken->tokenable;


        $post = new reply;
        $post->description = $request->description;
        $post->thread = $request->thread;
        $post->author = $user->id;
        
        $post->save();
        return response()->json([
            'message' => 'successfully booked'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reply $reply)
    {
        //
    }
}
