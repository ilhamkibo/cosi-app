<x-layouts.admin.admin-app>


    <div class="border-2 border-dashed rounded-lg  border-gray-300 dark:border-gray-600 mb-4">
        <div class="p-2 ">
            <p class="w-fit rounded border-2  border-red-500 px-2 flex items-center gap-x-1">
                To do
                CRUD articles you
                can only do it on wordpress,

                <a href="https://cosi.web.id/wp-login.php" target="_blank"
                    class="hover:scale-95 ease-in-out duration-75 text-blue-500 py-2 rounded inline-block">
                    Click here
                </a> to go to wordpress.
            </p>
        </div>


        <div class="relative overflow-x-auto px-2 ">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-tl-md ">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Featured Image
                        </th>
                        <th scope="col" class="px-6 py-3 max-w-[600px]">
                            Excerpt
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Categories
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tags
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articles as $ind => $article)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                            <td scope="row"
                                class="px-6 py-4 {{ $ind === last($articles) ? 'rounded-bl-md' : '' }} font-medium text-gray-900 dark:text-white">
                                {{ $ind + 1 }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900  dark:text-white">
                                {{ $article['title'] }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{-- <img src={{ $article['thumbnail'] }} class="h-20" alt=""> --}}
                                <img src="{{ $article['thumbnail'] }}" alt="article photo"
                                    class="object-cover w-full h-full max-w-[150px] max-h-[150px] cursor-pointer"
                                    data-modal-target="modal-{{ $article['id'] }}"
                                    data-modal-toggle="modal-{{ $article['id'] }}">
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {!! $article['excerpt'] !!}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                <p>{{ $article['categories'][0] ?? $article['categories'][0] }}</p>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                <ul class="list-disc">
                                    @foreach ($article['tags'] as $item)
                                        <li>
                                            {{ $item }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                <p>{{ $article['date'] }}</p>
                            </td>
                        </tr>

                        <div id="modal-{{ $article['id'] }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-2">
                                    <img src={{ $article['thumbnail'] }} class="w-full h-full" alt="">
                                </div>
                            </div>
                        </div>


                    @empty
                        <tr>
                            <td class="px-6 py-4" colspan="9">
                                <span class="text-gray-500">No Articles Found</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-layouts.admin.admin-app>
