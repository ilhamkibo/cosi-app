<x-layouts.main-app>
    <div class="flex flex-col max-w-6xl mx-auto mt-24 justify-between min-h-screen">
        <div class="my-6 mx-auto flex max-w-6xl flex-col items-stretch gap-20 p-5 md:gap-24" bis_skin_checked="1">
            <div class="relative flex flex-col items-center gap-10" bis_skin_checked="1">
                <div class="max-w-3xl self-center text-center" bis_skin_checked="1">
                    <p class="mb-4 text-4xl font-bold">Powered by <span
                            class="text-green-75 font-fraunces">Circularity</span></p>
                    <p class="text-xl md:font-extralight">You can easily contact the Cosi team, either online via phone
                        or
                        email, or offline by visiting our office. We are ready to serve you in the most convenient way
                        for you, whether it's for more information or collaboration on eco-friendly products.</p>

                </div>
                <div class="flex gap-4" bis_skin_checked="1"><a target="_blank" rel="noopener noreferrer"
                        class="w-full rounded-md bg-blue-75 px-4 py-4 text-center text-xl font-bold text-white hover:opacity-90 md:w-max"
                        href="https://wa.me/6285136395323?text=Halo%20Bapak%2FIbu%2C%20saya%20tertarik%20dengan%20product%20dari%20Cosi%0A%0ANama%20%3A%20%0APerusahaan%20%3A%20%0AKebutuhan%20%3A%20%0A-%20%0A%0AMohon%20informasi%20lebih%20lanjut.%20Terima%20kasih.">Contact
                        Us</a><a target="_blank" rel="noopener noreferrer"
                        class="w-full rounded-md border bg-green-75 px-4 py-4 text-center text-xl text-white hover:opacity-90 md:w-max"
                        href="{{ route('review') }}">Review
                        Us</a></div>
            </div>
            <div class="flex flex-col gap-4 md:flex-row md:justify-evenly" bis_skin_checked="1">
                <div class="flex flex-col gap-3 md:w-1/4" bis_skin_checked="1">
                    <div class="flex items-center gap-2" bis_skin_checked="1"><svg stroke="currentColor" fill="none"
                            stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="32" width="32"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                        <p class="text-lg font-bold">Address</p>
                    </div>
                    <p class="text-sm">GVQQ+9V3 Dk, RT 001/001 Dusun I, Sragen, Jawa Tengah, 57283</p>
                </div>
                <div class="flex flex-col gap-3 md:w-1/4" bis_skin_checked="1">
                    <div class="flex items-center gap-2" bis_skin_checked="1"><svg stroke="currentColor" fill="none"
                            stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="32" width="32"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        <p class="text-lg font-bold">WhatsApp</p>
                    </div>
                    <p class="text-sm"><b>Office: </b>+62 851 3639 5323<br><b>Farras: </b>+62 821 3255 3763</p>
                </div>
                <div class="flex flex-col gap-3 md:w-1/4" bis_skin_checked="1">
                    <div class="flex items-center gap-2" bis_skin_checked="1"><svg stroke="currentColor" fill="none"
                            stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="32" width="32"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <p class="text-lg font-bold">Email</p>
                    </div>
                    <p class="text-sm"><b>Office: </b>contact@cosi.co.id<br><b>Farras: </b>mfarraso@cosi.co.id</p>
                </div>
            </div>
            <div class="rounded-lg bg-blue-75/50 p-4 md:p-10" bis_skin_checked="1"><iframe width="100%"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253147.52319314663!2d110.83078813241387!3d-7.527983582668322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1118bad6e56f%3A0xc6e6edc48a24893d!2sCosi%20Eco%20Living!5e0!3m2!1sen!2sid!4v1736316832587!5m2!1sen!2sid"
                    height="450" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"
                    class="rounded-lg"></iframe></div>
        </div>
        @include('components.layouts.footer')
    </div>

</x-layouts.main-app>
