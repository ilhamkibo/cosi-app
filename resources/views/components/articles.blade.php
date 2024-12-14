<x-layouts.main-app>
    <div class="flex flex-col max-w-6xl mx-auto border-t md:border-t-0 mt-16 md:mt-24 justify-between min-h-screen">
        <div class="space-y-3 mt-2 xl:px-0 px-5">
            <h3 class="border rounded-2xl border-green-75 px-2 py-1 max-w-fit">Cosi's Journal</h3>
            <h1 class="text-4xl md:text-6xl italic font-fraunces">Reimagining Plastic, Redefining Possibilities</h1>
            <p>Discover the journey of plastic from waste to wonder. Empower yourself with knowledge that drives a
                circular economy.</p>
        </div>
        {{-- <div class="grid grid-cols-1 gap-6 xl:px-0 px-5 my-5">

            <a href="#" class="hidden sm:block">
                <div
                    class="flex w-full flex-col gap-3 rounded-lg bg-zinc-900 p-6 hover:scale-[0.995] hover:opacity-90 md:flex-row">
                    <div class="relative h-48 w-full md:h-auto md:w-1/2">
                      
                        <img src="{{ asset('images/default-thumbnail.png') }}" alt="Test"
                            class="h-40 w-full rounded-md object-cover">
                    </div>
                    <div class="flex w-full flex-col">
                        <div class="flex gap-2 text-sm">
                            <p class="text-orange-600">Blog</p>
                            <p class="md:font-thin">—</p>
                            <p class="text-zinc-400 md:font-thin">
                                Tuesday, 23 Jul 2024</p>
                        </div>
                        <p class="font-bold">Yuhu Kujanga gaul banget</p>
                        <div class="text-sm md:font-thin">
                            <p>Kalibrasi alat incubator adalah proses yang sangat penting untuk memastikan bahwa
                                perangkat ini berfungsi dengan baik dan memberikan hasil yang akurat. Incubator, yang
                                sering digunakan dalam laboratorium untuk menginkubasi mikroorganisme atau sel-sel,
                                memerlukan pengaturan suhu, kelembaban, dan gas yang sangat presisi. Ketidakakuratan
                                dalam parameter ini bisa menyebabkan hasil eksperimen yang tidak valid atau bahkan
                                merusak […]</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#" class="hidden sm:block">
                <div
                    class="flex w-full flex-col gap-3 rounded-lg bg-zinc-900 p-6 hover:scale-[0.995] hover:opacity-90 md:flex-row">
                    <div class="relative h-48 w-full md:h-auto md:w-1/2">
                      
                        <img src="{{ asset('images/default-thumbnail.png') }}" alt="Test"
                            class="h-40 w-full rounded-md object-cover">
                    </div>
                    <div class="flex w-full flex-col">
                        <div class="flex gap-2 text-sm">
                            <p class="text-orange-600">Blog</p>
                            <p class="md:font-thin">—</p>
                            <p class="text-zinc-400 md:font-thin">
                                Tuesday, 23 Jul 2024</p>
                        </div>
                        <p class="font-bold">Yuhu Kujanga gaul banget</p>
                        <div class="text-sm md:font-thin">
                            <p>Kalibrasi alat incubator adalah proses yang sangat penting untuk memastikan bahwa
                                perangkat ini berfungsi dengan baik dan memberikan hasil yang akurat. Incubator, yang
                                sering digunakan dalam laboratorium untuk menginkubasi mikroorganisme atau sel-sel,
                                memerlukan pengaturan suhu, kelembaban, dan gas yang sangat presisi. Ketidakakuratan
                                dalam parameter ini bisa menyebabkan hasil eksperimen yang tidak valid atau bahkan
                                merusak […]</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#" class="hidden sm:block">
                <div
                    class="flex w-full flex-col gap-3 rounded-lg bg-zinc-900 p-6 hover:scale-[0.995] hover:opacity-90 md:flex-row">
                    <div class="relative h-48 w-full md:h-auto md:w-1/2">
                      
                        <img src="{{ asset('images/default-thumbnail.png') }}" alt="Test"
                            class="h-40 w-full rounded-md object-cover">
                    </div>
                    <div class="flex w-full flex-col">
                        <div class="flex gap-2 text-sm">
                            <p class="text-orange-600">Blog</p>
                            <p class="md:font-thin">—</p>
                            <p class="text-zinc-400 md:font-thin">
                                Tuesday, 23 Jul 2024</p>
                        </div>
                        <p class="font-bold">Yuhu Kujanga gaul banget</p>
                        <div class="text-sm md:font-thin">
                            <p>Kalibrasi alat incubator adalah proses yang sangat penting untuk memastikan bahwa
                                perangkat ini berfungsi dengan baik dan memberikan hasil yang akurat. Incubator, yang
                                sering digunakan dalam laboratorium untuk menginkubasi mikroorganisme atau sel-sel,
                                memerlukan pengaturan suhu, kelembaban, dan gas yang sangat presisi. Ketidakakuratan
                                dalam parameter ini bisa menyebabkan hasil eksperimen yang tidak valid atau bahkan
                                merusak […]</p>
                        </div>
                    </div>
                </div>
            </a>
        </div> --}}

        <div class="flex flex-col sm:flex-row gap-4 my-6">
            <!-- Filter Kategori -->
            <div class="flex-1">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category" name="category"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Select Category</option>
                    <!-- Loop through categories dynamically -->
                    @foreach ($categories as $categoryId => $categoryName)
                        <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Tag -->
            <div class="flex-1">
                <label for="tag" class="block text-sm font-medium text-gray-700">Tag</label>
                <select id="tag" name="tag"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Select Tag</option>
                    <!-- Loop through tags dynamically -->
                    @foreach ($tags as $tagId => $tagName)
                        <option value="{{ $tagId }}">{{ $tagName }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Button -->
            <div class="flex items-end">
                <button type="submit" class="mt-4 px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg">
                    Apply Filters
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 xl:px-0 px-5 my-5">
            @foreach ($articles as $item)
                @if ($loop->first)
                    <a href="/post/{{ $item['slug'] }}" class="hidden sm:block">
                        <div
                            class="relative flex items-end rounded-lg overflow-hidden hover:scale-[0.995] transition-transform">
                            <!-- Thumbnail Image -->
                            <img src="{{ $item['thumbnail'] ?? asset('images/default-thumbnail.png') }}"
                                alt="{{ $item['title'] }}" class="w-full max-h-[500px] object-cover">

                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-75 via-green-75/40 to-transparent">
                            </div>

                            <!-- Content -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                <!-- Title -->
                                <h2 class="text-2xl md:text-4xl italic font-serif mb-2 leading-tight">
                                    {{ $item['title'] }}
                                </h2>

                                <!-- Excerpt -->
                                <p class="text-sm text-white/80 mb-4 line-clamp-2">
                                    {!! $item['excerpt'] !!}
                                </p>

                                <!-- Meta Information -->
                                <div class="flex justify-between items-center text-xs text-white/60">
                                    <p>Written by <span class="font-semibold">{{ $item['author'] ?? 'Author' }}</span>
                                    </p>
                                    <p>Published on
                                        {{ \Carbon\Carbon::parse($item['date'])->translatedFormat('j F Y') }}</p>
                                </div>
                            </div>

                            <!-- Decorative Squares (Top-Right) -->
                            <div class="absolute top-0 right-0 flex flex-wrap">
                                <div class="bg-gray-75 w-6 h-6"></div>
                                <div class="bg-transparent w-6 h-6"></div>
                                <div class="bg-gray-75 w-6 h-6"></div>
                            </div>
                            <div class="absolute top-6 right-0 flex flex-wrap">
                                <div class="bg-gray-75 w-6 h-6"></div>
                                <div class="bg-transparent w-6 h-6"></div>
                            </div>
                            <div class="absolute top-12 right-0 flex flex-wrap">
                                <div class="bg-gray-75 w-6 h-6"></div>
                            </div>
                        </div>
                    </a>
                @else
                    <a href="/post/{{ $item['slug'] }}">
                        <div
                            class="flex w-full flex-col gap-3 rounded-lg bg-zinc-900 p-6 hover:scale-[0.995] hover:opacity-90 md:flex-row">
                            <div class="relative h-48 w-full md:h-auto md:w-1/2">
                                <img src="{{ $item['thumbnail'] ?? asset('images/default-thumbnail.png') }}"
                                    alt="{{ $item['title'] }}" class="h-40 w-full rounded-md object-cover">
                            </div>
                            <div class="flex w-full flex-col">
                                <div class="flex gap-2 text-sm">
                                    <p class="text-orange-600">{{ implode(', ', $item['categories']) }}</p>
                                    <p class="md:font-thin">—</p>
                                    <p class="text-zinc-400 md:font-thin">
                                        {{ \Carbon\Carbon::parse($item['date'])->translatedFormat('l, j M Y') }}</p>
                                </div>
                                <p class="font-bold">{{ $item['title'] }}</p>
                                <div class="text-sm md:font-thin">
                                    <p>{!! $item['excerpt'] !!}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
        <div class="flex justify-center items-center my-6">
            <nav aria-label="Page navigation">
                <ul class="flex flex-wrap justify-center items-center">
                    <!-- Previous Page Button -->
                    @if ($currentPage > 1)
                        <li>
                            <a href="?page={{ $previousPage }}"
                                class="px-4 py-1 border border-blue-75 rounded-2xl hover:text-blue-75 text-xs md:text-base">
                                &#10094;
                            </a>
                        </li>
                    @endif

                    <!-- First Page -->
                    <li>
                        <a href="?page={{ 1 }}"
                            class="px-3 py-2 text-sm font-medium {{ $currentPage == 1 ? 'text-green-75 underline underline-offset-2' : 'text-black' }} hover:text-blue-75">
                            {{ 1 }}
                        </a>
                    </li>

                    <!-- Dot Before Page Numbers (If There Are Pages Before) -->
                    @if ($startPage > 2)
                        <li>
                            <span class="px-2 py-2 text-sm font-medium">...</span>
                        </li>
                    @endif

                    <!-- Page Numbers -->
                    @for ($page = $startPage; $page <= $endPage; $page++)
                        @if ($page != $totalPages && $page != 1)
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['page' => $page]) }}"
                                    class="px-2 py-2 text-sm font-medium {{ $page == $currentPage ? 'text-green-75 underline underline-offset-2' : 'text-black' }}  hover:text-blue-75">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endfor

                    <!-- Dot After Page Numbers (If There Are Pages After) -->
                    @if ($endPage < $totalPages - 1)
                        <li>
                            <span class="px-2 py-2 text-sm font-medium">...</span>
                        </li>
                    @endif

                    <!-- Last Page -->
                    <li>
                        <a href="?page={{ $totalPages }}"
                            class="px-3 py-2 text-sm font-medium {{ $totalPages == $currentPage ? 'text-green-75 underline underline-offset-2' : 'text-black' }} hover:text-blue-75">
                            {{ $totalPages }}
                        </a>
                    </li>

                    <!-- Next Page Button -->
                    @if ($currentPage < $totalPages)
                        <li>
                            <a href="?page={{ $nextPage }}"
                                class="px-4 py-1 text-sm border border-blue-75 rounded-2xl hover:text-blue-75 md:text-base">
                                &#10095;
                            </a>
                        </li>
                    @endif



                </ul>
            </nav>
        </div>



        @include('components.layouts.footer')
    </div>

</x-layouts.main-app>
