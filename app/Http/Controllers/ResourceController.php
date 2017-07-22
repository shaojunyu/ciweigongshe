<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OSS\OssClient;
use OSS\Core\OssException;
use Validator;

class ResourceController extends Controller
{
    const BUCKET = 'ciweigongshe';
    const ACCESS_KEY_ID = "LTAIMjCuQLi2UCzr";
    const ACCESS_KEY_SECRET = 'p8Mos9xlomBuiOMy9EyRGxx63bDYgc';
    const EDN_POINT = 'http://oss-cn-shanghai.aliyuncs.com';

    public function getUploadToken($type = 'other')
    {
        $callbackUrl = "";
        $callback_param = array('callbackUrl'=>$callbackUrl,
            'callbackBody'=>'filename=${object}&size=${size}&mimeType=${mimeType}&height=${imageInfo.height}&width=${imageInfo.width}',
            'callbackBodyType'=>"application/x-www-form-urlencoded");
        $callback_string = json_encode($callback_param);

        $base64_callback_body = base64_encode($callback_string);
        $now = time();
        $expire = 30; //设置该policy超时时间是10s. 即这个policy过了这个有效时间，将不能访问
        $end = $now + $expire;
        $expiration = $this->gmt_iso8601($end);

        $dir = 'other/';
        if($type === 'image'){
            $dir = 'image/';
        }elseif ($type === 'video')
        {
            $dir = 'video/';
        }

        //最大文件大小.用户可以自己设置
        $condition = array(0=>'content-length-range', 1=>0, 2=>1048576000);
        $conditions[] = $condition;

        //表示用户上传的数据,必须是以$dir开始, 不然上传会失败,这一步不是必须项,只是为了安全起见,防止用户通过policy上传到别人的目录
        $start = array(0=>'starts-with', 1=>'$key', 2=>$dir);
        $conditions[] = $start;

        $arr = array('expiration'=>$expiration,'conditions'=>$conditions);
        //echo json_encode($arr);
        //return;
        $policy = json_encode($arr);
        $base64_policy = base64_encode($policy);
        $string_to_sign = $base64_policy;
        $signature = base64_encode(hash_hmac('sha1', $string_to_sign, self::ACCESS_KEY_ID, true));

        $response = array();
        $response['accessid'] = self::ACCESS_KEY_ID;
        $response['host'] = self::EDN_POINT;
        $response['policy'] = $base64_policy;
        $response['signature'] = $signature;
        $response['expire'] = $end;
        $response['callback'] = $base64_callback_body;
        //这个参数是设置用户上传指定的前缀
        $response['dir'] = $dir;
        return JsonResponse::create($response);
    }

    public function uploadAck(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'object_name'=>'required',
            'type'=>'required'
        ]);
        if ($validator->fails())
        {
            return JsonResponse::create(['code'=>1,'message'=>$validator->errors()]);
        }
    }

    public function gmt_iso8601($time) {
        $dtStr = date("c", $time);
        $mydatetime = new \DateTime($dtStr);
        $expiration = $mydatetime->format(\DateTime::ISO8601);
        $pos = strpos($expiration, '+');
        $expiration = substr($expiration, 0, $pos);
        return $expiration."Z";
    }

    public function getImageList(Request $request)
    {
        try {
            $ossClient = new OssClient(self::ACCESS_KEY_ID, self::ACCESS_KEY_SECRET, self::EDN_POINT);
        } catch (OssException $e) {
            print $e->getMessage();
        }
        $prefix = 'image/';
        $delimiter = '/';
        $nextMarker = $request->input('nextMarker','');
        $maxKeys = 31;
        $options = array(
            'delimiter' => $delimiter,
            'prefix' => $prefix,
            'max-keys' => $maxKeys,
            'marker' => $nextMarker,
        );
        try {
            $listObjectInfo = $ossClient->listObjects(self::BUCKET, $options);
        } catch (OssException $e) {
            printf(__FUNCTION__ . ": FAILED\n");
            printf($e->getMessage() . "\n");
            return;
        }
        $objectList = $listObjectInfo->getObjectList(); // 文件列表
        array_shift($objectList);
        $objectArray = ['images'=>[],'nextMaker'=>''];
        if (!empty($objectList)) {
            foreach ($objectList as $objectInfo) {
                array_push($objectArray['images'], new OssObject($objectInfo->getKey()));
            }
        }
        $objectArray['nextMaker'] = $listObjectInfo->getNextMarker();
        return JsonResponse::create($objectArray);
    }

    public function getVideoList(Request $request)
    {
        try {
            $ossClient = new OssClient(self::ACCESS_KEY_ID, self::ACCESS_KEY_SECRET, self::EDN_POINT);
        } catch (OssException $e) {
            print $e->getMessage();
        }
        $prefix = 'video/';
        $delimiter = '/';
        $nextMarker = $request->input('nextMarker','');
        $maxKeys = 31;
        $options = array(
            'delimiter' => $delimiter,
            'prefix' => $prefix,
            'max-keys' => $maxKeys,
            'marker' => $nextMarker,
        );
        try {
            $listObjectInfo = $ossClient->listObjects(self::BUCKET, $options);
        } catch (OssException $e) {
            printf(__FUNCTION__ . ": FAILED\n");
            printf($e->getMessage() . "\n");
            return;
        }
        $objectList = $listObjectInfo->getObjectList(); // 文件列表
        array_shift($objectList);
        $objectArray = ['images'=>[],'nextMaker'=>''];
        if (!empty($objectList)) {
            foreach ($objectList as $objectInfo) {
                array_push($objectArray['images'], new OssObject($objectInfo->getKey()));
            }
        }
        $objectArray['nextMaker'] = $listObjectInfo->getNextMarker();
        return JsonResponse::create($objectArray);
    }

    public function deleteResource(Request $request)
    {
        try {
            $ossClient = new OssClient(self::ACCESS_KEY_ID, self::ACCESS_KEY_SECRET, self::EDN_POINT);
        } catch (OssException $e) {
            print $e->getMessage();
        }
        try{
            $ossClient->deleteObject(self::BUCKET,$request->input('key'));
            return JsonResponse::create(['code'=>0]);
        }catch (OssException $e){
            return JsonResponse::create(['code'=>1,'message'=>$e->getErrorMessage()]);
        }
//        return $request->input('key');
    }
}

class OssObject{
    public $key = '';
    public $url = '';
    public function __construct($key)
    {
        $this->key = $key;
        $this->url = 'http://ciweigongshe.oss-cn-shanghai.aliyuncs.com/'.$key;
    }
}
