<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg pb-10">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <div
                            class="flex justify-between items-center w-full px-6 py-10 text-lg font-semibold text-left text-gray-900 bg-white">
                            <div>
                                All Projects
                            </div>
                            <button type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                                Project</button>
                        </div>
                        <thead class="text-xs text-white uppercase bg-gray-700 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Project Type
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Technologies
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $project)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $project->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{-- <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                            src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt=""> --}}


                                        @if (Storage::exists("storage/$project->image"))
                                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                                src="{{ asset("storage/$project->image") }}"
                                                alt="{{ $project->title }} image">
                                        @else
                                            <div
                                                class="h-12 w-12 flex-none rounded-full bg-gray-100 flex justify-center items-center">
                                                X</div>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 ">
                                        {{ $project->type?->name ?? 'no type' }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        <div class="flex min-h-full gap-3 items-center">
                                            @foreach ($project->technologies as $tech)
                                                <div class="bg-gray-200 py-1 px-3 rounded-lg text-sm">
                                                    {{ $tech->name }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="#"
                                            class="font-medium ms-3 text-blue-600 hover:underline">Show</a>
                                        <a href="#"
                                            class="font-medium ms-3 text-blue-600 hover:underline">Edit</a>
                                        <a href="#"
                                            class="font-medium ms-3 text-red-600 hover:underline">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                no projects to show...
                            @endforelse
                        </tbody>
                    </table>
                </div>





            </div>
        </div>
    </div>
</x-app-layout>
