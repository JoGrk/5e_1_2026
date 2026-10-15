let basket = ['jabłko','banan','marchewka'];
const olE = document.querySelector('ol'); 

basket.forEach(element => {
    let liE = document.createElement('li')
    liE.innerHTML = element
    olE.appendChild(liE)
});
