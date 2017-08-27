<?php

namespace App\Http\Controllers;

use App\User;
use Dotenv\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Ixudra\Curl\Facades\Curl;

class UserController extends Controller
{
    public function wechatLogin(Request $request)
    {
        $user = Auth::user();
        if ($user){
            return redirect('/myself');
        }

        $code = $request->input('code');
        if (empty($code)) {
            $url = "https://open.weixin.qq.com/connect/qrconnect?appid=wxa156c139278eb3b7&redirect_uri=http://ciweigongshe.net/wechatLogin&response_type=code&scope=snsapi_login&state=".rand(11111,99999)."#wechat_redirect";
            return redirect($url);
        }else {
            //第二步：通过code获取access_token
            $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxa156c139278eb3b7&secret=75c10e91e4af50a5a78a42edcb04fb6d&code=".$code."&grant_type=authorization_code";
            $response = Curl::to($url)
                ->get();
            $response = json_decode($response);
            $openid = $response->openid;
            $access_token = $response->access_token;
            if (!empty($response->errcode)){
                $url = "https://open.weixin.qq.com/connect/qrconnect?appid=wxa156c139278eb3b7&redirect_uri=http://ciweigongshe.net/wechatLogin&response_type=code&scope=snsapi_login&state=".rand(11111,99999)."#wechat_redirect";
                return redirect($url);
            }

            //获取用户个人信息
            $url = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid";
            $response = Curl::to($url)
                ->get();
            $response = json_decode($response);
            $openid = $response->openid;
            $nickname = $response->nickname;
            $headimgurl = $response->headimgurl;

            $user = User::where('open_id',$openid)
                ->first();

            if (!$user){
                $user = new User();
                $user->setRawAttributes([
                    'nickname'=>$nickname,
                    'open_id'=>$openid,
                    'avatar'=>$headimgurl,
                    'role'=>'user'
                ]);
                $user->save();
            }
            Auth::login($user);
            return redirect('/myself');
        }
    }

    //user homepage
    public function myself()
    {
        $user = Auth::user();
        if (!$user){
            return redirect('/wechatLogin');
        }
        return $user;
    }

    //get info of current user
    public function getUserInfo()
    {
        $user = Auth::user();
        if (!$user){
            return redirect('/wechatLogin');
        }
        return $user;
    }

    //comment a post
    public function comment()
    {
        $user = Auth::user();
        if (!$user){
            return JsonResponse::create(['']);
        }
    }

    public function favoriteAuthor(Request $request)
    {
        $user = Auth::user();
        if (!$user)
        {
            return JsonResponse::create(['code'=>1,'message'=>'请先登陆!']);
        }
        $author_id = $request->input('author_id');
        $validator = Validator::make($request->all(), [
            'author_id'=>['required',Rule::exists('author','object_id')]
        ]);
        if ($validator->fails())
        {
            return JsonResponse::create(['code'=>1,'message'=>$validator->errors()]);
        }

        $c = DB::table('user_favorite_author')
            ->where('user_id',$user->id)
            ->where('author_id',$author_id)
            ->count();
        if ($c > 0)
        {
            return JsonResponse::create(['code'=>1,'message'=>'已收藏!']);
        }
        DB::table('user_favorite_author')->insert([
            'user_id'=>$user->id,
            'author_id'=>$author_id
        ]);
        return JsonResponse::create(['code'=>1,'message'=>'收藏成功!']);
    }

    public function favoritePost(Request $request)
    {
        $user = Auth::user();
        if (!$user)
        {
            return JsonResponse::create(['code'=>1,'message'=>'请先登陆!']);
        }
        $post_id = $request->input('post_id');
        $validator = Validator::make($request->all(), [
            'post_id'=>['required',Rule::exists('post','object_id')]
        ]);
        if ($validator->fails())
        {
            return JsonResponse::create(['code'=>1,'message'=>$validator->errors()]);
        }

        $c = DB::table('user_favorite_post')
            ->where('user_id',$user->id)
            ->where('post_id',$post_id)
            ->count();
        if ($c > 0)
        {
            return JsonResponse::create(['code'=>1,'message'=>'已收藏!']);
        }
        DB::table('user_favorite_post')->insert([
           'user_id'=>$user->id,
            'post_id'=>$post_id
        ]);
        return JsonResponse::create(['code'=>1,'message'=>'收藏成功!']);
    }
}
