/******/ (() => { // webpackBootstrap
/*!*******************************************!*\
  !*** ./src/blocks/auth-modal/frontend.js ***!
  \*******************************************/
document.addEventListener('DOMContentLoaded', () => {
  // console.log('loaded')
  const openModalBtn = document.querySelectorAll('.open-modal');
  const modalEl = document.querySelector('.wp-block-udemy-plus-auth-modal');
  const modalCloseEl = document.querySelectorAll('.modal-overlay, .modal-btn-close');
  openModalBtn.forEach(element => {
    element.addEventListener('click', event => {
      // console.log('clicked')
      event.preventDefault();
      modalEl.classList.add('modal-show');
    });
  });
  modalCloseEl.forEach(element => {
    element.addEventListener('click', event => {
      // console.log('clicked')
      event.preventDefault();
      modalEl.classList.remove('modal-show');
    });
  });
});
/******/ })()
;
//# sourceMappingURL=frontend.js.map