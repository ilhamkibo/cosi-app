<x-layouts.main-app>
    <div class="flex flex-col max-w-6xl mx-auto border-t md:border-t-0 mt-16 md:mt-24 justify-between min-h-screen">
        <div class="grid gap-8 md:grid-cols-3 my-6">
            <div class="relative px-5 xl:px-0 flex flex-col items-center gap-10 md:col-span-2" bis_skin_checked="1">
                <div class="flex flex-col gap-4" bis_skin_checked="1">
                    <h1 class="text-4xl font-bold">{{ $article['title']['rendered'] }}</h1>
                    <div class="flex flex-col gap-2 md:flex-row md:items-center" bis_skin_checked="1">
                        <p>Cosi Eco Living</p>
                        <p class="hidden md:block md:font-thin">—</p>
                        <div class="flex gap-2" bis_skin_checked="1">
                            <p class="text-green-75">{{ $article['categories'][0] }}</p>
                            <p class="md:font-thin">—</p>
                            <p class="text-zinc-400 md:font-thin">{{ $article['date'] }}</p>
                        </div>
                    </div>
                    <div class="post-content flex flex-col gap-2" bis_skin_checked="1">
                        {!! $article['content']['rendered'] !!}
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-8 px-5 xl:px-0" bis_skin_checked="1">
                <div class="flex flex-col gap-2" bis_skin_checked="1">
                    <h5 class="font-bold">Recent Articles</h5>
                    <div class="grid grid-cols-1 gap-3" bis_skin_checked="1">
                        @foreach ($relatedArticles as $article)
                            <a href="{{ route('articles.show', $article['slug']) }}">
                                <div class="flex w-full flex-col gap-3 rounded-lg bg-green-75/50 p-6 hover:opacity-90"
                                    bis_skin_checked="1">
                                    <img src="{{ $article['thumbnail'] ?? asset('images/default-thumbnail.png') }}"
                                        alt="" class="h-32 w-full rounded-md object-cover">
                                    <div class="flex w-full flex-col" bis_skin_checked="1">
                                        <div class="flex gap-2 text-sm" bis_skin_checked="1">
                                            <p class="text-blue-75">{{ $article['categories'][0] }}</p>
                                            <p class="md:font-thin">—</p>
                                            <p class="text-black md:font-thin">{{ $article['date'] }}</p>
                                        </div>
                                        <p class="line-clamp-2 font-bold">{{ $article['title']['rendered'] }}</p>
                                        <div class="line-clamp-3 text-sm md:font-thin" bis_skin_checked="1">
                                            <p>{!! $article['excerpt']['rendered'] !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="flex flex-col gap-2" bis_skin_checked="1">
                    <h5 class="font-bold">See our products</h5>
                    <div class="flex flex-col gap-4" bis_skin_checked="1">
                        @foreach ($products as $product)
                            @if ($product->name !== 'All')
                                <a href={{ route('products.show', $product->slug) }}>
                                    <div class="flex cursor-pointer items-center gap-2 rounded border border-zinc-600 p-2 hover:opacity-70"
                                        bis_skin_checked="1"><img src="{{ asset($product->photo_url) }}" width="48"
                                            height="48" class="rounded" alt="Termometer Simulasi">
                                        <div class="flex flex-col" bis_skin_checked="1">
                                            <h5>{{ $product->name }}</h5>
                                            <p class="text-sm text-blue-75">
                                                {{ $product->name == 'Others' ? 'Home Decor' : 'Furniture' }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



        @include('components.layouts.footer')
    </div>

</x-layouts.main-app>
