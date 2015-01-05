<?php
Route::group(array('prefix' => Localization::setLocale()), function () {
    Route::resource('admin/slider', '\Ahzab\Slider\Controllers\SliderAdminController');
});
