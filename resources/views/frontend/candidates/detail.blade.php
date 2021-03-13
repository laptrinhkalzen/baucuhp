@extends('frontend.layouts.master')
@section('content')
<!DOCTYPE html>
<html>
	@foreach($record as $key => $candidates)
	<div id="wrapper">
		<body class="detail_candidates">
			<div class="container">
				<div class="row">
					<div class="wrapper_img">
						<img src="{!!$candidates->getImage()!!}">
					</div>
					<div class="detail">
                        <h3 style="font-size:20px;">{!!$candidates->title!!}</h3>
                        <p><strong>Ngày sinh:</strong><span>{!!$candidates->getBirthday()!!}</span></p>
                        <p><strong>Chức vụ:</strong><span>{!!$candidates->employment_cd!!}</span></p>
                        <p><strong>Đơn vị công tác:</strong><span>{!!$candidates->employment_cd!!}</span></p>
                        <p><strong>Tiểu sử:</strong></p>
                        <p><span>{!!$candidates->story_cd!!}</span></p>
					</div>
				</div>
			</div>
		</body>
	</div>
	@endforeach
</html>
@stop