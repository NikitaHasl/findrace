'use strict';

const body = document.querySelector('body');

window.addEventListener('DOMContentLoaded', () => {
    body.classList.remove('preload');
})

const filter = {
    filterExpanders: document.querySelectorAll('.filter__expand'),
    filterBlocks: document.querySelectorAll('.filter__block'),

    addListeners() {
        for (let i = 0; i < this.filterExpanders.length; i++) {
            this.filterExpanders[i].addEventListener('click', event => {
                this.filterBlocks[i].classList.toggle('filter__block--active');
                if (this.filterExpanders[i].textContent === '+') {
                    this.filterExpanders[i].textContent = '-';
                } else {
                    this.filterExpanders[i].textContent = '+';
                }
                event.stopPropagation();
            })
        }
    }
};

filter.addListeners();


