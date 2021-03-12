@extends('frontend.layouts.master')
@section('content')
<!DOCTYPE html>
<html>
	<head>
		<title>UBNDTP</title>
		<link rel="stylesheet" href="{!!asset('assets/frontend/css/reset.css')!!}">
		<link rel="stylesheet" href="{!!asset('assets/frontend/css/style.css')!!}">
		<link rel="stylesheet" href="{!!asset('assets/frontend/css/bootstrap.min.css')!!}">
		<link rel="stylesheet" href="{!!asset('assets/frontend/css/owl.carousel.min.css')!!}">
		<link rel="stylesheet" href="{!!asset('assets/frontend/css/owl.theme.default.css')!!}">
		<script src="{!!asset('assets/frontend/js/jquery.min.js')!!}"></script>
		<script src="{!!asset('assets/frontend/js/script.js')!!}"></script>
		<script src="{!!asset('assets/frontend/js/owl.carousel.min.js')!!}"></script>
		<script src="{!!asset('assets/frontend/js/bootstrap.min.js')!!}"></script>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
	</head>
	<div id="wrapper">
		<header>
			<div class="topbar">
				<div class="container">
					<span>{!!$datetime['dayofweek']!!}, ngày {!!$datetime['day']!!} tháng {!!$datetime['month']!!} năm {!!$datetime['year']!!}</span><span>Hòm thư góp ý</span>
				</div>
			</div>
			<div class="banner" style="background-image: url('img/cau-hvt.png');">
				<h1>ỦY BAN BẦU CỬ THÀNH PHỐ HẢI PHÒNG</h1>
			</div>
			<div class="nav">
				<div class="container">
					<ul>
						<li>
							<img src="icon/home.svg">
						</li>
						<li>
							Tin tức bầu cử
						</li>
						<li>
							Tin tức bầu cử
						</li>
					</ul>
				</div>
			</div>
		</header>
		<body>
			<div class="section1">
				<div class="container">
					<div class="row">
						<div class="section1-column1 col-6">
							@foreach($news_arr as $key => $news)
							@if($key==0)
							<div class="column1-firstnews">
								<img src="{!!$news->getImage()!!}">
								<h2>{!!$news->title!!}</h2>
								<span>{!!$news->getPostSchedule()!!}</span>
								<br>
								<a>{!!$news->description!!}</a>
							</div>
							@endif
							@endforeach
							<div class="column1-secondnews">
								<div class="container">
									<div class="row">
										@foreach($news_arr as $key => $news)
										@if($key>0 && $key<3)
										<div class="col-6">
											<img src="{!!$news->getImage()!!}">
											<h2>{!!$news->title!!}</h2>
										</div>
										@endif
										@endforeach
									</div>
								</div>
							</div>
						</div>
						<div class="section1-column2 col-3">
							@foreach($news_arr as $key => $news)
							@if($key==3)
							<div class="column2-firstnews">
								<img src="{!!$news->getImage()!!}">
								<h2>{!!$news->title!!}</h2>
								<hr>
							</div>
							@endif
							@endforeach
							@foreach($news_arr as $key => $news)
							@if($key>3)
							<div class="column2-secondnews">
								<div class="container">
									<div class="row">
										<div class="col-5 wrapper-img">
											<img src="{!!$news->getImage()!!}">
										</div>
										<div class="col-7 wrapper-title" >
											<h2>{!!$news->title!!}</h2>
										</div>
									</div>
								</div>
								<hr>
							</div>
							@endif
							@endforeach
						</div>
						<div class="section1-column3 col-3">
							<div class="news-tabs">
								<ul>
									<li id="button_tinmoi" class="button-tinmoi" >Tin mới</li>
									<li  id="button_tindocnhieu" class="button-tindocnhieu">Tin đọc nhiều</li>
								</ul>
							</div>
							@foreach($news_isnew_arr as $key => $news)
							<div class="news tin-moi" >
								<img src="icon/clock.svg"><span>10 phút trước</span>
								<h2>
									{!!$news->title!!}
								</h2>
								<hr>
							</div>
							@endforeach
							@foreach($news_ishot_arr as $key => $news)
							<div class="news tin-doc-nhieu" >
								<img src="icon/clock.svg"><span>10 phút trước</span>
								<h2>
									{!!$news->title!!}
								</h2>
								<hr>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="section2">
				<div class="container">
					<div class="row">
						<span class="section2-title">Danh sách ứng cử viên</span>
						<ul>
							<li>Quốc hội</li>
							<li>HĐND Thành phố</li>
							<li>HĐND Huyện</li>
							<li>HĐND Xã</li>
						</ul>
					</div>
					<div class="row">
						<div class="container wrapper-carousel">
							<div class="owl-carousel owl-theme">
								@foreach($candidates as $key => $candidates)
							    <div class="item candidates">
							    	<img src="{!!$candidates->getImage()!!}">
							    	<h3>{!!$candidates->title!!}</h3>
							    	<p class="section2-birthday">Sinh ngày {!!$candidates->getBirthday()!!}</p>
							    </div>
							    @endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="section3">
				<div class="container">
					<div class="row">
						<div class="section3-colum1 col-9">
							<div class="container">
								<div class="row">
									<span>VIDEO</span>
								</div>
							</div>
							<div class="container wrapper-video">
								<div class="row">
									@foreach($video_arr as $key => $video)
									@if($key==0)
									<div class="col-7 video-column1">
										<iframe width="100%" height="345px" src="{!!$video->getLinkYoutube()!!}">
										</iframe>
										<h3>{!!$video->title!!}</h3>
									</div>
									@endif
									@endforeach
									<div class="col-5 video-column2">
										<div class="container">
											@foreach($video_arr as $key => $video)
											@if($key>0 && $key<4)
											<div class="row video-box">
												<iframe width="40%" height="106px" src="{!!$video->getLinkYoutube()!!}">
												</iframe>
												<h3>{!!$video->title!!}</h3>
											</div>
											@endif
											@endforeach
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="section3-colum2 col-3">
							<div class="container">
								<div class="row">
									<span>Tài liệu</span>
								</div>
							</div>
							<div class="wrapper-documents">
								@foreach($doc_arr as $key=>$doc)
								<div class="documents">
									<h3>
										{!!$doc->title!!}
									</h3>
									<hr>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="section4">
				<div class="container">
					<div class="row">
						<div class="section4-colum1 col-9">
							<div class="container">
								<div class="row">
									<span>Kết quả bầu cử</span>
								</div>
							</div>
							<div class="container wrapper-result">
								<div class="row">
									<div class="col-4">
										<img src="img/nxp.jpg">
										<div class="title">
										<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id augue sit amet odio placerat maximus sed sed arcu. Aliquam erat volutpat. Nunc ultricies sem turpis, molestie feugiat risus maximus sed. Etiam id arcu dictum, finibus urna id, placerat sapien. Aliquam dictum finibus nisl, a porttitor felis luctus vitae.</h3>
										</div>
									</div>
									<div class="col-4">
										<img src="img/nxp.jpg">
										<div class="title">
										<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id augue sit amet odio placerat maximus sed sed arcu. Aliquam erat volutpat. Nunc ultricies sem turpis, molestie feugiat risus maximus sed. Etiam id arcu dictum, finibus urna id, placerat sapien. Aliquam dictum finibus nisl, a porttitor felis luctus vitae.</h3>
										</div>
									</div>
									<div class="col-4">
										<img src="img/nxp.jpg">
										<div class="title">
										<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id augue sit amet odio placerat maximus sed sed arcu. Aliquam erat volutpat. Nunc ultricies sem turpis, molestie feugiat risus maximus sed. Etiam id arcu dictum, finibus urna id, placerat sapien. Aliquam dictum finibus nisl, a porttitor felis luctus vitae.</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="section4-colum2 col-3">
							<div class="container">
								<div class="row wrapper-button">
									<span>Góc ảnh</span>
								</div>
							</div>
							<div class="wrapper-gallery">
								<img src="img/gocanh.jpg">
							</div>
						</div>
					</div>
				</div>
			</div>
		</body>
		<footer>
			<div class="container">
				<div class="row">
					<span>Ủy ban bầu cử thành phố hải phòng</span>
				</div>
			</div>
		</footer>
	</div>
</html>
<script type="text/javascript">
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>

<script>
$(document).ready(function(){
  	$(".tin-doc-nhieu").hide();
  	$("#button_tinmoi").click(function(){
  		$('.button-tinmoi').css('border-bottom','solid 2px red');
  		$('.button-tindocnhieu').css('border-bottom','none');
	  	$(".tin-moi").show();
	  	$(".tin-doc-nhieu").hide();

  	});

	$("#button_tindocnhieu").click(function(){
  		$('.button-tindocnhieu').css('border-bottom','solid 2px red');
  		$('.button-tinmoi').css('border-bottom','none');
	  	$(".tin-doc-nhieu").show();
	  	$(".tin-moi").hide();

  	});
});
</script>

@stop