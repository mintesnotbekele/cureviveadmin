<?php

namespace App\Http\Controllers\Forum;

use App\Exceptions\CannotLikeItem;
use App\Models\Thread;
use App\Policies\ThreadPolicy;
use App\Http\Controllers\Controller;
use App\Http\Requests\ThreadStoreRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ThreadController extends Controller
{

    public function store(ThreadStoreRequest $request)
    {
        $thread = new Thread([
            'title'         =>  $request->title(),
            'slug'          => Str::slug($request->title),
            'body'          => $request->body(),
            'category_id'   => $request->category(),
        ]);

        $thread->authoredBy($request->author());
        $thread->syncTags($request->tags());
        $thread->save();
    }

    public function update(ThreadStoreRequest $request, Thread $thread)
    {
        $this->authorize(ThreadPolicy::UPDATE, $thread);

        $attributes =      [   'title'         => $request->title(),
        'body'          => $request->body(),
        'category_id'   => $request->category(),
        'slug'          => Str::slug($request->title()),
        'tags'          => $request->tags()];

        $attributes = Arr::only($attributes, [
            'title', 'slug', 'body', 'category_id', 'tags'
        ]);
        $thread->update($attributes);

        if (Arr::has($attributes, 'tags')) {
            $thread->syncTags($attributes['tags']);
        }

        $thread->save();
    }

    public function destroy(Thread $thread)
    {
        $this->authorize(ThreadPolicy::DELETE, $thread);

        $thread->delete();
    }

    public function like(Thread $thread)
    {
        $user = auth()->user();
        if ($thread->isLikedBy($user)) {
            throw CannotLikeItem::alreadyLiked('thread');
        }

        $thread->likedBy($user);
    }
    public function disLike(Thread $thread)
    {
        $user = Auth::user() ;
        $thread->dislikedBy($user);
    }

}