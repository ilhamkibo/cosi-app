<x-layouts.main-app>
    <div class="flex flex-col max-w-6xl mx-auto border-t md:border-t-0 mt-16 md:mt-24 justify-between min-h-screen">
        <div class="space-y-10 xl:px-0 px-5">

            {{-- <div class="max-w-[400px] mr-auto">
                <h1 class="font-fraunces italic text-4xl md:text-6xl text-blue-75 justify-items-start">Innovate</h1>
                <p>As a pioneer in plastic recycling, Cosi redefines innovation by <span
                        class="font-semibold text-green-75">transforming waste</span> into high-value
                    solutions that drive meaningful environmental progress.
                </p>
            </div>
            <div class="max-w-[400px] ml-auto">
                <h1 class="font-fraunces italic text-4xl md:text-6xl text-blue-75">create</h1>
                <p>With a strategic foothold in the Indonesian market, Cosi crafts <span
                        class="font-semibold text-green-75">premium furniture and products</span> that
                    blend economic value with timeless design.
                </p>
            </div>
            <div class="max-w-[400px] mr-auto">
                <h1 class="font-fraunces italic text-4xl md:text-6xl text-green-75">Sustain</h1>
                <p>Beyond recycling, Cosi embodies a <span class="font-semibold text-blue-75">vision of
                        sustainability</span> through groundbreaking solutions that
                    transcend conventional boundaries, fostering a greener and more responsible future.
                </p>
            </div> --}}
            <div class="flex flex-col md:flex-row gap-10 justify-between items-center">
                <div>
                    <h1 class="font-fraunces italic text-4xl md:text-6xl text-blue-75 justify-items-start">Innovate</h1>
                    <p>As a pioneer in plastic recycling, Cosi redefines innovation by <span
                            class="font-semibold text-green-75">transforming waste</span> into high-value
                        solutions that drive meaningful environmental progress.
                    </p>
                </div>
                <div class="max-w-[400px]">
                    <img src="{{ asset('images/innovate.jpg') }}" alt="innovate-image" class="object-contain rounded-lg">
                </div>
            </div>
            <div class="flex flex-col-reverse md:flex-row gap-10 justify-between items-center">
                <div class="max-w-[400px]">
                    <img src="{{ asset('images/create.jpg') }}" alt="create-image" class="object-contain rounded-lg">
                </div>
                <div>
                    <h1 class="font-fraunces italic text-4xl md:text-6xl text-green-75">create</h1>
                    <p>With a strategic foothold in the Indonesian market, Cosi crafts <span
                            class="font-semibold text-blue-75">premium furniture and products</span> that
                        blend economic value with timeless design.
                    </p>
                </div>

            </div>
            <div class="flex flex-col md:flex-row gap-10 justify-between items-center">
                <div>
                    <h1 class="font-fraunces italic text-4xl md:text-6xl text-blue-75">Sustain</h1>
                    <p>Beyond recycling, Cosi embodies a <span class="font-semibold text-green-75">vision of
                            sustainability</span> through groundbreaking solutions that
                        transcend conventional boundaries, fostering a greener and more responsible future.
                    </p>
                </div>
                <div class="max-w-[400px]">
                    <img src="{{ asset('images/sustain.png') }}" alt="sustain-image" class="object-contain rounded-lg">
                </div>
            </div>
        </div>
        <hr class="w-full my-10 border-green-75 ">
        <div class="flex md:flex-row flex-col gap-10 justify-center xl:px-0 px-5">
            <div class="flex-1 text-justify">
                <h1 class="text-3xl text-green-75 font-fraunces">Vision</h1>
                <p>Our vision is to build a sustainable future where recycled goods are accessible to everyone, by
                    leading innovation in plastic recycling, transforming waste into valuable resources, and advancing a
                    circular economy that benefits people and the planet.</p>
            </div>
            <div class="flex-1 text-justify">
                <h1 class="text-3xl text-blue-75 font-fraunces">Mission</h1>
                <ul class="list-none space-y-2">
                    <li><span class="font-semibold">Reduce</span> plastic waste through innovative
                        recycling techniques.</li>
                    <li><span class="font-semibold">Educate </span>communities to embrace sustainability and adopt
                        eco-conscious lifestyles.</li>
                    <li><span class="font-semibold">Empower </span>individuals and industries with affordable,
                        high-quality recycled products that combine functionality with environmental responsibility.
                    </li>
                </ul>
            </div>
        </div>
        <h1
            class="text-transparent bg-clip-text text-center text-xl sm:text-2xl lg:text-4xl font-fraunces bg-gradient-to-r from-green-75 to-blue-75 my-10 p-2">
            #RecycledGoodsForEveryone</h1>

        <div class="mb-10 h-48"
            style="background-image: url('/images/about-2.png'); background-size: cover; background-position: center">
        </div>
        @include('components.layouts.footer')
    </div>

</x-layouts.main-app>
