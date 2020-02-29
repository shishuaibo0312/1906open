<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Redis;
class UserCenter extends Controller
{
    //用户中心
    	function usercenter(){
    		$user=session('user');
    		echo $user;
    		if($user==''){
    			echo "<script>alert('请先登录');location.href='/index/login';</script>";
    		}
    		$count=substr_count($user,'@');
    		if($count>0){
    			$userinfo=UserModel::where('email','=',$user)->first();
    		}else{
    			$userinfo=UserModel::where('phone','=',$user)->first();
    		}
    		//dd($userinfo);
    		return view('index.usercenter',['userinfo'=>$userinfo]);
    	}

    //获取access_token
        function  getaccesstoken(){
            $user=session('user');          //获取用户标识
            if($user==''){
                echo "<script>alert('请先登录');location.href='/index/login';</script>";
            }
            $appid=request()->get('appid');
            $appsecret=request()->get('appsecret');
            if($appid==''||$appsecret==''){
                echo "缺少参数";die;
            }
            
            $userinfo=UserModel::where('phone','=',$user)->orwhere('email','=',$user)->first();
            if($appid!=$userinfo['appid']||$appsecret!=$userinfo['appsecret']){
                echo "参数错误";die;
            }
            $str=str::random(16);
            $access_token=md5($appid.$appsecret.time().$str).sha1($appid.$appsecret.time().$str);
            // echo $access_token;
            $data=[
                'appid' =>$appid,
                'addtime'      =>date('Y-m-d H:i:s')
            ];

            Redis::hMset($access_token,$data);
            Redis::expire($access_token,7200);
            $result=[
                'error'         =>0,
                'access_token'  =>$access_token,
                'time'          =>7200
            ];
            return $result;

        }


    //验证access_token是否有效
        function testat(){
            // $access_token=request()->get('access_token');
            // //echo $access_token;
            // if($access_token==''){
            //     echo "授权失败 缺少access_token";die;
            // }
            // $redis_access_token=Redis::hGetAll($access_token);
            // if(!$redis_access_token){
            //     echo "授权失败  access_token错误";die;
            // }

            // print_r($redis_access_token);

        }
}
