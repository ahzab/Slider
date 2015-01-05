@extends('Admin::views.show')

@section('heading')
<h1>
    {{ Lang::get('Slider::package.name') }}
    <small> {{ Lang::get('app.manage') }} {{ Lang::get('Slider::package.names') }}</small>
</h1>
@stop

@section('title')
{{$Slider['name']}} {{Lang::get('Slider::Slider.name')}}
@stop

@section('breadcrumb')
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i> {{ Lang::get('app.home') }}</a></li>
                <li><a href="{{ URL::to('admin/Slider') }}">{{ Lang::get('Slider::Slider.names') }}</a></li>
                <li class="active">{{ $Slider['name'] }}</li>
            </ol>

@stop

@section('buttons')
            <a class="btn btn-info  btn-xs" href="{{ URL::to('admin/Slider') }}" ><i class="fa fa-angle-left"></i> {{ Lang::get('app.back') }}</a>
            <a class="btn btn-info  btn-xs {{ ($permissions['edit']) ? '' : 'disabled' }}" href="{{ URL::to('admin/Slider') . '/' . $Slider['id'] . '/edit'}}">
                <i class="fa fa-pencil-square-o"></i> {{ Lang::get('app.edit') }}
            </a>
@stop



@section('content')

                <div class="row">
                                <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="order">{{ Lang::get('Slider::Slider.label.order') }}</label><br />

                                                {{ $Slider['order'] }}
                                            </div>
                                        </div>
            <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="image">{{ Lang::get('Slider::Slider.label.image') }}</label><br />

                                                {{ $Slider['image'] }}
                                            </div>
                                        </div>
            <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="status">{{ Lang::get('Slider::Slider.label.status') }}</label><br />

                                                {{ $Slider['status'] }}
                                            </div>
                                        </div>
                </div>
@stop
