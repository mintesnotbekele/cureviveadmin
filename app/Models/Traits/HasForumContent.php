<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Post;
use App\Models\Thread;

trait HasForumContent
{
    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class, 'author_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }
}
