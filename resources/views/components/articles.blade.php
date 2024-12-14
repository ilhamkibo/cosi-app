<x-layouts.main-app>
    <div class="flex flex-col max-w-6xl mx-auto border-t md:border-t-0 mt-16 md:mt-24 justify-between min-h-screen">

        <div class="mb-10 h-48">
            HAHHAHA
        </div>
        <div>
            @foreach ($articles as $item)
                <div class="mb-10 h-48">
                    {{ $item['title']['rendered'] }}
                </div>
                <div class="mb-10 h-48">
                    {!! $item['excerpt']['rendered'] !!}
                </div>
                <div class="mb-10 h-48">
                    {!! $item['content']['rendered'] !!}
                </div>
            @endforeach
        </div>
        @include('components.layouts.footer')
    </div>

</x-layouts.main-app>
