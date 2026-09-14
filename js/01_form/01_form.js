const h1E = document.getElementById('h1')
const btnE = document.getElementById('btn')
const nameE = document.getElementById('name')



console.dir(nameE)
// h1E.innerHTML = 'cokolwiek';
// h1E.style.color='red';

h1E.addEventListener('click',e=>{
    h1E.innerHTML = 'cokolwiek';
    h1E.style.color='red';
})

btnE.addEventListener('click', e=>{
    // console.dir(nameE)
    h1E.innerHTML = nameE.value
    
})



