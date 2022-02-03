function scrollTo(element){
    window.scroll({
        left:0,
        top:element.offsetTop,
        behavior:'smooth'
    })
}

const button = document.querySelector('.lng-button');
const footer = document.querySelector('.title-last');
button.addEventListener('click',()=>{
    scrollTo(footer)});