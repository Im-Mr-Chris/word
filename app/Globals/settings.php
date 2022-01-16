<?php

function setting($key, $default = ''){
    $setting = App\Models\Setting::where('key', $key)->first();
    if($setting){
        return $setting->value;
    }
    return $default;
}

?>
