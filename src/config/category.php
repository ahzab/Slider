<?php

return array(
        'name'          => 'category',
        'table'         => 'Slider_category',
        'model'         => 'Lavalite\Slider\Models\Category',
        'permissions'   => ['admin' => ['view', 'create', 'edit', 'delete']],
        'image'         =>
            [
            'xs'        => ['width' =>'60',     'height' =>'45'],
            'sm'        => ['width' =>'100',    'height' =>'75'],
            'md'        => ['width' =>'200',    'height' =>'150'],
            'lg'        => ['width' =>'800',    'height' =>'600'],
            'xl'        => ['width' =>'1000',   'height' =>'750'],
            ]
);
