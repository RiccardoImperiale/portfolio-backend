<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>
    <x-session-messages />
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ring-1 ring-gray-700">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <div
                            class="flex justify-between items-center w-full px-6 py-10 text-lg font-semibold text-left text-gray-900 bg-white">
                            <div class="font-bold text-xl text-gray-700">
                                All Projects
                            </div>
                            <a href="{{ route('admin.projects.create') }}"
                                class="text-white bg-indigo-700 hover:bg-indigo-800 font-medium rounded-lg text-sm px-5 py-2.5  focus:outline-none ">New
                                Project</a>
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
                                        @if ($project->image)
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
                                    <td class="px-6 py-4 text-right ">
                                        <a href="{{ route('admin.projects.show', $project) }}"
                                            class="flex items-center">
                                            <svg style="fill: #374151" xmlns="http://www.w3.org/2000/svg" width="22"
                                                height="22" viewBox="0 0 24 24">
                                                <path
                                                    d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                no projects to show...
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pagination p-6">
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
