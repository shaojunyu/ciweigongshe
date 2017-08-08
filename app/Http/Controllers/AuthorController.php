<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Author as Author;

class AuthorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAuthor($objectId)
    {
        return Author::where('object_id',$objectId)->first();
    }

    public function deleteAuthor($objectId)
    {
        if (Author::where('object_id',$objectId)->delete()) {
            return JsonResponse::create(['code'=>0]);
        } else {
            return JsonResponse::create(['code'=>1, 'message'=>'创建失败']);
        }
    }

    public function getAuthorList()
    {
        $authors = Author::all();
        return $authors;
        //return view('admin/authors',['authors' => $authors]);
    }
    public function authorList() {
        $authors = Author::all();
        return view('admin/authors',['authors' => $authors]);
    }

    public function getAddAuthor() {
        return view('admin/addauthor');
    }

    public function postAddAuthor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>['required',Rule::unique('author')],
            'interest'=>'required',
            'introduction'=>'required',
            'avatar'=>'required'
        ]);
        if ($validator->fails())
        {
            return JsonResponse::create(['code'=>1,'message'=>$validator->errors()]);
        }

        $author = new Author();
        $author->setRawAttributes([
            'name'=>$request->input('name'),
            'interest'=>$request->input('interest'),
            'introduction'=>$request->input('introduction'),
            'avatar'=>$request->input('avatar'),
            'object_id'=>uniqid()
        ]);

        if ($author->save())
        {
            return JsonResponse::create(['code'=>0]);
        }else{
            return JsonResponse::create(['code'=>1,'message'=>'创建失败']);
        }
    }

    public function getUpdateAuthor($objectId) {
        $author = Author::where('object_id',$objectId)->first();
        return view('admin/updateauthor',['author' => $author]);

    }

    public function postUpdateAuthor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>['required'],
            'interest'=>'required',
            'introduction'=>'required',
            'object_id'=>'required',
        ]);
        if ($validator->fails())
        {
            return JsonResponse::create(['code'=>1,'message'=>$validator->errors()]);
        }

        $author = Author::where('object_id',$request->input('object_id'))->first();
        $author->setRawAttributes([
            'name'=>$request->input('name'),
            'interest'=>$request->input('interest'),
            'introduction'=>$request->input('introduction')
        ]);

        if ($author->update())
        {
            return JsonResponse::create(['code'=>0]);
        }else{
            return JsonResponse::create(['code'=>1,'message'=>'更新失败']);
        }
    }

}
