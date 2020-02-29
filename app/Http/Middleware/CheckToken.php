<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            
            $access_token=request()->get('access_token');
            //echo $access_token;
            if($access_token==''){
                echo "授权失败 缺少access_token";die;
            }
            $redis_access_token=Redis::hGetAll($access_token);
            if(!$redis_access_token){
                echo "授权失败  access_token错误";die;
            }

            print_r($redis_access_token);
            return $next($request);
    }
}
