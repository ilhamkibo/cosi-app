import Swiper from "swiper/bundle";
import "swiper/css/bundle";

export const setupSwiper = () => {
    new Swiper(".swiper", {
        direction: "horizontal",
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
};
