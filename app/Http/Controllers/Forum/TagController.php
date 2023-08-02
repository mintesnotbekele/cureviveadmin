<?php

namespace App\Http\Controllers\Forum;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => ['required', 'unique:tags']
        ]);

        Tag::create([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
        ]);
    }



    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'name'  => ['required', Rule::unique('tags')->ignore($tag)]
        ]);

        $tag->update([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
        ]);

    }


    public function destroy(Tag $tag)
    {
        $tag->delete();

    }
}