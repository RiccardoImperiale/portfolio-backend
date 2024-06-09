<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Types') }}
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
                            <div class="w-full font-bold text-xl text-gray-700">
                                All Types
                            </div>
                            <form action="{{ route('admin.types.store') }}" method="post">
                                @csrf
                                <div class="w-full relative">
                                    <input type="search" id="default-search" name="name"
                                        class="block w-full p-4 ps-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                        placeholder="Search Mockups, Logos..." required />
                                    <button type="submit"
                                        class="text-white absolute end-2.5 bottom-2.5 bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-indigo-600 dark:hover:bg-indigo-600 dark:focus:ring-indigo-800">Create
                                        New Type</button>
                                </div>
                            </form>
                        </div>
                        <thead class="text-xs text-white uppercase bg-gray-700 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">actions</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($types as $type)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        <div class="flex gap-5">
                                            <svg style="fill:#374151" clip-rule="evenodd" fill-rule="evenodd"
                                                stroke-linejoin="round" 2 width=20 stroke-miterlimit="2"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="m4.481 15.659c-1.334 3.916-1.48 4.232-1.48 4.587 0 .528.46.749.749.749.352 0 .668-.137 4.574-1.492zm1.06-1.061 3.846 3.846 11.321-11.311c.195-.195.293-.45.293-.707 0-.255-.098-.51-.293-.706-.692-.691-1.742-1.74-2.435-2.432-.195-.195-.451-.293-.707-.293-.254 0-.51.098-.706.293z"
                                                    fill-rule="nonzero" />
                                            </svg>
                                            <form action="{{ route('admin.types.update', $type) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input name="name"
                                                    class="border-0 m-0 py-2.5 ps-4 focus:ring-0 h-full bg-gray-100 rounded-lg"
                                                    type="text" value="{{ $type->name }}">
                                                <input type="hidden" name="form_name" value="form_{{ $loop->index }}">
                                            </form>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        @if (old('form_name') == "form_$loop->index")
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right">

                                        <button data-modal-target="modal-{{ $type->id }}" type="submit"
                                            class="ms-5 text-bold text-red-600 hover:underline">
                                            Delete
                                        </button>

                                        <x-delete-modal :target="$type" section="types" />
                                    </td>
                                </tr>
                            @empty
                                no types to show...
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pagination p-6">
                        {{ $types->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
