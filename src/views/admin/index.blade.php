@extends('Admin::views.index')
@section('heading')
        <h1>
            {{ Lang::get('Slider::package.name') }}
            <small> {{ Lang::get('app.manage') }} {{ Lang::get('Slider::package.names') }}</small>
        </h1>
@stop

@section('title')
            {{ Lang::get('Slider::Slider.names') }}
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i> {{ Lang::get('app.home') }} </a></li>
        <li class="active">{{ Lang::get('Slider::Slider.names') }}</li>
    </ol>
@stop

@section('search')

            <form class="form-horizontal pull-right" action="{{ URL::to('admin/Slider') }}" method="get" style="width:50%;margin-right:5px;">
                {{ Form::token() }}
                <div class="input-group">
                    <input type="search" class="form-control input-sm" name="q" value="{{$q}}"  placeholder="{{  Lang::get('app.search') }}">
                    <span class="input-group-btn">
                        <button class="btn  btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
@stop

@section('buttons')
            <a class="btn   btn-sm btn-info pull-right {{ ($permissions['create']) ? '' : 'disabled' }} view-btn-create" href="{{ URL::to('admin/slider/create') }}">
                <i class="fa fa-plus-circle"></i> {{ Lang::get('app.new') }} {{ Lang::get('Slider::Slider.name') }}
            </a>
@stop

@section('content')
        <table class="table table-condensed">
            <tr>
                <th>{{ Lang::get('Slider::Slider.name') }}</th>
                <th>{{ Lang::get('Slider::Slider.label.title') }}</th>
                <th>{{ Lang::get('Slider::Slider.label.slug') }}</th>
                <th width="70">{{ Lang::get('app.options') }}</th>
            </tr>

            @if($Sliders->count() > 0)
                @foreach ($Sliders as $Slider)
                <tr>
                    <td><a href="{{ ($permissions['view']) ? (URL::to('admin/slider/') . '/' . $Slider->id ) : '#' }}">{{ $Slider->name }}</a></td>
                    <td>{{ $Slider->title }}</td>
                    <td>{{ $Slider->slug }}</td>
                    <td>
                        <div class="btn-group  btn-group-xs">
                            <a type="button" class="btn btn-info  {{ ($permissions['edit']) ? '' : 'disabled' }} view-btn-edit" href="{{ URL::to('admin/Slider')}}/{{$Slider->id}}/edit" title="{{ Lang::get('app.update') }} Slider"><i class="fa fa-pencil-square-o"></i></a>
                            <a type="button" class="btn btn-danger action_confirm  {{ ($permissions['delete']) ? '' : 'disabled' }} view-btn-delete" data-method="delete" href="{{ URL::to('admin/Slider') }}/{{ $Slider->id }}" title="{{ Lang::get('app.delete') }} Slider"><i class="fa fa-times-circle-o"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">
                        <div class=" text-center">
                            <small>{{ Lang::get('Slider::Slider.message.nosliders') }}</small>
                        </div>
                    </td>
                </tr>
            @endif
        </table>
        {{ $Sliders->links()}}
@stop
