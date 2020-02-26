<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //测试签名
    	function test1(){
    		$key='1906';
    		$data="hello";
    		$sign=md5($key.$data);
    		//dd($sign);
    		//$name="yaoyao"
    		
	        $url="http://api.1906.com/test11?data=".$data."&sign=".$sign;  //接口服务器地址(线上)
	        echo $url;echo "<br>";echo "<br>";
	        // $curl = curl_init();
	        // curl_setopt($curl, CURLOPT_URL, $url); //设置请求地址
	        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 返回数据格式
	        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//关闭https验证
	        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);//关闭https验证
	        // $output = curl_exec($curl);
	        // curl_close($curl);
	        // var_dump($output);
	        $res=file_get_contents($url);
	        var_dump($res);
	    		// $url='http://api.1906.com/apitest/test1';
    		// $res=file_get_contents($url);
    		// var_dump($res);
    	}


    //加密与解密chr  ord 
    	function  test2(){
    		$str='Iloveyou';
    		//$miwen=ord($str);
    		echo "原文：".$str;
    		echo "<br>";
    		$length=strlen($str);
    		//echo $length;
    		$alise='';
    		for ($i=0; $i <$length ; $i++) { 
    			$mi=$str[$i].'->'.ord($str[$i]);
    			$alise.=chr(ord($str[$i])+3);
    			echo $mi."<br>";
    		}
    		echo "<hr>";
    		//print_r($alise);
    	}
}
