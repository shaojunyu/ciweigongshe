<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Validation\Rule;
use Validator;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getTagList()
    {
        return Tag::all();
    }

    public function addTag(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>['required',Rule::unique('tag')]
        ]);

        if ($validator->fails())
        {
            return JsonResponse::create(['code'=>1,'message'=>$validator->errors()]);
        }

        $tag = new Tag();
        $tag->setRawAttributes([
            'name'=>$request->input('name'),
            'object_id'=>uniqid()
        ]);

        if ($tag->save())
        {
            return JsonResponse::create(['code'=>0]);
        }else{
            return JsonResponse::create(['code'=>1,'message'=>'create failed']);
        }
    }

    public function updateTag(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>['required',Rule::unique('tag')],
            'object_id'=>'required',
        ]);
        if ($validator->fails())
        {
            return JsonResponse::create(['code'=>1,'message'=>$validator->errors()]);
        }

        $tag = Tag::where('object_id',$request->input('object_id'))->first();
        if (!$tag){
            return JsonResponse::create(['code'=>1,'message'=>'item not found']);
        }
        $tag->setRawAttributes([
            'name'=>$request->input('name')
        ]);
        if ($tag->update())
        {
            return JsonResponse::create(['code'=>0]);
        }else{
            return JsonResponse::create(['code'=>1,'message'=>'update failed']);
        }
    }

    public function deleteTag($object_id)
    {
        Tag::where('object_id',$object_id)->delete();
        return JsonResponse::create(['code'=>0]);
    }
}
