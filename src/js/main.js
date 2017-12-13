'use strict'

function lateralMenu() {
    let burguerBtn = document.getElementById('burguerBtn')
    let mainMenu = document.getElementById('mainMenu')
    let overlay = document.getElementById('overlay')
    let bodyNode = document.getElementsByTagName('BODY')[0]

    burguerBtn.addEventListener('click', () => {
        mainMenu.classList.toggle('visible')
        overlay.classList.toggle('visible')
        burguerBtn.classList.toggle('active')
        bodyNode.classList.toggle('overhidden')

    })

    overlay.addEventListener('click', () => {
        mainMenu.classList.remove('visible')
        overlay.classList.remove('visible')
        burguerBtn.classList.remove('active')
        bodyNode.classList.remove('overhidden')
    })
}

function projects() {
    let projectCarousel = [...document.querySelectorAll('.projectCarousel')]
    let sliders = []

    projectCarousel.forEach( (k, i) => {
        sliders.push({
            container: `#${k.id}`,
            items: 3,
            slideBy: 1,
            nav: false,
            autoplay: false,
            mouseDrag: true,
            responsive: {
                320: {
                    items: 1
                },
                480: {
                    items: 2
                },
                768: {
                    items: 3
                },
                900: {
                    items: 4
                }
            }
        })
    })
    createCarousel(sliders)
}

function createCarousel(sliders) {
    sliders.forEach( (k, i) => {
        if (document.querySelector(k.container)) {
            sliders[i] = tns(k);
        }
    })
}

lateralMenu()
projects()