@extends('Admin::views.create')

@section('heading')
<h1>
    {{ Lang::get('Slider::package.name') }}
    <small> {{ Lang::get('app.manage') }} {{ Lang::get('Slider::package.names') }}</small>
</h1>
@stop

@section('title')
{{Lang::get('app.new')}} {{Lang::get('Slider::Slider.name')}}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i> {{  Lang::get('app.home') }}</a></li>
    <li><a href="{{ URL::to('admin/slider') }}">{{ Lang::get('Slider::slider.names') }}</a></li>
    <li class="active">{{ Lang::get('app.new') }} {{ Lang::get('Slider::slider.name') }}</li>
</ol>
@stop


@section('buttons')
<a class="btn btn-info pull-right   btn-xs" href="{{ URL::to('admin/Slider') }}"><i class="fa fa-angle-left"></i> {{  Lang::get('app.back') }}</a>
@stop

@section('content')

{{Former::vertical_open()
    ->id('Slider')
    ->method('POST')
    ->files('true')
    ->action(URL::to('admin/Slider'))}}
    <div class="box-body">

        <div class="row">
            <div class="col-md-12 ">
                {{ Former::text('name')
                -> label(Lang::get('Slider::slider.label.name'))
                -> placeholder(Lang::get('Slider::slider.placeholder.name'))}}
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 ">
                {{ Former::textarea('description')
                -> label(Lang::get('Slider::slider.label.description'))
                -> addclass('content')
                -> placeholder(Lang::get('Slider::slider.placeholder.description'))}}
            </div>

            <div class="col-md-12 ">
                {{ Former::checkbox('status')
                -> label(Lang::get('Slider::slider.label.status'))
                -> addClass('checkbox-status')}}
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-md-12">
                {{Former::actions()
                ->large_primary_submit(Lang::get('app.save'))
                ->large_default_reset(Lang::get('app.reset'))}}
            </div>

        </div>
    </div>

    {{ Former::close() }}
    @stop

    @section('script')
    <script type="text/javascript">
        jQuery(function ($) {
            $('.content').redactor({
                minHeight: 200,
                direction: '{{ Localization::getCurrentLocaleDirection() }}'
                lang: '{{ App::getLocale()}}'
            });
        });
    </script>

    @stop
