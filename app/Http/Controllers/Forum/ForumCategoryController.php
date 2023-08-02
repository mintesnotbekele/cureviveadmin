<?php

namespace App\Http\Controllers\Forum;

use App\Models\ForumCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForumCategoryContoller extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => ['required', 'unique:categories'],
        ]);

        ForumCategory::create([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
        ]);

    }

    public function update(Request $request,ForumCategory  $category)
    {
        $this->validate($request, [
            'name'  => ['required', 'unique:categories'],
        ]);

        $category->update([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
        ]);

    }

    public function destroy(ForumCategory $category)
    {
        $category->delete();

    }
}