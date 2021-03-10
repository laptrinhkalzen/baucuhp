@extends('backend.layouts.master')
@section('content')
<div class="content">
    <form action="{!!route('admin.candidates.store')!!}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Tạo mới</h6>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-highlight">
                            <li class="nav-item"><a href="#left-icon-tab1" class="nav-link active" data-toggle="tab"><i class="icon-menu7 mr-2"></i> Thông tin cơ bản</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="left-icon-tab1">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                                        <fieldset>
                                        	<div class="form-group row">
                                                <label class="col-md-3 required control-label text-right text-semibold" for="images">Ảnh chân dung:</label>
                                                <div class="col-lg-9 div-image">
                                                    <div class="file-input file-input-ajax-new">
                                                        <div class="file-preview ">
                                                            <div class=" file-drop-zone">
                                                            </div>
                                                        </div>
                                                        <div class="input-group file-caption-main">
                                                            <div class="file-caption form-control kv-fileinput-caption" tabindex="500">
                                                            </div>
                                                            <div class="input-group-btn input-group-append">
                                                                <div tabindex="500" class="btn btn-primary btn-file"><i class="icon-folder-open"></i>&nbsp; <span class="hidden-xs">Chọn</span>
                                                                    <input type="file" id="images" class="upload-images" multiple="multiple" name="file_upload[]" data-fouc="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="images" class="image_data">
                                                    <span class="help-block">Chỉ cho phép các file ảnh có đuôi <code>jpg</code>, <code>gif</code> và <code>png</code>. File có dung lượng tối đa 20M.</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label text-right">Giới tính <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
		                                            <div class="form-check">
													  <input class="form-check-input" type="radio" value="Nam" name="sex_cd" id="male" checked>
													  <label class="form-check-label" for="male">
													    Nam
													  </label>
													</div>
													<div class="form-check">
													  <input class="form-check-input" type="radio" value="Nữ" name="sex_cd" id="female" >
													  <label class="form-check-label" for="female">
													    Nữ
													  </label>
													</div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label text-right">Ngày sinh <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                  	<input type="date" class="form-control" name="birthday" value="{!!old('birthday')!!}">
                                                    {!! $errors->first('birthday', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label text-right">Họ và tên khai sinh <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="title" value="{!!old('title')!!}" required="">
                                                    {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label text-right">Tên thường gọi/bí danh</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="title2_cd" value="{!!old('title2_cd')!!}" >
                                                    {!! $errors->first('title2_cd', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label text-right">Họ và tên trong phiếu bầu cử <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="title3_cd" value="{!!old('title3_cd')!!}">
                                                    {!! $errors->first('title3_cd', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label text-right">Nơi ở thường trú</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="address_cd" value="{!!old('address_cd')!!}">
                                                    {!! $errors->first('address_cd', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label text-right">Nơi ở hiện nay</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="address2_cd" value="{!!old('address2_cd')!!}">
                                                    {!! $errors->first('address2_cd', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label text-right">Đơn vị công tác</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="employment_cd" value="{!!old('employment_cd')!!}">
                                                    {!! $errors->first('employment_cd', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label text-right">Chức vụ</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="position_cd" value="{!!old('position_cd')!!}">
                                                    {!! $errors->first('position_cd', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label text-right">Tiểu sử: </label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="story_cd">{!!old('story_cd')!!}</textarea>
                                                </div>
                                            </div>
                                        <div class="form-group row">
							                    <div class="form-check col-md-3 form-check-right">
							                        <label class="form-check-label float-right">
							                            Hiển thị
							                            <input type="checkbox" class="form-check-input-styled" name="status" data-fouc="">
							                        </label>
							                    </div>
							                </div>
                                        </fieldset>
                                        <div class="text-right">
                                            <a type="button" href="{{route('admin.candidates.index')}}" class="btn btn-secondary legitRipple">Hủy</a>
                                            <button type="submit" class="btn btn-primary legitRipple">Lưu lại <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@stop
@section('script')
@parent
<script src="{!! asset('assets/global_assets/js/plugins/forms/selects/select2.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/styling/uniform.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/styling/switchery.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/styling/switch.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/validation/validate.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/inputs/touchspin.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js') !!}"></script>
<!-- Theme JS files -->
<script src="{!! asset('assets/global_assets/js/plugins/forms/tags/tagsinput.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/tags/tokenfield.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/ui/prism.min.js') !!}"></script>
<!-- Theme JS files -->
<script src="{!! asset('assets/global_assets/js/plugins/ui/moment/moment.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/pickers/daterangepicker.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/pickers/anytime.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/pickers/pickadate/picker.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/pickers/pickadate/picker.date.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/pickers/pickadate/picker.time.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/pickers/pickadate/legacy.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/notifications/jgrowl.min.js') !!}"></script>
<script src="{!! asset('assets/backend/ckeditor/ckeditor.js') !!}"></script>
<script src="{!! asset('ckfinder/ckfinder.js') !!}"></script>
<!--<script>
    CKEDITOR.replace( 'content', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
</script>-->
<script src="{!! asset('assets/backend/js/custom.js') !!}"></script>
@include('ckfinder::setup')
@stop
