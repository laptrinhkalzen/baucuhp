@extends('frontend.layouts.master')
@section('content')
<!DOCTYPE html>
<html>
	<div id="wrapper">
		<body class="body_candidates">
			<div class="wrapper_candidates">
				<div class="container">
					<div class="row">
						<div class="col-lg-1">
							<div class="wrapper_categories">
								<div class="categories">
									<div >Quốc hội</div>
								</div>
								<div class="categories">
									<div >HĐND Thành phố</div>
								</div>
								<div class="categories">
									<div >HĐND Huyện</div>
								</div>
								<div class="categories">
									<div >HĐND Xã</div>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="wrapper_card">
								<div class="row">
									@foreach($record as $key => $candidates)
									<div class="card" data-id="{{$candidates->id}}">
										<img src="{!!$candidates->getImage()!!}">
										<h3>Nguyễn Xuân Phúc</h3>
										<p>Thủ tướng</p>
									</div>
									@endforeach
								</div>
							</div>
						</div>
						<div class="col-lg-4" style="padding: 0px;">
							<div class="wrapper_detailcard">
								<div class="row">
									<div>
									<div id='detail'></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</body>
	</div>
</html>
<script type="text/javascript">

    $( document ).ready(function() {
        $('.card').on('click',function(){
             var id = $(this).data('id');

            $.ajax({
                url:'{{route("api.detail_candidates")}}',
                method:'GET',
                data:{id:id},
                success:function(resp){
                    $('#detail').html(resp);
                }

            });
        });

    });




</script>
@stop