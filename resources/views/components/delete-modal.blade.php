<div id="modal-{{ $target->id }}" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-[400px] shadow-lg rounded-md bg-white">
        <!-- Modal content -->
        <div>
            <div class="flex justify-between gap-5 mb-10">
                <h2 class="text-xl w-[250px] text-left">Are you sure you want to delete it?</h2>
                <button
                    class="close-modal w-8 h-8 text-white bg-gray-700 hover:bg-indigo-800 font-medium rounded-lg text-sm focus:outline-none">X</button>
            </div>
            <form action="{{ route("admin.$section.destroy", $target) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="confirm-delete text-white bg-rose-700 hover:bg-gray-800 font-bold rounded-lg text-sm px-5 py-2.5 focus:outline-none">Delete</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const modalLinks = document.querySelectorAll('[data-modal-target]');

        modalLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetModal = link.getAttribute('data-modal-target');
                const modal = document.getElementById(targetModal);
                modal.classList.remove('hidden');
            });
        });

        const closeButtons = document.querySelectorAll('.close-modal');
        closeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = button.closest('.fixed');
                modal.classList.add('hidden');
            });
        });
    });
</script>
