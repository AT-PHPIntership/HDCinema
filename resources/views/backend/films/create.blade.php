@extends('backend.layouts.master')

@section('title', trans('lang_admin.film.title_create_film'))

@section('content')
<!-- Page Heading -->
<section class="content-header">
        <h1>
          {{ trans('lang_admin.film.create_film') }}
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> {{ trans('lang_admin.homepage.home') }}</a></li>
          <li class=""><a href="{{route('admin.film.index')}}">{{ trans('lang_admin.homepage.manage_film') }}</a></li>
          <li class="active">{{ trans('lang_admin.film.create_film') }}</li>
        </ol>
</section>
    <!-- /.row -->

    <div class="row" >
        <div id="form_create" class="col col-lg-6 col-lg-offset-3"> 
            {!! Form::open(['route' => 'admin.film.store', 'id' => 'film-form', 'enctype' => 'multipart/form-data']) !!}
            <div class ="form-group {!!$errors->has('name') ? ' has-error' : '' !!}"> 
                {!! Form::label('name', trans('lang_admin.film.name'), ['class' =>'control-label'])!!} <br>
                {!! Form::text('name', null, ['class' =>'form-control',
                    'pattern'=>trans('lang_admin.film.name_pattern'),
                    'title'=>trans('lang_admin.film.name_notice'),'required']) !!}<br>
                @if($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class = "form-group {!!$errors->has('genre') ? ' has-error' : '' !!}">
                {!! Form::label('genre', trans('lang_admin.film.genre'), ['class' =>'control-label']) !!} <br>
                {!! Form::text('genre', null, ['class' =>'form-control',
                    'pattern'=> trans('lang_admin.film.genre_pattern'),'title'=>trans('lang_admin.film.genre_notice'),'required']) !!}<br>
                @if($errors->has('genre'))
                <span class="help-block">{{ $errors->first('genre') }}</span>
                @endif
            </div>
            <div class = "form-group {!!$errors->has('actor') ? ' has-error' : '' !!}">
                {!! Form::label('actor', trans('lang_admin.film.actor'), ['class' =>'control-label']) !!} <br>
                {!! Form::text('actor', null, ['class' =>'form-control',
                    'pattern'=> trans('lang_admin.film.actor_pattern'),'title'=>trans('lang_admin.film.actor_notice'),'required']) !!}<br>
                @if($errors->has('actor'))
                <span class="help-block">{{ $errors->first('actor') }}</span>
                @endif
            </div>
            <div class = "form-group {!!$errors->has('director') ? ' has-error' : '' !!}">
                {!! Form::label('director', trans('lang_admin.film.director'), ['class' =>'control-label']) !!} <br>
                {!! Form::text('director', null, ['class' =>'form-control',
                    'pattern'=> trans('lang_admin.film.director_pattern'),'title'=>trans('lang_admin.film.director_notice'),'required']) !!}<br>
                @if($errors->has('director'))
                <span class="help-block">{{ $errors->first('director') }}</span>
                @endif
            </div>
            <div class = "form-group {!!$errors->has('duration') ? ' has-error' : '' !!}">
                {!! Form::label('duration', trans('lang_admin.film.duration'), ['class' =>'control-label']) !!} <br>
                {!! Form::text('duration', null, ['class' =>'form-control',
                    'pattern'=> trans('lang_admin.film.duration_pattern'),'title'=>trans('lang_admin.film.duration_notice'),'required']) !!}<br>
                @if($errors->has('duration'))
                <span class="help-block">{{ $errors->first('duration') }}</span>
                @endif
            </div>
            <div class = "form-group {!!$errors->has('starttime') ? ' has-error' : '' !!}">
                {!! Form::label('starttime', trans('lang_admin.film.starttime'), ['class' =>'control-label']) !!} <br>
                {!! Form::text('starttime', null, ['class' =>'form-control',
                    'pattern'=> trans('lang_admin.film.starttime_pattern'),'title'=>trans('lang_admin.film.starttime_notice'),'required']) !!}<br>
                @if($errors->has('starttime'))
                <span class="help-block">{{ $errors->first('starttime') }}</span>
                @endif
            </div>
            <div class = "form-group {!!$errors->has('trailer') ? ' has-error' : '' !!}">
                {!! Form::label('trailer', trans('lang_admin.film.trailer'), ['class' =>'control-label']) !!} <br>
                {!! Form::text('trailer', null, ['class' =>'form-control',
                    'pattern'=> trans('lang_admin.film.trailer_pattern'),'title'=>trans('lang_admin.film.trailer_notice'),'required']) !!}<br>
                @if($errors->has('trailer'))
                <span class="help-block">{{ $errors->first('trailer') }}</span>
                @endif
            </div>
            <div class = "form-group {!!$errors->has('hide') ? ' has-error' : '' !!}">
                {!! Form::label('hide', trans('lang_admin.film.hide'), ['class' =>'control-label']) !!} <br>
                {{-- {!! Form::text('hide', null, ['class' =>'form-control']) !!}<br> --}}
                {!! Form::select('hide', ['show','hide'],null, array('class' => 'form-control', 'id' => 'hide')) !!}
                @if($errors->has('hide'))
                <span class="help-block">{{ $errors->first('hide') }}</span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('category',trans('lang_admin.film.category')) !!}
                {!! Form::select('category_id', $categories,null, array('class' => 'form-control', 'id' => 'category')) !!}
                @if ($errors->has('category_id'))
                <span class="errors">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('typefilm',trans('lang_admin.film.type_film')) !!}
                {!! Form::select('type_films_id', $typeFilms,null, array('class' => 'form-control', 'id' => 'typefilm')) !!}
                @if ($errors->has('type_films_id'))
                <span class="errors">
                    <strong>{{ $errors->first('type_films_id') }}</strong>
                </span>
                @endif
            </div>
            <div class = "form-group {!!$errors->has('image') ? ' has-error' : '' !!}">
                {!! Form::label('image', trans('lang_admin.film.image'), ['class' =>'control-label'])!!} <br>
                {!! Form::file('image', ['class' => 'control', 'id' => 'image']) !!}<br>
                <img src="#" class = "setpicture img-thumbnail img_upload" id ="image_no" alt="Image Upload"></img><br>
                @if($errors->has('image'))
                <span class="help-block">{{ $errors->first('image') }}</span>
                @endif
            </div>
            {!! Form::submit(trans('labels.submit'), ['class' =>'btn btn-primary'])!!}
            {!! link_to(route('admin.film.index'), trans('labels.cancel'), ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            <br>    
        </div>    
    </div>
@endsection
