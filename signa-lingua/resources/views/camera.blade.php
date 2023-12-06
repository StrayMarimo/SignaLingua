@extends('layouts.app')
@section('content') 

<section id="demos" class="invisible">
  <button id="webcamButton" class="mdc-button mdc-button--raised">
      <span class="mdc-button__ripple"></span>
      <span class="mdc-button__label">Open Camera</span>
    </button>
  
    <div style="position: relative;">
      <video id="webcam" autoplay playsinline></video>
      <canvas class="output_canvas" id="output_canvas" style="position: absolute; left: 0px; top: 0px;" width="320" height="240" class="mx-auto" ></canvas>
    </div>
  <div class="w-full min-h-screen relative flex flex-col">
    <div class="fixed bottom-0 sm:w-[450px] border-t bg-[#D7EDE9] w-full h-[15rem]">
      <div>
        <div class="text-center">
          <h2>Translation:</h2>
          <div class="w-[90%] mx-auto p-10">
            <small id="action"></small>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="module" src="js/camera_phone.js"></script>

@endsection
