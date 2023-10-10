@if (is_array($component->disp_categories))
    <section class="container mx-auto"
        style="margin-top:{{ $component->mt }};margin-bottom:{{ $component->mb }};">
        <P class="text-center font-bold text-sm md:text-22 text-gray-12 mb-2.5 md:mb-5 uppercase dm-bold">{!! $component->title !!}
        </P>
        <div id="{{ uniqid('id_') }}" class="p_tabs c-tabs">
            <div class="flex justify-center dm-sans md:mb-5 mb-2">
                <div class="c-tabs-nav dm-sans flex font-medium homepage-menu-tab ">
                    @foreach ($component->disp_categories as $type)
                        <a href="#"
                            class="mr-4 text-sm md:text-base lg:text-2xl font-medium capitalize leading-9 c-tabs-nav__link {{ $loop->iteration == 1 ? 'is-active' : '' }} ">{{ $homeService->getCategoryTitle($type) }}</a>
                    @endforeach
                    <div class="c-tab-nav-marker"></div>
                </div>
            </div>
            <div class="FlashSaleCountDown float-right py-3 hidden md:block" style="gap: 8px; display: inline-flex ">
                <div class="EndsOn000130 md-text-base xl:text-xl font-medium" style=" color: #FF3A44;">ends On 00:01:30</div>
                
                <div class="Frame" style="width: 24px; height: 24px; position: relative">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="Frame" clip-path="url(#clip0_1255_310395)">
                        <path id="Vector" d="M12 16L16 12L12 8" stroke="#2C3E50" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path id="Vector_2" d="M8 12H16" stroke="#2C3E50" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path id="Vector_3" d="M12 3C19.2 3 21 4.8 21 12C21 19.2 19.2 21 12 21C4.8 21 3 19.2 3 12C3 4.8 4.8 3 12 3Z" stroke="#2C3E50" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_1255_310395">
                        <rect width="24" height="24" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>
                        
                </div>

            </div>
            {{-- <div class="clear-both float-right py-3" style="  gap: 8px; display: inline-flex">
                <div class="SeeAll" style=" color: black; font-size: 20px;  font-weight: 500; text-decoration: underline; text-transform: capitalize; line-height: 20px; letter-spacing: 0.10px; word-wrap: break-word">See All</div>
            </div> --}}
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"> 
                        <div class="product-tab clear-both">
                            <div>

                                <a class=" bg-black">
                                    <span class="swiper-button-prev prev  justify-center items-center inline-flex  "style=" padding: 10px;color:white;  background: #201A19;   top: 50% !important; border-radius:50% !important;width: 3% !important;max-height: 9% !important; ">
                                    <i class="fa fa-angle-left"></i>
                                    </span>
                                </a>
                                <a class="bg-black ">
                                    <span class="swiper-button-next next items-center justify-center inline-flex"style=" padding: 10px;color:white;  background: #201A19;   top: 50% !important; border-radius:50% !important;width: 3% !important;max-height: 9% !important;">
                                    <i class="fa fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                            @foreach ($component->disp_categories as $type)
                                <div class="c-tab {{ $loop->iteration == 1 ? 'is-active' : '' }}">
                                    <div class="c-tab__content">
                                        
                                        <div class="grid lg:grid-cols-5 md:grid-cols-4 grid-cols-2 justify-items-center">
                                            <div>
                                                <div class="skeleton-box bg-gray-11 rev-img rounded-md relative ">
                                                    <div class="p-10 flex justify-center items-center h-40">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <p
                                                        class="text-13 text-gray-10 roboto-medium mt-3 skeleton-box py-2 inline-block w-full">
                                                    </p>
                                                    <p
                                                        class="skeleton-box py-2 inline-block w-9/12 text-20 text-gray-12 dm-sans mt-0.5 font-medium">
                                                    </p>
                                                    <div class="item-rating mt-1p skeleton-box py-2 inline-block w-full">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="skeleton-box bg-gray-11 rev-img rounded-md relative ">
                                                    <div class="p-10 flex justify-center items-center h-40">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <p
                                                        class="text-13 text-gray-10 roboto-medium mt-3 skeleton-box py-2 inline-block w-full">
                                                    </p>
                                                    <p
                                                        class="skeleton-box py-2 inline-block w-9/12 text-20 text-gray-12 dm-sans mt-0.5 font-medium">
                                                    </p>
                                                    <div class="item-rating mt-1p skeleton-box py-2 inline-block w-full">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="skeleton-box bg-gray-11 rev-img rounded-md relative ">
                                                    <div class="p-10 flex justify-center items-center h-40">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <p
                                                        class="text-13 text-gray-10 roboto-medium mt-3 skeleton-box py-2 inline-block w-full">
                                                    </p>
                                                    <p
                                                        class="skeleton-box py-2 inline-block w-9/12 text-20 text-gray-12 dm-sans mt-0.5 font-medium">
                                                    </p>
                                                    <div class="item-rating mt-1p skeleton-box py-2 inline-block w-full">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="skeleton-box bg-gray-11 rev-img rounded-md relative ">
                                                    <div class="p-10 flex justify-center items-center h-40">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <p
                                                        class="text-13 text-gray-10 roboto-medium mt-3 skeleton-box py-2 inline-block w-full">
                                                    </p>
                                                    <p
                                                        class="skeleton-box py-2 inline-block w-9/12 text-20 text-gray-12 dm-sans mt-0.5 font-medium">
                                                    </p>
                                                    <div class="item-rating mt-1p skeleton-box py-2 inline-block w-full">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="skeleton-box bg-gray-11 rev-img rounded-md relative ">
                                                    <div class="p-10 flex justify-center items-center h-40">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <p
                                                        class="text-13 text-gray-10 roboto-medium mt-3 skeleton-box py-2 inline-block w-full">
                                                    </p>
                                                    <p
                                                        class="skeleton-box py-2 inline-block w-9/12 text-20 text-gray-12 dm-sans mt-0.5 font-medium">
                                                    </p>
                                                    <div class="item-rating mt-1p skeleton-box py-2 inline-block w-full">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="skeleton-box bg-gray-11 rev-img rounded-md relative ">
                                                    <div class="p-10 flex justify-center items-center h-40">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <p
                                                        class="text-13 text-gray-10 roboto-medium mt-3 skeleton-box py-2 inline-block w-full">
                                                    </p>
                                                    <p
                                                        class="skeleton-box py-2 inline-block w-9/12 text-20 text-gray-12 dm-sans mt-0.5 font-medium">
                                                    </p>
                                                    <div class="item-rating mt-1p skeleton-box py-2 inline-block w-full">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="skeleton-box bg-gray-11 rev-img rounded-md relative ">
                                                    <div class="p-10 flex justify-center items-center h-40">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <p
                                                        class="text-13 text-gray-10 roboto-medium mt-3 skeleton-box py-2 inline-block w-full">
                                                    </p>
                                                    <p
                                                        class="skeleton-box py-2 inline-block w-9/12 text-20 text-gray-12 dm-sans mt-0.5 font-medium">
                                                    </p>
                                                    <div class="item-rating mt-1p skeleton-box py-2 inline-block w-full">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="skeleton-box bg-gray-11 rev-img rounded-md relative ">
                                                    <div class="p-10 flex justify-center items-center h-40">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <p
                                                        class="text-13 text-gray-10 roboto-medium mt-3 skeleton-box py-2 inline-block w-full">
                                                    </p>
                                                    <p
                                                        class="skeleton-box py-2 inline-block w-9/12 text-20 text-gray-12 dm-sans mt-0.5 font-medium">
                                                    </p>
                                                    <div class="item-rating mt-1p skeleton-box py-2 inline-block w-full">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="skeleton-box bg-gray-11 rev-img rounded-md relative ">
                                                    <div class="p-10 flex justify-center items-center h-40">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <p
                                                        class="text-13 text-gray-10 roboto-medium mt-3 skeleton-box py-2 inline-block w-full">
                                                    </p>
                                                    <p
                                                        class="skeleton-box py-2 inline-block w-9/12 text-20 text-gray-12 dm-sans mt-0.5 font-medium">
                                                    </p>
                                                    <div class="item-rating mt-1p skeleton-box py-2 inline-block w-full">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="skeleton-box bg-gray-11 rev-img rounded-md relative ">
                                                    <div class="p-10 flex justify-center items-center h-40">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <p
                                                        class="text-13 text-gray-10 roboto-medium mt-3 skeleton-box py-2 inline-block w-full">
                                                    </p>
                                                    <p
                                                        class="skeleton-box py-2 inline-block w-9/12 text-20 text-gray-12 dm-sans mt-0.5 font-medium">
                                                    </p>
                                                    <div class="item-rating mt-1p skeleton-box py-2 inline-block w-full">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <button class="has-ajax-load-data opacity-0 invisible" onclick="ajaxProductLoad(this)"
                                data-component="{{ $component->id }}"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endif

<script>
    // Initialize the swiper
    var swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>