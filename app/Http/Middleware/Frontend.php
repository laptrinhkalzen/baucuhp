<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
class Frontend {
    public function handle($request, Closure $next){
        $config = \DB::table('config')->first();
        $menu = \DB::table('menu')->where('parent_id', 0)->get();
        foreach($menu as $key=>$val){
            $menu[$key]->children = \DB::table('menu')->where('parent_id',$val->id)->get();
        }
        $news_footer1 = \DB::table('news')->join('news_category', 'news.id', '=', 'news_category.news_id')->where('news_category.category_id',238)->where('status',1)->select('news.*')->orderBy('news.ordering')->get();
        $news_footer2 = \DB::table('news')->join('news_category', 'news.id', '=', 'news_category.news_id')->where('news_category.category_id',239)->where('status',1)->select('news.*')->orderBy('news.ordering')->get();
        $count=0;
        if(! is_null(session('cart'))){
            foreach(session('cart') as $val){
                    $count += $val['quantity'];
            }
        }
        //Custom
        /*DateTime*/
        $dayofweek = Carbon::now('Asia/Ho_Chi_Minh')->dayOfWeek;
        $day = Carbon::now('Asia/Ho_Chi_Minh')->day;
        $month = Carbon::now('Asia/Ho_Chi_Minh')->month;
        $year = Carbon::now('Asia/Ho_Chi_Minh')->year;
        $datetime = 
            [
            "dayofweek" => $dayofweek,
            "day" => $day,
            "month" => $month,
            "year" => $year
            ];
        switch ($datetime['dayofweek']) {
            case 1:
            $datetime['dayofweek'] = 'Thứ Hai';
            break;
            case 2:
            $datetime['dayofweek'] = 'Thứ Ba';
            break;
            case 3:
            $datetime['dayofweek'] = 'Thứ Bốn';
            break;
            case 4:
            $datetime['dayofweek'] = 'Thứ Năm';
            break;
            case 5:
            $datetime['dayofweek'] = 'Thứ Sáu';
            break;
            case 6:
            $datetime['dayofweek'] = 'Thứ Bảy';
            break;
            case 6:
            $datetime['dayofweek'] = 'Chủ Nhật';
            break;
        }
        \View::share(['datetime' => $datetime]);
        \View::share(['share_config' => $config]);
        \View::share(['count_cart' => $count]);
        \View::share(['menu' => $menu]);
        \View::share(['news_footer1' => $news_footer1]);
        \View::share(['news_footer2' => $news_footer2]);
        return $next($request);
    }
    
}
