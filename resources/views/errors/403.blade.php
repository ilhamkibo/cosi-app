<x-layouts.main-app>
    <div class="flex flex-col max-w-6xl mx-auto border-t md:border-t-0 mt-16 md:mt-24 justify-between min-h-screen">

        {{-- <div class="bg-zinc-400">asdasd</div> --}}

        <!-- Container untuk konten -->
        <section class="flex flex-col justify-center items-center flex-grow ">
            <h1 class="text-center text-9xl font-fraunces text-blue-75">
                403
            </h1>

            <p class="text-center text-4xl">
                Oops.. You are not allowed to access this page!
            </p>
            <div class="w-full  rounded-lg mt-10 h-36 flex items-center justify-center">
                <a href="/"
                    class="text-center text-xl text-green-75 hover:scale-105 transition-transform duration-300">&crarr;
                    Go back to home</a>
            </div>
        </section>


        <!-- Footer -->
        <div>
            @include('components.layouts.footer')
        </div>

    </div>
</x-layouts.main-app>
