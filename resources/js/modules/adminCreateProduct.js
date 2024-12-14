export function setupAdminCreateProduct() {
    // let materialIndex = 1;

    // document.getElementById("add-material").addEventListener("click", () => {
    //     const container = document.getElementById("materials-container");
    //     const newMaterial = `
    //         <div class="flex space-x-4 mb-2 items-center">
    //             <!-- Dropdown untuk Material -->
    //             <select name="materials[${materialIndex}][material_id]" class="block w-1/2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
    //                 <option value="" disabled selected>Select Material</option>
    //                 @foreach ($materials as $material)
    //                     <option value="{{ $material->id }}">{{ $material->name }}</option>
    //                 @endforeach
    //             </select>

    //             <!-- Input untuk Quantity Used -->
    //             <input type="number" name="materials[${materialIndex}][quantity_used]" placeholder="Quantity Used"
    //                 class="block w-1/2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>

    //             <!-- Tombol Hapus -->
    //             <button type="button" class="px-2 py-1 text-red-500 hover:text-red-700 focus:outline-none remove-material">
    //                 Remove
    //             </button>
    //         </div>`;
    //     container.insertAdjacentHTML("beforeend", newMaterial);
    //     materialIndex++;
    //     addRemoveMaterialListeners(); // Tambahkan listener baru setiap kali elemen ditambahkan
    // });

    document
        .getElementById("photos")
        .addEventListener("change", function (event) {
            const files = event.target.files;
            const maxFileSize = 2 * 1024 * 1024; // 2MB
            const statusContainer =
                document.getElementById("photoUploadStatus");
            let valid = true;

            // Reset status
            statusContainer.innerHTML = "";

            if (files.length === 0) {
                statusContainer.innerHTML =
                    '<p class="text-gray-500">No files selected.</p>';
                return;
            }

            Array.from(files).forEach((file) => {
                if (file.size > maxFileSize) {
                    valid = false;
                    statusContainer.innerHTML += `<p class="text-red-500">File "${file.name}" is too large (max 2MB).</p>`;
                } else {
                    statusContainer.innerHTML += `<p class="text-green-500">File "${file.name}" is ready to upload.</p>`;
                }
            });

            // Disable submit button if validation fails
            const submitButton = document.querySelector(
                'button[type="submit"]'
            );
            if (!valid) {
                submitButton.disabled = true;
                submitButton.classList.add("bg-gray-500");
                submitButton.classList.remove(
                    "bg-indigo-600",
                    "hover:bg-indigo-700"
                );
            } else {
                submitButton.disabled = false;
                submitButton.classList.remove("bg-gray-500");
                submitButton.classList.add(
                    "bg-indigo-600",
                    "hover:bg-indigo-700"
                );
            }
        });

    // Tambahkan listener pertama kali
    // addRemoveMaterialListeners();
}

// function addRemoveMaterialListeners() {
//     const removeButtons = document.querySelectorAll(".remove-material");
//     removeButtons.forEach((button) => {
//         button.addEventListener("click", () => {
//             button.parentElement.remove();
//         });
//     });
// }
