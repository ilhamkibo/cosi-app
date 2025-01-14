<x-layouts.main-app>
    <div class="flex flex-col max-w-6xl mx-auto mt-24 justify-between min-h-screen">

        <div>
            <div class="w-1/3 flex justify-between items-center gap-4 mb-4 xl:px-0 px-5">
                @foreach ($categories as $category)
                    <a href="{{ route('products.show', $category->slug) }}"
                        class="{{ request()->is('products/' . $category->slug) ? 'underline underline-offset-4' : '' }} 
               hover:scale-105 transition-transform duration-300 ease-in-out">
                        {{ $category->name }}
                    </a>
                @endforeach

            </div>
            <div class="grid grid-cols-1 px-5 xl:px-0 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mb-5 mt-10">

                @forelse ($products as $product)
                    <div class="text-sm">
                        <div
                            class="h-48 rounded-lg @if ($product->product_photo->isEmpty()) flex justify-center items-center border @endif">
                            @if ($product->product_photo->isNotEmpty())
                                <img src="{{ asset('storage/' . $product->product_photo->where('is_main', true)->first()->photo_url) }}"
                                    class="object-cover rounded-lg w-full h-full" alt="{{ $product->alt_text }}">
                            @else
                                <span class="text-center text-lg">Image Unavailable.</span>
                            @endif

                        </div>
                        <div class="flex justify-between items-start mt-2">
                            <h1 class="font-medium w-1/2">{{ $product->name }}</h1>
                            <div class="flex flex-col text-right">
                                <h1 class="font-regular">IDR {{ number_format($product->price) }}</h1>
                                <h2 data-modal-target="modal-{{ $product->id }}"
                                    data-modal-toggle="modal-{{ $product->id }}"
                                    class="underline text-gray-700 cursor-pointer hover:scale-95 underline-offset-2">
                                    Click for Details &raquo;
                                </h2>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div id="modal-{{ $product->id }}" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 md:hidden hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="modal-{{ $product->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                                <div class="p-4 md:p-5 space-y-4 ">
                                    <div class="block md:flex">
                                        <!-- Slider main container -->
                                        <div class="swiper">
                                            <!-- Additional required wrapper -->
                                            <div class="swiper-wrapper">
                                                <!-- Slides -->
                                                @foreach ($product->product_photo as $item)
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('storage/' . $item->photo_url) }}"
                                                            alt="{{ $item->alt_text }}"
                                                            class="object-contain h-full w-full select-none">
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- If we need navigation buttons -->
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>

                                        </div>
                                        <div class="md:ml-4 mt-4 md:mt-0 w-full flex flex-col gap-2 justify-center">
                                            <h1 class="text-2xl font-medium whitespace-nowrap">{{ $product->name }}
                                            </h1>
                                            <p> {{ $product->description }}</p>
                                            <div>
                                                <p class="font-medium">Material:</p>
                                                <ul class="list-disc list-inside">
                                                    @foreach ($product->material as $item)
                                                        <li>
                                                            {{ $item->name }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <p><span class="font-medium">Dimension (cm):</span> <br>
                                                {{ $product->width }}W x
                                                {{ $product->long }}L x
                                                {{ $product->height }}H</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty

                    <p>No products available.</p>
                @endforelse
            </div>
        </div>
        <div>
            <hr class="max-w-6xl mx-auto my-5 border-5 border-black">
            @include('components.layouts.footer')
        </div>



    </div>
</x-layouts.main-app>
