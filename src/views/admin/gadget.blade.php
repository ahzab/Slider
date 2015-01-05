
<table class="table  table-condensed">
    <tr>
        <th>{{ Lang::get('Slider::Slider.name') }}</th>
        <th>{{ Lang::get('Slider::Slider.label.title') }}</th>
        <th>{{ Lang::get('Slider::Slider.label.slug') }}</th>
        <th width="70">{{ Lang::get('app.options') }}</th>
    </tr>

    @foreach ($Sliders as $Slider)
    <tr>
        <td><a href="{{ ($permissions['view']) ? (URL::to('admin/Slider/') . '/' . $Slider->id ) : '#' }}">{{ $Slider->name }}</a></td>
        <td>{{ $Slider->title }}</td>
        <td>{{ $Slider->slug }}.html</td>
        <td>
            <div class="btn-group  btn-group-xs">
                <a type="button" class="btn btn-info  {{ ($permissions['edit']) ? '' : 'disabled' }} view-btn-edit" href="{{ URL::to('admin/Slider')}}/{{$Slider->id}}/edit" title="{{ Lang::get('app.update') }} Slider"><i class="fa fa-pencil-square-o"></i></a>
                <a type="button" class="btn btn-danger action_confirm  {{ ($permissions['delete']) ? '' : 'disabled' }} view-btn-delete" data-method="delete" href="{{ URL::to('admin/Slider') }}/{{ $Slider->id }}" title="{{ Lang::get('app.delete') }} Slider"><i class="fa fa-times-circle-o"></i></a>
            </div>
        </td>
    </tr>
    @endforeach

</table>
