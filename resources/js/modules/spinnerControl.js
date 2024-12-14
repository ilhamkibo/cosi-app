let initialSize;

export const handleSpinner = () => {
    const spinner = document.querySelector(".spinner");

    if (spinner) {
        initialSize = spinner.clientWidth;
        spinner.style.height = `${initialSize}px`;
    }

    document.addEventListener("scroll", () => {
        const scrollPosition = window.scrollY;
        const spinner = document.querySelector(".spinner");

        if (spinner) {
            const newSize = initialSize + scrollPosition;
            const spinnerOpacity = Math.max(1 - scrollPosition / 500, 0);

            spinner.style.width = `${newSize}px`;
            spinner.style.height = `${newSize}px`;
            spinner.style.opacity = spinnerOpacity;
        }
    });
};
