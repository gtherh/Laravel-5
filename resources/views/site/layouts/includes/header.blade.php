@php
    $carts = \App\Cart\Cart::cartCollection()->sortKeys();
@endphp
<!-- kareemov -->
<!-- <section style="background: {{ $header['main']['bg_color'] }}" class="sticky top-0 z-40 md:bg-white bg-gray-12 max-h-24"> -->

<section class="sticky top-0 z-40 gap-24  justify-center items-center mx-auto" style=" background-color: #201A19;">
    <div class="{{ isset($header['main']) && in_array(1, $header['main']) ? 'py-4' : '' }}">
        <div class="container mx-auto flex justify-between">
            @if (isset($header['main']['show_logo']) && $header['main']['show_logo'] == 1 && $headerLogo->objectFile)
                <div class=" md:block mr-auto ">
                    <div class="w-24 h-5 lg:h-9 lg:w-63 pt-1p mr-2 md:mr-auto">
                        <a href="{{ route('site.index') }}" class="leading-10">
                            <img class="w-44 h-10 {{ isset($header['main']) && count(array_filter($header['main'])) == 1 ? '' : 'mt-2' }}" src="http://dev.samvalley.co/public/svg/White.svg" alt="{{ __('Image') }}">
                            <!-- kareemov -->
                            <!-- <img class="h-11 {{ isset($header['main']) && count(array_filter($header['main'])) == 1 ? '' : 'mt-2' }}" src="{{ $headerLogo->fileUrl() }}" alt="{{ __('Image') }}"> -->
                            
                        </a>
                        
                    </div>
                </div> 
            @endif
            
            @if (isset($header['main']['show_searchbar']) && $header['main']['show_searchbar'] == 1)
            <div class="w-50% md:w-46%   {{ isset($header['main']['show_logo']) && $header['main']['show_logo'] == 1 ? '  header-searchbar-margin ml-32' : '3xl:ml-300p lg:ml-60 md:ml-48' }}">
                    <form method="GET" action="{{ route('site.productSearch','') }}">
                        <div class="w-60% h-12 relative rounded-3xl input-width   search-placeholder bg-white mt-2">
                            <input type="search" name="keyword" style="color: #1C1B1F;" placeholder="What are you looking for ?" value="{{ $searchKeyword ?? null }}" id="itemSearch" class="bg-transparent h-12 w-full text-sm ml-2 focus:outline-none pl-6 pr-10"/>
                            <button type="submit" class="absolute left-0 -top-1 mt-3 ml-3  h-6 search-btn" style="color: #1C1B1F;"><i class="fa fa-search"></i>
                                {{-- <svg class="h-4 w-4 fill-current text-gray-500" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 2C13.3137 2 16 4.68629 16 8C16 11.3137 13.3137 14 10 14C6.68629 14 4 11.3137 4 8C4 4.68629 6.68629 2 10 2ZM18 8C18 3.58172 14.4183 0 10 0C5.58172 0 2 3.58172 2 8C2 12.4183 5.58172 16 10 16C14.4183 16 18 12.4183 18 8Z" fill="#2C2C2C"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.70711 13.2929C4.31658 12.9024 3.68342 12.9024 3.29289 13.2929L0.292893 16.2929C-0.0976315 16.6834 -0.0976315 17.3166 0.292893 17.7071C0.683417 18.0976 1.31658 18.0976 1.70711 17.7071L4.70711 14.7071C5.09763 14.3166 5.09763 13.6834 4.70711 13.2929Z" fill="#2C2C2C"/>
                                </svg> --}}
                            </button>
                            <button type="submit" class="absolute right-0 -top-1 mt-3 ml-3 pr-2 h-6  p-1 ">
                                <img class="w-5 h-5  me-3" src="http://dev.samvalley.co/public/uploads/20230719/add_a_photo.svg" alt="">
                                {{-- <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="Search with pic ">
                                    <path id="Vector" d="M9.58333 16.6673H4.16667C3.72464 16.6673 3.30072 16.4917 2.98816 16.1792C2.67559 15.8666 2.5 15.4427 2.5 15.0007V7.50065C2.5 7.05862 2.67559 6.6347 2.98816 6.32214C3.30072 6.00958 3.72464 5.83398 4.16667 5.83398H5C5.44203 5.83398 5.86595 5.65839 6.17851 5.34583C6.49107 5.03327 6.66667 4.60935 6.66667 4.16732C6.66667 3.9463 6.75446 3.73434 6.91074 3.57806C7.06702 3.42178 7.27899 3.33398 7.5 3.33398H12.5C12.721 3.33398 12.933 3.42178 13.0893 3.57806C13.2455 3.73434 13.3333 3.9463 13.3333 4.16732C13.3333 4.60935 13.5089 5.03327 13.8215 5.34583C14.134 5.65839 14.558 5.83398 15 5.83398H15.8333C16.2754 5.83398 16.6993 6.00958 17.0118 6.32214C17.3244 6.6347 17.5 7.05862 17.5 7.50065V9.58398" stroke="#2C3E50" stroke-width="0.833333" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path id="Vector_2" d="M12.2973 9.84564C12.1284 9.45324 11.8618 9.11067 11.5229 8.85061C11.184 8.59054 10.7841 8.42167 10.3613 8.36009C9.93858 8.29852 9.50712 8.34629 9.10809 8.49887C8.70907 8.65145 8.3558 8.90373 8.08199 9.23164C7.80819 9.55956 7.62298 9.95217 7.54403 10.372C7.46509 10.7918 7.49505 11.2249 7.63105 11.6299C7.76706 12.0349 8.00457 12.3982 8.32092 12.6853C8.63727 12.9724 9.02192 13.1736 9.43815 13.2698" stroke="#2C3E50" stroke-width="0.833333" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path id="Vector_3" d="M12.5 15C12.5 15.663 12.7634 16.2989 13.2322 16.7678C13.7011 17.2366 14.337 17.5 15 17.5C15.663 17.5 16.2989 17.2366 16.7678 16.7678C17.2366 16.2989 17.5 15.663 17.5 15C17.5 14.337 17.2366 13.7011 16.7678 13.2322C16.2989 12.7634 15.663 12.5 15 12.5C14.337 12.5 13.7011 12.7634 13.2322 13.2322C12.7634 13.7011 12.5 14.337 12.5 15Z" stroke="#2C3E50" stroke-width="0.833333" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    </svg> --}}
                                    {{-- <svg width="3" height="3" viewBox="0 0 3 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.833008 0.833984L2.33301 2.33398" stroke="#2C3E50" stroke-width="0.833333" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>  --}}
                                                                            
                                
                            </button>
                        </div>
                    </form>
                </div>
            @endif
            <div class="ml-auto">
                <div class="flex items-center space-x-4 ">
                    <ul class="flex -mt-1.5">
                        <li class="hidden md:block  px-2 py-2">
                            <a href="#" class="flex w-fill px-3 py-2">
                             <i class="fa fa-caret-down mr-2" style="color: #FFFBFF"></i>
                                <img src="http://dev.samvalley.co/public/uploads/20230719/sa-circle-flag.svg" alt="">
    
                                    
                                    
                                {{-- <img src="http://dev.samvalley.co/public/uploads/20230718/0276e94b62afa1cfd882be0702c95e43.png" alt=""> --}}
                                {{-- <span class="text-xs rtl-direction-space ml-7p mt-1.5">{{ currency()->name }}</span> --}}
                            </a>
                        </li>
                        <li class="hidden relative md:block mt-2 items-center px-2 py-2 text-black text-base font-medium">
                            @php
                            $languages = \App\Models\Language::getAll()->where('status', 'Active');
                            @endphp
                            @php
                            $langData = Cache::get(config('cache.prefix') . '-user-language-' . optional(Auth::guard('user')->user())->id);
                            if (!auth()->user()) {
                            $langData = Cache::get(config('cache.prefix') . '-guest-language-' . request()->server('HTTP_USER_AGENT'));
                            }
                            if (empty($langData)) {
                            $langData = preference('dflt_lang');
                            }
                            @endphp
                            <div id="directionSwitch" class="dropdown rounded shadow-none relative lang-dropdown lang flex flex-col justify-center items-center" data-value={{ $languages->
                                where('short_name', $langData)->first()->direction }}>
                                <div class="select flex justify-between items-center lang-p">
                                    <a class="lang lang-change">
                                    <p class="msg roboto-medium msg-color text-xs hover:text-sm">
                                        <img src="http://dev.samvalley.co/public/uploads/20230719/translate.svg" alt="">
                                        {{ $languages->where('short_name', $langData == 'en' ? 'ar' : 'en')->first()->name }}
                                     </p>
                                    </a>
                                    
                                </div>
                                <input type="hidden" name="Showing" value="English">
                                {{-- <ul class="dropdown-menu language-dropdown border border-gray-11 -right-2 top-30p">
                                    @foreach ($languages as $language)
                                    <li id="{{ $language->name }}"
                                        class="Showing lang-change text-gray-10 {{ $langData == $language->short_name ? ' primary-bg-color text-gray-12' : '' }}">
                                        <a class="roboto-medium text-xs text-left lang" data-short_name="{{ $language->short_name }}">
                                            {{ $language->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul> --}}
                            </div>

                        </li>
                    <li class="hidden md:block  pr-2 py-2">
                        <div class="flex flex-col justify-center items-center">

                            <a href="{{ route('site.wishlist') }}" class="md:px-2 lg:px-0 py-2 block w-fill">
                                <div slot="icon" class="relative">
                                    @php
                                    $class = \App\Models\User::totalWishlist() != 0 ? 'h-4 w-4' : '';
                                    @endphp
                                    <div class="flex justify-center">
                                        
                                        <img src="http://dev.samvalley.co/public/uploads/20230719/install_mobile.svg" alt="">
                                    </div>
                                  
                                </div>
                            </a>
                        </div>
                    </li>
                    
                        @if (isset($header['main']['show_account']) && $header['main']['show_account'] == 1)
                            <li class="hidden md:block  px-1 py-2">
                                @php
                                    if (!auth()->user()) {
                                        $ckname = explode("_", Auth::getRecallerName())[2];
                                        $value = Cookie::get($ckname);
                                        if (!is_null($value)) {
                                            $rememberedUser = explode(".", explode($ckname, decrypt($value))[1]);
                                            if ($rememberedUser[1] == 'user' && Auth::guard('user')->loginUsingId($rememberedUser[0]))
                                            {
                                                $ckkey = encrypt($ckname . Auth::user()->id . ".user");
                                                Cookie::queue($ckname, $ckkey, 2592000);
                                            }
                                        }
                                    }
                                @endphp

                                @auth
                                    <!--user dropdown start-->
                                    <div class="relative inline-block mt-2">
                                        <div class="relative text-sm">
                                          <div class="flex flex-col justify-center items-center">
                                            <button id="userButton" class="flex items-center focus:outline-none ">
                                                <div class="flex flex-col justify-center bg-gray-100 items-center h-7 w-7 rounded-full pink-blue dark:text-gray-2 hover:text-purple-500 cursor-pointer">
                                                    <img class="h-7 w-7 rounded-full pink-blue dark:text-gray-2 hover:text-purple-500 cursor-pointer" src="{{ Auth::user()->fileUrl() }}" alt="Avatar of User">
                                                </div>

                                            </button>
                                            <p style="color: {{ $header['main']['text_color'] }}" class="text-xs text-xss font-medium roboto-medium text-center mt-1 leading-3">
                                                @auth
                                                    {{ trimWords(Auth::user()->name, 13) }}
                                                @endauth
                                            </p>

                                          </div>
                                          
                                            <div id="userMenu" class="absolute right-0 w-40 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700 overflow-auto   invisible">
                                                <ul class="list-reset text-gray-600">
                                                    <li class="flex">
                                                        <a href="{{ route('site.dashboard') }}" class="inline-flex items-center w-full px-2 py-1 text-sm transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_1588_5083)">
                                                                <path d="M10.667 9.33333C10.667 10.7478 11.2289 12.1044 12.2291 13.1046C13.2293 14.1048 14.5858 14.6667 16.0003 14.6667C17.4148 14.6667 18.7714 14.1048 19.7716 13.1046C20.7718 12.1044 21.3337 10.7478 21.3337 9.33333C21.3337 7.91885 20.7718 6.56229 19.7716 5.5621C18.7714 4.5619 17.4148 4 16.0003 4C14.5858 4 13.2293 4.5619 12.2291 5.5621C11.2289 6.56229 10.667 7.91885 10.667 9.33333Z" stroke="#2C3E50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M8 28V25.3333C8 23.9188 8.5619 22.5623 9.5621 21.5621C10.5623 20.5619 11.9188 20 13.3333 20H18.6667C20.0812 20 21.4377 20.5619 22.4379 21.5621C23.4381 22.5623 24 23.9188 24 25.3333V28" stroke="#2C3E50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath id="clip0_1588_5083">
                                                                <rect width="32" height="32" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg>
                                                                

                                                        <span>{{__('My Account') }}</span>
                                                        </a>
                                                    </li>
                                                    @if (auth()->user()->role()->slug == 'super-admin')
                                                        <li class="flex">
                                                            <a href="{{ route('dashboard') }}" target="_blank" class="inline-flex items-center w-full px-2 py-1 text-sm transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                                                <svg class="w-4 h-4 mr-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22 2H13V4H18.5858L10.2929 12.2929C9.90237 12.6834 9.90237 13.3166 10.2929 13.7071C10.6834 14.0976 11.3166 14.0976 11.7071 13.7071L20 5.41421V11H22V2Z" fill="#898989"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.90036 5.04616C7.39907 5.00096 8.04698 5 9 5C9.55228 5 10 4.55229 10 4C10 3.44772 9.55228 3 9 3L8.95396 3C8.05849 2.99998 7.31952 2.99997 6.71983 3.05432C6.09615 3.11085 5.52564 3.23242 5 3.5359C4.39192 3.88697 3.88697 4.39192 3.5359 5C3.23242 5.52564 3.11085 6.09615 3.05432 6.71983C2.99997 7.31953 2.99998 8.05851 3 8.95399V14.0705C2.99996 15.4247 2.99993 16.5413 3.11875 17.4251C3.24349 18.3529 3.51546 19.1723 4.17157 19.8284C4.82768 20.4845 5.64711 20.7565 6.57494 20.8813C7.4587 21.0001 8.57532 21 9.92945 21H15.046C15.9415 21 16.6805 21 17.2802 20.9457C17.9039 20.8892 18.4744 20.7676 19 20.4641C19.6081 20.113 20.113 19.6081 20.4641 19C20.7676 18.4744 20.8891 17.9039 20.9457 17.2802C21 16.6805 21 15.9415 21 15.046L21 15C21 14.4477 20.5523 14 20 14C19.4477 14 19 14.4477 19 15C19 15.953 18.999 16.6009 18.9538 17.0996C18.9099 17.5846 18.8305 17.8295 18.732 18C18.5565 18.304 18.304 18.5565 18 18.7321C17.8295 18.8305 17.5846 18.9099 17.0996 18.9538C16.6009 18.999 15.953 19 15 19H10C8.55752 19 7.57625 18.9979 6.84143 18.8991C6.13538 18.8042 5.80836 18.6368 5.58579 18.4142C5.36321 18.1916 5.19584 17.8646 5.10092 17.1586C5.00212 16.4237 5 15.4425 5 14V9C5 8.04698 5.00096 7.39908 5.04616 6.90036C5.09011 6.41539 5.1695 6.17051 5.26795 6C5.44348 5.69596 5.69596 5.44349 6 5.26795C6.17051 5.16951 6.41539 5.09011 6.90036 5.04616Z" fill="#898989"/>
                                                                </svg>
                                                            <span class="break-all">{{ __('Admin Panel') }}</span>
                                                            </a>
                                                        </li>
                                                    @endif

                                                    @if (auth()->user()->role()->slug == 'super-admin' || (auth()->user()->role()->slug == 'vendor-admin' && optional(auth()->user()->vendors()->first())->status == 'Active'))
                                                        <li class="flex">
                                                            <a href="{{ route('vendor-dashboard') }}" target="_blank" class="inline-flex items-center w-full px-2 py-1 text-sm transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                                                <svg class="w-4 h-4 mr-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22 2H13V4H18.5858L10.2929 12.2929C9.90237 12.6834 9.90237 13.3166 10.2929 13.7071C10.6834 14.0976 11.3166 14.0976 11.7071 13.7071L20 5.41421V11H22V2Z" fill="#898989"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.90036 5.04616C7.39907 5.00096 8.04698 5 9 5C9.55228 5 10 4.55229 10 4C10 3.44772 9.55228 3 9 3L8.95396 3C8.05849 2.99998 7.31952 2.99997 6.71983 3.05432C6.09615 3.11085 5.52564 3.23242 5 3.5359C4.39192 3.88697 3.88697 4.39192 3.5359 5C3.23242 5.52564 3.11085 6.09615 3.05432 6.71983C2.99997 7.31953 2.99998 8.05851 3 8.95399V14.0705C2.99996 15.4247 2.99993 16.5413 3.11875 17.4251C3.24349 18.3529 3.51546 19.1723 4.17157 19.8284C4.82768 20.4845 5.64711 20.7565 6.57494 20.8813C7.4587 21.0001 8.57532 21 9.92945 21H15.046C15.9415 21 16.6805 21 17.2802 20.9457C17.9039 20.8892 18.4744 20.7676 19 20.4641C19.6081 20.113 20.113 19.6081 20.4641 19C20.7676 18.4744 20.8891 17.9039 20.9457 17.2802C21 16.6805 21 15.9415 21 15.046L21 15C21 14.4477 20.5523 14 20 14C19.4477 14 19 14.4477 19 15C19 15.953 18.999 16.6009 18.9538 17.0996C18.9099 17.5846 18.8305 17.8295 18.732 18C18.5565 18.304 18.304 18.5565 18 18.7321C17.8295 18.8305 17.5846 18.9099 17.0996 18.9538C16.6009 18.999 15.953 19 15 19H10C8.55752 19 7.57625 18.9979 6.84143 18.8991C6.13538 18.8042 5.80836 18.6368 5.58579 18.4142C5.36321 18.1916 5.19584 17.8646 5.10092 17.1586C5.00212 16.4237 5 15.4425 5 14V9C5 8.04698 5.00096 7.39908 5.04616 6.90036C5.09011 6.41539 5.1695 6.17051 5.26795 6C5.44348 5.69596 5.69596 5.44349 6 5.26795C6.17051 5.16951 6.41539 5.09011 6.90036 5.04616Z" fill="#898989"/>
                                                                </svg>
                                                            <span>{{ __('Vendor Panel') }}</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                    <li class="flex">
                                                        <a href="{{ route('site.logout') }}" class="inline-flex items-center w-full px-2 py-1 text-sm transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                                            <svg class="w-4 h-4 mr-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9498 5.63603C17.3403 5.24551 17.9734 5.24551 18.364 5.63603C19.6226 6.89471 20.4798 8.49835 20.8271 10.2442C21.1743 11.99 20.9961 13.7996 20.3149 15.4441C19.6337 17.0887 18.4802 18.4943 17.0001 19.4832C15.5201 20.4722 13.78 21 12 21C10.22 21 8.47991 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4441C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49835 4.37737 6.89471 5.63604 5.63603C6.02657 5.24551 6.65973 5.24551 7.05026 5.63603C7.44078 6.02656 7.44078 6.65972 7.05026 7.05025C6.07129 8.02921 5.4046 9.2765 5.13451 10.6344C4.86441 11.9922 5.00303 13.3997 5.53285 14.6788C6.06266 15.9579 6.95987 17.0511 8.11101 17.8203C9.26216 18.5895 10.6155 19 12 19C13.3845 19 14.7379 18.5895 15.889 17.8203C17.0401 17.0511 17.9373 15.9579 18.4672 14.6788C18.997 13.3997 19.1356 11.9922 18.8655 10.6344C18.5954 9.27649 17.9287 8.02921 16.9498 7.05025C16.5592 6.65972 16.5592 6.02656 16.9498 5.63603Z" fill="#898989"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C12.5523 3 13 3.44772 13 4L13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8L11 4C11 3.44772 11.4477 3 12 3Z" fill="#898989"/>
                                                            </svg>
                                                            <span>{{ __('Logout') }}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- user dropdown end -->
                                @else
                                    <!-- unauthenticated -->
                                    <div class="flex flex-col justify-center items-center cursor-pointer open-login-modal mt-2 px-2">
                                        <img src="http://dev.samvalley.co/public/uploads/20230719/person_2.svg" alt="">
                                            
                                    </div>
                                @endauth
                            </li>
                        @endif

                   

                        @if (isset($header['main']['show_cart']) && $header['main']['show_cart'] == 1)
                            <li class="hidden md:block absolute right-5 bottom-97p md:relative md:right-0 md:bottom-0 px-2 py-2">
                                <div x-data="setup()" id="testing" class="md:my-2 mt-4">
                                    <div>
                                        <form action="#">
                                        </form>
                                        <div class="items-center sm:flex">
                                            <button @click="isSettingsPanelOpen = true" class="rounded-md">
                                                <div class="flex flex-col justify-center lg:mr-0 items-center">
                                                    <div slot="icon" class="relative">
                                                        <div class="flex justify-center">
                                                            <div>
                                                                <div class="absolute text-xss roboto-medium flex items-center justify-center rounded-full h-4 w-4 ml-3 -mt-1.5 bg-reds-3 text-white {{ $carts->count() == 0 ? 'display-none' : null }}" id="totalCartItem">
                                                                    {{ $carts->count() }}
                                                                </div>
                                                            </div>
                                                            <img src="http://dev.samvalley.co/public/uploads/20230719/shopping_cart.svg" alt="">

                                                                
                                                        </div>
                                                      
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Backdrop -->
                                    <div x-show="isSettingsPanelOpen"
                                        class="fixed inset-0 bg-black bg-opacity-50 hideme hidden"
                                        @click="isSettingsPanelOpen = false" aria-hidden="false">
                                    </div>
                                    <section x-transition:enter="transform transition-transform duration-300"
                                        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                                        x-transition:leave="transform transition-transform duration-300"
                                        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                                        x-show="isSettingsPanelOpen"
                                        class="fixed inset-y-0 right-0 w-318p xxs:w-400p sm:w-400p bg-white hideme hidden z-50">
                                        <div class="relative h-screen">
                                            <div class="px-30p">
                                                <div class="w-full flex justify-between items-center relative border-b border-gray-2">
                                                    <div class="flex items-center">
                                                        <span class="mr-2 text-gray-12">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.95145 10.8918C5.39254 10.8918 4.93945 10.4388 4.93945 9.87985L4.93945 5.83186C4.93945 3.03731 7.20488 0.771874 9.99944 0.771875C12.794 0.771874 15.0594 3.03731 15.0594 5.83186L15.0594 9.87985C15.0594 10.4388 14.6063 10.8918 14.0474 10.8918C13.4885 10.8918 13.0354 10.4388 13.0354 9.87985L13.0354 5.83186C13.0354 4.15513 11.6762 2.79587 9.99944 2.79587C8.32271 2.79587 6.96345 4.15513 6.96345 5.83186L6.96345 9.87985C6.96345 10.4388 6.51036 10.8918 5.95145 10.8918Z" fill="currentColor"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.56553 5.83203C5.58652 5.83203 5.60758 5.83204 5.62871 5.83204L14.4345 5.83203C15.2643 5.83199 15.9829 5.83194 16.5631 5.90728C17.1867 5.98826 17.7854 6.17025 18.2893 6.6339C18.7932 7.09754 19.0243 7.67906 19.1568 8.29382C19.28 8.86574 19.3397 9.58182 19.4085 10.4088L19.9338 16.7119C19.9354 16.7312 19.937 16.7505 19.9386 16.7698C19.9773 17.2323 20.0145 17.6776 19.9944 18.0458C19.9719 18.4585 19.8723 18.9392 19.4976 19.3465C19.1228 19.7538 18.6521 19.8929 18.2426 19.9496C17.8773 20.0002 17.4305 20.0001 16.9665 20C16.9471 20 16.9277 20 16.9083 20H3.0917C3.07229 20 3.05291 20 3.03355 20C2.56948 20.0001 2.12265 20.0002 1.75736 19.9496C1.34793 19.8929 0.877202 19.7538 0.502445 19.3465C0.127687 18.9392 0.0281424 18.4585 0.00563022 18.0458C-0.0144547 17.6776 0.0227368 17.2323 0.0613632 16.7698C0.0629743 16.7505 0.0645879 16.7312 0.0661998 16.7119L0.586205 10.4718C0.58796 10.4508 0.589708 10.4298 0.59145 10.4088C0.66032 9.58183 0.719952 8.86574 0.843213 8.29382C0.975704 7.67906 1.20678 7.09754 1.71067 6.6339C2.21456 6.17025 2.81326 5.98826 3.4369 5.90728C4.01708 5.83194 4.73565 5.83199 5.56553 5.83203ZM3.69753 7.91443C3.29198 7.96709 3.15822 8.05239 3.08114 8.12332C3.00406 8.19424 2.90794 8.32045 2.82178 8.72023C2.72951 9.14838 2.67888 9.73178 2.60321 10.6399L2.0832 16.88C2.03799 17.4225 2.01511 17.7246 2.02662 17.9356C2.02677 17.9383 2.02692 17.941 2.02708 17.9436C2.02968 17.944 2.03234 17.9443 2.03505 17.9447C2.24432 17.9737 2.54726 17.976 3.0917 17.976H16.9083C17.4527 17.976 17.7557 17.9737 17.9649 17.9447C17.9677 17.9443 17.9703 17.944 17.9729 17.9436C17.9731 17.941 17.9732 17.9383 17.9734 17.9356C17.9849 17.7246 17.962 17.4225 17.9168 16.88L17.3968 10.6399C17.3211 9.73178 17.2705 9.14838 17.1782 8.72023C17.0921 8.32045 16.9959 8.19424 16.9189 8.12332C16.8418 8.05239 16.708 7.96709 16.3025 7.91443C15.8681 7.85803 15.2826 7.85603 14.3713 7.85603H5.62871C4.71745 7.85603 4.13186 7.85803 3.69753 7.91443Z" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                        <h3 class="dm-bold font-bold text-22">{{ __('Shopping Cart') }}</h3>
                                                    </div>
                                                    <div class="flex items-center relative z-50">
                                                        <button @click="isSettingsPanelOpen = false" class="flex text-2xl items-center justify-center   ml-2 py-6 lg:py-7 focus:outline-none transition-opacity hover:opacity-60" aria-label="close">
                                                            <span class="dm-sans font-medium text-gray-10 text-base">{{ __('Close') }}</span>
                                                            <span class="text-gray-10 pl-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 15 10" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1016 0L8.62991 1.50221L11.016 3.93778H1.04064C0.46591 3.93778 0 4.41335 0 5C0 5.58665 0.46591 6.06222 1.04064 6.06222H11.016L8.62991 8.49779L10.1016 10L15 5L10.1016 0Z" fill="currentColor"/>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- Empty Card -->
                                                <div id="emptyCart" class="flex flex-col items-center justify-center absolute inset-0">
                                                    <div class="flex justify-center items-center rounded-full">
                                                        <span class="text-gray-10 text-4xl block">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="36" viewBox="0 0 31 36" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.38222 6.84833C3.93638 7.30009 3.87492 7.60249 3.87492 7.74983C3.87492 7.89717 3.93638 8.19958 4.38222 8.65133C4.83629 9.11141 5.58938 9.61461 6.67294 10.079C8.83316 11.0048 11.9525 11.6247 15.4997 11.6247C19.0468 11.6247 22.1662 11.0048 24.3264 10.079C25.4099 9.61461 26.163 9.11141 26.6171 8.65133C27.0629 8.19958 27.1244 7.89717 27.1244 7.74983C27.1244 7.60249 27.0629 7.30009 26.6171 6.84833C26.163 6.38825 25.4099 5.88505 24.3264 5.42067C22.1662 4.49486 19.0468 3.87492 15.4997 3.87492C11.9525 3.87492 8.83316 4.49486 6.67294 5.42067C5.58938 5.88505 4.83629 6.38825 4.38222 6.84833ZM5.14653 1.85906C7.89486 0.681202 11.5566 0 15.4997 0C19.4427 0 23.1045 0.681202 25.8528 1.85906C27.2235 2.44651 28.4566 3.19577 29.3751 4.12645C30.3018 5.06547 30.9993 6.29213 30.9993 7.74983C30.9993 9.20753 30.3018 10.4342 29.3751 11.3732C28.4566 12.3039 27.2235 13.0532 25.8528 13.6406C23.1045 14.8185 19.4427 15.4997 15.4997 15.4997C11.5566 15.4997 7.89486 14.8185 5.14653 13.6406C3.77582 13.0532 2.54277 12.3039 1.62426 11.3732C0.697534 10.4342 0 9.20753 0 7.74983C0 6.29213 0.697534 5.06547 1.62426 4.12645C2.54277 3.19577 3.77582 2.44651 5.14653 1.85906Z" fill="#898989"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.59121 5.84409C2.64398 5.65267 3.65259 6.35094 3.844 7.40371L7.60672 28.0987C12.0728 32.1731 18.9272 32.1731 23.3933 28.0987L27.156 7.40371C27.3474 6.35094 28.356 5.65267 29.4088 5.84409C30.4616 6.0355 31.1598 7.04411 30.9684 8.09688L27.1008 29.3686C27.0256 29.7826 26.8258 30.1638 26.5283 30.4613C20.4375 36.5521 10.5625 36.5521 4.47173 30.4613C4.17418 30.1638 3.97444 29.7826 3.89916 29.3686L0.0315873 8.09688C-0.159825 7.04411 0.538442 6.0355 1.59121 5.84409Z" fill="#898989"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <h3 class="dm-sans font-medium text-gray-10 text-xl pt-2">{{ __('Your cart is empty') }}</h3>
                                                    <p class="px-12 text-center roboto-regular font-normal text-13 text-gray-10 pt-2">{{ __('No items added in your cart. Please add product to your cart list.') }}</p>
                                                </div>
                                                <!-- Empty Card End -->
                                            </div>
                                            <div>

                                            </div>
                                            <div class="w-full px-30p padding-bottom-150p h-60s scrollbar-w-2 overflow-auto mt-10p" id="cart-header">
                                                @forelse ($carts as $key => $cart)
                                                    <div class="flex cursor-pointer border-gray-100 cart-item-header mt-6"
                                                        id="cart-item-header-{{ $key }}">
                                                        <div class="h-72p w-24 border border-gray-2 rounded">
                                                            <img src="{{ $cart['photo'] ?? '' }}" class="h-full w-full p-0.5 object-cover" alt="img product">
                                                        </div>
                                                        <div class="flex flex-col justify-center text-sm w-64 ml-1">
                                                            <a href="{{ route('site.productDetails', ['slug' => $cart['type'] == 'Variable Product' ? $cart['parent_slug'] : $cart['slug']]) }}"><div class="dm-sans font-medium text-gray-12 text-18 pb-2">{{ trimWords($cart['name'],16)}}</div></a>
                                                            <div class="cart-item-quantity roboto-medium font-medium text-gray-10 text-base leading-5">{{
                                                                $cart['quantity'] }} X {{
                                                                formatCurrencyAmount($cart['price']) }}
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-col w-18 font-medium justify-center ml-10">
                                                            <a href="javascript:void(0)"
                                                                class="w-4 h-4 rounded-full cursor-pointer text-red-700 delete-cart-item"
                                                                data-index="{{ $key }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.455612 0.455612C1.06309 -0.151871 2.04802 -0.151871 2.6555 0.455612L11.9888 9.78895C12.5963 10.3964 12.5963 11.3814 11.9888 11.9888C11.3814 12.5963 10.3964 12.5963 9.78895 11.9888L0.455612 2.6555C-0.151871 2.04802 -0.151871 1.06309 0.455612 0.455612Z" fill="#898989"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9897 0.455612C11.3822 -0.151871 10.3973 -0.151871 9.78981 0.455612L0.45648 9.78895C-0.151003 10.3964 -0.151003 11.3814 0.45648 11.9888C1.06396 12.5963 2.04889 12.5963 2.65637 11.9888L11.9897 2.6555C12.5972 2.04802 12.5972 1.06309 11.9897 0.455612Z" fill="#898989"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @empty
                                                @endforelse

                                                @php
                                                    $totalPrice = $carts->sum(function ($carts) {
                                                        return $carts['price'] * $carts['quantity'];
                                                    });
                                                @endphp
                                                <div class="absolute justify-center bg-white flex flex-col inset-x-0 px-30p mt-30p bottom-5">
                                                    <div class="border-t border-gray-2">
                                                        <div class="pt-4 pb-30p flex justify-between dm-sans font-medium text-gray-12 text-22">
                                                            <p>{{ __('Subtotal') }}:</p>
                                                            <p id="cart-item-total-price">{{ formatNumber($totalPrice)}}</p>
                                                        </div>
                                                        @if ($totalPrice > 0)
                                                            <div id="view-cart-display" class="bg-white text-gray-12 border border-gray-2 p-2 w-full rounded mb-10p">
                                                                <a href="{{ route('site.cart') }}" class="flex justify-center px-4 py-2 rounded font-bold cursor-pointer dm-bold text-18">
                                                                {{ __('View Cart') }}
                                                                </a>
                                                            </div>
                                                        @endif
                                                        <div id="checkout-display" class="{{ $totalPrice > 0 ? 'bg-gray-12 text-white' : 'text-gray-10 bg-gray-11'}} mb-30p p-2 w-full rounded">
                                                            <a href="{{ $totalPrice > 0 ? route('site.checkOut',['select' => 'all']) : 'javascript:void(0)' }}" class="flex justify-center px-4 py-2 font-bold cursor-pointer dm-bold text-18">{{ __('Go to Checkout') }}</a>
                                                        </div>
                                                        @if ($totalPrice > 0)
                                                            <div class="text-gray-10 mt-5" aria-label="Clear All" id="cart_clear_all">
                                                                <div id="clear-all-display" class="flex justify-center items-center cursor-pointer">
                                                                    <p class="mr-2 dm-sans font-medium text-gray-10">
                                                                        {{ __('Clear All') }}
                                                                    </p>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16" fill="none">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.83333 11.6667C5.3731 11.6667 5 11.2937 5 10.8334L5 8.33341C5 7.87318 5.3731 7.50008 5.83333 7.50008C6.29357 7.50008 6.66667 7.87318 6.66667 8.33341L6.66667 10.8334C6.66667 11.2937 6.29357 11.6667 5.83333 11.6667Z" fill="#898989"/>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.16732 11.6667C8.70708 11.6667 8.33398 11.2937 8.33398 10.8334L8.33398 8.33341C8.33398 7.87318 8.70708 7.50008 9.16732 7.50008C9.62755 7.50008 10.0007 7.87318 10.0007 8.33341L10.0007 10.8334C10.0007 11.2937 9.62756 11.6667 9.16732 11.6667Z" fill="#898989"/>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.8552 5.01385C0.657717 5.00037 0.399686 4.99992 0 4.99992V3.33325C0.00891358 3.33325 0.0177978 3.33325 0.0266526 3.33325C0.0445462 3.33325 0.0623196 3.33325 0.0799725 3.33325H14.92C14.9377 3.33325 14.9555 3.33325 14.9733 3.33325L15 3.33325V4.99992C14.6003 4.99992 14.3423 5.00037 14.1448 5.01385C13.9548 5.02681 13.8824 5.04899 13.8478 5.06335C13.6436 5.14793 13.4813 5.31016 13.3968 5.51435C13.3824 5.54903 13.3602 5.62139 13.3473 5.81139C13.3338 6.00887 13.3333 6.2669 13.3333 6.66659L13.3333 11.7214C13.3334 12.4602 13.3334 13.0967 13.2649 13.6064C13.1914 14.1527 13.0258 14.6763 12.6011 15.101C12.1764 15.5257 11.6528 15.6914 11.1065 15.7648C10.5968 15.8333 9.96027 15.8333 9.22153 15.8333H5.77847C5.03973 15.8333 4.40322 15.8333 3.89351 15.7648C3.34724 15.6914 2.82362 15.5257 2.3989 15.101C1.97418 14.6763 1.80856 14.1527 1.73512 13.6064C1.66659 13.0967 1.66662 12.4602 1.66666 11.7214L1.66667 6.66659C1.66667 6.2669 1.66622 6.00887 1.65274 5.81139C1.63978 5.62139 1.6176 5.54903 1.60323 5.51435C1.51865 5.31016 1.35643 5.14793 1.15224 5.06335C1.11756 5.04899 1.0452 5.02681 0.8552 5.01385ZM11.8107 4.99992H3.18933C3.26749 5.23126 3.29962 5.46462 3.31554 5.69793C3.33335 5.95898 3.33334 6.27439 3.33333 6.63993L3.33333 11.6666C3.33333 12.4758 3.3351 12.9989 3.38692 13.3843C3.43552 13.7458 3.51397 13.8591 3.57741 13.9225C3.64085 13.9859 3.75414 14.0644 4.11559 14.113C4.50101 14.1648 5.0241 14.1666 5.83333 14.1666H9.16667C9.9759 14.1666 10.499 14.1648 10.8844 14.113C11.2459 14.0644 11.3592 13.9859 11.4226 13.9225C11.486 13.8591 11.5645 13.7458 11.6131 13.3843C11.6649 12.9989 11.6667 12.4758 11.6667 11.6666V6.63993C11.6667 6.27439 11.6666 5.95898 11.6845 5.69793C11.7004 5.46462 11.7325 5.23126 11.8107 4.99992Z" fill="#898989"/>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.67175 0.101025C8.31844 0.0332505 7.90785 0 7.50015 0C7.09245 4.96705e-08 6.68185 0.0332505 6.32855 0.101025C6.15192 0.134907 5.979 0.179406 5.82234 0.238021C5.68005 0.291261 5.48597 0.37965 5.32178 0.532849C4.98526 0.84682 4.96699 1.37414 5.28096 1.71065C5.57723 2.0282 6.06348 2.06237 6.40011 1.8014C6.40204 1.80065 6.40412 1.79985 6.40639 1.799C6.45085 1.78237 6.52809 1.7598 6.64254 1.73785C6.87139 1.69395 7.17407 1.66667 7.50015 1.66667C7.82623 1.66667 8.12891 1.69395 8.35775 1.73785C8.4722 1.7598 8.54944 1.78237 8.59391 1.799C8.59617 1.79985 8.59826 1.80065 8.60018 1.8014C8.93681 2.06237 9.42306 2.0282 9.71933 1.71065C10.0333 1.37414 10.015 0.846819 9.67852 0.532848C9.51432 0.37965 9.32025 0.29126 9.17795 0.23802C9.02129 0.179405 8.84837 0.134907 8.67175 0.101025Z" fill="#898989"/>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </li>
                        @endif

                        {{-- @if (isset($header['main']['show_track']) && $header['main']['show_track'] == 1)
                            <li class="hidden md:block ml-1">
                                <a href="{{ route('site.trackOrder') }}" class="relative py-2 block w-fill ">
                                    <div slot="icon" class="relative flex flex-col justify-center items-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3.66667C7.39763 3.66667 3.66667 7.39763 3.66667 12C3.66667 16.6024 7.39763 20.3333 12 20.3333C16.6024 20.3333 20.3333 16.6024 20.3333 12C20.3333 7.39763 16.6024 3.66667 12 3.66667ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z" fill="{{ $header['main']['text_color'] }}"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.7559 7.2441C16.9791 7.46729 17.0571 7.79743 16.9573 8.09688L14.8739 14.3469C14.791 14.5957 14.5957 14.791 14.3469 14.8739L8.09688 16.9573C7.79743 17.0571 7.46729 16.9791 7.2441 16.7559C7.02091 16.5328 6.94297 16.2026 7.04279 15.9032L9.12612 9.65317C9.20907 9.40433 9.40433 9.20907 9.65317 9.12612L15.9032 7.04279C16.2026 6.94297 16.5328 7.02091 16.7559 7.2441ZM10.5755 10.5755L9.15097 14.8491L13.4245 13.4245L14.8491 9.15097L10.5755 10.5755Z" fill="{{ $header['main']['text_color'] }}"/>
                                        </svg>

                                        <p style="color: {{ $header['main']['text_color'] }}" class="text-xs text-xss font-medium roboto-medium text-center mt-2 leading-3">{{ __('Track Order') }}</p>
                                    </div>
                                </a>
                            </li>
                        @endif --}}
                    </ul>
                </div>
            </div>
            <div class="md:hidden  items-center inline-block align-middle bg-no-repeat bg-center">
                <button class="outline-none mobile-menu-button ">
                    <svg
                        class="w-6 h-6 text-white "
                        x-show="!showMenu"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            <!-- mobile menu -->
			<div class="hidden mobile-menu  items-center">
                <div class="px-2 pt-2 pb-3 space-y-1 mt-5">
                <ul class=" -pt-5 rounded-lg absolute  max-w-96  right-1  verflow-hidden  overflow-y-auto" style="background-color: #201A19;">
                    <li class="flex px-2 py-2 ml-10">
                        <a href="#" class="flex w-fill px-3 py-2">
                         <i class="fa fa-caret-down mr-2" style="color: #FFFBFF"></i>
                            <img src="http://dev.samvalley.co/public/uploads/20230719/sa-circle-flag.svg" alt="">

                                
                                
                            {{-- <img src="http://dev.samvalley.co/public/uploads/20230718/0276e94b62afa1cfd882be0702c95e43.png" alt=""> --}}
                            {{-- <span class="text-xs rtl-direction-space ml-7p mt-1.5">{{ currency()->name }}</span> --}}
                        </a>
                    </li>
                    <li class="flex relative  mt-2 items-center ml-10 px-2 py-2 text-black text-base font-medium">
                        @php
                        $languages = \App\Models\Language::getAll()->where('status', 'Active');
                        @endphp
                        @php
                        $langData = Cache::get(config('cache.prefix') . '-user-language-' . optional(Auth::guard('user')->user())->id);
                        if (!auth()->user()) {
                        $langData = Cache::get(config('cache.prefix') . '-guest-language-' . request()->server('HTTP_USER_AGENT'));
                        }
                        if (empty($langData)) {
                        $langData = preference('dflt_lang');
                        }
                        @endphp
                        <div id="directionSwitch" class="dropdown rounded shadow-none relative lang-dropdown lang flex flex-col justify-center items-center" data-value={{ $languages->
                            where('short_name', $langData)->first()->direction }}>
                            <div class="select flex justify-between items-center lang-p">
                                
                                <p class="msg roboto-medium msg-color mr-1.5">
                                    <img src="http://dev.samvalley.co/public/uploads/20230719/translate.svg" alt="">
                                    {{ $languages->where('short_name', $langData)->first()->name }}
                                 </p>
                                
                            </div>
                            <input type="hidden" name="Showing" value="English">
                            <ul class="dropdown-menu language-dropdown border border-gray-11 -right-2 top-30p">
                                @foreach ($languages as $language)
                                <li id="{{ $language->name }}"
                                    class="Showing lang-change text-gray-10 {{ $langData == $language->short_name ? ' primary-bg-color text-gray-12' : '' }}">
                                    <a class="roboto-medium text-xs text-left lang" data-short_name="{{ $language->short_name }}">
                                        {{ $language->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </li>
                <li class="flex px-2 py-2 ml-10">
                    <div class="block justify-center items-center">

                        <a href="{{ route('site.wishlist') }}" class="md:px-2 lg:px-0 py-2 block w-fill">
                            <div slot="icon" class="relative">
                                @php
                                $class = \App\Models\User::totalWishlist() != 0 ? 'h-4 w-4' : '';
                                @endphp
                                <div class="flex justify-center">
                                    
                                    <img src="http://dev.samvalley.co/public/uploads/20230719/install_mobile.svg" alt="">
                                </div>
                              
                            </div>
                        </a>
                    </div>
                </li>
                
                    @if (isset($header['main']['show_account']) && $header['main']['show_account'] == 1)
                        <li class="flex px-1 py-2 ml-10">
                            @php
                                if (!auth()->user()) {
                                    $ckname = explode("_", Auth::getRecallerName())[2];
                                    $value = Cookie::get($ckname);
                                    if (!is_null($value)) {
                                        $rememberedUser = explode(".", explode($ckname, decrypt($value))[1]);
                                        if ($rememberedUser[1] == 'user' && Auth::guard('user')->loginUsingId($rememberedUser[0]))
                                        {
                                            $ckkey = encrypt($ckname . Auth::user()->id . ".user");
                                            Cookie::queue($ckname, $ckkey, 2592000);
                                        }
                                    }
                                }
                            @endphp

                            @auth
                                <!--user dropdown start-->
                                <div class="relative inline-block mt-2">
                                    <div class="relative text-sm">
                                      <div class="flex flex-col justify-center items-center">
                                        <button id="userButton" class="flex items-center focus:outline-none ">
                                            <div class="flex flex-col justify-center bg-gray-100 items-center h-7 w-7 rounded-full pink-blue dark:text-gray-2 hover:text-purple-500 cursor-pointer">
                                                <img class="h-7 w-7 rounded-full pink-blue dark:text-gray-2 hover:text-purple-500 cursor-pointer" src="{{ Auth::user()->fileUrl() }}" alt="Avatar of User">
                                            </div>

                                        </button>
                                        <p style="color: {{ $header['main']['text_color'] }}" class="text-xs text-xss font-medium roboto-medium text-center mt-1 leading-3">
                                            @auth
                                                {{ trimWords(Auth::user()->name, 13) }}
                                            @endauth
                                        </p>

                                      </div>
                                      
                                        <div id="userMenu" class="absolute right-0 w-40 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700 overflow-auto   invisible">
                                            <ul class="list-reset text-gray-600">
                                                <li class="flex">
                                                    <a href="{{ route('site.dashboard') }}" class="inline-flex items-center w-full px-2 py-1 text-sm transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_1588_5083)">
                                                            <path d="M10.667 9.33333C10.667 10.7478 11.2289 12.1044 12.2291 13.1046C13.2293 14.1048 14.5858 14.6667 16.0003 14.6667C17.4148 14.6667 18.7714 14.1048 19.7716 13.1046C20.7718 12.1044 21.3337 10.7478 21.3337 9.33333C21.3337 7.91885 20.7718 6.56229 19.7716 5.5621C18.7714 4.5619 17.4148 4 16.0003 4C14.5858 4 13.2293 4.5619 12.2291 5.5621C11.2289 6.56229 10.667 7.91885 10.667 9.33333Z" stroke="#2C3E50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M8 28V25.3333C8 23.9188 8.5619 22.5623 9.5621 21.5621C10.5623 20.5619 11.9188 20 13.3333 20H18.6667C20.0812 20 21.4377 20.5619 22.4379 21.5621C23.4381 22.5623 24 23.9188 24 25.3333V28" stroke="#2C3E50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </g>
                                                            <defs>
                                                            <clipPath id="clip0_1588_5083">
                                                            <rect width="32" height="32" fill="white"/>
                                                            </clipPath>
                                                            </defs>
                                                            </svg>
                                                            

                                                    <span>{{__('My Account') }}</span>
                                                    </a>
                                                </li>
                                                @if (auth()->user()->role()->slug == 'super-admin')
                                                    <li class="flex">
                                                        <a href="{{ route('dashboard') }}" target="_blank" class="inline-flex items-center w-full px-2 py-1 text-sm transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                                            <svg class="w-4 h-4 mr-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22 2H13V4H18.5858L10.2929 12.2929C9.90237 12.6834 9.90237 13.3166 10.2929 13.7071C10.6834 14.0976 11.3166 14.0976 11.7071 13.7071L20 5.41421V11H22V2Z" fill="#898989"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.90036 5.04616C7.39907 5.00096 8.04698 5 9 5C9.55228 5 10 4.55229 10 4C10 3.44772 9.55228 3 9 3L8.95396 3C8.05849 2.99998 7.31952 2.99997 6.71983 3.05432C6.09615 3.11085 5.52564 3.23242 5 3.5359C4.39192 3.88697 3.88697 4.39192 3.5359 5C3.23242 5.52564 3.11085 6.09615 3.05432 6.71983C2.99997 7.31953 2.99998 8.05851 3 8.95399V14.0705C2.99996 15.4247 2.99993 16.5413 3.11875 17.4251C3.24349 18.3529 3.51546 19.1723 4.17157 19.8284C4.82768 20.4845 5.64711 20.7565 6.57494 20.8813C7.4587 21.0001 8.57532 21 9.92945 21H15.046C15.9415 21 16.6805 21 17.2802 20.9457C17.9039 20.8892 18.4744 20.7676 19 20.4641C19.6081 20.113 20.113 19.6081 20.4641 19C20.7676 18.4744 20.8891 17.9039 20.9457 17.2802C21 16.6805 21 15.9415 21 15.046L21 15C21 14.4477 20.5523 14 20 14C19.4477 14 19 14.4477 19 15C19 15.953 18.999 16.6009 18.9538 17.0996C18.9099 17.5846 18.8305 17.8295 18.732 18C18.5565 18.304 18.304 18.5565 18 18.7321C17.8295 18.8305 17.5846 18.9099 17.0996 18.9538C16.6009 18.999 15.953 19 15 19H10C8.55752 19 7.57625 18.9979 6.84143 18.8991C6.13538 18.8042 5.80836 18.6368 5.58579 18.4142C5.36321 18.1916 5.19584 17.8646 5.10092 17.1586C5.00212 16.4237 5 15.4425 5 14V9C5 8.04698 5.00096 7.39908 5.04616 6.90036C5.09011 6.41539 5.1695 6.17051 5.26795 6C5.44348 5.69596 5.69596 5.44349 6 5.26795C6.17051 5.16951 6.41539 5.09011 6.90036 5.04616Z" fill="#898989"/>
                                                            </svg>
                                                        <span class="break-all">{{ __('Admin Panel') }}</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                @if (auth()->user()->role()->slug == 'super-admin' || (auth()->user()->role()->slug == 'vendor-admin' && optional(auth()->user()->vendors()->first())->status == 'Active'))
                                                    <li class="flex">
                                                        <a href="{{ route('vendor-dashboard') }}" target="_blank" class="inline-flex items-center w-full px-2 py-1 text-sm transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                                            <svg class="w-4 h-4 mr-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22 2H13V4H18.5858L10.2929 12.2929C9.90237 12.6834 9.90237 13.3166 10.2929 13.7071C10.6834 14.0976 11.3166 14.0976 11.7071 13.7071L20 5.41421V11H22V2Z" fill="#898989"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.90036 5.04616C7.39907 5.00096 8.04698 5 9 5C9.55228 5 10 4.55229 10 4C10 3.44772 9.55228 3 9 3L8.95396 3C8.05849 2.99998 7.31952 2.99997 6.71983 3.05432C6.09615 3.11085 5.52564 3.23242 5 3.5359C4.39192 3.88697 3.88697 4.39192 3.5359 5C3.23242 5.52564 3.11085 6.09615 3.05432 6.71983C2.99997 7.31953 2.99998 8.05851 3 8.95399V14.0705C2.99996 15.4247 2.99993 16.5413 3.11875 17.4251C3.24349 18.3529 3.51546 19.1723 4.17157 19.8284C4.82768 20.4845 5.64711 20.7565 6.57494 20.8813C7.4587 21.0001 8.57532 21 9.92945 21H15.046C15.9415 21 16.6805 21 17.2802 20.9457C17.9039 20.8892 18.4744 20.7676 19 20.4641C19.6081 20.113 20.113 19.6081 20.4641 19C20.7676 18.4744 20.8891 17.9039 20.9457 17.2802C21 16.6805 21 15.9415 21 15.046L21 15C21 14.4477 20.5523 14 20 14C19.4477 14 19 14.4477 19 15C19 15.953 18.999 16.6009 18.9538 17.0996C18.9099 17.5846 18.8305 17.8295 18.732 18C18.5565 18.304 18.304 18.5565 18 18.7321C17.8295 18.8305 17.5846 18.9099 17.0996 18.9538C16.6009 18.999 15.953 19 15 19H10C8.55752 19 7.57625 18.9979 6.84143 18.8991C6.13538 18.8042 5.80836 18.6368 5.58579 18.4142C5.36321 18.1916 5.19584 17.8646 5.10092 17.1586C5.00212 16.4237 5 15.4425 5 14V9C5 8.04698 5.00096 7.39908 5.04616 6.90036C5.09011 6.41539 5.1695 6.17051 5.26795 6C5.44348 5.69596 5.69596 5.44349 6 5.26795C6.17051 5.16951 6.41539 5.09011 6.90036 5.04616Z" fill="#898989"/>
                                                            </svg>
                                                        <span>{{ __('Vendor Panel') }}</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                <li class="flex">
                                                    <a href="{{ route('site.logout') }}" class="inline-flex items-center w-full px-2 py-1 text-sm transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                                        <svg class="w-4 h-4 mr-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9498 5.63603C17.3403 5.24551 17.9734 5.24551 18.364 5.63603C19.6226 6.89471 20.4798 8.49835 20.8271 10.2442C21.1743 11.99 20.9961 13.7996 20.3149 15.4441C19.6337 17.0887 18.4802 18.4943 17.0001 19.4832C15.5201 20.4722 13.78 21 12 21C10.22 21 8.47991 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4441C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49835 4.37737 6.89471 5.63604 5.63603C6.02657 5.24551 6.65973 5.24551 7.05026 5.63603C7.44078 6.02656 7.44078 6.65972 7.05026 7.05025C6.07129 8.02921 5.4046 9.2765 5.13451 10.6344C4.86441 11.9922 5.00303 13.3997 5.53285 14.6788C6.06266 15.9579 6.95987 17.0511 8.11101 17.8203C9.26216 18.5895 10.6155 19 12 19C13.3845 19 14.7379 18.5895 15.889 17.8203C17.0401 17.0511 17.9373 15.9579 18.4672 14.6788C18.997 13.3997 19.1356 11.9922 18.8655 10.6344C18.5954 9.27649 17.9287 8.02921 16.9498 7.05025C16.5592 6.65972 16.5592 6.02656 16.9498 5.63603Z" fill="#898989"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C12.5523 3 13 3.44772 13 4L13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8L11 4C11 3.44772 11.4477 3 12 3Z" fill="#898989"/>
                                                        </svg>
                                                        <span>{{ __('Logout') }}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- user dropdown end -->
                            @else
                                <!-- unauthenticated -->
                                <div class="flex flex-col justify-center items-center cursor-pointer open-login-modal mt-2 px-2">
                                    <img src="http://dev.samvalley.co/public/uploads/20230719/person_2.svg" alt="">
                                        
                                </div>
                            @endauth
                        </li>
                    @endif

               

                    @if (isset($header['main']['show_cart']) && $header['main']['show_cart'] == 1)
                        <li class="flex relative ml-10 px-2 py-2">
                            <div x-data="setup()" id="testing" class="my-2 mt-4">
                                <div>
                                    <form action="#">
                                    </form>
                                    <div class="items-center sm:flex">
                                        <button @click="isSettingsPanelOpen = true" class="rounded-md">
                                            <div class="flex flex-col justify-center lg:mr-0 items-center">
                                                <div slot="icon" class="relative">
                                                    <div class="flex justify-center">
                                                        <div>
                                                            <div class="absolute text-xss roboto-medium flex items-center justify-center rounded-full h-4 w-4 ml-3 -mt-1.5 bg-reds-3 text-white {{ $carts->count() == 0 ? 'display-none' : null }}" id="totalCartItem">
                                                                {{ $carts->count() }}
                                                            </div>
                                                        </div>
                                                        <img src="http://dev.samvalley.co/public/uploads/20230719/shopping_cart.svg" alt="">

                                                            
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                                <!-- Backdrop -->
                                <div x-show="isSettingsPanelOpen"
                                    class="fixed inset-0 bg-black bg-opacity-50 hideme hidden"
                                    @click="isSettingsPanelOpen = false" aria-hidden="false">
                                </div>
                                <section x-transition:enter="transform transition-transform duration-300"
                                    x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transform transition-transform duration-300"
                                    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                                    x-show="isSettingsPanelOpen"
                                    class="fixed inset-y-0 right-0 w-318p xxs:w-400p sm:w-400p bg-white hideme hidden z-50">
                                    <div class="relative h-screen">
                                        <div class="px-30p">
                                            <div class="w-full flex justify-between items-center relative border-b border-gray-2">
                                                <div class="flex items-center">
                                                    <span class="mr-2 text-gray-12">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.95145 10.8918C5.39254 10.8918 4.93945 10.4388 4.93945 9.87985L4.93945 5.83186C4.93945 3.03731 7.20488 0.771874 9.99944 0.771875C12.794 0.771874 15.0594 3.03731 15.0594 5.83186L15.0594 9.87985C15.0594 10.4388 14.6063 10.8918 14.0474 10.8918C13.4885 10.8918 13.0354 10.4388 13.0354 9.87985L13.0354 5.83186C13.0354 4.15513 11.6762 2.79587 9.99944 2.79587C8.32271 2.79587 6.96345 4.15513 6.96345 5.83186L6.96345 9.87985C6.96345 10.4388 6.51036 10.8918 5.95145 10.8918Z" fill="currentColor"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.56553 5.83203C5.58652 5.83203 5.60758 5.83204 5.62871 5.83204L14.4345 5.83203C15.2643 5.83199 15.9829 5.83194 16.5631 5.90728C17.1867 5.98826 17.7854 6.17025 18.2893 6.6339C18.7932 7.09754 19.0243 7.67906 19.1568 8.29382C19.28 8.86574 19.3397 9.58182 19.4085 10.4088L19.9338 16.7119C19.9354 16.7312 19.937 16.7505 19.9386 16.7698C19.9773 17.2323 20.0145 17.6776 19.9944 18.0458C19.9719 18.4585 19.8723 18.9392 19.4976 19.3465C19.1228 19.7538 18.6521 19.8929 18.2426 19.9496C17.8773 20.0002 17.4305 20.0001 16.9665 20C16.9471 20 16.9277 20 16.9083 20H3.0917C3.07229 20 3.05291 20 3.03355 20C2.56948 20.0001 2.12265 20.0002 1.75736 19.9496C1.34793 19.8929 0.877202 19.7538 0.502445 19.3465C0.127687 18.9392 0.0281424 18.4585 0.00563022 18.0458C-0.0144547 17.6776 0.0227368 17.2323 0.0613632 16.7698C0.0629743 16.7505 0.0645879 16.7312 0.0661998 16.7119L0.586205 10.4718C0.58796 10.4508 0.589708 10.4298 0.59145 10.4088C0.66032 9.58183 0.719952 8.86574 0.843213 8.29382C0.975704 7.67906 1.20678 7.09754 1.71067 6.6339C2.21456 6.17025 2.81326 5.98826 3.4369 5.90728C4.01708 5.83194 4.73565 5.83199 5.56553 5.83203ZM3.69753 7.91443C3.29198 7.96709 3.15822 8.05239 3.08114 8.12332C3.00406 8.19424 2.90794 8.32045 2.82178 8.72023C2.72951 9.14838 2.67888 9.73178 2.60321 10.6399L2.0832 16.88C2.03799 17.4225 2.01511 17.7246 2.02662 17.9356C2.02677 17.9383 2.02692 17.941 2.02708 17.9436C2.02968 17.944 2.03234 17.9443 2.03505 17.9447C2.24432 17.9737 2.54726 17.976 3.0917 17.976H16.9083C17.4527 17.976 17.7557 17.9737 17.9649 17.9447C17.9677 17.9443 17.9703 17.944 17.9729 17.9436C17.9731 17.941 17.9732 17.9383 17.9734 17.9356C17.9849 17.7246 17.962 17.4225 17.9168 16.88L17.3968 10.6399C17.3211 9.73178 17.2705 9.14838 17.1782 8.72023C17.0921 8.32045 16.9959 8.19424 16.9189 8.12332C16.8418 8.05239 16.708 7.96709 16.3025 7.91443C15.8681 7.85803 15.2826 7.85603 14.3713 7.85603H5.62871C4.71745 7.85603 4.13186 7.85803 3.69753 7.91443Z" fill="currentColor"/>
                                                        </svg>
                                                    </span>
                                                    <h3 class="dm-bold font-bold text-22">{{ __('Shopping Cart') }}</h3>
                                                </div>
                                                <div class="flex items-center relative z-50">
                                                    <button @click="isSettingsPanelOpen = false" class="flex text-2xl items-center justify-center   ml-2 py-6 lg:py-7 focus:outline-none transition-opacity hover:opacity-60" aria-label="close">
                                                        <span class="dm-sans font-medium text-gray-10 text-base">{{ __('Close') }}</span>
                                                        <span class="text-gray-10 pl-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 15 10" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1016 0L8.62991 1.50221L11.016 3.93778H1.04064C0.46591 3.93778 0 4.41335 0 5C0 5.58665 0.46591 6.06222 1.04064 6.06222H11.016L8.62991 8.49779L10.1016 10L15 5L10.1016 0Z" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Empty Card -->
                                            <div id="emptyCart" class="flex flex-col items-center justify-center absolute inset-0">
                                                <div class="flex justify-center items-center rounded-full">
                                                    <span class="text-gray-10 text-4xl block">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="36" viewBox="0 0 31 36" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.38222 6.84833C3.93638 7.30009 3.87492 7.60249 3.87492 7.74983C3.87492 7.89717 3.93638 8.19958 4.38222 8.65133C4.83629 9.11141 5.58938 9.61461 6.67294 10.079C8.83316 11.0048 11.9525 11.6247 15.4997 11.6247C19.0468 11.6247 22.1662 11.0048 24.3264 10.079C25.4099 9.61461 26.163 9.11141 26.6171 8.65133C27.0629 8.19958 27.1244 7.89717 27.1244 7.74983C27.1244 7.60249 27.0629 7.30009 26.6171 6.84833C26.163 6.38825 25.4099 5.88505 24.3264 5.42067C22.1662 4.49486 19.0468 3.87492 15.4997 3.87492C11.9525 3.87492 8.83316 4.49486 6.67294 5.42067C5.58938 5.88505 4.83629 6.38825 4.38222 6.84833ZM5.14653 1.85906C7.89486 0.681202 11.5566 0 15.4997 0C19.4427 0 23.1045 0.681202 25.8528 1.85906C27.2235 2.44651 28.4566 3.19577 29.3751 4.12645C30.3018 5.06547 30.9993 6.29213 30.9993 7.74983C30.9993 9.20753 30.3018 10.4342 29.3751 11.3732C28.4566 12.3039 27.2235 13.0532 25.8528 13.6406C23.1045 14.8185 19.4427 15.4997 15.4997 15.4997C11.5566 15.4997 7.89486 14.8185 5.14653 13.6406C3.77582 13.0532 2.54277 12.3039 1.62426 11.3732C0.697534 10.4342 0 9.20753 0 7.74983C0 6.29213 0.697534 5.06547 1.62426 4.12645C2.54277 3.19577 3.77582 2.44651 5.14653 1.85906Z" fill="#898989"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.59121 5.84409C2.64398 5.65267 3.65259 6.35094 3.844 7.40371L7.60672 28.0987C12.0728 32.1731 18.9272 32.1731 23.3933 28.0987L27.156 7.40371C27.3474 6.35094 28.356 5.65267 29.4088 5.84409C30.4616 6.0355 31.1598 7.04411 30.9684 8.09688L27.1008 29.3686C27.0256 29.7826 26.8258 30.1638 26.5283 30.4613C20.4375 36.5521 10.5625 36.5521 4.47173 30.4613C4.17418 30.1638 3.97444 29.7826 3.89916 29.3686L0.0315873 8.09688C-0.159825 7.04411 0.538442 6.0355 1.59121 5.84409Z" fill="#898989"/>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <h3 class="dm-sans font-medium text-gray-10 text-xl pt-2">{{ __('Your cart is empty') }}</h3>
                                                <p class="px-12 text-center roboto-regular font-normal text-13 text-gray-10 pt-2">{{ __('No items added in your cart. Please add product to your cart list.') }}</p>
                                            </div>
                                            <!-- Empty Card End -->
                                        </div>
                                        <div>

                                        </div>
                                        <div class="w-full px-30p padding-bottom-150p h-60s scrollbar-w-2 overflow-auto mt-10p" id="cart-header">
                                            @forelse ($carts as $key => $cart)
                                                <div class="flex cursor-pointer border-gray-100 cart-item-header mt-6"
                                                    id="cart-item-header-{{ $key }}">
                                                    <div class="h-72p w-24 border border-gray-2 rounded">
                                                        <img src="{{ $cart['photo'] ?? '' }}" class="h-full w-full p-0.5 object-cover" alt="img product">
                                                    </div>
                                                    <div class="flex flex-col justify-center text-sm w-64 ml-1">
                                                        <a href="{{ route('site.productDetails', ['slug' => $cart['type'] == 'Variable Product' ? $cart['parent_slug'] : $cart['slug']]) }}"><div class="dm-sans font-medium text-gray-12 text-18 pb-2">{{ trimWords($cart['name'],16)}}</div></a>
                                                        <div class="cart-item-quantity roboto-medium font-medium text-gray-10 text-base leading-5">{{
                                                            $cart['quantity'] }} X {{
                                                            formatCurrencyAmount($cart['price']) }}
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col w-18 font-medium justify-center ml-10">
                                                        <a href="javascript:void(0)"
                                                            class="w-4 h-4 rounded-full cursor-pointer text-red-700 delete-cart-item"
                                                            data-index="{{ $key }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.455612 0.455612C1.06309 -0.151871 2.04802 -0.151871 2.6555 0.455612L11.9888 9.78895C12.5963 10.3964 12.5963 11.3814 11.9888 11.9888C11.3814 12.5963 10.3964 12.5963 9.78895 11.9888L0.455612 2.6555C-0.151871 2.04802 -0.151871 1.06309 0.455612 0.455612Z" fill="#898989"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9897 0.455612C11.3822 -0.151871 10.3973 -0.151871 9.78981 0.455612L0.45648 9.78895C-0.151003 10.3964 -0.151003 11.3814 0.45648 11.9888C1.06396 12.5963 2.04889 12.5963 2.65637 11.9888L11.9897 2.6555C12.5972 2.04802 12.5972 1.06309 11.9897 0.455612Z" fill="#898989"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            @empty
                                            @endforelse

                                            @php
                                                $totalPrice = $carts->sum(function ($carts) {
                                                    return $carts['price'] * $carts['quantity'];
                                                });
                                            @endphp
                                            <div class="absolute justify-center bg-white flex flex-col inset-x-0 px-30p mt-30p bottom-5">
                                                <div class="border-t border-gray-2">
                                                    <div class="pt-4 pb-30p flex justify-between dm-sans font-medium text-gray-12 text-22">
                                                        <p>{{ __('Subtotal') }}:</p>
                                                        <p id="cart-item-total-price">{{ formatNumber($totalPrice)}}</p>
                                                    </div>
                                                    @if ($totalPrice > 0)
                                                        <div id="view-cart-display" class="bg-white text-gray-12 border border-gray-2 p-2 w-full rounded mb-10p">
                                                            <a href="{{ route('site.cart') }}" class="flex justify-center px-4 py-2 rounded font-bold cursor-pointer dm-bold text-18">
                                                            {{ __('View Cart') }}
                                                            </a>
                                                        </div>
                                                    @endif
                                                    <div id="checkout-display" class="{{ $totalPrice > 0 ? 'bg-gray-12 text-white' : 'text-gray-10 bg-gray-11'}} mb-30p p-2 w-full rounded">
                                                        <a href="{{ $totalPrice > 0 ? route('site.checkOut',['select' => 'all']) : 'javascript:void(0)' }}" class="flex justify-center px-4 py-2 font-bold cursor-pointer dm-bold text-18">{{ __('Go to Checkout') }}</a>
                                                    </div>
                                                    @if ($totalPrice > 0)
                                                        <div class="text-gray-10 mt-5" aria-label="Clear All" id="cart_clear_all">
                                                            <div id="clear-all-display" class="flex justify-center items-center cursor-pointer">
                                                                <p class="mr-2 dm-sans font-medium text-gray-10">
                                                                    {{ __('Clear All') }}
                                                                </p>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.83333 11.6667C5.3731 11.6667 5 11.2937 5 10.8334L5 8.33341C5 7.87318 5.3731 7.50008 5.83333 7.50008C6.29357 7.50008 6.66667 7.87318 6.66667 8.33341L6.66667 10.8334C6.66667 11.2937 6.29357 11.6667 5.83333 11.6667Z" fill="#898989"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.16732 11.6667C8.70708 11.6667 8.33398 11.2937 8.33398 10.8334L8.33398 8.33341C8.33398 7.87318 8.70708 7.50008 9.16732 7.50008C9.62755 7.50008 10.0007 7.87318 10.0007 8.33341L10.0007 10.8334C10.0007 11.2937 9.62756 11.6667 9.16732 11.6667Z" fill="#898989"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.8552 5.01385C0.657717 5.00037 0.399686 4.99992 0 4.99992V3.33325C0.00891358 3.33325 0.0177978 3.33325 0.0266526 3.33325C0.0445462 3.33325 0.0623196 3.33325 0.0799725 3.33325H14.92C14.9377 3.33325 14.9555 3.33325 14.9733 3.33325L15 3.33325V4.99992C14.6003 4.99992 14.3423 5.00037 14.1448 5.01385C13.9548 5.02681 13.8824 5.04899 13.8478 5.06335C13.6436 5.14793 13.4813 5.31016 13.3968 5.51435C13.3824 5.54903 13.3602 5.62139 13.3473 5.81139C13.3338 6.00887 13.3333 6.2669 13.3333 6.66659L13.3333 11.7214C13.3334 12.4602 13.3334 13.0967 13.2649 13.6064C13.1914 14.1527 13.0258 14.6763 12.6011 15.101C12.1764 15.5257 11.6528 15.6914 11.1065 15.7648C10.5968 15.8333 9.96027 15.8333 9.22153 15.8333H5.77847C5.03973 15.8333 4.40322 15.8333 3.89351 15.7648C3.34724 15.6914 2.82362 15.5257 2.3989 15.101C1.97418 14.6763 1.80856 14.1527 1.73512 13.6064C1.66659 13.0967 1.66662 12.4602 1.66666 11.7214L1.66667 6.66659C1.66667 6.2669 1.66622 6.00887 1.65274 5.81139C1.63978 5.62139 1.6176 5.54903 1.60323 5.51435C1.51865 5.31016 1.35643 5.14793 1.15224 5.06335C1.11756 5.04899 1.0452 5.02681 0.8552 5.01385ZM11.8107 4.99992H3.18933C3.26749 5.23126 3.29962 5.46462 3.31554 5.69793C3.33335 5.95898 3.33334 6.27439 3.33333 6.63993L3.33333 11.6666C3.33333 12.4758 3.3351 12.9989 3.38692 13.3843C3.43552 13.7458 3.51397 13.8591 3.57741 13.9225C3.64085 13.9859 3.75414 14.0644 4.11559 14.113C4.50101 14.1648 5.0241 14.1666 5.83333 14.1666H9.16667C9.9759 14.1666 10.499 14.1648 10.8844 14.113C11.2459 14.0644 11.3592 13.9859 11.4226 13.9225C11.486 13.8591 11.5645 13.7458 11.6131 13.3843C11.6649 12.9989 11.6667 12.4758 11.6667 11.6666V6.63993C11.6667 6.27439 11.6666 5.95898 11.6845 5.69793C11.7004 5.46462 11.7325 5.23126 11.8107 4.99992Z" fill="#898989"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.67175 0.101025C8.31844 0.0332505 7.90785 0 7.50015 0C7.09245 4.96705e-08 6.68185 0.0332505 6.32855 0.101025C6.15192 0.134907 5.979 0.179406 5.82234 0.238021C5.68005 0.291261 5.48597 0.37965 5.32178 0.532849C4.98526 0.84682 4.96699 1.37414 5.28096 1.71065C5.57723 2.0282 6.06348 2.06237 6.40011 1.8014C6.40204 1.80065 6.40412 1.79985 6.40639 1.799C6.45085 1.78237 6.52809 1.7598 6.64254 1.73785C6.87139 1.69395 7.17407 1.66667 7.50015 1.66667C7.82623 1.66667 8.12891 1.69395 8.35775 1.73785C8.4722 1.7598 8.54944 1.78237 8.59391 1.799C8.59617 1.79985 8.59826 1.80065 8.60018 1.8014C8.93681 2.06237 9.42306 2.0282 9.71933 1.71065C10.0333 1.37414 10.015 0.846819 9.67852 0.532848C9.51432 0.37965 9.32025 0.29126 9.17795 0.23802C9.02129 0.179405 8.84837 0.134907 8.67175 0.101025Z" fill="#898989"/>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </li>
                    @endif

                    {{-- @if (isset($header['main']['show_track']) && $header['main']['show_track'] == 1)
                        <li class="hidden md:block ml-1">
                            <a href="{{ route('site.trackOrder') }}" class="relative py-2 block w-fill ">
                                <div slot="icon" class="relative flex flex-col justify-center items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3.66667C7.39763 3.66667 3.66667 7.39763 3.66667 12C3.66667 16.6024 7.39763 20.3333 12 20.3333C16.6024 20.3333 20.3333 16.6024 20.3333 12C20.3333 7.39763 16.6024 3.66667 12 3.66667ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z" fill="{{ $header['main']['text_color'] }}"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.7559 7.2441C16.9791 7.46729 17.0571 7.79743 16.9573 8.09688L14.8739 14.3469C14.791 14.5957 14.5957 14.791 14.3469 14.8739L8.09688 16.9573C7.79743 17.0571 7.46729 16.9791 7.2441 16.7559C7.02091 16.5328 6.94297 16.2026 7.04279 15.9032L9.12612 9.65317C9.20907 9.40433 9.40433 9.20907 9.65317 9.12612L15.9032 7.04279C16.2026 6.94297 16.5328 7.02091 16.7559 7.2441ZM10.5755 10.5755L9.15097 14.8491L13.4245 13.4245L14.8491 9.15097L10.5755 10.5755Z" fill="{{ $header['main']['text_color'] }}"/>
                                    </svg>

                                    <p style="color: {{ $header['main']['text_color'] }}" class="text-xs text-xss font-medium roboto-medium text-center mt-2 leading-3">{{ __('Track Order') }}</p>
                                </div>
                            </a>
                        </li>
                    @endif --}}
                </ul>
                </div>
            </div>
            <script>
                const btn = document.querySelector("button.mobile-menu-button");
                const menu = document.querySelector(".mobile-menu");
            
                btn.addEventListener("click", () => {
                    menu.classList.toggle("hidden");
                });
            </script>
        </div>
        <!-- Start Header -->
    </div>
</section>

