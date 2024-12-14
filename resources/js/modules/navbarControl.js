export const handleNavbar = () => {
    document.addEventListener("scroll", () => {
        const scrollPosition = window.scrollY;
        const navbar = document.getElementById("navbar");
        let navbarLinks = null;

        // Pastikan navbar ada
        if (navbar) {
            navbarLinks = [...navbar.getElementsByTagName("a")];
        }

        const section3 = document.getElementById("section-3");
        const section4 = document.getElementById("section-4");

        let section3Bottom, section3Top;
        if (section3) {
            const rect = section3.getBoundingClientRect();
            section3Bottom = rect.bottom;
            section3Top = rect.top;
        }

        if (navbarLinks && section3Top <= 0 && section3Bottom > 0) {
            navbar.classList.remove("text-black");
            navbar.classList.add("text-white");
            navbarLinks
                .filter((link, index) => index !== 0)
                .forEach((link) => {
                    link.classList.remove("hover:text-gray-400");
                    link.classList.add("hover:text-gray-600");
                });
        } else if (navbarLinks) {
            navbarLinks
                .filter((link, index) => index !== 0)
                .forEach((link) => {
                    link.classList.add("hover:text-gray-400");
                    link.classList.remove("hover:text-gray-600");
                });
            if (navbar) {
                navbar.classList.remove("text-white");
                navbar.classList.add("text-black");
            }
        }

        if (section4 && section4.getBoundingClientRect().top <= 0) {
            if (navbar) {
                navbar.classList.add("bg-gray-200/70");
            }
        } else if (navbar) {
            navbar.classList.remove("bg-gray-200/70");
        }
    });
};
