@extends('layouts.app')
@section('content') 
<div class="w-full max-h-screen relative flex flex-col p-9">
  <x-top-bar />
  <section id="demos" class="invisible">
      <div style="position: relative;">
        <video id="webcam" autoplay playsinline ></video>
        <canvas class="output_canvas" id="output_canvas" style="position: absolute; left: 0px; top: 0px;" width="303" height="240" class="mx-auto" ></canvas>
      </div>
  </section>
</div>
  <div class="w-full max-h-screen relative flex flex-col">
    <div class="fixed bottom-0 sm:w-[450px] border-t bg-[#D7EDE9] w-full h-[15rem]">
      <div class="pt-8">
        <div class="flex items-center justify-center pb-8">
          <button id="webcamButton">
              <svg xmlns="http://www.w3.org/2000/svg" width="81" height="81" fill="none">
                <circle id="outerCircle" cx="40.5" cy="40.5" r="40" stroke="#004066"/>
                <circle id="innerCircle" cx="41" cy="41" r="34" fill="#004066"/>
              </svg>
          </button>
        </div>
        <div class="text-start pl-5 pr-5">
          <h2>Translation:</h2>
          <div>
          <input type="text" placeholder="Start translating..." id="action" readonly class="border mt-2 border-gray-300 p-2 rounded-md w-full focus:outline-none cursor-not-allowed">
          </div>
        </div>
      </div>
    </div>
  </div>

<script type="module" src="js/camera.js"></script>

@endsection
