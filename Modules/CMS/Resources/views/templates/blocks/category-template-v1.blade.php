@php
    $cType = $component->category_type;
    $categories = $homeService->categories($cType, [], 11, $component->categories);
    $totalCols = $homeService->getColumnCount($component, $component->max);
@endphp
<section class="{{ $component->full == 1 ? 'px-4' : 'mx-4 lg:mx-4 xl:mx-32 2xl:mx-64 3xl:mx-92' }} "
    style="margin-top:{{ $component->mt }};margin-bottom:{{ $component->mb }};">
    @if ($component->title)
        <p class="text-center font-bold text-md md:text-22 text-gray-12 mb-2.5 md:mb-5 uppercase dm-bold">
            {!! $component->title !!}</p>
    @endif
    <div
        class="grid lg:grid-cols-{{ $totalCols }} lg:gap-7 grid-flow-col lg:grid-flow-row gap-4 auto-cols-max ">

        <div class="flex flex-col align-middle gap-2 overflow-visible ">
            <a href="#">
                <div style="background: url('/app/public/images/sam-g-bg.png')"
                    class="border primary-bg-hover mb-4 md:mb-0 rounded-md relative t-img trans-effect w-130p lg:w-auto overflow-visible">
                    <div class="flex justify-center items-center h-173p overflow-visible">
                        <img class="md:h-full md:w-full w-full h-full object-contain trans-effect pr-3"
                            src="https://placehold.co/150x150">
                    </div>
        
                </div>
        
            </a>
        
            <p class="text-gray-12 dm-bold  bottom-1 md:bottom-3 text-center font-semibold leading-5 line-clamp-single">
               new arrival
            </p>
        </div>
        @foreach ($categories ?? [] as $category)
        <div class="flex flex-col align-middle gap-2 overflow-visible ">
            <a href="{{ route('site.productSearch', ['categories' => $category->name]) }}">
                <div style="background: url('/app/public/images/sam-g-bg.png')"
                    class="border primary-bg-hover mb-4 md:mb-0 rounded-md relative t-img trans-effect w-130p lg:w-auto overflow-visible">
                    <div class="flex justify-center items-center h-173p overflow-visible">
                        <img class="md:h-full md:w-full w-full h-full object-contain trans-effect pr-3"
                            src="{{ $category->fileUrl() }}" alt="{{ __('Image') }}">
                    </div>
                 
                </div>
             
            </a>

                <p class="text-gray-12 dm-bold  bottom-1 md:bottom-3 text-center font-semibold leading-5 line-clamp-single">
                    {{ trimWords($category->name, 15) }}
                </p>
         </div>
        @endforeach
    </div>
</section>
