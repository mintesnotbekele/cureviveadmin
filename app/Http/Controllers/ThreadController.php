<?php

namespace App\Http\Controllers;

use App\Models\thread;
use App\Models\Post;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use DB;


class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('threads')
            ->join('users', 'users.id', '=', 'threads.author')
            ->select('threads.*', 'users.name')
            ->get();

        return $users;
      //  return thread::latest()->get();
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
        $post = new thread;
        $post->title = $request->title;
        $post->body = $request->description;
        $post->status = "active";
        $post->author = $user->id;
        $post->save();
        return response()->json([
            'message' => 'successfully created thread'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return thread::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatepost(Request $request, $id)
    {
        $model= DB::table('forum_posts')->where('id', $id)->update(['post_id' => $request->input('post_id')]);
    }
   
    public function likePost(Request $request, $id)
    {
         //$post = DB::table('forum_posts');
         $post = Post::findOrFail($id);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(thread $thread)
    {
        //
    }
}
