<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ring-1 ring-gray-700">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-6 pt-10 pb-2">
                    <div
                        class="flex justify-between border-b border-gray-900/10 items-center w-full py-10 text-lg font-semibold text-left text-gray-900 bg-white">
                        <div>
                            <div class="font-bold text-xl text-gray-700">
                                {{ $project->title }}
                            </div>
                            <div class="font-regular text-sm text-gray-500">
                                {{ $project->type?->name }}
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('admin.projects.edit', $project) }}"
                                class="text-white bg-indigo-700 hover:bg-indigo-800 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none ">Edit</a>
                            <a href="{{ route('admin.projects.create') }}"
                                class="text-white bg-gray-700 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none ">Delete</a>
                        </div>
                    </div>
                    <div class="py-10 flex gap-10">
                        <div class="image w-3/5 h-[500px] overflow-hidden bg-gray-100 rounded">
                            @if ($project->image)
                                <img class="w-full object-cover" src="{{ asset("storage/$project->image") }}"
                                    alt="fwef">
                            @else
                                <div class="flex items-center w-full h-full justify-center">
                                    <div>This project has no image...</div>
                                </div>
                            @endif
                        </div>
                        <div class="text w-2/5 flex flex-col justify-between pb-1.5">
                            <div>
                                @if ($project->description)
                                    <div class="desc mb-4">
                                        <div class="font-bold text-lg mb-3">Description:</div>
                                        <p>{{ $project->description }}</p>
                                    </div>
                                @endif
                                @if (!$project->technologies->isEmpty())
                                    <div class="tech mb-4">
                                        <div class="font-bold text-lg mb-3">Technologies:</div>
                                        <div class="flex flex-wrap gap-1">
                                            @foreach ($project->technologies as $tech)
                                                <span class="bg-gray-200 py-1 px-3 rounded-lg text-sm">
                                                    {{ $tech->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="flex gap-2">
                                @if ($project->live_link)
                                    <div class="live_link ">
                                        <a href="{{ $project->live_link }}" target="_blank"
                                            class="bg-gray-700 p-2 text-white px-3 rounded-lg">
                                            Live Version
                                        </a>
                                    </div>
                                @endif
                                @if ($project->code_link)
                                    <div class="code_link ">
                                        <a href="{{ $project->code_link }}" target="_blank"
                                            class="bg-gray-700 p-2 text-white px-3 rounded-lg">
                                            Source Code
                                        </a>
                                    </div>
                                @endif
                                <a class="font-bold ms-auto text-indigo-700 hover:text-gray-700 hover:underline me-5"
                                    href="{{ route('admin.projects.index') }}">Back To Projects</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
