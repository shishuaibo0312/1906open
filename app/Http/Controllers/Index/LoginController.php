<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;
use GuzzleHttp\Client;
class LoginController extends Controller
{
    //登陆的视图
    	function login(){
    		return view('index.login');
    	}

    //登陆的执行
    	function login_do(){
    		$post=request()->except('_token');
    		$account=$post['account'];
    		$pwd=md5($post['pwd']);
    		//dd($account);
    		$count=substr_count($account,'@');
    		if($count>0){
    			$where=[
    				['email','=',$account],
    				['pwd','=',$pwd]
    			];
    			$res=UserModel::where($where)->first();
    		}else{
    				$where=[
    				['phone','=',$account],
    				['pwd','=',$pwd]
    			];
    			$res=UserModel::where($where)->first();
    		}
    		 //dd($res);
    		if($res){
    				 session(['user'=>$account]); //设置
             		 request()->session()->save();//存储到服务端
    		         //$user=session('user');
    		         //echo $user;die;
    				 echo "<script>alert('登录成功');location.href='/index/usercenter';</script>";
    				 
    			}else{
    				 echo "<script>alert('登录失败');location.href='/index/login';</script>";
    			}
    		
    		

    	}


    //第三方登录
        function gethublogin(){

        }


    //回调地址
        function getcode(){
            $code=$_GET['code'];    //获取code
            //echo $code;die;
            $client=new Client();
            $url='https://github.com/login/oauth/access_token';
            $response=$client->request("POST",$url,[
                'headers'   =>[
                    'Accept'    =>'application/json'
                ],
                'form_params'    =>[
                    'client_id'     => '39634ef1f5f4b95f245a',
                    'client_secret' => 'ec373465bb50beda9196fda49ff190917df467fb',
                    'code'      => $code

                ]
            ]);
            $result=$response->getBody();
            //echo $result;die;
            $result=json_decode($result,true);
           // print_r($result);
           $access_token=$result['access_token'];
           //echo $access_token;
           $url2='https://api.github.com/user?access_token='.$access_token;
            $res = $client->request('GET', $url2);
            $res=$res->getBody();
            $res=json_decode($res,true);
            dd($res);
            echo $res['login'];
            echo $res['id'];
        }
}
