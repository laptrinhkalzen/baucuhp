@extends('backend.layouts.master')
@section('content')
<!-- Content area -->
<div class="content">
    <div class="row">
        <div class="col-sm-4">
            <a href="{{route('admin.candidates.index')}}">
                <div class="tile-stats tile-red"> 
                    <div class="icon"><i class="icon-user-tie"></i>
                    </div> 
                    <div class="num" data-start="0" data-end="3350" data-postfix="" data-duration="1500" data-delay="0">
                        {{$council_count}}                        </div>
                    <h3>Quản lý hội đồng ứng cử</h3>
                </div>
            </a>
        </div>
        <div class="col-sm-4">
            <a href="{{route('admin.council.index')}}">
                <div class="tile-stats tile-green"> 
                    <div class="icon"><i class="icon-user-tie"></i>
                    </div> 
                    <div class="num" data-start="0" data-end="0" data-postfix="" data-duration="1500" data-delay="0">
                        {{$candidates_count}}
                    </div>
                    <h3>Quản lý ứng cử viên</h3>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /content area -->
@stop
