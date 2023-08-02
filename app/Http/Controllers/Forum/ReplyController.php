<?php

namespace App\Http\Controllers\Forum;

use App\Exceptions\CannotLikeItem;
use App\Models\Reply;
use App\Policies\ReplyPolicy;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReplyRequest;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(CreateReplyRequest $request)
    {
        $this->authorize(ReplyPolicy::CREATE, Reply::class);

        $reply = new Reply([
            'body' => $request->body()
        ]);
        $reply->authoredBy($request->author());
        $reply->to($request->replyAble());
        $reply->save();
    }
    public function destroy(Reply $reply)
    {
        $this->authorize(ReplyPolicy::DELETE, $reply);

        $reply->delete();
    }
    public function like(Reply $reply )
    {
        $user = Auth::user() ;
        if ($reply->isLikedBy($user)) {
            throw CannotLikeItem::alreadyLiked('reply');
        }

        $reply->likedBy($user);
    }

    public function disLike(Reply $reply)
    {
        $user = Auth::user() ;
        $reply->dislikedBy($user);
    }
}