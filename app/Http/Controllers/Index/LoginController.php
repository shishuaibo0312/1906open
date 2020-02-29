<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;
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
}
