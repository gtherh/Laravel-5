@php
$cType = $component->category_type;
$categories = $homeService->categories($cType, [], 7, $component->categories);
$tags = $homeService->tags($cType, [], 3, $component->tags);
$totalCols = $homeService->getColumnCount($component, $component->max);
@endphp
<section class="{{ $component->full == 1 ? 'px-4 my-4 py-4 mx-auto' : 'container mx-auto' }} container mx-auto"
    style="margin-top:{{ $component->mt }};margin-bottom:{{ $component->mb }};">
    @if ($component->title)
    <p class="text-center  text-base font-medium text-black  lg:text-4xl  h-14 lg:my-9">
        {!! $component->title !!}</p>
    @endif
    <div class="grid grid-cols-3 md:grid-cols-{{ $totalCols }} gap-4 md:gap-6 lg:gap-7 justify-items-center">

        @foreach ($tags ?? [] as $tag)
        <div class="flex flex-col items-center gap-2">
            <a href="{{ route('site.productSearch', ['keyword' => $tag->name]) }}" class="w-16 md:w-20 lg:w-36  relative">
                <div style="background: url('/app/public/images/sam-g-bg.png');width: 1200px;"
                    class=" relative t-img  ">
                    <div class="  bg-stone-200 w-16 h-16 md:w-20 md:h-20 lg:w-36 lg:h-36"
                        style=" background: linear-gradient(0deg, #D9D9D9 0%, #D9D9D9 100%); border-radius: 9999px ">
                        <img class="object-contain rounded-full " src="{{ $tag->fileUrl() }}" alt="{{ __('Image') }}">
                    </div>
                </div>
            </a>
            <p
                class="text-center text-neutral-900 text-black text-sm font-medium leading-tight lg:text-2xl lg:leading-9 px-2 py-1">
                {{ trimWords($tag->name, 15) }}</p>
        </div>

        @endforeach

        @foreach ($categories ?? [] as $category)
        <div class="flex flex-col items-center gap-2">
            <a href="{{ route('site.productSearch', ['categories' => $category->name]) }}"
                class="w-16 md:w-20 lg:w-36  relative">
                <div style="background: url('/app/public/images/sam-g-bg.png');width: 1200px;"
                    class=" relative  t-img  ">
                    <div class="  bg-stone-200 w-16 h-16 md:w-20 md:h-20 lg:w-36 lg:h-36"
                        style=" background: linear-gradient(0deg, #D9D9D9 0%, #D9D9D9 100%); border-radius: 9999px ">
                        <img class="object-contain rounded-full " src="{{ $category->fileUrl() }}"
                            alt="{{ __('Image') }}">
                    </div>
                </div>
            </a>
            <p
                class="text-center text-neutral-900 text-black text-sm font-medium leading-tight lg:text-2xl lg:leading-9 px-2 py-1">
                {{ trimWords($category->name, 15) }}</p>
        </div>
        @endforeach
    </div>
</section>