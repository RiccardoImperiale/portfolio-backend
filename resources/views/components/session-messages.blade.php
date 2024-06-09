@if (session('message'))
    <div id="alert-1"
        class="flex items-center py-5 px-20 mb-4 text-blue-800 bg-blue-50 dark:bg-gray-700 dark:text-green-400"
        role="alert">
        <span class="sr-only">Info</span>
        <div class="ms-3 text-xl font-medium uppercase">
            {{ session('message') }}
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg ring-1 ring-green-400 p-1 hover:bg-gray-400 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-700 dark:text-green-400 dark:hover:bg-gray-800"
            data-dismiss-target="#alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>

    <script>
        let closeButton = document.querySelector('#alert-1 button');
        closeButton.addEventListener('click', function() {
            let alert = document.querySelector('#alert-1');
            alert.style.display = 'none';
        });
    </script>
@endif
