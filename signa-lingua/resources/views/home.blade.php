@extends('layouts.app')
@section('content')

<div class="w-full min-h-screen relative flex flex-col p-9">
    <x-top-bar />

    <div class="w-full h-[160px] rounded-xl relative mb-[30px]">
        <div class="bg-[#EBF6F4] p-5 h-[150px] flex items-center rounded-xl border">
            <div class="text-[#004066]">
                <p class="text-2xl font-bold">Signa Lingua</p>
                <p class="mt-2 w-[200px]">Your sign language app translator!</p>
            </div>
        </div>
        <div>
            <img src="{{ asset('assets/images/welcome.png') }}" class="absolute bottom-0 right-0" alt="illustration">
        </div>
    </div>

    <p class="text-[#004066] mb-4 font-semibold">Start translating</p>
    <div class="flex flex-col gap-y-4 mb-[30px]">
        <button class="text-[#004066] p-5 rounded-xl border text-left flex gap-x-4 items-center">
            <div class="border p-4 rounded-lg bg-[#EBF6F4]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                    <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                </svg>              
            </div>
            <div>
                <p class="font-bold mb-2">FSL TO TEXT</p>
                <p class="text-sm">Translate recorded sign language video to its equivalent word</p>
            </div>
        </button>
        <button class="text-[#004066] p-5 rounded-xl border text-left flex gap-x-4 items-center">
            <div class="border p-4 rounded-lg bg-[#EBF6F4]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>                             
            </div>
            <div>
                <p class="font-bold mb-2">TEXT TO FSL</p>
                <p class="text-sm">Learn to translate Filipino words to its equivalent sign language</p>
            </div>
        </button>
    </div>
    <p class="text-[#004066] mb-4 font-semibold">Additional resources</p>
    <div class="w-full bg-white h-full mb-5 rounded-xl border">
    
    <iframe class="w-full" height="315" src="https://www.youtube.com/embed/iom4x_bn2MI?si=sKPbtxcuHSBiaiKH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <div class="border-t max-w-full rounded-b-xl p-4">      
        <p class="font-bold text-lg text-[#004066]">Basic Filipino Greetings</p>
        <p class="text-[#4f5c64]">The series is produced by the OSDS to introduce FSL as one of the communication options for the deaf and hard-of-hearing students who are also part of the UP community. The OSDS also hopes that the series will spark interest among UP students to learn more about FSL. </p>
    </div>
    </div>
    <div class="w-full bg-white h-full mb-5 rounded-xl border">
    
    <iframe class="w-full" height="315" src="https://www.youtube.com/embed/UytbjabYX_8?si=h1R_7z_CDUc_YUXj" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <div class="border-t max-w-full rounded-b-xl p-4">      
        <p class="font-bold text-lg text-[#004066]">Learn Basic Phrases in Filipino Sign Language</p>
        <p class="text-[#4f5c64]">Break the ice with a Deaf friend with these basic phrases in Filipino Sign Language (FSL)! Besides signing, making facial expressions is an important part of FSL as the Deaf encourage expressing one’s self. FSL is a visual language rooted in Filipino culture and can be used by the Deaf and hearing alike to communicate with one another. </p>
    </div>
    </div>
</div>

@endsection