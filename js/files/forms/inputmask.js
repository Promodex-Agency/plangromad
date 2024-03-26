/* Маски для полів (у роботі) */

// Підключення списку активних модулів
import { flsModules } from "../modules.js";

// Підключення модуля
import "inputmask/dist/inputmask.min.js";

const inputsTel = document.querySelectorAll('input[type="tel"]');

inputsTel.forEach((input) => {
  Inputmask({
    "mask": "+38(999) 999-99-99",
    showMaskOnHover: false
  }).mask(input);
});
