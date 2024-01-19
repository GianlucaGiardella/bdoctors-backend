import "./bootstrap";

import "~resources/scss/app.scss";

import.meta.glob(["../img/**"]);

import * as bootstrap from "bootstrap";

const confirmDelete = document.querySelector("#confirm-delete");

if (confirmDelete) {
    document.querySelectorAll(".js-delete").forEach(button => {
        button.addEventListener("click", function () {
            confirmDelete.action = confirmDelete.dataset.template.replace(
                "*****",
                this.dataset.id
            );
        });
    });
}