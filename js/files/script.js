// Підключення функціоналу "Чертоги Фрілансера"
import { isMobile } from "./functions.js";
// Підключення списку активних модулів
import { flsModules } from "./modules.js";

const usefulMore = document.querySelectorAll('.useful-info__more');

usefulMore.forEach((btn) => {
  btn.addEventListener("click", () => {
    const parentTab = btn.closest('.useful-info__block');
    parentTab.classList.toggle('useful-info__block--open');
  });
});
