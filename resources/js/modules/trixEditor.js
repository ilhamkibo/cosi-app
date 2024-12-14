import "trix/dist/trix.css";
import "trix";

Trix.config.textAttributes.fontSmall = {
    style: { fontSize: "12px" },
    parser: function (element) {
        return element.style.fontSize === "12px";
    },
    inheritable: true,
};

Trix.config.textAttributes.fontMedium = {
    style: { fontSize: "16px" },
    parser: function (element) {
        return element.style.fontSize === "16px";
    },
    inheritable: true,
};

Trix.config.textAttributes.fontLarge = {
    style: { fontSize: "20px" },
    parser: function (element) {
        return element.style.fontSize === "20px";
    },
    inheritable: true,
};

Trix.config.textAttributes.fontExtraLarge = {
    style: { fontSize: "24px" },
    parser: function (element) {
        return element.style.fontSize === "24px";
    },
    inheritable: true,
};

Trix.config.textAttributes.font2xl = {
    style: { fontSize: "28px" },
    parser: function (element) {
        return element.style.fontSize === "28px";
    },
    inheritable: true,
};

Trix.config.textAttributes.font3xl = {
    style: { fontSize: "32px" },
    parser: function (element) {
        return element.style.fontSize === "32px";
    },
    inheritable: true,
};

addEventListener("trix-initialize", function (event) {
    var buttonHTML =
        '<button type="button" class="font-trix-size border text-gray-700 px-1 m-0 py-0 text-sm" data-trix-attribute="fontSmall">Small</button>';

    buttonHTML +=
        '<button type="button" class="font-trix-size border text-gray-700 px-1 m-0 py-0 text-sm"  data-trix-attribute="fontMedium">Medium</button>';

    buttonHTML +=
        '<button type="button" class="font-trix-size border text-gray-700 px-1 m-0 py-0 text-sm" data-trix-attribute="fontLarge">Large</button>';

    buttonHTML +=
        '<button type="button" class="font-trix-size border text-gray-700 px-1 m-0 py-0 text-sm" data-trix-attribute="fontExtraLarge">Xl</button>';

    buttonHTML +=
        '<button type="button" class="font-trix-size border text-gray-700 px-1 m-0 py-0 text-sm" data-trix-attribute="font2xl">2 Xl</button>';

    buttonHTML +=
        '<button type="button" class="font-trix-size border text-gray-700 px-1 m-0 py-0 text-sm" data-trix-attribute="font3xl">3 Xl</button>';

    // Menambahkan tombol ukuran font ke dalam grup toolbar
    event.target.toolbarElement
        .querySelector(".trix-button-group--text-tools")
        .insertAdjacentHTML("beforeend", buttonHTML);
});
