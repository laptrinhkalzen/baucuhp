@extends('frontend.layouts.master')
@section('content')
<!DOCTYPE html>
<html>
    <div id="wrapper">
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="column1 detail_news">
                            <div>
                                <strong>Tin tức</strong>
                                <span>Thứ sáu, ngày 12/3/2021</span>
                            </div>
                            <h1>{!!$record->title!!}</h1>
                            {!!$record->content!!}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="column2">
                            <strong>Tin nổi bật</strong>
                            @foreach($hot_news as $key => $news)
                            @if($key==0)
                            <div class="first_new">
                                <img src="{!!$news->getImage()!!}">
                                <h2>{!!$news->title!!}</h2>
                                <hr>
                            </div>
                            @endif
                            @endforeach
                            @foreach($hot_news as $key => $news)
                            @if($key>0)
                            <div>
                                <h3>{!!$news->title!!}</h3>
                                <hr>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </div>
</html>
@stop