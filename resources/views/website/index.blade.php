<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Villa Viola</title>
    <link rel="icon" href="{{ asset('website/assests/img/villa_viola_lg.png') }}" type="image/x-icon">
    @include('website.includes.style')

</head>

<body>

    <!-- Preloader -->
    <div class="loader-overlay" id="preloader">
        <div class="loader" id="loader-2">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="fixedDiv"
        class="fixed bottom-[50px] lg:bottom-[120px] left-[20px] lg:left-[45px] flex flex-col gap-[24px] z-[9]">
        <a onclick="document.getElementById('top').scrollIntoView({ behavior: 'smooth' })" href=""
            class="h-[36px] lg:h-[64px] w-[36px] lg:w-[64px] flex justify-center items-center bg-[#2E0B33] rounded-[100%]">
            <img class="w-[16px] lg:w-[28px]" src="{{ asset('website/assests/icon/home-fixed.svg') }}" alt="">
        </a>
        <a href="" onclick="copyURL(event, this)"
            class="h-[36px] lg:h-[64px] w-[36px] lg:w-[64px] flex justify-center items-center bg-[#2E0B33] rounded-[100%]">
            <img class="w-[16px] lg:w-[28px]" src="{{ asset('website/assests/icon/share-fixed.svg') }}" alt="">
        </a>
        <a href="callto:"
            class="h-[28px] lg:h-[64px] w-[36px] lg:w-[64px] flex justify-center items-center bg-[#2E0B33] rounded-[100%]">
            <img class="w-[16px] lg:w-[28px]" src="{{ asset('website/assests/icon/call-fixed.svg') }}" alt="">
        </a>
        <a href="https://wa.me/" target="_blank"
            class="h-[36px] lg:h-[64px] w-[36px] lg:w-[64px] flex justify-center items-center bg-[#2E0B33] rounded-[100%]">
            <img class="w-[24px] lg:w-[40px]" src="{{ asset('website/assests/icon/whatsApp.png') }}" alt="">
        </a>
    </div>

    <section id="top"
        class="bg-[url({{ asset('website/assests/img/002.jpg') }})] h-screen w-full bg-cover bg-center flex flex-col justify-end">
        <header
            class="flex justify-center fixed w-full top-0 z-[99] h-[96px] lg:h-[156px] transition-all duration-500 ease-in-out"
            id="header">
            <div class="container flex justify-between items-center">
                <img id="logo" class="w-[48px] lg:w-[75px] transition-all duration-500 ease-in-out"
                    src="{{ asset('website/assests/img/villa_viola_lg.png') }}" alt="">
                <div class="flex gap-[20px] lg:gap-[40px] items-center">
                    <div class="relative inline-block text-left">
                        <div class="flex items-center gap-[8px]">
                            <button id="langButton"
                                class="inline-flex justify-center w-full font-16-24 font-medium text-white">
                                {{ app()->getLocale() == 'ar' ? 'Europe' : 'English' }}
                            </button>
                            <img src="{{ asset('website/assests/icon/arrow-down.svg') }}" alt="">
                        </div>

                        <div id="langDropdown"
                            class="origin-top-right absolute right-0 mt-2 w-fit rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden z-10">
                            <div class="py-1">
                                <a href="{{ url('lang/en') }}"
                                    class="lang-option block px-4 py-2 font-16-24 font-medium hover:bg-gray-100"
                                    data-lang="English">English</a>
                                <a href="{{ url('lang/ar') }}"
                                    class="lang-option block px-4 py-2 font-16-24 font-medium hover:bg-gray-100"
                                    data-lang="Italiano">Italiano</a>
                            </div>
                        </div>
                    </div>

                    <button
                        class="py-[2px] pr-[2px] pl-[24px] gap-[8px] lg:gap-[16px] flex items-center bg-white rounded-[99px] header-btn"
                        onclick="document.getElementById('form').scrollIntoView({ behavior: 'smooth' })">
                        <span class="font-16-24 font-medium text-[#09090B]">{{ __('messages.get_offer') }}</span>
                        <div
                            class="rounded-[100%] flex justify-center items-center bg-[#2E0B33] w-[32px] lg:w-[48px] h-[32px] lg:h-[48px]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path d="M7 7H17V17" stroke="#F2F4F4" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M7 17L17 7" stroke="#F2F4F4" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                    </button>
                </div>
            </div>
        </header>
        <div class="flex justify-center">
            <div class="container">
                <div class="pb-[64px]">
                    <div class="mb-[36px]">
                        <div class="flex items-center gap-[36px] mb-[24px] justify-center">
                            <div class="gap-[8px] lg:gap-[16px] flex items-center">
                                <img src="{{ asset('website/assests/icon/prie.png') }}" alt="">
                                <h6 class="font-72-88 text-black font-normal tracking-[0.6px]">{!! __('messages.from_price') !!}
                                </h6>
                            </div>


                        </div>


                    </div>
                    <h1 id="textChanger"
                        class="font-128-120 font-normal font-florentia text-brand-purple text-white text-center hero-title"></h1>

                    <h1 class=" font-normal font-florentia text-brand-purple text-center hero-title" >
                        <div id="textChanger"></div>
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <section id="start-section" class="section py-[32px] lg:py-[120px] flex justify-center">
        <div class="container">
            <h2 class="font-72-88 mb-[16px] lg:mb-[80px] font-normal font-florentia text-[#09090B] text-center">
                {{ __('messages.welcome_key1') }}</h2>
            <p class="font-18-28 text-[#3F3F46] font-normal mb-[36px]">{{ __('messages.compact_layout') }}</p>

            <div class="lg:hidden mb-[36px] flex justify-center">
                <button
                    class="py-[2px] pr-[2px] pl-[24px] gap-[8px] lg:gap-[16px] flex items-center bg-[#2E0B33] rounded-[99px] header-btn"
                    onclick="document.getElementById('form').scrollIntoView({ behavior: 'smooth' })">
                    <span class="font-16-24 font-medium text-white">{{ __('messages.get_offer') }}</span>
                    <div
                        class="rounded-[100%] flex justify-center items-center bg-white w-[32px] lg:w-[48px] h-[32px] lg:h-[48px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path d="M7 7H17V17" stroke="#2E0B33" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M7 17L17 7" stroke="#2E0B33" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </button>
            </div>
            <div class="grid lg:grid-cols-2 gap-[36px] xl:gap-[100px] items-start">
                <div class="col-span-1">
                    <img class="w-full rounded-[12px]" src="{{ asset('website/assests/img/025.jpg') }}"
                        alt="">
                </div>
                <div class="col-span-1">
                    <div class="grid grid-cols-2 gap-[20px] lg:gap-[32px] md:grid-cols-4 lg:mb-[64px]">
                        <div
                            class="col-span-1 border border-[#6B5736] rounded-[12px] flex flex-col gap-[10px] justify-center items-center p-[20px]">
                            <img class="w-[40px]" src="{{ asset('website/assests/icon/bhk-icon.png') }}"
                                alt="">
                            <h6 class="font-18-28 font-medium text-[#09090B] text-center">{{ __('messages.bhk') }}
                            </h6>
                        </div>
                        <div
                            class="col-span-1 border border-[#6B5736] rounded-[12px] flex flex-col gap-[10px] justify-center items-center p-[20px]">
                            <img class="w-[40px]" src="{{ asset('website/assests/icon/parking-area.png') }}"
                                alt="">
                            <h6 class="font-18-28 font-medium text-[#09090B] text-center">
                                {{ __('messages.smart_system') }}
                            </h6>
                        </div>
                        <div
                            class="col-span-1 border border-[#6B5736] rounded-[12px] flex flex-col gap-[10px] justify-center items-center p-[20px]">
                            <img class="w-[40px]" src="{{ asset('website/assests/icon/swim.png') }}" alt="">
                            <h6 class="font-18-28 font-medium text-[#09090B] text-center">
                                {{ __('messages.area_size') }}
                            </h6>
                        </div>
                        <div
                            class="col-span-1 border border-[#6B5736] rounded-[12px] flex flex-col gap-[10px] justify-center items-center p-[20px]">
                            <img class="w-[40px]" src="{{ asset('website/assests/icon/balcony.png') }}"
                                alt="">
                            <h6 class="font-18-28 font-medium text-[#09090B] text-center">{{ __('messages.balcony') }}
                            </h6>
                        </div>
                        <div
                            class="col-span-1 border border-[#6B5736] rounded-[12px] flex flex-col gap-[10px] justify-center items-center p-[20px]">
                            <img class="w-[40px]" src="{{ asset('website/assests/icon/laundry.png') }}"
                                alt="">
                            <h6 class="font-18-28 font-medium text-[#09090B] text-center">
                                {{ __('messages.laundry_room') }}
                            </h6>
                        </div>
                        <div
                            class="col-span-1 border border-[#6B5736] rounded-[12px] flex flex-col gap-[10px] justify-center items-center p-[20px]">
                            <img class="w-[40px]" src="{{ asset('website/assests/icon/dish.png') }}" alt="">
                            <h6 class="font-18-28 font-medium text-[#09090B] text-center">
                                {{ __('messages.storage_room') }}
                            </h6>
                        </div>
                        <div
                            class="col-span-1 border border-[#6B5736] rounded-[12px] flex flex-col gap-[10px] justify-center items-center p-[20px]">
                            <img class="w-[40px]" src="{{ asset('website/assests/icon/furnishing.png') }}"
                                alt="">
                            <h6 class="font-18-28 font-medium text-[#09090B] text-center">
                                {{ __('messages.fully_furnished') }}
                            </h6>
                        </div>
                        <div
                            class="col-span-1 border border-[#6B5736] rounded-[12px] flex flex-col gap-[10px] justify-center items-center p-[20px]">
                            <img class="w-[40px]" src="{{ asset('website/assests/icon/bathroom.png') }}"
                                alt="">
                            <h6 class="font-18-28 font-medium text-[#09090B] text-center">
                                {{ __('messages.bathrooms') }}
                            </h6>
                        </div>

                    </div>
                    <div class="hidden lg:block">
                        <h5 class="font-20-28 mb-[8px] font-medium text-[#09090B]">{{ __('messages.limited_offer') }}
                        </h5>
                        <p class="font-18-28 text-[#3F3F46] font-normal mb-[24px]">{{ __('messages.hi_tech_offer') }}
                        </p>
                        <div class="flex gap-[36px] items-center">
                            {{-- <button
                                class="py-[2px] pr-[2px] pl-[24px] gap-[8px] lg:gap-[16px] flex items-center bg-[#05352D] rounded-[99px] header-btn"
                                onclick="document.getElementById('form').scrollIntoView({ behavior: 'smooth' })">
                                <span class="font-16-24 font-medium text-white">{{ __('messages.sign_up_now') }}
                                </span>
                                <div
                                    class="rounded-[100%] flex justify-center items-center bg-white w-[32px] lg:w-[48px] h-[32px] lg:h-[48px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                                        fill="none">
                                        <path d="M7 7.66504H17V17.665" stroke="#05352D" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7 17.665L17 7.66504" stroke="#05352D" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </button> --}}
                            <a href=""
                                class="border rounded-[99px] border-[#09090B] gap-[8px] lg:gap-[16px] items-center py-[2px] pr-[24px] flex">
                                <img class="rounded-[100%] w-[32px] lg:w-[48px]"
                                    src="{{ asset('website/assests/img/bussiness-man.png') }}" alt="">
                                <span
                                    class="font-16-24 font-medium text-[#09090B]">{{ __('messages.talk_to_agent') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section py-[32px] lg:py-[120px] flex justify-center">
        <div class="container">
            <div class="lg:flex justify-between items-end mb-[20px] lg:mb-[80px]">
                <h2
                    class="font-72-88 font-normal font-florentia text-[#09090B] mb-[16px] lg:mb-0 text-center lg:text-left">
                    {{ __('messages.choose_color') }}
                </h2>
                <div class="flex justify-center">
                    <button
                        class="py-[2px] pr-[2px] pl-[24px] gap-[8px] lg:gap-[16px] flex items-center bg-[#2E0B33] rounded-[99px] header-btn"
                        onclick="document.getElementById('form').scrollIntoView({ behavior: 'smooth' })">
                        <span class="font-16-24 font-medium text-white">{{ __('messages.get_offer') }}</span>
                        <div
                            class="rounded-[100%] flex justify-center items-center bg-white w-[32px] lg:w-[48px] h-[32px] lg:h-[48px]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                viewBox="0 0 24 25" fill="none">
                                <path d="M7 7.66504H17V17.665" stroke="#2E0B33" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 17.665L17 7.66504" stroke="#2E0B33" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </button>
                </div>
            </div>
            <div class="grid lg:grid-cols-2 gap-[36px] xl:gap-[80px] items-center">
                <div class="col-span-1 lg:hidden">
                    <div class="img-slider w-[calc(100vw-32px)] md:w-[calc(100vw-160px)]">
                        <div class="content">
                            <img class="rounded-[12px] img active w-full"
                                src="{{ asset('website/assests/img/018.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full"
                                src="{{ asset('website/assests/img/slider-img-2.webp') }}" alt="">
                            <img class="rounded-[12px] img w-full"
                                src="{{ asset('website/assests/img/slider-img-3.webp') }}" alt="">
                        </div>
                        <div class="content">
                            <img class="rounded-[12px] img active w-full"
                                src="{{ asset('website/assests/img/018.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full"
                                src="{{ asset('website/assests/img/slider-img-2.webp') }}" alt="">
                            <img class="rounded-[12px] img w-full"
                                src="{{ asset('website/assests/img/slider-img-3.webp') }}" alt="">
                        </div>
                        <div class="content">
                            <img class="rounded-[12px] img active w-full"
                                src="{{ asset('website/assests/img/018.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full"
                                src="{{ asset('website/assests/img/slider-img-2.webp') }}" alt="">
                            <img class="rounded-[12px] img w-full"
                                src="{{ asset('website/assests/img/slider-img-3.webp') }}" alt="">
                        </div>
                        <div class="content">
                            <img class="rounded-[12px] img active w-full"
                                src="{{ asset('website/assests/img/018.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full"
                                src="{{ asset('website/assests/img/slider-img-2.webp') }}" alt="">
                            <img class="rounded-[12px] img w-full"
                                src="{{ asset('website/assests/img/slider-img-3.webp') }}" alt="">
                        </div>
                        <div class="content">
                            <img class="rounded-[12px] img active w-full"
                                src="{{ asset('website/assests/img/018.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full"
                                src="{{ asset('website/assests/img/slider-img-2.webp') }}" alt="">
                            <img class="rounded-[12px] img w-full"
                                src="{{ asset('website/assests/img/slider-img-3.webp') }}" alt="">
                        </div>
                        <div class="content">
                            <img class="rounded-[12px] img active w-full"
                                src="{{ asset('website/assests/img/018.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full"
                                src="{{ asset('website/assests/img/slider-img-2.webp') }}" alt="">
                            <img class="rounded-[12px] img w-full"
                                src="{{ asset('website/assests/img/slider-img-3.webp') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-span-1">
                    <h6 class="font-20-28 font-medium text-[#09090B] mb-[16px]">{{ __('messages.choose_colors') }}
                    </h6>
                    <div class="flex mb-[36px] gap-[20px]">
                        <button
                            class="p-[16px] rounded-[12px] border border-[#E4E4E7] font-18-28 font-medium text-[#09090B] color-btn button">
                            {{ __('messages.master_bed') }}
                        </button>
                        <button
                            class="p-[16px] rounded-[12px] border border-[#E4E4E7] font-18-28 font-medium text-[#09090B] color-btn button">
                            {{ __('messages.ac_rooms') }}
                        </button>
                        <button
                            class="p-[16px] rounded-[12px] border border-[#E4E4E7] font-18-28 font-medium text-[#09090B] color-btn button">
                            {{ __('messages.nonac_rooms') }}
                        </button>
                    </div>
                    <div class="content">
                        <div class="mb-[36px] color-div active">


                            <div
                                class="py-[24px] px-[32px] rounded-[12px] border border-[#09090B] bg-[#E9DAC4] w-fit wave-1">
                                <h6 class="font-20-28 font-normal font-florentia mb-[24px]">
                                    {{ __('messages.serenity_message') }}</h6>
                                <h5 class="font-18-28 font-normal text-[#09090B] flex items-center mb-[20px]">
                                    <div>
                                        <img class="w-[40px]" src="{{ asset('website/assests/icon/dish.png') }}"
                                            alt="">
                                    </div>
                                    <span
                                        class="pl-[10px] pr-[4px] font-semibold">{{ __('messages.storage_room') }}:</span>
                                    {{ __('messages.fully_furnished_apartments') }}
                                </h5>
                                <h5 class="font-18-28 font-normal text-[#09090B] flex items-center mb-[20px]">
                                    <div>
                                        <img class="w-[40px]" src="{{ asset('website/assests/icon/swim.png') }}"
                                            alt="">
                                    </div>
                                    <span class="pl-[10px] pr-[4px] font-semibold">{{ __('messages.area_size') }}
                                        :</span>
                                    {{ __('messages.basic_storage') }}
                                </h5>
                                <h5 class="font-18-28 font-normal text-[#09090B] flex items-center mb-[20px]">
                                    <div>
                                        <img class="w-[40px]"
                                            src="{{ asset('website/assests/icon/parking-area.png') }}"
                                            alt="">
                                    </div>
                                    <span
                                        class="pl-[10px] pr-[4px] font-semibold">{{ __('messages.free_parking') }}</span>

                                </h5>
                                <h5 class="font-18-28 font-normal text-[#09090B] flex items-center mb-[20px]">
                                    <div>
                                        <img class="w-[40px]"
                                            src="{{ asset('website/assests/icon/air-conditioner.png') }}"
                                            alt="">
                                    </div>
                                    <span
                                        class="pl-[10px] pr-[4px] font-semibold">{{ __('messages.ac_rooms') }}</span>

                                </h5>
                                <h5 class="font-18-28 font-normal text-[#09090B] flex items-center mb-[20px]">
                                    <div>
                                        <img class="w-[40px]"
                                            src="{{ asset('website/assests/icon/television.png') }}" alt="">
                                    </div>
                                    <span class="pl-[10px] pr-[4px] font-semibold">{{ __('messages.smart_tv') }}
                                    </span>

                                </h5>

                            </div>
                        </div>
                        <div class="mb-[36px] color-div">

                            <div
                                class="py-[24px] px-[32px] rounded-[12px] border border-[#09090B] bg-[#D9C4A5] w-fit wave-2">
                                <h6 class="font-20-28 font-normal font-florentia mb-[24px]">
                                    {{ __('messages.serenity_message') }}
                                </h6>
                                <h5 class="font-18-28 font-normal text-[#09090B] flex items-center mb-[20px]">
                                    <div>
                                        <img class="w-[40px]" src="{{ asset('website/assests/icon/dish.png') }}"
                                            alt="">
                                    </div>
                                    <span
                                        class="pl-[10px] pr-[4px] font-semibold">{{ __('messages.storage_room') }}:</span>
                                    {{ __('messages.fully_furnished_apartments') }}
                                </h5>
                                <h5 class="font-18-28 font-normal text-[#09090B] flex items-center mb-[20px]">
                                    <div>
                                        <img class="w-[40px]" src="{{ asset('website/assests/icon/swim.png') }}"
                                            alt="">
                                    </div>
                                    <span class="pl-[10px] pr-[4px] font-semibold">{{ __('messages.area_size') }}
                                        :</span>
                                    {{ __('messages.basic_storage') }}
                                </h5>
                                <h5 class="font-18-28 font-normal text-[#09090B] flex items-center mb-[20px]">
                                    <div>
                                        <img class="w-[40px]"
                                            src="{{ asset('website/assests/icon/parking-area.png') }}"
                                            alt="">
                                    </div>
                                    <span
                                        class="pl-[10px] pr-[4px] font-semibold">{{ __('messages.free_parking') }}</span>

                                </h5>
                                <h5 class="font-18-28 font-normal text-[#09090B] flex items-center mb-[20px]">
                                    <div>
                                        <img class="w-[40px]"
                                            src="{{ asset('website/assests/icon/air-conditioner.png') }}"
                                            alt="">
                                    </div>
                                    <span
                                        class="pl-[10px] pr-[4px] font-semibold">{{ __('messages.ac_rooms') }}</span>

                                </h5>

                            </div>
                        </div>
                        <div class="mb-[36px] color-div">


                            <div
                                class="py-[24px] px-[32px] rounded-[12px] border border-[#09090B] bg-[#D9C4A5] w-fit wave-3">
                                <h6 class="font-20-28 font-normal font-florentia mb-[24px]">
                                    {{ __('messages.serenity_message') }}</h6>
                                <h5 class="font-18-28 font-normal text-[#09090B] flex items-center mb-[20px]">
                                    <div>
                                        <img class="w-[40px]" src="{{ asset('website/assests/icon/dish.png') }}"
                                            alt="">
                                    </div>
                                    <span
                                        class="pl-[10px] pr-[4px] font-semibold">{{ __('messages.storage_room') }}</span>
                                    {{ __('messages.fully_furnished_apartments') }}
                                </h5>
                                <h5 class="font-18-28 font-normal text-[#09090B] flex items-center mb-[20px]">
                                    <div>
                                        <img class="w-[40px]" src="{{ asset('website/assests/icon/swim.png') }}"
                                            alt="">
                                    </div>
                                    <span
                                        class="pl-[10px] pr-[4px] font-semibold">{{ __('messages.area_size') }}:</span>
                                    {{ __('messages.basic_storage') }}
                                </h5>
                                <h5 class="font-18-28 font-normal text-[#09090B] flex items-center mb-[20px]">
                                    <div>
                                        <img class="w-[40px]"
                                            src="{{ asset('website/assests/icon/parking-area.png') }}"
                                            alt="">
                                    </div>
                                    <span
                                        class="pl-[10px] pr-[4px] font-semibold">{{ __('messages.free_parking') }}</span>

                                </h5>
                                <h5 class="font-18-28 font-normal text-[#09090B] flex items-center mb-[20px]">
                                    <div>
                                        <img class="w-[40px]"
                                            src="{{ asset('website/assests/icon/air-conditioner.png') }}"
                                            alt="">
                                    </div>
                                    <span
                                        class="pl-[10px] pr-[4px] font-semibold">{{ __('messages.ac_rooms') }}</span>

                                </h5>

                            </div>
                        </div>

                    </div>
                    <h6 class="font-20-28 font-medium text-[#09090B] mb-[8px]">{{ __('messages.limited_offer') }}</h6>
                    <p class="font-18-28 text-[#3F3F46] font-normal mb-[20px]">{{ __('messages.hi_tech_offer') }}</p>
                    <div class="flex gap-[36px] items-center">

                        <a href=""
                            class="border rounded-[99px] border-[#09090B] gap-[8px] lg:gap-[16px] items-center py-[2px] pr-[24px] flex">
                            <img class="rounded-[100%] w-[32px] lg:w-[48px]"
                                src="{{ asset('website/assests/img/bussiness-man.png') }}" alt="">
                            <span
                                class="font-16-24 font-medium text-[#09090B]">{{ __('messages.talk_to_agent') }}</span>
                        </a>
                    </div>
                </div>
                <div class="col-span-1 hidden lg:block">
                    <div class="img-slider min-h-[400px] max-h-[600px]">
                        <div class="content ">
                            <img class="rounded-[12px] img active w-full  object-cover object-center"
                                src="{{ asset('website/assests/img/018.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full h-[572px] object-cover object-center"
                                src="{{ asset('website/assests/img/026.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full" src="{{ asset('website/assests/img/031.jpg') }}"
                                alt="">
                        </div>
                        <div class="content">
                            <img class="rounded-[12px] img active w-full object-cover object-center"
                                src="{{ asset('website/assests/img/018.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full" src="{{ asset('website/assests/img/027.jpg') }}"
                                alt="">
                            <img class="rounded-[12px] img w-full h-[572px] object-cover object-center"
                                src="{{ asset('website/assests/img/030.jpg') }}" alt="">
                        </div>
                        <div class="content">
                            <img class="rounded-[12px] img active w-full h-[572px] object-cover object-center"
                                src="{{ asset('website/assests/img/013.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full h-[572px] object-cover object-center"
                                src="{{ asset('website/assests/img/013.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full h-[572px] object-cover object-center"
                                src="{{ asset('website/assests/img/013.jpg') }}" alt="">
                        </div>
                        <div class="content">
                            <img class="rounded-[12px] img active w-full h-[572px] object-cover object-center"
                                src="{{ asset('website/assests/img/021.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full" src="{{ asset('website/assests/img/020.jpg') }}"
                                alt="">
                            <img class="rounded-[12px] img w-full h-[572px] object-cover object-center"
                                src="{{ asset('website/assests/img/29.jpg') }}" alt="">
                        </div>
                        <div class="content">
                            <img class="rounded-[12px] img active w-full h-[572px] object-cover object-center"
                                src="{{ asset('website/assests/img/012.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full h-[572px] object-cover object-center"
                                src="{{ asset('website/assests/img/012.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full h-[572px] object-cover object-center"
                                src="{{ asset('website/assests/img/012.jpg') }}" alt="">
                        </div>
                        <div class="content">
                            <img class="rounded-[12px] img active w-full h-[572px] object-cover object-center"
                                src="{{ asset('website/assests/img/007.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full h-[572px] object-cover object-center"
                                src="{{ asset('website/assests/img/007.jpg') }}" alt="">
                            <img class="rounded-[12px] img w-full h-[572px] object-cover object-center"
                                src="{{ asset('website/assests/img/007.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- form --}}
    <section id="form" class="section py-[32px] lg:py-[120px] flex justify-center">
        <div class="container">
            <div
                class="rounded-[20px] bg-[#2E0B33] p-[20px] lg:py-[36px] lg:pr-[36px] grid lg:grid-cols-7 items-center">
                <div class="col-span-4 lg:px-[36px] xl:px-[120px]">
                    <h6 class="font-36-48 font-florentia font-normal text-[#FAFAFA] mb-[8px]">
                        {{ __('messages.sign_up_brochure') }}</h6>
                    <p class="font-20-28 text-[#FAFAFA] font-normal tracking-[0.4px] mb-[36px]">
                        {{ __('messages.free_upgrade') }}</p>
                    <form action="{{ route('form.submit') }}" method="POST">
                        @csrf
                        <div class="flex flex-col gap-[8px] mb-[24px]">
                            <span
                                class="font-16-24 text-[#FAFAFA] font-medium">{{ __('messages.your_full_name') }}</span>
                            <input type="text" name="name"
                                class="py-[12px] px-[16px] border border-[#FFF] rounded-[12px] bg-[#2E0B33] font-16-24 text-[#FAFAFA] font-medium"
                                placeholder="John Doe" required>
                        </div>
                        <div class="flex flex-col gap-[8px] mb-[24px]">
                            <span
                                class="font-16-24 text-[#FAFAFA] font-medium">{{ __('messages.your_email') }}</span>
                            <input type="email" name="email"
                                class="py-[12px] px-[16px] border border-[#FFF] rounded-[12px] bg-[#2E0B33] font-16-24 text-[#FAFAFA] font-medium"
                                placeholder="John Doe" required>
                        </div>
                        <div id="p" class="flex flex-col gap-[8px] mb-[64px]">
                            <span
                                class="font-16-24 text-[#FAFAFA] font-medium">{{ __('messages.your_phone') }}</span>
                            <input id="mobile_code" type="tel"
                                class="py-[12px] px-[16px] border border-[#FFF] rounded-[12px] bg-[#2E0B33] font-16-24 text-[#FAFAFA] font-medium w-full" />
                            <input type="hidden" name="phone" id="full_phone" />
                        </div>
                        <button
                            class="rounded-[12px] bg-white flex items-center justify-center h-[52px] font-16-24 font-semibold text-[#09090B] w-full">{{ __('messages.request_info') }}</button>
                    </form>
                    @if (session('success'))
                        <div class="text-green-500 mt-4">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="col-span-3 hidden lg:block">
                    <img class="w-full rounded-[12px]" src="{{ asset('website/assests/img/005.jpg') }}"
                        alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="section py-[32px] lg:py-[120px] flex justify-center">
        <div class="container">
            <div class="lg:flex justify-between items-start mb-[20px] lg:mb-[80px]">
                <h2
                    class="font-72-88 font-normal font-florentia text-[#09090B] text-center lg:text-left mb-[16px] lg:mb-0">
                    {!! __('messages.see_it_3d') !!}
                </h2>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7913.712005979042!2d79.83571701035078!3d7.370032276404068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2c3006d460271%3A0x545b7611e3526c1d!2sVilla%20Viola%20Resort!5e0!3m2!1sen!2slk!4v1751561177280!5m2!1sen!2slk"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

                <div class="flex justify-center">

                </div>
            </div>
            <div class="lg:hidden">
                <div class="d3-slider">
                    <div>
                        <div class="mb-[20px] rounded-[20px] 3d-div">
                            <iframe width="100%" height="640" frameborder="0"
                                allow="xr-spatial-tracking; gyroscope; accelerometer" allowfullscreen scrolling="no"
                                src="https://kuula.co/share/hbTgY/collection/71XSs?logo=1&info=1&fs=1&vr=0&sd=1&thumbs=1"></iframe>
                        </div>
                        <h6 class="font-24-32 font-semibold text-[#09090B] text-center lg:text-left">
                            {{ __('messages.violet_key_project') }}
                        </h6>
                    </div>
                    <div>
                        <div class="mb-[20px] rounded-[20px] 3d-div">
                            <iframe width="100%" height="640" frameborder="0"
                                allow="xr-spatial-tracking; gyroscope; accelerometer" allowfullscreen scrolling="no"
                                src="https://kuula.co/share/hbTgR/collection/71XSs?logo=1&info=1&fs=1&vr=0&sd=1&thumbs=1"></iframe>

                        </div>
                        <h6 class="font-24-32 font-semibold text-[#09090B] text-center lg:text-left">
                            {{ __('messages.terracotta_haven_project') }}
                        </h6>
                    </div>
                    <div>
                        <div class="mb-[20px] rounded-[20px] 3d-div">
                            <iframe width="100%" height="640" frameborder="0"
                                allow="xr-spatial-tracking; gyroscope; accelerometer" allowfullscreen scrolling="no"
                                src="https://kuula.co/share/hbTgW/collection/71XSs?logo=1&info=1&fs=1&vr=0&sd=1&thumbs=1"></iframe>

                        </div>
                        <h6 class="font-24-32 font-semibold text-[#09090B] text-center lg:text-left">
                            {{ __('messages.verdiq_one_premium') }}
                        </h6>
                    </div>
                </div>
            </div>

        </div>
    </section>



    <!-- gallery section -->
    <section class="section py-[32px] lg:py-[120px] flex justify-center">
        <div class="container">
            <div class="flex justify-between items-end mb-[36px] lg:mb-[80px]">
                <h2 class="font-72-88 font-normal font-florentia text-[#09090B] text-center lg:text-left">
                    {{ __('messages.experience_design') }}
                </h2>

            </div>
            <div class="flex flex-col gap-[20px]">

                <div class="gallery-div">
                    <div class="grid md:grid-cols-7 gap-[20px]">
                        <div class="md:col-span-4 gap-[20px] grid md:grid-cols-2">
                            <div class="md:col-span-2">
                                <img class="object-cover w-full md:h-full rounded-[12px]"
                                    src="{{ asset('website/assests/img/001a.jpg') }}">
                            </div>
                            <div class="md:col-span-1">
                                <img class="object-cover w-full md:h-full rounded-[12px]"
                                    src="{{ asset('website/assests/img/023.jpg') }}">
                            </div>
                            <div class="md:col-span-1">
                                <img class="object-cover w-full md:h-full rounded-[12px]"
                                    src="{{ asset('website/assests/img/007.jpg') }}">
                            </div>
                        </div>
                        <div class="md:col-span-3 grid flex-col gap-[20px]">
                            <div class="">
                                <img class="object-cover w-full rounded-[12px]"
                                    src="{{ asset('website/assests/img/022.jpg') }}">
                            </div>
                            <div class="relative">
                                <img class="object-cover w-full rounded-[12px]"
                                    src="{{ asset('website/assests/img/011.jpg') }}">
                                <div
                                    class="absolute w-full h-full top-0 left-0 bg-black opacity-[0.6] rounded-[12px] flex justify-center items-center">
                                    <a href="#"
                                        class="loadMore font-20-28 tracking-[0.4px] font-normal flex items-center gap-[8px] text-white header-btn">
                                        {{ __('messages.view_all') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path d="M7 7H17V17" stroke="#F2F4F4" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M7 17L17 7" stroke="#F2F4F4" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>



    <footer id="footer" class="section flex justify-center pt-[64px] lg:pt-[80px] pb-[32px] bg-[#2E0B33]">
        <div class="container">
            <div class="border-y-[2px] border-[rgba(255,255,255,0.10)] py-[30px] flex items-center justify-between">
                <img class="w-[48px] lg:w-[75px]" src="{{ asset('website/assests/img/villa_viola_lg.png') }}"
                    alt="">
                <span class="font-18-28 font-normal text-[#FAFAFA] opacity-[0.6] lg:pl-[210px] hidden lg:block">© 2025
                    All rights
                    reserved.</span>
                <div class="flex gap-[24px] items-center">
                    <a onclick="document.getElementById('top').scrollIntoView({ behavior: 'smooth' })" href=""
                        class="h-[36px] w-[36px] lg:h-[56px] lg:w-[56px] flex justify-center items-center bg-white rounded-[100%]">
                        <img class="w-[16px] lg:w-[24px]" src="{{ asset('website/assests/icon/home.svg') }}"
                            alt="">
                    </a>
                    <a href="" onclick="copyURL(event, this)"
                        class="h-[36px] w-[36px] lg:h-[56px] lg:w-[56px] flex justify-center items-center bg-white rounded-[100%]">
                        <img class="w-[16px] lg:w-[24px]" src="{{ asset('website/assests/icon/share.svg') }}"
                            alt="">
                    </a>
                    <a href="callto:"
                        class="h-[36px] w-[36px] lg:h-[56px] lg:w-[56px] flex justify-center items-center bg-white rounded-[100%]">
                        <img class="w-[16px] lg:w-[24px]" src="{{ asset('website/assests/icon/call.svg') }}"
                            alt="">
                    </a>
                    <a href="https://wa.me/" target="_blank"
                        class="h-[36px] w-[36px] lg:h-[56px] lg:w-[56px] flex justify-center items-center bg-white rounded-[100%]">
                        <img class="w-[24px] lg:w-[36px]" src="{{ asset('website/assests/icon/whatsApp.png') }}"
                            alt="">
                    </a>
                </div>
            </div>
            <div class="pt-[24px] flex flex-col items-center">
                <span class="font-18-28 font-normal text-[#FAFAFA] opacity-[0.6] lg:pl-[210px] mb-[24px] lg:hidden">©
                    2025
                    All rights
                    reserved.</span>
                <div class="flex items-center gap-[24px] justify-center">
                    <a href="" class="font-18-28 font-normal text-white">Privacy Policy</a>
                    <a href="" class="font-18-28 font-normal text-white">Terms of Use</a>
                    <a href="" class="font-18-28 font-normal text-white">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    @include('website.includes.script')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const translations = {
                en: ['Between you and a smart apartment', 'There is a project called villa viola'],
                ar: ['ASFADFEFG', 'c` è un progetto chiamato Villa Viola']
            };

            const currentLang = "{{ app()->getLocale() }}";
            const texts = translations[currentLang] || translations.en;

            let index = 0;
            const element = document.getElementById('textChanger');

            if (!element) {
                console.error('#textChanger element not found!');
                return;
            }

            function changeText() {
                element.classList.add('fade-out');

                setTimeout(() => {
                    index = (index + 1) % texts.length;
                    element.textContent = texts[index];
                    element.classList.remove('fade-out');
                }, 500);
            }

            // Set initial text
            element.textContent = texts[index];
            setInterval(changeText, 4000);
        });
    </script>


</body>

</html>
