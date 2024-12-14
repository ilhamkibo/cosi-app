import "./bootstrap";
import "flowbite";
import "./modules/trixEditor"; // Pastikan pathnya sesuai dengan lokasi file trixEditor.js Anda

import { setupSwiper } from "./modules/swiperSetup";
import { handleSpinner } from "./modules/spinnerControl";
import { handleNavbar } from "./modules/navbarControl";
import { handleBurgerMenu } from "./modules/burgerMenu";
import { setupAdminCreateProduct } from "./modules/adminCreateProduct.js";
import { setupSidebarAdmin } from "./modules/sidebarAdmin.js";

document.addEventListener("DOMContentLoaded", () => {
    setupSwiper();
    handleSpinner();
    handleNavbar();
    handleBurgerMenu();

    if (document.body.dataset.page === "admin.products.create") {
        setupAdminCreateProduct();
    }

    if (document.body.dataset.page.startsWith("admin")) {
        setupSidebarAdmin();
    }
});
