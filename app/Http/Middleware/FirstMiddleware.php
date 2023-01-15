<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FirstMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $input="ミドルウェアが書き換えてます。";
        //mergeメソッド、フォームの送信などで送られる値に新たな値を追加する
        //$requestインスタンスのcontentというキーに対して$inputを代入
        $request->merge(['content'=>$input]);
        //この関数が実行されるとコントローラなどの次の処理に進む
        return $next($request);
    }
}
