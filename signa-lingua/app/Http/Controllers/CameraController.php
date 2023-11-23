<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CameraController extends Controller
{
    public function index()
    {
        $videoFeedUrl = fastapi_url('video_feed');
        return view('camera', ['videoFeedUrl' => $videoFeedUrl]);
    }

    // public function stopVideo()
    // {
    //     $fastApiUrl = config('fastapi_urls.stop_video_feed');

    //   
    //     $response = Http::post($fastApiUrl);

    // 
    //     return $response->json();
    // }
}
