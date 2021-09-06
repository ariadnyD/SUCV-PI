const header = document.querySelector('#header')
const navHeight = header.offsetHeight

window.addEventListener('scroll', function(){
    if(window.scrollY >= navHeight){
        //se scroll maior do que a altura do header
        header.classList.add('scroll')
    } else {
        //se scroll menor do que a altura do header
        header.classList.remove('scroll')
    }
}) 

const scrollReveal = ScrollReveal({
    origin: 'top',
    duration: 750,
    reset: true /*para que a animação seja feita sempre */
})

scrollReveal.reveal(`#home .text, #home .image, #home .busca,
    #about .image2, #about .txt,
    #contact .inf

`, {interval: 200})

window.addEventListener('scroll', function(){
    changeHeaderWhenScroll()
})
