@extends('layouts.app')
@section('content') 

<div id="splash-screen" class="w-full flex items-center justify-center h-screen">
    <div>
        <img src="{{ asset('assets/images/logo.png') }}" class="m-auto" alt="logo">
        <h1 class="text-center mt-8 font-black text-[24px] text-[#3CA79B]">Signa Lingua</h1>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#splash-screen').fadeIn().delay(1000).fadeOut(function() {
            window.location = '/home'; // Replace with your destination URL
        });
    });
</script>

@endsection