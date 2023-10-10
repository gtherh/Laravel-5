<section>
    @php
    $fixedMenu = isset($slides) && $slides->count() && isset($header['bottom']['category_expand']) &&
    $header['bottom']['category_expand'] == 1;
    @endphp
    @if ((isset($header['bottom']['show_page_menu']) && $header['bottom']['show_page_menu'] == 1) ||
    (isset($header['bottom']['show_download_app']) && $header['bottom']['show_download_app'] == 1))
    <div style=" {{ $header['bottom']['border_bottom'] }}" class="w-full mt-16 absolute">
    </div>
    @endif
    <header style="background: {{ $header['bottom']['bg_color'] }};  {{ $header['bottom']['border_top'] }}"
        class="header  mx-auto">
        <div class="flex justify-between container mx-auto">
            @if (isset($header['bottom']['show_category']) && $header['bottom']['show_category'] == 0)
            <div class="group group-category dm-sans lg:w-23% md:w-25% h-16 hidden md:block">
                <div style="color: {{ $header['bottom_category']['text_color'] }}; background: {{ $header['bottom_category']['bg_color'] }}"
                    class="relative  items-center border-r border-l cursor-pointer h-16 px-5 hidden md:block">
                    <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0 1.25C0 0.559644 0.559644 0 1.25 0H18.75C19.4404 0 20 0.559644 20 1.25C20 1.94036 19.4404 2.5 18.75 2.5H1.25C0.559644 2.5 0 1.94036 0 1.25Z"
                            fill="{{ $header['bottom_category']['text_color'] }}" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0 7.5C0 6.80964 0.559644 6.25 1.25 6.25H18.75C19.4404 6.25 20 6.80964 20 7.5C20 8.19036 19.4404 8.75 18.75 8.75H1.25C0.559644 8.75 0 8.19036 0 7.5Z"
                            fill="{{ $header['bottom_category']['text_color'] }}" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0 13.75C0 13.0596 0.559644 12.5 1.25 12.5H18.75C19.4404 12.5 20 13.0596 20 13.75C20 14.4404 19.4404 15 18.75 15H1.25C0.559644 15 0 14.4404 0 13.75Z"
                            fill="{{ $header['bottom_category']['text_color'] }}" />
                    </svg>
                    <span class="ml-3 text-base">{{ __('Categories') }}</span>
                    <span class="mr-4 absolute right-0">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </span>
                </div>
                <?php
                        $uncategorized = App\Models\Category::parents();
                        $categories = $uncategorized->where('id', '!=', 1);
                    ?>
                <div
                    class="bg-white border {{ $fixedMenu ? 'transform scale-1 z-30' : 'transform scale-0 group-hover:scale-100 z-30' }} relative h-100 w-full hidden md:block">
                    <div class="accordion-homepage-wrapper">
                        <div
                            class="overflow-hidden tran menu-full-details {{ count($categories) > 8 ? ' height-437p ' : '  ' }} ">
                            @foreach ($categories as $category)
                            @php $checkChildCategory =count($category->childrenCategories) @endphp
                            <li class="border-b text-left text-gray-10 category-list-decoration">
                                <button class="text-left outline-none focus:outline-none w-full">
                                    <div class="primary-bg-hover">
                                        <a class="title-font font-medium text-sm"
                                            href="{{ route('site.productSearch', ['categories' => $category->name]) }}">
                                            <div
                                                class="flex items-center justify-between w-full categories-menu h-12 pl-5 pr-4">
                                                <div class="flex justify-center items-center">
                                                    <div class="h-5 w-5">
                                                        <img class="h-full" src="{{ $category->fileUrl() }}"
                                                            alt="{{ __('Image') }}">
                                                    </div>
                                                    <span
                                                        class="pl-3 rtl-direction-space text-sm cursor-pointer text-one">
                                                        {{ trimWords( $category->name, 25) }}
                                                    </span>
                                                </div>
                                                @if ($checkChildCategory)
                                                <span>
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                    </svg>
                                                </span>
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                </button>
                                @if ($checkChildCategory)
                                <ul class="bg-white border border-l-0 absolute top-0 right-1p ul-mr min-h-full w-63">
                                    @foreach ($category->childrenCategories as $childCategory)
                                    <li class="border-b text-left text-gray-10 w-63">
                                        <button
                                            class="w-full category-hover text-left flex items-center outline-none focus:outline-none">
                                            <div
                                                class="w-64 h-12 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left p-1 py-2 relative">
                                                <a href="{{ route('site.productSearch', ['categories' => $childCategory->name]) }}"
                                                    class="flex title-font font-medium items-center md:justify-start justify-center ml-2 m-1">
                                                    <span
                                                        class="rtl-direction-space ml-3 text-sm cursor-pointer text-one">
                                                        {{ trimWords( $childCategory->name, 30) }}
                                                    </span>
                                                    @if (count($childCategory->categories))
                                                    <span
                                                        class="rtl-direction absolute top-0 -right-1 ml-3 text-center text-sm h-6 w-6 p-0.5 mt-3">
                                                        <svg class="fill-current h-4 w-4"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path
                                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                        </svg>
                                                    </span>
                                                    @endif
                                                </a>
                                            </div>
                                        </button>
                                        @if ($childCategory->categories->count() > 0)
                                        <ul
                                            class="bg-white border pb-0.5 absolute top-0 right-0.5 ul-mr min-h-full w-63">
                                            @foreach ($childCategory->categories as $grandChildCategory)
                                            <li class="border-b text-left text-gray-10 w-63">
                                                <button
                                                    class="w-full category-hover text-left flex items-center outline-none focus:outline-none">
                                                    <div
                                                        class="w-64 h-12 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left p-1 py-2 relative">
                                                        <a href="{{ route('site.productSearch', ['categories' => $grandChildCategory->name]) }}"
                                                            class="flex title-font font-medium items-center md:justify-start justify-center ml-2 m-1">
                                                            <span
                                                                class="rtl-direction-space ml-3 text-sm cursor-pointer text-one">
                                                                {{ trimWords( $grandChildCategory->name, 30) }}
                                                            </span>
                                                            @if (count($grandChildCategory->categories))
                                                            <span
                                                                class="rtl-direction absolute top-0 -right-1 ml-3 text-center text-sm h-6 w-6 p-0.5 mt-3">
                                                                <svg class="fill-current h-4 w-4"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                                </svg>
                                                            </span>
                                                            @endif
                                                        </a>
                                                    </div>
                                                </button>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                            @if (count($categories) > 8)
                            <div
                                class="absolute w-full cursor-pointer justify-between expand-button flex bg-white bottom-0 add">
                                <div
                                    class="w-full py-3 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left p-1 relative">
                                    <a class="flex justify-between text-center items-center">
                                        <span
                                            class="rtl-direction-space text-gray-10 font-medium ml-2.5 text-sm text-one uppercase">{{
                                            __('See All Categories') }} </span>
                                        <svg class="mr-2" width="11" height="7" viewBox="0 0 11 7" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.5 5L4.83564 5.74741L5.5 6.33796L6.16436 5.74741L5.5 5ZM0.335636 1.74741L4.83564 5.74741L6.16436 4.25259L1.66436 0.252591L0.335636 1.74741ZM6.16436 5.74741L10.6644 1.74741L9.33564 0.252591L4.83564 4.25259L6.16436 5.74741Z"
                                                fill="#898989" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @php
            $menus = Modules\MenuBuilder\Http\Models\MenuItems::menus(4);

            $uncategorized = App\Models\Category::parents();
            $categories = $uncategorized->where('id', '!=', 1);

            @endphp
            <div
                class="{{ isset($header['bottom']['show_category']) && $header['bottom']['show_category'] == 1 ? ' md:w-3/4 w-full' : 'w-full ' }}">
                <div class="flex justify-between">
                    @if (isset($header['bottom']['show_page_menu']) && $header['bottom']['show_page_menu'] == 1)
                    <div class="w-full  lg:w-72% md:mt-3  mr-0 md:mr-5">


                        <ul class="header-menu-nav text-white md:text-black mx-1 md:mx-1 custom-border">
                            {{-- <span class="pt-1">
                                <img src="http://dev.samvalley.co/public/uploads/20230719/widgets.svg" alt="">

                            </span> --}}
                            <li class="first-dropdown-li">

                                <a style="color: {{ $header['bottom']['text_color'] }};background-color: #201A19"
                                    class="first-list mb-2 text-sm  md:text-base custom-bottom-border rounded-full px-4 py-2 md:px-7 md:py-2.5  fas fa-qrcode "
                                    href="#">
                                    <span class="px-0.2 md:px-2">
                                        <img class="w-3 h-3 md:w-5 md:h-5"
                                            src="http://dev.samvalley.co/public/uploads/20230719/widgets.svg" alt=""
                                            style=" display: inherit;">
                                    </span>
                                    All Categories </a>

                                <ul
                                    class="dm-sans text-sm hidden md:block bg-white first-dropdown menu dropdown-enable box-shadow-dropdown">
                                    @foreach ($categories as $category)
                                    <li class="whitespace-normal border-b break-all ">
                                        <button
                                            class="text-left outline-none focus:outline-none first-dropdown-menu w-full ">
                                            <div class="primary-bg-hover  primary-bg-color ">
                                                <a class="w-48 "
                                                    href="{{ route('site.productSearch', ['categories' => $category->name]) }}">
                                                    <div
                                                        class="flex items-center justify-between w-full menuss-hover px-15p py-4">
                                                        <span class="text-sm cursor-pointer w-36">


                                                            {{ ucwords($category->name) }}
                                                        </span>
                                                        @if ($category->childrenCategories->count())
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="5" height="9"
                                                                viewBox="0 0 5 9" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M0.870679 3.60997e-07L-3.93887e-07 0.948839L3.25864 4.5L2.27018e-07 8.05116L0.87068 9L5 4.5L0.870679 3.60997e-07Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                        </button>

                                        <ul
                                            class="dm-sans text-sm font-medium hidden md:block child-dropdown box-shadow-dropdown">
                                            @foreach ($category->childrenCategories as $childCategory)

                                            <li class="whitespace-normal border-b break-all ">
                                                <button
                                                    class="text-left outline-none focus:outline-none first-dropdown-menu w-full ">
                                                    <div class="primary-bg-hover  primary-bg-color ">
                                                        <a class="w-48 "
                                                            href="{{ route('site.productSearch', ['categories' => $childCategory->name]) }}">
                                                            <div
                                                                class="flex items-center justify-between w-full menuss-hover px-15p py-4">
                                                                <span class="text-sm cursor-pointer w-36">


                                                                    {{ ucwords($childCategory->name) }}
                                                                </span>
                                                                @if ($childCategory->childrenCategories->count())
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="5"
                                                                        height="9" viewBox="0 0 5 9" fill="none">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M0.870679 3.60997e-07L-3.93887e-07 0.948839L3.25864 4.5L2.27018e-07 8.05116L0.87068 9L5 4.5L0.870679 3.60997e-07Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </a>
                                                    </div>
                                                </button>
                                                <ul
                                                    class="dm-sans text-sm font-medium hidden md:block child-dropdown box-shadow-dropdown">
                                                </ul>
                                            </li>

                                            @endforeach
                                        </ul>

                                    </li>


                                    @endforeach
                                </ul>

                            </li>


                            @foreach ($menus as $key => $menu)
                            @php
                            $url = $menu->url(empty($menu->params) ? 'page' : '');
                            $url = str_contains($url, url('/')) || str_contains($url, 'http') ? $url : url('/' . $url);
                            $activeUrl = $url;
                            if (strpos($activeUrl, '?')) {
                            $activeUrl = explode('?', $activeUrl)[0];
                            }
                            @endphp
                            <li class="first-dropdown-li">

                                <a style="color: {{ $header['bottom']['text_color'] }};background-color: #201A19"
                                    class="first-list mb-2 text-sm  md:text-base custom-bottom-border rounded-full px-4 py-2 md:px-7 md:py-2.5  {{ !empty($menu->class) ? $menu->class : '' }} {{ str_replace('/#', '', $activeUrl) == url()->current() ? 'active-border-bottom' : ' ' }}"
                                    href="{{ $url }}"> 
                                    {{-- @if ($key == 0)
                                    <span class="px-0.2 md:px-2">
                                        <img class="w-3 h-3 md:w-5 md:h-5"
                                            src="http://dev.samvalley.co/public/uploads/20230719/widgets.svg" alt=""
                                            style=" display: inherit;">
                                    </span>
                                    @endif --}}
                                    {{ ucwords($menu->label) }}</a>
                                <ul
                                    class="dm-sans text-sm hidden md:block bg-white first-dropdown menu dropdown-enable box-shadow-dropdown">


                                    @foreach ($menu->child as $submenu)
                                    @php

                                    $childUrl = $submenu->url(empty($submenu->params) ? 'page' : '');
                                    $childUrl = str_contains($childUrl, url('/')) || str_contains($childUrl, 'http') ?
                                    $childUrl : url('/' . $childUrl);
                                    @endphp
                                    <li class="whitespace-normal border-b break-all ">
                                        <button
                                            class="text-left outline-none focus:outline-none first-dropdown-menu w-full ">
                                            <div
                                                class="primary-bg-hover {{ str_replace('/#', '', $childUrl) == url()->current() ? 'primary-bg-color  text-gray-12' : ' ' }}">
                                                <a class="w-48 " href="{{ $childUrl }}">
                                                    <div
                                                        class="flex items-center justify-between w-full menuss-hover px-15p py-4">
                                                        <span class="text-sm cursor-pointer w-36">


                                                            {{ ucwords($submenu->label) }}
                                                        </span>
                                                        @if ($submenu->child->count())
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="5" height="9"
                                                                viewBox="0 0 5 9" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M0.870679 3.60997e-07L-3.93887e-07 0.948839L3.25864 4.5L2.27018e-07 8.05116L0.87068 9L5 4.5L0.870679 3.60997e-07Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                        </button>
                                        <ul
                                            class="dm-sans text-sm font-medium hidden md:block child-dropdown box-shadow-dropdown">
                                            @foreach ($submenu->child as $subChildMenu)
                                            @php
                                            $subChildUrl = $subChildMenu->url(empty($subChildMenu->params) ? 'page' :
                                            '');
                                            $subChildUrl = str_contains($subChildUrl, url('/')) ||
                                            str_contains($subChildUrl, 'http') ? $subChildUrl : url('/' . $subChildUrl);
                                            @endphp
                                            <li class="whitespace-normal bg-white border-b break-all">
                                                <button
                                                    class="text-left outline-none focus:outline-none first-dropdown-menu w-full">
                                                    <div class="primary-bg-hover">
                                                        <a class="w-48" href="{{ $subChildUrl }}">
                                                            <div
                                                                class="flex items-center justify-between w-full menuss-hover px-15p py-4">
                                                                <span class="text-sm cursor-pointer w-36">
                                                                    {{ $subChildMenu->label }}
                                                                </span>
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="5"
                                                                        height="9" viewBox="0 0 5 9" fill="none">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M0.870679 3.60997e-07L-3.93887e-07 0.948839L3.25864 4.5L2.27018e-07 8.05116L0.87068 9L5 4.5L0.870679 3.60997e-07Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </button>
                                                <ul
                                                    class="dm-sans text-sm font-medium hidden md:block child-dropdown box-shadow-dropdown">
                                                    <li class="whitespace-normal bg-white border-b break-all">
                                                        <button
                                                            class="text-left outline-none focus:outline-none first-dropdown-menu w-full">
                                                            <div class="primary-bg-hover">
                                                                <a class="w-48" href="javaScript:void(0);">
                                                                    <div
                                                                        class="flex items-center justify-between w-full menuss-hover px-15p py-4">
                                                                        <span class="text-sm cursor-pointer w-36">
                                                                            Food
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                    @endif
                    @if (isset($header['bottom']['show_download_app']) && $header['bottom']['show_download_app'] == 1)
                    <div class="hidden md:block">
                        <div class="flex justify-end items-center">
                            <div
                                class="flex {{ isset($header['bottom']) && count(array_filter($header['bottom'])) == 1 ? 'ml-6' : 'justify-end' }}">
                                @php
                                $textColor = $header['bottom']['text_color'];
                                @endphp
                                <div>
                                    <div class="relative inline-block text-right">
                                        <div style="background: {{ $header['bottom']['bg_color'] }}; color: {{ $header['bottom']['text_color'] }} ; height:63px"
                                            class="inline-flex justify-end items-center w-full bg-white text-13 font-medium text-gray-700 cursor-pointer test-click">


                                            {{-- <p class="text-sm 2xl:text-base  text-blue-600">
                                                Text Ads Space ( changeable)</p> --}}

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            {{-- <div class="TextAdsSpaceChangeable lg:flex hidden  text-sky-700 text-lg font-medium leading-tight mx-auto my-auto"
                style="color: #0A74A6;">Text Ads Space ( changeable)</div>

        </div> --}}
        </div>
    </header>
    @if ($fixedMenu && isset($header['bottom']['show_category']) && $header['bottom']['show_category'] == 1)
    <div class="container mx-auto h-36 md:h-56 lg:h-441">
        @if (isset($slides) && $slides->count())
        <div class="  -mt-2 " style="margin-bottom: 3.25rem;">
            <div class="slideshow-container md:mr-5 mr-0 ml-0 md:mt-6 lg:mr-0">
                <div class="swiper mySwiper custom-swiper   rounded-3xl h-36 md:h-56 lg:h-441 "
                    style=" background: rgba(196, 196, 196, 0.25);">
                    <div class="swiper-wrapper">
                        @php
                        $buttonDirection = ['left' => 'justify-start', 'right' => 'justify-end', 'center' =>
                        'justify-center'];
                        @endphp
                        @foreach ($slides as $slide)
                        <div class="swiper-slide ">
                            <div class="relative z-0 flex align-items-center ">
                                <div class="costume-title w-full px-11">
                                    <div class="text-{{ $slide->title_direction }}">
                                        <p class="sliders-animation inline-block anim   animated  text-xl md:text-2xl lg:text-4xl font-medium"
                                            data-animation="{{ $slide->title_animation }}"
                                            style="margin-left: 7%;
                                                    margin-top: 3%;
                                                    line-height: 171%; animation-delay: {{ $slide->title_delay }}s; color: {{ $slide->title_font_color }}; font-size: {{ $slide->title_font_size . 'px' }}">
                                            {!! $slide->title_text !!}
                                        </p>
                                    </div>
                                    <div class="text-{{ $slide->sub_title_direction }}">
                                        <p class="sliders-animation inline-block anim text-y-title dm-bold animated  text-xl md:text-2xl lg:text-4xl font-medium"
                                            data-animation="{{ $slide->sub_title_animation }}"
                                            style="margin-left: 7%;
                                                     animation-delay: {{ $slide->sub_title_delay }}s; color: {{ $slide->sub_title_font_color }}; font-size: {{ $slide->sub_title_font_size . 'px' }}">
                                            {!! $slide->sub_title_text !!}
                                        </p>
                                    </div>
                                    <div class="text-{{ $slide->description_title_direction }}">
                                        <p class="sliders-animation inline-block anim text-z-title dm-regular mt-3 animated bottom-title"
                                            data-animation="{{ $slide->description_title_animation }}"
                                            style="animation-delay: {{ $slide->description_title_delay }}s; color: {{ $slide->description_title_font_color }}; font-size: {{ $slide->description_title_font_size . 'px' }}">
                                            {!! $slide->description_title_text !!}
                                        </p>
                                    </div>
                                    @if (!empty($slide->button_title))
                                    <div class="flex {{ $buttonDirection[strtolower($slide->button_position)] }}">
                                        <a style="margin-left: 7%;animation-delay: {{ $slide->button_delay }}s;"
                                            href="{{ $slide->button_link }}" {{ $slide->is_open_in_new_window == 'Yes' ?
                                            'target=_blank' : '' }}
                                            class="inline-block relative bottom-4 sliders-animation animated anim
                                            text-center"
                                            data-animation="{{ $slide->button_animation }}">
                                            <p class="shop-btn dm-bold  flex flex-wrap justify-center items-center my-5 py-1.5 px-2 md:my-6 md:py-2 md:px-4  lg:my-7 lg:py-4 lg:px-8 !important "
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
                                <img class=" rounded-3xl object-cover w-full h-36 md:h-56 lg:h-441  "
                                    src="{{ $slide->fileUrl() }}" style="">
                            </div>
                        </div>
                        @endforeach

                        {{-- <a class="md:flex hidden">
                            <span class="prev swiper-button-prev items-center justify-center">
                                <svg width="9" height="11" viewBox="0 0 9 13" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.32668 0.337159L8.66402 1.65614L3.65882 6.59262L8.66402 11.5291L7.32667 12.8481L0.98413 6.59262L7.32668 0.337159Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                        </a>
                        <a class="md:flex hidden">
                            <span class="next swiper-button-next items-center justify-center">
                                <svg width="9" height="11" viewBox="0 0 9 13" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.3231 0.337159L0.985761 1.65614L5.99096 6.59262L0.985762 11.5291L2.32311 12.8481L8.66565 6.59262L2.3231 0.337159Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                        </a> --}}
                        @foreach ($slides as $slide)
                        <div class="swiper-pagination "></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @endif
</section>