<?php
return array(
    "name"              => "Slider",
    "names"             => "Sliders",
    "options"           => array(
        "view"              => array('page' => 'Default', 'gallery' => 'Gallery'),
        "compiler"          => array( '' => 'none', 'php' => 'Php','blade' => 'Blade','twif' => 'Twig')),
    'label'             => array(

        "order"             => "Order",
        "status"            => "Status",
        "name"              => "Name",
        "view"              => "View",
        "compiler"          => "Compiler",
        "description"       => "Description",
        "heading"           => "Heading",
        "description"       => "description",
        "title"             => "Title",
        "slug"              => "Slug",
        "image"             => "Image",
    ),

    'placeholder'       => array(

        "order"             => "Enter Order",
        "status"            => "Enter Status",
        "name"              => "Enter Name",
        "view"              => "Enter View",
        "compiler"          => "Enter Compiler",
        "description"       => "Enter Description",
        "heading"           => "Enter Heading",
        "content"           => "Enter Content",
        "title"             => "Enter Title",
        "slug"              => "Enter slug",

    ),
    'message'           => array(

        "noslider"            => "Slider not found.",
        "nosliders"           => "You didn't add any sliders ..."
    ),
);
