@extends('backend.layouts.master')

@section('title', trans('lang_admin.film.title_manage_film'))

@section('content')
<!-- Page Heading -->
<section class="content-header">
        <h1>
          {{ trans('lang_admin.film.list_films') }}
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> {{ trans('lang_admin.homepage.home') }}</a></li>
          <li class="active">{{ trans('lang_admin.homepage.manage_film') }}</li>
        </ol>
</section>
<div class="row" id="create_film">
    <div class="col col-md-12">
        <a href="{{route('admin.film.create')}}" class="btn btn-primary">{!! trans('lang_admin.film.create_film') !!}</a>
    </div>
</div>
<div class="row">
    <div class="col col-md-12">
        <div class="table-responsive">
            <table id="list_films" class="table table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">{!! trans('lang_admin.film.no') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.film.name') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.film.genre') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.film.actor') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.film.duration') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.film.starttime') !!}</th>
                        <th class="text-center">{!! trans('labels.edit') !!}</th>
                        <th class="text-center">{!! trans('labels.delete') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index=1; ?>
                    @foreach($listFilms as $film)
                    <tr>
                        <td>{!! $index++ !!}</td>
                        <td><a href="{!! route('admin.film.show', $film ->id) !!}">{!! $film->name !!}</a></td>
                        <td>{!! $film->genre !!}</td>
                        <td>{!! $film->actor !!}</td>
                        <td>{!! $film->duration !!}</td>
                        <td>{!! $film->starttime !!}</td>
                        <td>
                            <a href="{{ route('admin.film.edit',$film ->id)}}"><button class="btn btn-info">{!!trans('labels.edit' )!!}</button></a>
                        </td>
                        <td>
                            {!! Form::open(['route' => ['admin.film.destroy', $film->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                            {!! Form::button(trans('labels.delete'), ['class' => 'btn btn-danger',
                            'data-toggle' => 'modal','data-target' => '#confirmDelete',
                            'data-title' => trans('lang_admin.film.title_delete'),
                            'data-message' => trans('lang_admin.film.confirm'),
                            'data-linked' => trans('lang_admin.film.linked_film').$film->id,
                            'data-name' => $film->name]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>                       
</div>
@endsection