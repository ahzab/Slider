<?php

return array(
        'name'          => 'Slider',
        'table'         => 'Sliders',
        'model'         => 'Ahzab\Slider\Models\Slider',
        'permissions'   => ['admin'     => ['view', 'create', 'edit', 'delete', 'image']],
        'image'         =>
            [
            'xs'        => ['width' =>'60',     'height' =>'45', 'default' => 'path-to-banner-set-it-in-Slider-config'],
            'sm'        => ['width' =>'160',    'height' =>'75'],
            'md'        => ['width' =>'460',    'height' =>'345'],
            'lg'        => ['width' =>'800',    'height' =>'600'],
            'xl'        => ['width' =>'1000',   'height' =>'750'],
            ],


);
