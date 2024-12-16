<x-layouts.main-app>
    <section class="mt-20 mb-10">
        <div class="max-w-6xl mx-auto">
            <p class="text-6xl xl:px-0 px-5 ">Our <span class="font-fraunces">Products</span></p>
            <p class="text-lg xl:px-0 px-5 mt-5 text-justify">Our products are designed with a commitment to
                sustainability and
                quality.
                Using recycled materials as
                the foundation, we combine creativity and functionality to craft items that not only look beautiful but
                also make a positive impact on the environment and society. Each product is thoughtfully designed to
                blend modern
                aesthetics with durability, making them ideal for enhancing any space with a unique, eco-friendly touch.
            </p>
            <div class="mt-4 mb-6 rounded-lg xl:mx-0 mx-2">
                <img src="{{ asset('images/promotion-CTA.png') }}" alt="cosi-promotion" class="w-full rounded-lg">
            </div>
            <div class="xl:px-0 px-5 mt-5 mb-2">
                <h1 class="text-3xl font-fraunces">Categories</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 xl:mx-0 mx-2">
                {{-- <div class="flex gap-2 justify-between items-center"> --}}
                @foreach ($categories as $category)
                    <a href={{ route('products.show', $category->slug) }}
                        class="hover:scale-95 transition-transform duration-300">
                        <div class="w-full">
                            <div class="bg-gray-75 overflow-hidden rounded-lg">
                                <img src="{{ asset($category->photo_url) }}" class="object-contain"
                                    alt={{ $category->slug }}>
                            </div>
                            <div class="py-2">
                                <h5 class="text-xl">{{ $category->name }} &raquo;</h5>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
            <div class="xl:px-0 px-5 mt-5 mb-2">
                <h1 class="text-3xl">Our <span class="font-fraunces">Collections</span></h1>
            </div>
            <div class="swiper-2 relative mySwiper overflow-x-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="flex h-96">
                            <img src="{{ asset('images/section-1.png') }}" alt=""
                                class="object-contain rounded-md">
                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="flex h-96">
                            <img src="{{ asset('images/section-2.png') }}" alt=""
                                class="object-contain rounded-md">
                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="flex h-96">
                            <img src="{{ asset('images/section-3.png') }}" alt=""
                                class="object-contain rounded-md">
                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="flex h-96">
                            <img src="{{ asset('images/section-4.png') }}" alt=""
                                class="object-contain rounded-md">
                        </div>

                    </div>
                </div>
                <div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            {{-- <div class="flex overflow-x-auto h-96 gap-2">
                <img src="{{ asset('images/section-5.jpg') }}" alt="" class="object-contain">
                <img src="{{ asset('images/section-1.png') }}" alt="" class="object-contain">
                <img src="{{ asset('images/section-2.png') }}" alt="" class="object-contain">
                <img src="{{ asset('images/section-3.png') }}" alt="" class="object-contain">
                <img src="{{ asset('images/section-4.png') }}" alt="" class="object-contain">
            </div> --}}
        </div>
    </section>
    <div>
        <hr class="max-w-6xl mx-auto my-5 border-5 border-black">
        @include('components.layouts.footer')
    </div>
</x-layouts.main-app>
