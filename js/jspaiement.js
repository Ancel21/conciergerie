document.querySelector('.card-number-input').onkeyup = () => {
    document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value
}

document.querySelector('.card-holder-input').onkeyup = () => {
    document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value
}

document.querySelector('.month-input').onchange = () => {
    document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value
}

document.querySelector('.year-input').onchange = () => {
    document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value
}

document.querySelector('.cvv-input').onmouseover = () => {
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)'
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)'
}
document.querySelector('.cvv-input').onmouseout = () => {
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)'
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)'
}

document.querySelector('.cvv-input').onkeyup = () => {
    document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value
}