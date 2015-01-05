@extends('Admin::views.edit')

@section('heading')
<h1>
    {{ Lang::get('Slider::package.name') }}
    <small> {{ Lang::get('app.manage') }} {{ Lang::get('Slider::package.names') }}</small>
</h1>
@stop

@section('title')
{{Lang::get('app.edit')}} {{Lang::get('Slider::Slider.name')}} {{$Slider['name']}}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i> {{  Lang::get('app.home') }}</a></li>
    <li><a href="{{ URL::to('admin/Slider')}}">{{ Lang::get('Slider::Slider.names') }}</a></li>
    <li class="active">{{ $Slider['name'] }}</li>
</ol>

@stop

@section('buttons')
<a class="btn btn-info pull-right view-btn-back" href="{{ URL::to('admin/Slider') }}"><i class="fa fa-angle-left"></i> {{  Lang::get('app.back') }}</a>
@stop


@section('tabs')


<li class="active"><a href="#details" data-toggle="tab">Slider</a></li>
<li><a href="#metatags" data-toggle="tab">Meta</a></li>
<li><a href="#settings" data-toggle="tab">Settings</a></li>
@stop

@section('icon')
<i class="fa fa-th"></i>
@stop


@section('content')

{{Former::vertical_open()
    ->id('Slider')
    ->secure()
    ->method('PUT')
    ->files('true')
    ->enctype('multipart/form-data')
    ->action(URL::to('admin/Slider/'. $Slider['id']))}}
    {{Former::hidden('id')}}
    <div class="tab-content">

        <div class="tab-pane active" id="details">

            <div class="row">
                <div class="col-md-12 ">
                    {{ Former::text('name')
                    -> label('Slider::Slider.label.name')
                    -> placeholder('Slider::Slider.placeholder.name')}}
                </div>

                <div class="col-md-12 ">
                    {{ Former::textarea('content')
                    -> label('Slider::Slider.label.content')
                    -> dataUpload(URL::to('/upload/Slider/Slider/'.$Slider['id'].'/content'))
                    -> addClass('html-editor')
                    -> placeholder('Slider::Slider.placeholder.content')}}
                </div>

                <div class="col-md-12 ">
                    {{ Former::file('banner')
                    -> label('Slider::Slider.label.banner')
                    -> placeholder('Slider::Slider.placeholder.banner')
                    -> addClass('banner')	}}
                </div>

                <div class="col-md-12 ">
                    {{ Former::file('image')
                    -> label('Slider::Slider.label.image')
                    -> placeholder('Slider::Slider.placeholder.image')
                    -> addClass('image')	}}
                </div>

               <div class='col-md-6'>{{ Former::hidden('status')
                   -> forceValue('0')}}
                   {{ Former::checkbox('status')
                   -> label('Slider::Slider.label.status')
                   -> addClass('js-switch')}}
               </div>
            </div>
        </div>
        <div class="tab-pane" id="metatags">
            <div class="row">
                <div class="col-md-12 ">
                    {{ Former::text('title')
                    -> label('Slider::Slider.label.title')
                    -> placeholder('Slider::Slider.placeholder.title')}}
                </div>
                <div class="col-md-12 ">
                    {{ Former::text('heading')
                    -> label('Slider::Slider.label.heading')
                    -> placeholder('Slider::Slider.placeholder.heading')}}
                </div>
                <div class="col-md-12 ">
                    {{ Former::textarea('keyword')
                    -> label('Slider::Slider.label.keyword')
                    -> rows(9)
                    -> placeholder('Slider::Slider.placeholder.keyword')}}
                </div>
                <div class="col-md-12 ">
                    {{ Former::textarea('description')
                    -> label('Slider::Slider.label.description')
                    -> rows(9)
                    -> placeholder('Slider::Slider.placeholder.description')}}
                </div>
            </div>
        </div>
        <div class="tab-pane" id="settings">
            <div class="row">
                <div class="col-md-6 ">
                    {{ Former::range('order')
                    -> label('Slider::Slider.label.order')
                    -> placeholder('Slider::Slider.placeholder.order')}}
                </div>
                <div class="col-md-6 ">
                    {{ Former::text('slug')
                    -> label('Slider::Slider.label.slug')
                    -> append('.html')
                    -> placeholder('Slider::Slider.placeholder.slug')}}
                </div>
            </div>
            <div class="row">
               <div class='col-md-6'>{{ Former::select('view')
                   -> options(Lang::get('Slider::Slider.options.view'))
                   -> label('Slider::Slider.label.view')
                   -> placeholder('Slider::Slider.placeholder.view')}}
               </div>

               <div class='col-md-6'>{{ Former::select('compiler')
                   -> options(Lang::get('Slider::Slider.options.compiler'))
                   -> label('Slider::Slider.label.compiler')
                   -> placeholder('Slider::Slider.placeholder.compiler')}}
               </div>
            </div>
        </div>
    </div>
    <div class="tab-footer">
        <div class="row">
            <div class="col-md-12">
                {{Former::actions()
                ->large_primary_submit(Lang::get('app.save'))
                ->large_default_reset(Lang::get('app.reset'))}}
            </div>
        </div>
    </div>
    {{Former::close()}}
    @stop

    @section('script')
    <script>
        jQuery(function ($) {
            $('.banner').ezdz({
                text: '{{Lang::get('Slider::Slider.placeholder.banner')}}',
                validators: {
                    maxWidth:  900,
                    maxHeight: 900,
                    maxSize: 1000000
                },
                reject: function (file, errors) {
                    if (errors.mimeType) {
                        alert(file.name + ' must be an image.');
                    }

                    if (errors.maxWidth) {
                        alert(file.name + ' must be width:900px max.');
                    }

                    if (errors.maxHeight) {
                        alert(file.name + ' must be height:900px max.');
                    }
                }
            });
            @if ($Slider->banner != '')
            $('.banner').ezdz('preview', '{{URL::to($Slider->banner)}}');
            @endif
        });

    </script>
    @stop

