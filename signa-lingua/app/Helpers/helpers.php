<?php

if (!function_exists('fastapi_url')) {
    function fastapi_url($key)
    {
        return env('FASTAPI_BASE_URL') . config("fastapi_urls.$key");
    }
}