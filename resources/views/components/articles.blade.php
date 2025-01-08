<x-layouts.main-app>
    <div class="flex flex-col max-w-6xl mx-auto border-t md:border-t-0 mt-16 md:mt-18 justify-between min-h-screen">
        <div class="space-y-3 mt-2 px-5 py-5 border rounded-md border-green-75 mx-5 xl:mx-0">
            <h3 class="border rounded-2xl border-green-75 px-2 py-1 max-w-fit">Cosi's Journal</h3>
            <h1 class="text-4xl md:text-5xl font-fraunces"><span class="italic text-blue-75">Reimagining</span> Plastic,
                <span class="italic text-blue-75">Redefining</span>
                Possibilities
            </h1>
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

        {{-- <div class="flex flex-col sm:flex-row gap-4 my-6">
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
        </div> --}}

        @if (!empty($articles) && isset($articles[0]))
            {{-- <div class="xl:px-0 px-5 my-5 hidden md:grid md:grid-cols-1">
                <a href="{{ route('articles.show', $articles[0]['slug']) }}" class="hidden sm:block">
                    <div class="relative flex items-end overflow-hidden hover:scale-[0.995] transition-transform">
                        <!-- Thumbnail Image -->
                        <img src="{{ $articles[0]['thumbnail'] ?? asset('images/default-thumbnail.png') }}"
                            alt="{{ $articles[0]['title'] }}" class="w-full max-h-[612px] object-cover">

                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-75 via-green-75/40 to-transparent">
                        <div class="absolute inset-0 bg-gray-500/20">
                        </div>

                        <!-- Content -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <!-- Title -->
                            <h2 class="text-2xl md:text-4xl italic font-serif mb-2 leading-tight">
                                {{ $articles[0]['title'] }}
                            </h2>

                            <!-- Excerpt -->
                            <p class="text-sm text-white/80 mb-4 line-clamp-2">
                                {!! $articles[0]['excerpt'] !!}
                            </p>

                            <!-- Meta Information -->
                            <div class="flex justify-between items-center text-xs text-white/60">
                                <p>Written by <span
                                        class="font-semibold">{{ $articles[0]['author'] ?? 'Author' }}</span>
                                </p>
                                <p>Published on
                                    {{ \Carbon\Carbon::parse($articles[0]['date'])->translatedFormat('j F Y') }}</p>
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
            </div> --}}
            <div class="xl:px-0 px-5 my-5 hidden md:grid md:grid-cols-2">

                <div class="p-3 bg-white rounded-lg shadow-md shadow-gray-500/50">
                    <img src="{{ $articles[0]['thumbnail'] ?? asset('images/default-thumbnail.png') }}"
                        alt="{{ $articles[0]['title'] }}" class="w-full aspect-[3/2] rounded-lg object-cover">
                </div>
                <div class="pl-10 flex flex-col gap-2 justify-center">
                    <h1 class="text-3xl font-medium">{{ $articles[0]['title'] ?? 'Title' }}</h1>
                    <div class="font-extralight text-sm">
                        <p class="">{!! \Illuminate\Support\Str::limit($articles[0]['excerpt'], 200, '...') ?? 'Excerpt' !!}</p>
                    </div>
                    <a href="{{ route('articles.show', $articles[0]['slug']) }}"
                        class="font-semibold text-blue-75 hover:scale-105 w-fit flex items-center gap-1 transition-transform duration-300">Read
                        More <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                            class="w-4 h-4">
                            <path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414 4.95-4.95z" />
                        </svg>
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd"
                                d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z"
                                clip-rule="evenodd" />
                        </svg> --}}
                    </a>
                </div>
            </div>

            <div class="xl:px-0 px-5 mt-10">
                <h1 class="text-2xl">Our Recent Articles</h1>
                <h4 class="text-sm text-gray-600">Stay Informed with Our Latest Insights</h4>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 xl:px-0 px-5 my-5" style="grid-auto-rows: 1fr;">
                @foreach ($articles as $item)
                    <div class="{{ $loop->first ? 'md:hidden' : '' }} flex w-full flex-col gap-3 rounded-lg h-full">
                        <!-- Gambar Card -->
                        <div class="relative h-48 w-full">
                            <img src="{{ $item['thumbnail'] ?? asset('images/default-thumbnail.png') }}"
                                alt="{{ $item['title'] }}" class="w-full h-full object-cover rounded-lg">
                        </div>

                        <!-- Konten Card -->
                        <div class="flex w-full flex-col flex-grow gap-2 pb-4">
                            <!-- Tanggal & Penulis -->
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <p class="text-green-75 font-semibold">{{ $item['categories'][0] ?? 'Nama Penulis' }}
                                </p>
                                <p class="text-gray-400">
                                    {{ \Carbon\Carbon::parse($item['date'])->translatedFormat('d M Y') }}</p>
                            </div>

                            <!-- Judul -->
                            <p class="font-bold text-lg text-gray-900 leading-tight">
                                {!! \Illuminate\Support\Str::limit($item['title'], 60, '...') !!}
                            </p>

                            <!-- Excerpt -->
                            <div class="text-sm text-gray-600 line-clamp-2">
                                <p>{!! \Illuminate\Support\Str::limit($item['excerpt'], 200, '...') !!}</p>
                            </div>

                            <!-- Link "Read More" -->
                            <div>
                                <a href="{{ route('articles.show', $item['slug']) }}"
                                    class="text-blue-75 font-semibold hover:scale-105 w-fit transition-transform duration-300 ease-in-out flex items-center gap-1 mt-auto">
                                    <span>Read More</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-4 h-4">
                                        <path
                                            d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414 4.95-4.95z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
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
                        @if ($totalPages > 1)
                            <li>
                                <a href="?page={{ 1 }}"
                                    class="px-3 py-2 text-sm font-medium {{ $currentPage == 1 ? 'text-green-75 underline underline-offset-2' : 'text-black' }} hover:text-blue-75">
                                    {{ 1 }}
                                </a>
                            </li>
                        @endif

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
        @else
            <div class="xl:px-0 px-5 my-5 hidden md:grid md:grid-cols-1 ">
                <div>
                    <p class="text-center text-2xl font-bold">No articles found</p>
                </div>
            </div>
            <div class="flex justify-center items-center my-6">
                <nav aria-label="Page navigation">
                    <ul class="flex flex-wrap justify-center items-center">
                        <li>
                            <a href="?page={{ 1 }}"
                                class="px-3 py-2 text-sm border border-blue-75 rounded-2xl font-medium text-black hover:text-blue-75">
                                Back to first page
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        @endif





        @include('components.layouts.footer')
    </div>

</x-layouts.main-app>
