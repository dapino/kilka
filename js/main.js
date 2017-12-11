'use strict'


function lateralMenu() {
    let burguerBtn = document.getElementById('burguerBtn')
    let mainMenu = document.getElementById('mainMenu')
    let overlay = document.getElementById('overlay')

    burguerBtn.addEventListener('click', () => {
        mainMenu.classList.toggle('visible')
        overlay.classList.toggle('visible')
        burguerBtn.classList.toggle('active')
    })

    overlay.addEventListener('click', () => {
        mainMenu.classList.remove('visible')
        overlay.classList.remove('visible')
        burguerBtn.classList.remove('active')
    })
}

function projects() {
    let projectCarousel = [...document.querySelectorAll('.projectCarousel')]
    let sliders = []

    projectCarousel.forEach( (k, i) => {
        console.log(i)
        sliders.push({
            container: `#${k.id}`,
            items: 3,
            slideBy: 'page',
            autoplay: false
        })
    })

    console.log(sliders)
    createCarousel(sliders)

}

function createCarousel(sliders) {
    sliders.forEach( (k, i) => {
        console.log(k)

        if (document.querySelector(k.container)) {
            sliders[i] = tns(k);
        }
    })


}



lateralMenu()
projects()