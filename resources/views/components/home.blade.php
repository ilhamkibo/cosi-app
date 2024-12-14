<x-layouts.main-app>
    <section id="section-1"
        style="background-image: url('/images/section-1.png'); background-size: cover; background-position: center;"
        class="min-h-screen relative">
        <div
            class="mx-auto absolute max-w-6xl bottom-12 md:bottom-24 left-0 right-0 flex-col md:flex-row flex justify-between md:items-end px-10 xl:px-0">
            <div class="text-left md:mb-0 mb-2">
                <h1 class="text-black tracking-widest text-4xl">C H A I R</h1>
            </div>
            <a href={{ route('products.show', 'chairs') }}
                class="text-right md:items-end text-black hover:scale-105 transition-transform duration-300 block text-xl underline">
                Explore More &raquo;
            </a>
        </div>
    </section>


    <section id="section-2"
        style="background-image: url('/images/section-3.png'); background-size: cover; background-position: center"
        class="min-h-screen relative">
        <div
            class="max-w-6xl mx-auto absolute bottom-12 md:bottom-24 left-0 right-0 flex-col md:flex-row flex justify-between md:items-center px-10 xl:px-0">
            <div class="text-left">
                <h1 class="text-black tracking-widest text-4xl">T A B L E</h1>
            </div>
            <a href={{ route('products.show', 'tables') }}
                class="text-right md:items-end text-black hover:scale-105 transition-transform duration-300 block text-xl underline">
                Explore More &raquo;
            </a>
        </div>
    </section>
    <section id="section-3"
        style="background-image: url('/images/section-2.png'); background-size: cover; background-position: center"
        class="min-h-screen relative">
        <div
            class="max-w-6xl mx-auto absolute bottom-12 md:bottom-24 left-0 right-0 flex-col md:flex-row flex justify-between md:items-center px-10 xl:px-0">
            <div class="text-left">
                <h1 class="text-black tracking-widest text-4xl">O T H E R S</h1>
            </div>
            <a href={{ route('products.show', 'others') }}
                class="text-right md:items-end text-black hover:scale-105 transition-transform duration-300 block text-xl underline">
                Explore More &raquo;
            </a>
        </div>
    </section>
    <section id="section-4" class="min-h-screen bg-gradient-to-t from-green-75">
        <div class="max-w-6xl mx-auto xl:p-0 p-10">
            <h1
                class="text-blue-75 text-right font-fraunces italic text-6xl md:text-7xl xl:text-8xl px-4 pt-24 xl:px-1 mb-8">
                Articles
            </h1>
            <!-- Slider main container -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- @foreach ($articles as $article) --}}
                <a href="#">
                    <div
                        class="flex w-full flex-col h-96 sm:h-72 md:h-48 gap-3 rounded-lg bg-gray-75 p-6 hover:scale-[0.995] hover:opacity-90 md:flex-row transition duration-300 ease-in-out">
                        <div class="relative h-48 w-full md:h-auto md:w-1/2">
                            <img loading="lazy" decoding="async" data-nimg="fill" class="rounded-md object-cover"
                                sizes="fill" src="{{ asset('images/section-1.png') }}"
                                style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                        </div>
                        <div class="flex w-full flex-col">
                            <div class="flex gap-2 text-sm">
                                <p class="text-gray-600">Kegiatan</p>
                                <p class="font-thin">—</p>
                                <p class="font-thin text-zinc-400">Kamis, 24 Okt 2024</p>
                            </div>
                            <p class="font-bold text-blue-75">Kalibrasi Onsite Push Pull di PT Unicharm Indonesia Tbk,
                                KIIC Karawang
                            </p>
                            <div class="text-sm font-thin">
                                <!-- Limit the length of the text and append "..." -->
                                <p>{{ Str::limit('Kebutuhan akan jasa kalibrasi onsite Push Pull semakin meningkat, terutama di kawasan industri seperti Karawang dan KIIC. PT Global Instrument Services (PT GIS) menjadi mitra yang diandalkan untuk melakukan kalibrasi alat ukur langsung di lokasi, seperti yang baru-baru ini dilakukan di PT Unicharm Indonesia Tbk. Dengan layanan kalibrasi onsite, PT GIS membantu perusahaan mempertahankan keakuratan […]', 100, '...') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div
                        class="flex w-full flex-col h-96 sm:h-72 md:h-48 gap-3 rounded-lg bg-gray-75 p-6 hover:scale-[0.995] hover:opacity-90 md:flex-row transition duration-300 ease-in-out">
                        <div class="relative h-48 w-full md:h-auto md:w-1/2">
                            <img loading="lazy" decoding="async" data-nimg="fill" class="rounded-md object-cover"
                                sizes="fill" src="{{ asset('images/section-1.png') }}"
                                style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                        </div>
                        <div class="flex w-full flex-col">
                            <div class="flex gap-2 text-sm">
                                <p class="text-gray-600">Kegiatan</p>
                                <p class="font-thin">—</p>
                                <p class="font-thin text-zinc-400">Kamis, 24 Okt 2024</p>
                            </div>
                            <p class="font-bold text-blue-75">Kalibrasi Onsite Push Pull di PT Unicharm Indonesia Tbk,
                                KIIC Karawang
                            </p>
                            <div class="text-sm font-thin">
                                <!-- Limit the length of the text and append "..." -->
                                <p>{{ Str::limit('Kebutuhan akan jasa kalibrasi onsite Push Pull semakin meningkat, terutama di kawasan industri seperti Karawang dan KIIC. PT Global Instrument Services (PT GIS) menjadi mitra yang diandalkan untuk melakukan kalibrasi alat ukur langsung di lokasi, seperti yang baru-baru ini dilakukan di PT Unicharm Indonesia Tbk. Dengan layanan kalibrasi onsite, PT GIS membantu perusahaan mempertahankan keakuratan […]', 100, '...') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div
                        class="flex w-full flex-col h-96 sm:h-72 md:h-48 gap-3 rounded-lg bg-gray-75 p-6 hover:scale-[0.995] hover:opacity-90 md:flex-row transition duration-300 ease-in-out">
                        <div class="relative h-48 w-full md:h-auto md:w-1/2">
                            <img loading="lazy" decoding="async" data-nimg="fill" class="rounded-md object-cover"
                                sizes="fill" src="{{ asset('images/section-1.png') }}"
                                style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                        </div>
                        <div class="flex w-full flex-col">
                            <div class="flex gap-2 text-sm">
                                <p class="text-gray-600">Kegiatan</p>
                                <p class="font-thin">—</p>
                                <p class="font-thin text-zinc-400">Kamis, 24 Okt 2024</p>
                            </div>
                            <p class="font-bold text-blue-75">Kalibrasi Onsite Push Pull di PT Unicharm Indonesia Tbk,
                                KIIC Karawang
                            </p>
                            <div class="text-sm font-thin">
                                <!-- Limit the length of the text and append "..." -->
                                <p>{{ Str::limit('Kebutuhan akan jasa kalibrasi onsite Push Pull semakin meningkat, terutama di kawasan industri seperti Karawang dan KIIC. PT Global Instrument Services (PT GIS) menjadi mitra yang diandalkan untuk melakukan kalibrasi alat ukur langsung di lokasi, seperti yang baru-baru ini dilakukan di PT Unicharm Indonesia Tbk. Dengan layanan kalibrasi onsite, PT GIS membantu perusahaan mempertahankan keakuratan […]', 100, '...') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div
                        class="flex w-full flex-col h-96 sm:h-72 md:h-48 gap-3 rounded-lg bg-gray-75 p-6 hover:scale-[0.995] hover:opacity-90 md:flex-row transition duration-300 ease-in-out">
                        <div class="relative h-48 w-full md:h-auto md:w-1/2">
                            <img loading="lazy" decoding="async" data-nimg="fill" class="rounded-md object-cover"
                                sizes="fill" src="{{ asset('images/section-1.png') }}"
                                style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                        </div>
                        <div class="flex w-full flex-col">
                            <div class="flex gap-2 text-sm">
                                <p class="text-gray-600">Kegiatan</p>
                                <p class="font-thin">—</p>
                                <p class="font-thin text-zinc-400">Kamis, 24 Okt 2024</p>
                            </div>
                            <p class="font-bold text-blue-75">Kalibrasi Onsite Push Pull di PT Unicharm Indonesia Tbk,
                                KIIC Karawang
                            </p>
                            <div class="text-sm font-thin">
                                <!-- Limit the length of the text and append "..." -->
                                <p>{{ Str::limit('Kebutuhan akan jasa kalibrasi onsite Push Pull semakin meningkat, terutama di kawasan industri seperti Karawang dan KIIC. PT Global Instrument Services (PT GIS) menjadi mitra yang diandalkan untuk melakukan kalibrasi alat ukur langsung di lokasi, seperti yang baru-baru ini dilakukan di PT Unicharm Indonesia Tbk. Dengan layanan kalibrasi onsite, PT GIS membantu perusahaan mempertahankan keakuratan […]', 100, '...') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>

                {{-- @endforeach --}}

            </div>
            <div class="text-white flex flex-col text-xl justify-center items-center py-10 w-full ">
                <h1 class="text-center text-2xl">Check out articles on our social impact, projects, and our approach.
                </h1>

                <a href="#" class="py-4 underline hover:scale-105 transition-transform duration-300">More
                    Articles
                    ></a>
            </div>
        </div>
        <div class="max-w-6xl mx-auto w-full px-4 xl:px-0 sm:gap-2">
            <h1 class="text-center text-3xl lg:text-6xl font-fraunces text-white">Partners</h1>
            <div class="py-30 relative flex justify-center overflow-x-hidden py-8">
                <div class=" flex animate-marquee gap-4 gap-y-10 p-2 md:justify-between">
                    @foreach ($partners as $partner)
                        <div class="rounded-md bg-gray-200 p-2">
                            <div class="relative h-[50px] w-[150px]">
                                <img src="{{ asset($partner->photo_url) }}"
                                    alt="{{ $partner->alt_text ?? 'Partner Logo' }}"
                                    class="object-contain h-full w-full">
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class=" absolute top-8 flex animate-marquee2 gap-4 gap-y-10 p-2 md:justify-between">
                    @foreach ($partners as $partner)
                        <div class="rounded-md bg-gray-200 p-2">
                            <div class="relative h-[50px] w-[150px]">
                                <img src="{{ asset($partner->photo_url) }}"
                                    alt="{{ $partner->alt_text ?? 'Partner Logo' }}"
                                    class="object-contain h-full w-full">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    <section id="section-6" class="flex flex-col items-start justify-center bg-gradient-to-t from-black to-green-75">
        <div class="max-w-6xl mx-auto w-full h-full">
            <h1 class="text-6xl md:text-6xl xl:text-8xl px-4 xl:px-0 text-white mt-12">Get in <span
                    class="font-fraunces font-italic">touch</span></h1>
        </div>
        <hr class="w-full my-10">
        <div
            class="max-w-6xl mx-auto w-full justify-center md:justify-between items-center px-4 xl:px-0 flex flex-wrap gap-10 sm:gap-2">
            <div class="w-60">
                <svg width="100" height="100" viewBox="0 0 126 126" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M49.5 49.5H22.5C17.7261 49.5 13.1477 51.3964 9.77208 54.7721C6.39642 58.1477 4.5 62.7261 4.5 67.5V103.5H18"
                        stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M112.5 103.5H121.5V40.5C121.5 38.1131 120.552 35.8239 118.864 34.136C117.176 32.4482 114.887 31.5 112.5 31.5H58.5C56.1131 31.5 53.8239 32.4482 52.136 34.136C50.4482 35.8239 49.5 38.1131 49.5 40.5V91.62"
                        stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M54 103.5H76.5" stroke="white" stroke-width="4" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M36 121.5C45.9411 121.5 54 113.441 54 103.5C54 93.5589 45.9411 85.5 36 85.5C26.0589 85.5 18 93.5589 18 103.5C18 113.441 26.0589 121.5 36 121.5Z"
                        stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M94.5 121.5C104.441 121.5 112.5 113.441 112.5 103.5C112.5 93.5589 104.441 85.5 94.5 85.5C84.5589 85.5 76.5 93.5589 76.5 103.5C76.5 113.441 84.5589 121.5 94.5 121.5Z"
                        stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p class="text-white py-4">Indonesia Shipping</p>
                <div>
                    <p class="text-white font-light">You can reach us through:</p>
                    <ul class="text-white font-light">
                        <li class="ml-4"><a href="#">Tokopedia</a></li>
                        <li class="ml-4"><a href="#">Shopee</a></li>
                    </ul>
                </div>
            </div>


            <div class="w-60">
                <svg width="100" height="100" viewBox="0 0 99 99" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M49.5 95.4642C74.8854 95.4642 95.4643 74.8853 95.4643 49.4999C95.4643 24.1146 74.8854 3.53564 49.5 3.53564C24.1146 3.53564 3.53571 24.1146 3.53571 49.4999C3.53571 74.8853 24.1146 95.4642 49.5 95.4642Z"
                        stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M7.07143 67.1786H19.4464C22.7285 67.1786 25.8761 65.8748 28.1969 63.5541C30.5176 61.2333 31.8214 58.0857 31.8214 54.8036V44.1965C31.8214 40.9144 33.1252 37.7668 35.446 35.446C37.7667 33.1253 40.9144 31.8215 44.1964 31.8215C47.4785 31.8215 50.6261 30.5177 52.9469 28.1969C55.2676 25.8762 56.5714 22.7285 56.5714 19.4465V4.03076"
                        stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M95.4643 48.7929C91.9237 46.9558 87.9973 45.9863 84.0086 45.9644H68.9464C65.6644 45.9644 62.5167 47.2681 60.196 49.5889C57.8752 51.9097 56.5714 55.0573 56.5714 58.3394C56.5714 61.6214 57.8752 64.769 60.196 67.0898C62.5167 69.4106 65.6644 70.7144 68.9464 70.7144C71.2908 70.7144 73.5391 71.6456 75.1967 73.3033C76.8544 74.961 77.7857 77.2093 77.7857 79.5536V85.7058"
                        stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p class="text-white py-4">International Shipping</p>
                <p class="text-white font-light">We are available for international shipping, for more information
                    please contact us.</p>
            </div>
            <div class="w-60">
                <svg width="100" height="100" viewBox="0 0 95 95" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M33.9286 40.7144C42.3608 40.7144 49.1965 33.8788 49.1965 25.4466C49.1965 17.0144 42.3608 10.1787 33.9286 10.1787C25.4964 10.1787 18.6608 17.0144 18.6608 25.4466C18.6608 33.8788 25.4964 40.7144 33.9286 40.7144Z"
                        stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M64.4643 91.6071H3.39288V84.8214C3.39288 76.7228 6.61003 68.9559 12.3366 63.2294C18.0631 57.5028 25.83 54.2856 33.9286 54.2856C42.0272 54.2856 49.7941 57.5028 55.5206 63.2294C61.2472 68.9559 64.4643 76.7228 64.4643 84.8214V91.6071Z"
                        stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M61.0715 10.1787C65.1208 10.1787 69.0042 11.7873 71.8675 14.6506C74.7308 17.5138 76.3393 21.3973 76.3393 25.4466C76.3393 29.4959 74.7308 33.3793 71.8675 36.2426C69.0042 39.1059 65.1208 40.7144 61.0715 40.7144"
                        stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M71.9286 55.5752C77.7089 57.7741 82.6853 61.6763 86.1992 66.7655C89.7132 71.8546 91.599 77.8908 91.6072 84.0752V91.6073H81.4286"
                        stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <p class="text-white py-4">Collaborations & Specific Request</p>
                <p class="text-white font-light">You can reach us through:</p>

            </div>
        </div>

        <hr class="w-full my-10">
        @include('components.layouts.footer')
    </section>
</x-layouts.main-app>
