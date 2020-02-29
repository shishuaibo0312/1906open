<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;
class RegistController extends Controller
{
    //注册的视图
    	function regist(){
    		return view('index.regist');
    	}

    //接受注册的信息并且入库
    	function regist_do(){
    		$post=request()->except('_token');
    		if(request()->hasFile('c_photo')){
     		$post['c_photo'] = $this->upload('c_photo');
     		}
    		$post['pwd']=md5($post['pwd']);
    		$post['appid']=rand(11111,99999).time();
    		$post['appsecret']=md5(rand(11111,99999).time());
    		//var_dump($post);die;
    		
    		$res=UserModel::insert($post);
    		if($res){
    			 echo "<script>alert('注册成功');location.href='/index/login';</script>";
    		}else{
    			 echo "<script>alert('注册失败');location.href='/index/regist';</script>";
    		}
    	}









  	//上传文件
  		function upload($file){
     		if(request()->file($file)->isValid()) {
			 $photo =request()->file($file);
			 $store_result = $photo->store('uploads');
			 
			 return $store_result;		
			 }
			 exit('未获取到上传文件或上传过程出错');
     	 }
}
