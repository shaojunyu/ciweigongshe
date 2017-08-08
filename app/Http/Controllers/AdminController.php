<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Author;
use App\Tag;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $view = $request->input('view','post');
        switch ($view)
        {
            case 'author':
                $authors = Author::orderBy('id', 'desc')
                    ->get();
                return view('admin.authors',['authors'=>$authors]);
            case 'updateAuthor':
                $author_id = $request->input('author_id');
                $author = Author::where('object_id',$author_id)->first();
                return view('admin.updateAuthor',['author'=>$author]);
            case 'addAuthor':
                return view('admin.addAuthor');

            case 'tags':
                $tags = Tag::orderBy('id', 'desc')
                ->get();
                return view('admin.tags',['tags'=>$tags]);

            case 'upload':
                return view('admin.upload');

            default:
                $posts = Post::orderBy('id', 'desc')
                    ->get();
                return view('admin.posts',['posts'=>$posts]);
        }
    }
    
}
