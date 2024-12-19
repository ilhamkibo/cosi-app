<x-layouts.main-app>
    <div class="flex flex-col max-w-6xl mx-auto border-t md:border-t-0 mt-16 md:mt-24 justify-between min-h-screen">


        <div class="flex flex-col gap-4 mb-10">
            <h1>{{ $article['title']['rendered'] }}</h1>
            <div>
                Kategori : {{ $article['categories'][0] }}
            </div>
            <div class="post-content flex flex-col gap-2">
                {!! $article['content']['rendered'] !!}
            </div>
        </div>



        @include('components.layouts.footer')
    </div>

</x-layouts.main-app>
