export const handleBurgerMenu = () => {
    // Memastikan elemen-elemen yang diperlukan ada
    const burgerIcon = document.getElementById("burger-icon");
    if (!burgerIcon) return; // Memastikan burgerIcon ada

    burgerIcon.addEventListener("click", () => {
        const menu = document.getElementById("mobile-menu");
        if (!menu) return; // Memastikan mobile-menu ada
        menu.classList.toggle("hidden");
    });
};
