<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;

class PublicController extends Controller
{
    public function showPost($object_id)
    {
        $res = Post::join('author', 'post.author_id', '=', 'author.object_id')
            ->leftJoin('post_favorite','post.object_id', '=', 'post_favorite.post_id')
            ->select('post.*', 'author.name as author','author.avatar as author_avatar',(DB::raw("COUNT( DISTINCT post_favorite.id) AS favorite")))
            ->where('post.object_id',$object_id)
            ->get();
        return JsonResponse::create($res);
    }

    public function postList(Request $request)
    {
        $pageSize = $request->input('pageSize',20);
        $currentPage = $request->input('currentPage',1);
        $category = $request->input('category','');
        $tag = $request->input('tag','');

        if ($category)
        {
            $category_id = Category::where('name',$category)
                ->select('object_id')
                ->get()
                ->first();
            if ($category_id)
            {
                $category_id = $category_id->object_id;
            }else{
                return JsonResponse::create(['code'=>1,'message'=>'错误的类别']);
            }
            $res = DB::table('post_category')
                ->where('category_id',$category_id)
                ->select('post_id')
                ->get();
            $post_ids = [];
            foreach ($res as $r) {
                $post_ids[] = $r->post_id;
            }
            $res = Post::orderBy('post.object_id', 'desc')
                ->offset($pageSize * ($currentPage-1))
                ->limit($pageSize)
                ->join('author', 'post.author_id', '=', 'author.object_id')
                ->leftJoin('post_favorite','post.object_id', '=', 'post_favorite.post_id')
                ->whereIn('post.object_id',$post_ids)
                ->where('post.status','published')
                ->select('post.*', 'author.name as author','author.avatar as author_avatar',(DB::raw("COUNT( DISTINCT post_favorite.id) AS favorite")))
                ->groupBy('post.object_id')
                ->get();
            return JsonResponse::create([
                'pageSize'=>$pageSize,
                'currentPage'=>$currentPage,
                'totalPage'=>ceil(Post::count()/$pageSize),
                'data'=>$res
            ]);
        }

        if ($tag) {
            $tag_id = Tag::where('name',$tag)
                ->select('object_id')
                ->get()
                ->first();

            if ($tag_id)
            {
                $tag_id = $tag_id->object_id;
            }else{
                return JsonResponse::create(['code'=>1,'message'=>'错误的tag']);
            }
            $res = DB::table('post_tag')
                ->where('tag_id',$tag_id)
                ->select('post_id')
                ->get();
            $post_ids = [];
            foreach ($res as $r) {
                $post_ids[] = $r->post_id;
            }
            $res = Post::orderBy('post.object_id', 'desc')
                ->offset($pageSize * ($currentPage-1))
                ->limit($pageSize)
                ->join('author', 'post.author_id', '=', 'author.object_id')
                ->leftJoin('post_favorite','post.object_id', '=', 'post_favorite.post_id')
                ->whereIn('post.object_id',$post_ids)
                ->where('post.status','published')
                ->select('post.*', 'author.name as author','author.avatar as author_avatar',(DB::raw("COUNT( DISTINCT post_favorite.id) AS favorite")))
                ->groupBy('post.object_id')
                ->get();
            return JsonResponse::create([
                'pageSize'=>$pageSize,
                'currentPage'=>$currentPage,
                'totalPage'=>ceil(Post::count()/$pageSize),
                'data'=>$res
            ]);
        }

        $res = Post::orderBy('post.object_id', 'desc')
            ->offset($pageSize * ($currentPage-1))
            ->limit($pageSize)
            ->join('author', 'post.author_id', '=', 'author.object_id')
            ->leftJoin('post_favorite','post.object_id', '=', 'post_favorite.post_id')
            ->where('post.status','published')
            ->select('post.*', 'author.name as author','author.avatar as author_avatar',(DB::raw("COUNT( DISTINCT post_favorite.id) AS favorite")))
            ->groupBy('post.object_id')
            ->get();
        return JsonResponse::create([
            'pageSize'=>$pageSize,
            'currentPage'=>$currentPage,
            'totalPage'=>ceil(Post::count()/$pageSize),
            'data'=>$res
            ]);
    }

    public function newsList(Request $request)
    {
        $pageSize = $request->input('pageSize',20);
        $currentPage = $request->input('currentPage',1);
        $res = News::orderBy('id', 'desc')
            ->offset($pageSize * ($currentPage-1))
            ->limit($pageSize)
            ->get();
        return JsonResponse::create([
            'pageSize'=>$pageSize,
            'currentPage'=>$currentPage,
            'totalPage'=>ceil(News::count()/$pageSize),
            'data'=>$res
        ]);
    }

    public function search(Request $request)
    {

    }

    public function comment(Request $request)
    {
        $content = $request->input('content');
        $post_id = $request->input('post_id');
        $validator = Validator::make($request->all(), [
            'content'=>['required'],
            'post_id'=>'required'
        ]);
        if ($validator->fails())
        {
            return JsonResponse::create(['code'=>1,'message'=>$validator->errors()]);
        }

        $user = Auth::user();
        if ($user) {
            $user_id = $user->object_id;
            $comment = new Comment();
            $comment->setRawAttributes([
                'user_id'=>$user_id,
                'post_id'=>$post_id,
                'content'=>$content
            ]);
            $comment->save();
            return JsonResponse::create(['code'=>0,'message'=>'评论发表成功，等待审核中']);
        } else {
            return JsonResponse::create(['code'=>1,'message'=>'请登陆后再发表评论']);
        }
    }

    public function slide(Request $request)
    {
        $category = $request->input('category','');

        if ($category)
        {
            $category_id = Category::where('name',$category)
                ->select('object_id')
                ->get()
                ->first();
            if ($category_id)
            {
                $category_id = $category_id->object_id;
            }else{
                return JsonResponse::create(['code'=>1,'message'=>'错误的类别']);
            }
            $res = DB::table('post_category')
                ->where('category_id',$category_id)
                ->select('post_id')
                ->get();
            $post_ids = [];
            foreach ($res as $r) {
                $post_ids[] = $r->post_id;
            }
            $res = Post::orderBy('post.object_id', 'desc')
                ->limit(4)
                ->join('author', 'post.author_id', '=', 'author.object_id')
                ->leftJoin('post_favorite','post.object_id', '=', 'post_favorite.post_id')
                ->whereIn('post.object_id',$post_ids)
                ->where('post.status','published')
                ->where('post.is_slide','1')
                ->select('post.title', 'post.image' , 'author.name as author','author.avatar as author_avatar',(DB::raw("COUNT( DISTINCT post_favorite.id) AS favorite")))
                ->groupBy('post.object_id')
                ->get();
            return JsonResponse::create($res);
        }

        $res = Post::orderBy('post.object_id', 'desc')
            ->limit(4)
            ->join('author', 'post.author_id', '=', 'author.object_id')
            ->leftJoin('post_favorite','post.object_id', '=', 'post_favorite.post_id')
            ->where('post.status','published')
            ->select('post.title', 'post.image', 'author.name as author','author.avatar as author_avatar',(DB::raw("COUNT( DISTINCT post_favorite.id) AS favorite")))
            ->groupBy('post.object_id')
            ->get();
        return JsonResponse::create($res);
    }

    public function hotPost()
    {

    }
}
