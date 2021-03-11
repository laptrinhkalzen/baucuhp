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
					<span>Thứ hai, ngày 11 tháng 3 năm 2021</span><span>Hòm thư góp ý</span>
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
		<body class="body_candidates">
			<div class="wrapper_candidates">
				<div class="row">
					<div class="col-lg-1">
						<div class="wrapper_categories">
							<div class="categories">
								<div >Bộ chính trị</div>
							</div>
							<div class="categories">
								<div >Bộ chính trị</div>
							</div>
							<div class="categories">
								<div >Bộ chính trị</div>
							</div>
							<div class="categories">
								<div >Bộ chính trị</div>
							</div>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="wrapper_card">
							<div class="row">
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
								<div class="card">
									<img src="img/nxp.jpg">
									<h3>Nguyễn Xuân Phúc</h3>
									<p>Thủ tướng</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="wrapper_detailcard">
							<div class="row">
								<img src="img/nxp.jpg" style="width: 30%">
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
@stop