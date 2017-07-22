<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\News;
use Psy\Util\Json;
use Validator;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getNewsList(Request $request)
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

    public function getNews($object_id)
    {

    }

    public function deleteNews($object_id)
    {
        News::where('object_id',$object_id)->delete();
        return JsonResponse::create(['code'=>0]);
    }

    public function updateNews(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required',
            'content'=>'required',
            'object_id'=>'required'
        ]);
        if ($validator->fails())
        {
            return JsonResponse::create(['code'=>1,'message'=>$validator->errors()]);
        }

        $news = News::where('object_id',$request->input('object_id'))->first();
        $news->setRawAttributes([
            'title'=>$request->input('title'),
            'content'=>$request->input('content')
        ]);
        if ($news->update())
        {
            return JsonResponse::create(['code'=>0]);
        }else{
            return JsonResponse::create(['code'=>1,'message'=>'update failed']);
        }
    }

    public function addNews(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required',
            'content'=>'required'
        ]);
        if ($validator->fails())
        {
            return JsonResponse::create(['code'=>1,'message'=>$validator->errors()]);
        }

        $news = new News();
        $news->setRawAttributes([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'object_id'=>uniqid()
        ]);
        if ($news->save())
        {
            return JsonResponse::create(['code'=>0]);
        }else{
            return JsonResponse::create(['code'=>1,'message'=>'create failed']);
        }
    }
}
