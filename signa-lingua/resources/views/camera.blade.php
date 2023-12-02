@extends('layouts.app')
@section('content') 

<section id="demos" class="invisible">
  <div id="liveView" class="videoView">
    <button id="webcamButton" class="mdc-button mdc-button--raised">
      <span class="mdc-button__ripple"></span>
      <span class="mdc-button__label">Open Camera</span>
    </button>

    <div style="position: relative;">
      <video id="webcam" autoplay playsinline></video>
      <canvas class="output_canvas" id="output_canvas" width="320" height="240" style="position: absolute; left: 0px; top: 0px;"></canvas>
    </div>


  </div>
</section>
<script type="module" src="js/camera_phone.js"></script>

@endsection
