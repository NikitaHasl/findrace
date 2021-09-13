'use strict';

const body = document.querySelector('body');

window.addEventListener('DOMContentLoaded', () => {
    body.classList.remove('preload');
})

const cityOption = document.querySelector('.filter__expand');
const citiesBlock = document.querySelector('.filter__cities');

cityOption.addEventListener('click', event => {
    citiesBlock.classList.toggle('filter__cities--active');
    if (cityOption.textContent === '+') {
        cityOption.textContent = '-';
    } else {
        cityOption.textContent = '+';
    };
})


