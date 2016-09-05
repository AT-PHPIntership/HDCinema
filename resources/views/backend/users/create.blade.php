@extends('backend.layouts.master')

@section('title', trans('lang_admin.user.title_create_user'))

@section('content')
<!-- Page Heading -->
<section class="content-header">
        <h1>
          {{ trans('lang_admin.user.create_user') }}
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> {{ trans('lang_admin.homepage.home') }}</a></li>
          <li class="active">{{ trans('lang_admin.user.create_user') }}</li>
        </ol>
</section>
    <!-- /.row -->

    <div class="row" >
        <div id="form_create" class="col col-lg-6 col-lg-offset-3"> 
            {{ Form::open(array('route' => 'admin.user.store', 'id' => 'user-form', 'enctype' => 'multipart/form-data')) }}
            <div class="form-group">
                {{ Form::label('username', trans('lang_admin.user.username')) }}
                {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => trans('lang_admin.user.username'), 'pattern'=>trans('lang_admin.user.username_pattern'),'title'=>trans('lang_admin.user.username_notice'),'required')) }}
                @if ($errors->has('username'))
                    <span class="errors">{{ $errors->first('username') }}</span>
                @endif
            </div>
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
                    <img src="#" class = "setpicture img-thumbnail img_upload" id ="image_no" alt="Image Upload"></img><br>
                @if($errors->has('image'))
                <span class="help-block">{{ $errors->first('image') }}</span>
                @endif
            </div>
            <div class="form-group">
                {{ Form::label('password', trans('lang_admin.user.password')) }}
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => trans('lang_admin.user.password'),
                'pattern'=>trans('lang_admin.user.password_pattern'),'title'=>trans('lang_admin.user.password_notice'),'required')) }}
                @if ($errors->has('password'))
                    <span class="errors">
                        {{ $errors->first('password') }}
                    </span>
                @endif
            </div>
            {!! Form::submit(trans('labels.submit'), ['class' =>'btn btn-primary'])!!}
            {!! link_to(route('admin.user.index'), trans('labels.cancle'), ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            <br>    
        </div>    
    </div>
@endsection
