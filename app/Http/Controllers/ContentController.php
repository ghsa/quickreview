<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{

    public function feed()
    {
        $contents = Content::with('category')
            ->loggedUser()
            ->orderBy('next_review_date')
            ->limit(50)
            ->get();

        return view('content.feed', compact('contents'));
    }

    public function markAsReviewed($id)
    {
        $content = Content::loggedUser()->find($id);
        $content->setReviewed();
        return response([], 200);
    }

    public function index()
    {
        $contents = Content::loggedUser()->paginate(20);

        return view('content.index', compact('contents'));
    }

    public function create()
    {
        return view('content.create');
    }

    public function edit($id)
    {
        $content = Content::find($id);
        return view('content.edit', compact('content'));
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        Content::create([
            'title' => request()->title,
            'content' => request()->get('content'),
            'category_id' => request()->category_id,
            'user_id' => Auth::user()->id
        ]);

        return back()->with(['success' => "Content successfully created!"]);
    }

    public function update()
    {
        request()->validate([
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        $content = Content::loggedUser()->find(request()->id);
        $content->title = request()->title;
        $content->content = request()->get('content');
        $content->category_id = request()->category_id;
        $content->save();

        return back()->with(['success' => "Content successfully updated!"]);
    }

}
