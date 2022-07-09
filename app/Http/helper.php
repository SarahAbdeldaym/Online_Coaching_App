<?php

if (!function_exists('setting')) {
    function setting() {
        return \App\Models\Setting::orderBy('id', 'desc')->first();
    }
}

if (!function_exists('adminUrl')) {
    function adminUrl($url = null) {
        return url('admin/' . $url);
    }
}

if (!function_exists('coachUrl')) {
    function coachUrl($url = null) {
        return url('coach/' . $url);
    }
}


if (!function_exists('admin')) {
    function admin() {
        return auth()->guard('admin');
    }
}

if (!function_exists('coach')) {
    function coach() {
        return auth()->guard('coach');
    }
}

if (!function_exists('lang')) {
    function lang() {
        $lang = session()->has('lang') ? session('lang') : session()->put('lang', setting()->main_lang);
        return $lang;
    }
}

if (!function_exists('direction')) {
    function direction() {
        $direction = session()->has('lang') ? (session('lang') == 'en' ? 'ltr' : 'rtl') : (setting()->main_lang == 'en' ? 'ltr' : 'rtl');
        return $direction;
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
