@extends('backend.layouts.master')

@section('title', trans('lang_admin.user.title_edit_user'))

@section('content')
<!-- Page Heading -->
<section class="content-header">
        <h1>
          {{ trans('lang_admin.user.edit_user') }}
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> {{ trans('lang_admin.homepage.home') }}</a></li>
          <li class=""><a href="{{route('admin.user.index')}}">{{ trans('lang_admin.homepage.user_manager') }}</a></li>
          <li class="active">{{ trans('lang_admin.user.edit_user') }}</li>
        </ol>
</section>
    <!-- /.row -->

    <div class="row" >
        <div id="form_edit" class="col col-lg-6 col-lg-offset-3"> 
            {!! Form::model($users,['route' => ['admin.user.update',$users -> id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
            <div class ="form-group {!!$errors->has('fullname') ? ' has-error' : '' !!}"> 
            {!! Form::label('fullname', trans('lang_admin.user.full_name'), ['class' =>'control-label'])!!} <br>
            {!! Form::text('fullname', null, ['class' =>'form-control',
                'pattern'=>trans('lang_admin.user.fullname_pattern'),
                'title'=>trans('lang_admin.user.fullname_notice'),'required']) !!}<br>
            @if($errors->has('fullname'))
            <span class="help-block">{{ $errors->first('fullname') }}</span>
            @endif
            </div>
            <div class = "form-group {!!$errors->has('tel') ? ' has-error' : '' !!}">
            {!! Form::label('tel', trans('lang_admin.user.tel'), ['class' =>'control-label']) !!} <br>
            {!! Form::text('tel', null, ['class' =>'form-control',
                'pattern'=> trans('lang_admin.user.tel_pattern'),'title'=>trans('lang_admin.user.tel_notice'),'required']) !!}<br>
            @if($errors->has('tel'))
            <span class="help-block">{{ $errors->first('tel') }}</span>
            @endif
            </div>
            <div class = "form-group {!!$errors->has('address') ? ' has-error' : '' !!}">
            {!! Form::label('address', trans('lang_admin.user.address'), ['class' =>'control-label']) !!} <br>
            {!! Form::text('address', null, ['class' =>'form-control',
                'pattern'=>trans('lang_admin.user.address_pattern'),'title'=>trans('lang_admin.user.address_notice'),'required']) !!}<br>
            @if($errors->has('address'))
            <span class="help-block">{{ $errors->first('address') }}</span>
            @endif
            </div>
            <div class = "form-group {!!$errors->has('image') ? ' has-error' : '' !!}">
            {!! Form::label('image', trans('lang_admin.user.image'), ['class' =>'control-label'])!!} <br>
            {!! Form::file('image', ['class' => 'control', 'id' => 'image']) !!}<br>
            @if($users->image == null)
                <img class="user-image" id ="image_no" src="{{ url(config('path.img_default').'profile_default.jpg') }}">
            @else
                <img class="user-image" id ="image_no" src="{{ url(config('path.upload_user').$users->image) }}">
            @endif
            @if($errors->has('image'))
            <span class="help-block">{{ $errors->first('image') }}</span>
            @endif
            </div>
            <div class = "form-group">
            {!! Form::label('admin', trans('lang_admin.user.admin').$users->admin->username, ['class' =>'control-label']) !!} <br>
            {!! Form::hidden('admins_id', Auth::guard('admin')->user()->id, null,['class' =>'form-control']) !!} <br />
            </div>
            {!! Form::submit(trans('labels.update'), ['class' =>'btn btn-primary'])!!}
            {!! link_to(route('admin.user.index'), trans('labels.cancel'), ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            <br>    
        </div>    
    </div>
@endsection
