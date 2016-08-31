@extends('backend.layouts.master')

@section('title', trans('lang_admin.user.title_manage_user'))

@section('content')
<!-- Page Heading -->
<section class="content-header">
        <h1>
          {{ trans('lang_admin.user.list_user') }}
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> {{ trans('lang_admin.homepage.home') }}</a></li>
          <li class="active">{{ trans('lang_admin.homepage.user_manager') }}</li>
        </ol>
      </section>
<div class="row">
    <div class="col col-md-12">
        <div class="table-responsive">
            <table id="list_users" class="table table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">{!! trans('lang_admin.user.no') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.user.full_name') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.user.tel') !!}</th>
                        <th class="text-center">{!! trans('lang_admin.user.address') !!}</th>
                        <th class="text-center">{!! trans('labels.edit') !!}</th>
                        <th class="text-center">{!! trans('labels.delete') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index=1; ?>
                    @foreach($listUsers as $user)
                    <tr>
                        <td>{!! $index++ !!}</td>
                        <td><a href="{!! route('admin.user.show', $user ->id) !!}">{!! $user->fullname !!}</a></td>
                        <td>{!! $user->tel !!}</td>
                        <td>{!! $user->address !!}</td>
                        <td>
                            <a href="{{ route('admin.user.edit',$user ->id)}}"><button class="btn btn-info">{!!trans('labels.edit' )!!}</button></a>
                        </td>
                        <td>
                            {!! Form::open(['route' => ['admin.user.destroy', $user->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                            {!! Form::button(trans('labels.delete'), ['class' => 'btn btn-danger',
                            'data-toggle' => 'modal','data-target' => '#confirmDelete',
                            'data-title' => trans('lang_admin.user.title_delete'),
                            'data-message' => trans('lang_admin.user.confirm')]) !!}
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