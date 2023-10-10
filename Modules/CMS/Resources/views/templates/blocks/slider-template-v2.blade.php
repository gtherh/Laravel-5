@php
$slides = \Modules\CMS\Service\Homepage::getSlider($component->slider);
$brands = \App\Models\Brand::take(8)->get();
@endphp
<section class="flex gap-1 container mx-auto md:my-12 my-10">
    <div class="brand container mx-auto">
        <div class=" float-right md:pb-2 lg:pb-3" style="  gap: 8px; display: inline-flex">
            <div class="SeeAll" style=" color: black; font-size: 20px;  font-weight: 500; text-decoration: underline; text-transform: capitalize; line-height: 20px; letter-spacing: 0.10px; word-wrap: break-word">See All</div>
        </div>
        <div class="grid grid-cols-2 gap-4 clear-both">
            <div class="{{ $component->full == 1 ? '' : '' }} md:col-span-1  h-56  md:h-80 w-full lg:h-96"
                style="margin-top:{{ $component->mt }};margin-bottom:{{ $component->mb }};">
                @if (isset($slides) && $slides->count())
                <div class="{{ $component->full == 1 ? 'custom-swiper-full' : 'custom-swiper' }} swiper mySwiper rounded-3xl">
                    <div class="swiper-wrapper">
                        @php
                        $buttonDirection = ['left' => 'justify-start', 'right' => 'justify-end', 'center' => 'justify-center'];
                        @endphp
                        @foreach ($slides as $slide)
                        <div class="swiper-slide">
                            <div class="relative z-0 flex align-items-center">
                                <div class="costume-title text-center">
                                    <div class="{{ $component->full == 1 ? 'container mx-auto' : 'px-2.5 md:px-16 lg:px-24' }}">
                                        <div class="text-{{ $slide->title_direction }}">
                                            <div class="sliders-animation inline-block anim text-x-title dm-regular animated text-xl lg:text-4xl font-semibold"
                                                data-animation="{{ $slide->title_animation }}"
                                                style="animation-delay: {{ $slide->title_delay }}s; color: {{ $slide->title_font_color }}; font-size: {{ $slide->title_font_size . 'px' }} ">
                                                {!! $slide->title_text !!}
                                            </div>
                                        </div>

                                        <div class="text-{{ $slide->sub_title_direction }}">
                                            <div class="sliders-animation inline-block anim text-y-title dm-bold animated text-xl lg:text-4xl font-semibold"
                                        
                                                data-animation="{{ $slide->sub_title_animation }}"
                                                style="animation-delay: {{ $slide->sub_title_delay }}s; color: {{ $slide->sub_title_font_color }}; font-size: {{ $slide->sub_title_font_size . 'px' }} ">
                                                {!! $slide->sub_title_text !!}
                                            </div>
                                        </div>

                                        <div class="text-{{ $slide->description_title_direction }}">
                                            <div class="sliders-animation inline-block anim text-z-title dm-regular mt-3 animated bottom-title"
                                                data-animation="{{ $slide->description_title_animation }}"
                                                style="animation-delay: {{ $slide->description_title_delay }}s; color: {{ $slide->description_title_font_color }}; font-size: {{ $slide->description_title_font_size . 'px' }} ">
                                                {!! $slide->description_title_text !!}
                                            </div>
                                        </div>

                                        @if (!empty($slide->button_title))
                                        <div class="flex {{ $buttonDirection[strtolower($slide->button_position)] }}">
                                            <a style="animation-delay: {{ $slide->button_delay }}s;"
                                                href="{{ $slide->button_link }}" {{ $slide->is_open_in_new_window == 'Yes' ?
                                                'target=_blank' : '' }}
                                                class="inline-block sliders-animation anim animated"
                                                data-animation="{{ $slide->button_animation }}">
                                                <p class="shop-btn dm-bold inline-block flex-col justify-center items-center my-5 py-1.5 px-2   md:my-7 md:py-2.5 md:px-6 !important "
                                                    style="color: {{ $slide->button_font_color }}; background: {{ $slide->button_bg_color . 'dd' }}; --hover-bg-color:{{ $slide->button_bg_color }}; --hover-color:{{ $slide->button_font_color }};border-radius:9999px;">
                                                    {!! $slide->button_title !!}
                                                    {{-- <svg class="shop-direction w-9p md:h-2 md:w-13p" viewBox="0 0 13 8"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M8.87915 0L7.70313 1.20177L9.60983 3.15022H1.63861C1.17935 3.15022 0.80704 3.53068 0.80704 4C0.80704 4.46932 1.17935 4.84978 1.63861 4.84978H9.60983L7.70313 6.79823L8.87915 8L12.7934 4L8.87915 0Z"
                                                            fill="currentColor" />
                                                    </svg> --}}
                                                </p>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <img class="hero-slide-img {{ $component->rounded == 1 ? 'rounded-lg' : '' }} object-cover h-56  md:h-80 w-full lg:h-96 rounded-3xl"
                                    src="{{ $slide->fileUrl() }}">
                            </div>
                        </div>
                        @endforeach

                        <div>
                            <a class=" hidden">
                                <span class="swiper-button-prev prev items-center justify-center">
                                    <svg width="9" height="11" viewBox="0 0 9 13" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.32668 0.337159L8.66402 1.65614L3.65882 6.59262L8.66402 11.5291L7.32667 12.8481L0.98413 6.59262L7.32668 0.337159Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                            <a class=" hidden">
                                <span class="swiper-button-next next items-center justify-center">
                                    <svg width="9" height="11" viewBox="0 0 9 13" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.3231 0.337159L0.985761 1.65614L5.99096 6.59262L0.985762 11.5291L2.32311 12.8481L8.66565 6.59262L2.3231 0.337159Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>

                        @foreach ($slides as $slide)
                        <div class="swiper-pagination"></div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            <!-- Column 2 - 2 rows with 4 columns in large devices and with 2 rows and 3 coulmns in md devices and with 2 rows and 2 coulmns in small devices-->
             <div class="md:col-span-1 py-5">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 md:gap-10 ">

                    
                    <!-- Row 1, Column 1 -->
                    @foreach ($brands as $brand )
                        
                  
                    <div class="text-center md:w-24 md:h-32 gap-2 md:gap-3">
                        <a href={{ route('site.productSearch', ['brands' => $brand->name]) }}>
                        <div class="ellips  md:w-24 md:h-24 rounded-full  mx-auto mb-2">
                            <img class="md:w-24 md:h-24 rounded-full" src={{$brand->fileUrl()}} />
                        </div>
                        <p class="text-center text-neutral-900 text-xs md:text-sm font-medium">{{$brand->name}}</p>
                    </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>