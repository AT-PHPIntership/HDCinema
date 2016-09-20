@extends('backend.layouts.master')

@section('title', trans('lang_admin.schedule.title_manage_schedule'))

@section('content')
<!-- Page Heading -->
<section class="content-header">
        <h1>
          {{ trans('lang_admin.schedule.schedule') }}
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> {{ trans('lang_admin.homepage.home') }}</a></li>
          <li class="active">{{ trans('lang_admin.homepage.manage_schedule') }}</li>
        </ol>
</section>
<div class="row" id="create_film">
    <div class="col col-md-12">
        <a href="{{route('admin.film.create')}}" class="btn btn-primary">{{ trans('lang_admin.schedule.create_schedule') }}</a>
    </div>
</div>
<div class="row">
<div class="row">
    <div class="col col-md-12">
        <div class="table-responsive">
            {!! Form::open(['route' => ['admin.schedule.show'],'method' => 'GET', 'id' => 'schedule-form']) !!}  
                <div class="col-md-3">
                    {!! Form::label('day', 'Day: ', ['class' =>'control-label']) !!} <br>
                    {!! Form::select('day', $listDay, null, array('class' => 'form-control', 'id' => 'day')) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::label('cinema', 'Cinema: ', ['class' =>'control-label']) !!} <br>
                    {!! Form::select('cinema', $listCinema, null, array('class' => 'form-control', 'id' => 'cinema')) !!}
                </div>
                {!! Form::submit(trans('labels.submit'), ['class' =>'btn btn-primary','id' => 'send'])!!}
                <p id="error" class="alert"></p>
                {!! Form::close() !!}
            <div class="col-lg-12 col-xs-12">
            <table id="list_schedules" class="table table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">{!! trans('lang_admin.film.no') !!}</th>
                        <th class="text-center col-film">Film</th>
                        <th class="text-center col-schedule">Schedule</th>
                        <th class="text-center col-room">Room</th>
                        <th class="text-center">{!! trans('labels.edit') !!}</th>
                        <th class="text-center">{!! trans('labels.delete') !!}</th>
                    </tr>
                </thead>
                <tbody id="data">
                    <?php $index=1; ?>
                    @foreach($listFilms as  $film)
                    <tr>
                        <td>{!! $index++ !!}</td>
                        <td><a href="{!! route('admin.schedule.show', $film->films_id) !!}">
                            {{$film['films']->name}}</a></td>
                        <td>{{$film->schedule}}</td>
                        <td>{{$film['rooms']->name}}</td>
                        <td>
                            <a href="{{ route('admin.schedule.edit',$film->films_id)}}"><button class="btn btn-info">{!!trans('labels.edit' )!!}</button></a>
                        </td>
                        <td>
                            {!! Form::open(['route' => ['admin.schedule.destroy', $film->films_id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                            {!! Form::button(trans('labels.delete'), ['class' => 'btn btn-danger',
                            'data-toggle' => 'modal','data-target' => '#confirmDelete',
                            'data-title' => trans('lang_admin.schedule.title_delete'),
                            'data-message' => trans('lang_admin.schedule.confirm'),
                            'data-linked' => trans('lang_admin.schedule.linked_schedule').$film->films_id,
                            'data-name' => $film['films']->name]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>                       
</div>
<meta name="_token" content="{!! csrf_token() !!}" />
@endsection