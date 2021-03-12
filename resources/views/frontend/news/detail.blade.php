@extends('frontend.layouts.master')
@section('content')
<!DOCTYPE html>
<html>
    <div id="wrapper">
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="detail-news">
                        <h1>{!!$record->title!!}</h1>
                        {!!$record->content!!}
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </div>
</html>
@stop