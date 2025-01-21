
<!-- Button to trigger pop-up -->
<button
    id="openModal"
    class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none"
>
    Update Status
</button>
<button
    id="openModal"
    class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none"
>
    Alumni
</button>

<!-- Pop-up (hidden by default) -->
<div
    id="modal"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden"
>
    <div class="bg-white p-6 rounded-md w-1/3">

        <!-- Alert Input Form -->
        <section class="bg-white p-1 rounded-md ">
            <h2 class="text-xl font-bold mb-6">Alumni</h2>
            <section action="#" method="POST" class="space-y-4">
                <!-- Workplace Input -->
                <div>
                    <label for="workplace" class="block text-sm font-medium text-gray-700">Workplace</label>
                    <input
                        type="text"
                        id="workplace"
                        name="workplace"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        placeholder="Enter workplace">
                </div>

                <!-- Contribution Input -->
                <div>
                    <label for="contribution" class="block text-sm font-medium text-gray-700">Contribution</label>
                    <input
                        type="text"
                        id="contribution"
                        name="contribution"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        placeholder="Enter contribution">
                </div>

                <div class="flex justify-end space-x-4">
                    <button
                        id="closeModal"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none"
                    >
                        Close
                    </button>
                    <button
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none"
                    >
                        Confirm
                    </button>
                </div>

    </div>
</div>

<!-- JavaScript for Modal Behavior -->
<script>
    const modal = document.getElementById("modal");
    const openModal = document.getElementById("openModal");
    const closeModal = document.getElementById("closeModal");

    openModal.addEventListener("click", () => {
        modal.classList.remove("hidden");
    });

    closeModal.addEventListener("click", () => {
        modal.classList.add("hidden");
    });

    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.classList.add("hidden");
        }
    });
</script>
