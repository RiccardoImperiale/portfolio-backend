<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 overflow-hidden shadow-sm sm:rounded-lg ring-1 ring-gray-700">
                <h3 class="font-bold text-xl text-gray-700">Create New Project</h3>
                <x-error-messages />

                <form action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 gap-x-6 gap-y-8">
                                {{-- title --}}
                                <div>
                                    <label for="title"
                                        class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                                    <div class="mt-2">
                                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                                            class="@error('title') ring-1 ring-rose-500 @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('title')
                                            <div class="text-rose-500 py-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- description --}}
                                <div class="mt-5">
                                    <label for="description"
                                        class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                    <div class="mt-2">
                                        <textarea id="description" name="description" rows="3"
                                            class="@error('description') ring-1 ring-rose-500 @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('description') }}</textarea>
                                    </div>
                                    <p class="mt-3 text-sm leading-6 text-gray-600">Write a description for this
                                        project.</p>
                                    @error('description')
                                        <div class="text-rose-500 py-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="flex gap-5">
                                    {{-- live_link --}}
                                    <div class="mt-5 w-full">
                                        <label for="live_link"
                                            class="block text-sm font-medium leading-6 text-gray-900">Live
                                            Link</label>
                                        <div class="mt-2">
                                            <input type="text" name="live_link" id="live_link"
                                                value="{{ old('live_link') }}"
                                                class="@error('live_link') ring-1 ring-rose-500 @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('live_link')
                                            <div class="text-rose-500 py-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- code link --}}
                                    <div class="mt-5 w-full">
                                        <label for="code_link"
                                            class="block text-sm font-medium leading-6 text-gray-900">Source Code
                                            Link</label>
                                        <div class="mt-2">
                                            <input type="text" name="code_link" id="code_link"
                                                value="{{ old('code_link') }}"
                                                class="@error('code_link') ring-1 ring-rose-500 @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('code_link')
                                            <div class="text-rose-500 py-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex gap-5">
                                    {{-- technologies --}}
                                    <div class="mt-5 w-full">
                                        <label for="technologies"
                                            class="block text-sm font-medium leading-6 text-gray-900">Technologies</label>
                                        <div class="mt-2">
                                            <select multiple id="technologies" name="technologies[]"
                                                class="block h-[180px] w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                @foreach ($technologies as $tech)
                                                    <option value="{{ $tech->id }}"
                                                        {{ in_array($tech->id, old('technologies', [])) ? 'selected' : '' }}>
                                                        {{ $tech->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        {{-- types --}}
                                        <div class="mt-5">
                                            <label for="type_id"
                                                class="block text-sm font-medium leading-6 text-gray-900">Type</label>
                                            <div class="mt-2">
                                                <select id="type_id" name="type_id"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <option selected disabled>Select a type</option>
                                                    @foreach ($types as $type)
                                                        <option value="{{ $type->id }}"
                                                            {{ $type->id == old('type_id') ? 'selected' : '' }}>
                                                            {{ $type->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{-- image --}}
                                        <div class="mt-5">
                                            <label for="image"
                                                class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                                            <div class="mt-2">
                                                <input type="file" name="image" id="image"
                                                    class="@error('image') ring-1 ring-rose-500 @enderror block w-full rounded-md border-0 px-2 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                            @error('image')
                                                <div class="text-rose-500 py-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- buttons --}}
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('admin.projects.index') }}"
                            class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
