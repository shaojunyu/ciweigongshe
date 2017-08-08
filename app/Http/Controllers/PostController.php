<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPost($object_id)
    {
        $post = Post::where('object_id',$object_id)->first();
        return JsonResponse::create($post);
    }

    public function getPostList(Request $request)
    {
        $pageSize = $request->input('pageSize',20);
        $currentPage = $request->input('currentPage',1);
        $res = Post::orderBy('post.object_id', 'desc')
            ->offset($pageSize * ($currentPage-1))
            ->limit($pageSize)
            ->join('author', 'post.author_id', '=', 'author.object_id')
            ->leftJoin('post_favorite','post.object_id', '=', 'post_favorite.post_id')
            ->select('post.*', 'author.name as author',(DB::raw("COUNT( DISTINCT post_favorite.id) AS favorite")))
            ->groupBy('post.object_id')
            ->get();

        return view('admin/posts', ['posts' => $res]);
//        return JsonResponse::create([
//            'pageSize'=>$pageSize,
//            'currentPage'=>$currentPage,
//            'totalPage'=>ceil(Post::count()/$pageSize),
//            'data'=>$res
//        ]);
    }

    public function addPost(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required',
            'content'=>'required',
            'author_id'=>['required',Rule::exists('author','object_id')],
            'image'=>'required',
            'abstract'=>'required',
            'is_slide'=>['required',Rule::in([1,0])],
            'tags'=>['required',Rule::exists('tag','object_id')],
            'categories'=>['required',Rule::exists('category','object_id')]
        ]);
        if ($validator->fails())
        {
            return JsonResponse::create(['code'=>1,'message'=>$validator->errors()]);
        }

        $post = new Post();
        $post->setRawAttributes([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'author_id'=>$request->input('author_id'),
            'image'=>$request->input('image'),
            'abstract'=>$request->input('abstract'),
            'is_slide'=>$request->input('is_slide'),
            'status'=>'draft',
            'object_id'=>uniqid()
        ]);
        if ($post->save()) {
            $object_id = $post->object_id;
            foreach ($request->input('tags') as $tag) {
                DB::table('post_tag')
                    ->insert([
                        'post_id'=>$object_id,
                        'tag_id'=>$tag
                    ]);
            }
            foreach ($request->input('categories') as $category) {
                DB::table('post_category')
                    ->insert([
                        'post_id'=>$object_id,
                        'category_id'=>$category
                    ]);
            }
            return JsonResponse::create(['code'=>0]);
        }else{
            return JsonResponse::create(['code'=>1,'message'=>'create failed']);
        }
    }

    public function updatePost(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required',
            'content'=>'required',
            'author_id'=>['required',Rule::exists('author','object_id')],
            'image'=>'required',
            'abstract'=>'required',
            'is_slide'=>['required',Rule::in([1,0])],
            'tags'=>['required',Rule::exists('tag','object_id')],
            'categories'=>['required',Rule::exists('category','object_id')],
            'object_id'=>['required',Rule::exists('post','object_id')]
        ]);
        if ($validator->fails())
        {
            return JsonResponse::create(['code'=>1,'message'=>$validator->errors()]);
        }
        $post = Post::where('object_id',$request->input('object_id'))->first();
        $post->setRawAttributes([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'author_id'=>$request->input('author_id'),
            'image'=>$request->input('image'),
            'abstract'=>$request->input('abstract'),
            'is_slide'=>$request->input('is_slide'),
        ]);
        if ($post->update()) {
            $object_id = $request->input('object_id');
//            return $object_id;
            DB::table('post_tag')
                ->where('post_id',$object_id)
                ->delete();
            DB::table('post_category')
                ->where('post_id',$object_id)
                ->delete();

            foreach ($request->input('tags') as $tag) {
                DB::table('post_tag')
                    ->insert([
                        'post_id'=>$object_id,
                        'tag_id'=>$tag
                    ]);
            }
            foreach ($request->input('categories') as $category) {
                DB::table('post_category')
                    ->insert([
                        'post_id'=>$object_id,
                        'category_id'=>$category
                    ]);
            }
            return JsonResponse::create(['code'=>0]);
        }
    }

    public function publishPost($object_id)
    {
        Post::where('object_id',$object_id)
            ->update([
                'status'=>'published'
            ]);
        return JsonResponse::create(['code'=>0]);
    }

    public function withdrawPost($object_id)
    {
        Post::where('object_id',$object_id)
            ->update([
                'status'=>'draft'
            ]);
        return JsonResponse::create(['code'=>0]);
    }

    public function deletePost($object_id)
    {
        Post::where('object_id',$object_id)
            ->delete();
        return JsonResponse::create(['code'=>0]);
    }
}
