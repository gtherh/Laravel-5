

  
<!-- Sections -->
<section class="sections container mx-auto my-5 py-10">
  {{-- @foreach ($slides as $slide) --}}
  <div class="swiper-container">
    <div class="swiper-wrapper flex">
      <div class="swiper-slide"> 
        <div class="grid grid-cols-4 md:gap-4  container mx-auto">
            <div class="col-span-1 px-2 mb-4">
                <h1 class="sTitle text-xs md:text-xl lg:text-2xl">Men Fashion</h1>
            <div class="card relative  shadow-lg rounded-3xl overflow-hidden  xs:w-20 xs:h-32 md:h-full md:w-full">
              <img src="http://dev.samvalley.co/public/uploads/20230725/6b31724be10338809339d57aca898279.png" alt="" class="xs:w-20 xs:h-32 md:h-full md:w-full">
                
                <button class=" absolute bottom-0 right-0  md:mr-4 mb-1 px-3 py-1 md:mb-4 md:px-6 md:py-2.5 text-xs md:text-sm  text-white rounded-full bg-black justify-center items-center gap-2 inline-flex"><i class=" fa fa-arrow-right"></i></button>
                
            </div>
            </div>
            <div class="col-span-1 px-2 mb-4">
                <h1 class="sTitle text-xs md:text-xl lg:text-2xl">Home essentials</h1>
                <div class="card relative  shadow-lg rounded-3xl overflow-hidden  xs:w-20 xs:h-32 md:h-full md:w-full">
                  <img src="http://dev.samvalley.co/public/uploads/20230725/8e750488bc85a931db4e62f2fee7c8e0.png" alt="" class="xs:w-20 xs:h-32 md:h-full md:w-full">
                  
                  <button class=" absolute bottom-0 right-0  md:mr-4 mb-1 px-3 py-1 md:mb-4 md:px-6 md:py-2.5 text-xs md:text-sm  text-white rounded-full bg-black justify-center items-center gap-2 inline-flex"><i class=" fa fa-arrow-right"></i></button>
                  
                </div>
            </div>
            <div class="col-span-1 px-2 mb-4">
                <h1 class="sTitle text-xs md:text-xl lg:text-2xl">Toys</h1>
              <div class="card relative  shadow-lg rounded-3xl overflow-hidden  xs:w-20 xs:h-32 md:h-full md:w-full">
                  <img src="http://dev.samvalley.co/public/uploads/20230725/c795fa809029a53bc95b175a91655705.png" alt="" class="xs:w-20 xs:h-32 md:h-full md:w-full">
                  <button class=" absolute bottom-0 right-0  md:mr-4 mb-1 px-3 py-1 md:mb-4 md:px-6 md:py-2.5 text-xs md:text-sm  text-white rounded-full bg-black justify-center items-center gap-2 inline-flex"><i class=" fa fa-arrow-right"></i></button>
                  
              </div>
            </div>
            <div class="col-span-1 px-2 mb-4">
                <h1 class="sTitle text-xs md:text-xl lg:text-2xl">Toys</h1>
              <div class="card relative  shadow-lg rounded-3xl overflow-hidden  xs:w-20 xs:h-32 md:h-full md:w-full">
                  <img src="http://dev.samvalley.co/public/uploads/20230725/c795fa809029a53bc95b175a91655705.png" alt="" class="xs:w-20 xs:h-32 md:h-full md:w-full">
                  <button class=" absolute bottom-0 right-0  md:mr-4 mb-1 px-3 py-1 md:mb-4 md:px-6 md:py-2.5 text-xs md:text-sm  text-white rounded-full bg-black justify-center items-center gap-2 inline-flex"><i class=" fa fa-arrow-right"></i></button>
                  
              </div>
            </div>
            
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
          </div>
            </div>
        </div>
      </div>
    </div>
</div>
    {{-- @endforeach  --}}
</section>


<script>
  // Initialize the swiper
  var swiper = new Swiper('.swiper-container', {
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
  });
</script>




<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6"> --}}
     <div class="w-full h-auto rounded-xl overflow-hidden">
      <div class="w-full h-72 bg-gray-200"></div>
      <div class="p-4">
        <div class="text-2xl font-medium mb-2">Home Essentials</div>
        <img class="w-full h-auto rounded-xl mb-2" src="http://dev.samvalley.co/public/uploads/20230725/6b31724be10338809339d57aca898279.png" />
        <div class="bg-gray-200 rounded-full w-12 h-12 flex items-center justify-center">
          <div class="w-6 h-6 bg-gray-400 rounded-full"></div>
        </div>
      </div>
    </div>
  
    <div class="w-full h-auto rounded-xl overflow-hidden">
      <div class="w-full h-72 bg-gray-200"></div>
      <div class="p-4">
        <div class="text-2xl font-medium mb-2">Toys</div>
        <img class="w-full h-auto rounded-xl mb-2" src="http://dev.samvalley.co/public/uploads/20230725/8e750488bc85a931db4e62f2fee7c8e0.png" />
        <div class="bg-gray-200 rounded-full w-12 h-12 flex items-center justify-center">
          <div class="w-6 h-6 bg-gray-400 rounded-full"></div>
        </div>
      </div>
    </div>
  
    <div class="w-full h-auto rounded-xl overflow-hidden">
      <div class="w-full h-72 bg-gray-200"></div>
      <div class="p-4">
        <div class="text-2xl font-medium mb-2">Toys</div>
        <img class="w-full h-auto rounded-xl mb-2" src="http://dev.samvalley.co/public/uploads/20230725/c795fa809029a53bc95b175a91655705.png" />
        <div class="bg-gray-200 rounded-full w-12 h-12 flex items-center justify-center">
          <div class="w-6 h-6 bg-gray-400 rounded-full"></div>
        </div>
      </div>
    </div>
  
    <div class="w-full h-auto rounded-xl overflow-hidden">
      <div class="w-full h-72 bg-gray-200"></div>
      <div class="p-4">
        <div class="text-2xl font-medium mb-2">Toys</div>
        <img class="w-full h-auto rounded-xl mb-2" src="http://dev.samvalley.co/public/uploads/20230725/c795fa809029a53bc95b175a91655705.png" />
        <div class="bg-gray-200 rounded-full w-12 h-12 flex items-center justify-center">
          <div class="w-6 h-6 bg-gray-400 rounded-full"></div>
        </div>
      </div>
    </div>
  </div> 