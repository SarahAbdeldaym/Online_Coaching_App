<?php

if (!function_exists('coachUrl')) {
    function coachUrl($url = null) {
        return url('coach/' . $url);
    }
}

if (!function_exists('coach')) {
    function coach() {
        return auth()->guard('coach');
    }
}

if (!function_exists('savePhoto')) {

    function savePhoto($path, $image) {
        $fullPath = $path . date('Y') . '/' . date('m') . '/' . date('d');
        $newName = time() . '-' . rand(0, 9999) . '.' . $image->getClientOriginalExtension();
        return $image->storeAs($fullPath, $newName);
    }
}

if (!function_exists('saveClientPhoto')) {

    function saveClientPhoto($path, $image) {
        $newName = time() . '.' . $image->getClientOriginalExtension();
        return $image->storeAs($path, $newName);
    }
}
