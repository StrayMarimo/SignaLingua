@extends('layouts.app')
@section('content')

<div class="w-full h-screen relative flex flex-col">
    <div class="p-8">
        <x-side-bar-toggle-button />

        <!-- Hide this if the user is not logged in by adding "hidden" and removing "flex" in the class -->
        <div class="flex items-center justify-between mb-[30px]">
            <div class="text-[#004066]">
                <p>Hello,</p>
                <p class="text-2xl font-bold">Kathryn Bernardo</p>
            </div>
            <div class="bg-[#EBF6F4] rounded-full border w-[60px] h-[60px] flex items-center justify-center">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.75 6C15.75 6.99456 15.3549 7.94839 14.6517 8.65165C13.9484 9.35491 12.9946 9.75 12 9.75C11.0054 9.75 10.0516 9.35491 9.34836 8.65165C8.6451 7.94839 8.25001 6.99456 8.25001 6C8.25001 5.00544 8.6451 4.05161 9.34836 3.34835C10.0516 2.64509 11.0054 2.25 12 2.25C12.9946 2.25 13.9484 2.64509 14.6517 3.34835C15.3549 4.05161 15.75 5.00544 15.75 6ZM4.50101 20.118C4.53314 18.1504 5.33735 16.2742 6.74018 14.894C8.14302 13.5139 10.0321 12.7405 12 12.7405C13.9679 12.7405 15.857 13.5139 17.2598 14.894C18.6627 16.2742 19.4669 18.1504 19.499 20.118C17.1464 21.1968 14.5882 21.7535 12 21.75C9.32401 21.75 6.78401 21.166 4.50101 20.118Z" stroke="#004066" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg> 
            </div>
        </div>
    
        <div class="w-full h-[170px] rounded-xl relative">
            <div class="bg-[#EBF6F4] p-8 h-[150px] flex items-center rounded-xl border">
                <div class="text-[#004066]">
                    <p>Welcome to</p>
                    <p class="text-xl font-bold">Signa Lingua</p>
                    <p class="mt-4 text-sm">Your sign language app translator!</p>
                </div>
            </div>
            <div>
                <img src="{{ asset('assets/images/welcome.png') }}" class="absolute bottom-0 right-0" alt="illustration">
            </div>
        </div>
    </div>

    <div class="flex-grow border rounded-t-2xl bg-[#EBF6F4] p-8">
        <p class="text-[#004066] mb-4">Start translating</p>
        <div class="flex gap-x-4 mb-8">
            <button type="button" class="text-white text-sm bg-[#004066] flex-1 py-4 font-bold rounded-xl">FSL TO TEXT</button>
            <button type="button" class="text-white text-sm bg-[#004066] flex-1 py-4 font-bold rounded-xl">TEXT TO FSL</button>
        </div>
        <p class="text-[#004066] mb-4">Additional resources</p>
        @for ($i = 0; $i < 3; $i++)
            <x-resources-card />
        @endfor
    </div>
</div>

@endsection