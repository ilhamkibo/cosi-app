export function setupSidebarAdmin() {
    document.querySelectorAll("[data-collapse-toggle]").forEach((button) => {
        button.addEventListener("click", function () {
            const dropdownId = this.getAttribute("aria-controls");
            const dropdown = document.getElementById(dropdownId);
            const svgIcon = this.querySelectorAll("svg")[1]; // Target SVG kedua

            // Toggle dropdown visibility
            dropdown.classList.toggle("hidden");

            // Toggle rotation on SVG
            svgIcon.classList.toggle("rotate-180");
        });
    });
}

// document.getElementById('toggleDropdown').addEventListener('click', function() {
//     let dropdown = document.getElementById('dropdown-example');
//     let chevron = document.getElementById('chevronIcon');

//     dropdown.classList.toggle('hidden');
//     dropdown.classList.toggle('scale-y-100');
//     chevron.classList.toggle('-rotate-90');
//     chevron.classList.toggle('rotate-0');
// });
