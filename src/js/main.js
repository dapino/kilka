'use strict'

function lateralMenu() {
    let burguerBtn = document.getElementById('burguerBtn')
    let mainMenu = document.getElementById('mainMenu')
    let overlay = document.getElementById('overlay')
    let bodyNode = document.getElementsByTagName('BODY')[0]
    let menuElements =  [...document.querySelectorAll('#mainMenu a')]

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

    menuElements.forEach( k => {
        k.addEventListener('click', () => {
            mainMenu.classList.remove('visible')
            overlay.classList.remove('visible')
            burguerBtn.classList.remove('active')
            bodyNode.classList.remove('overhidden')
        })
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
                    items: 3
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
smoothScroll()








function smoothScroll(){
    // Feature Test
    if ( 'querySelector' in document && 'addEventListener' in window && Array.prototype.forEach ) {

        // Function to animate the scroll
        var smoothScroll = function (anchor, duration) {

            // Calculate how far and how fast to scroll
            var startLocation = window.pageYOffset;
            var endLocation = anchor.offsetTop;
            var distance = endLocation - startLocation;
            var increments = distance/(duration/16);
            var stopAnimation;

            // Scroll the page by an increment, and check if it's time to stop
            var animateScroll = function () {
                window.scrollBy(0, increments);
                stopAnimation();
            };

            // If scrolling down
            if ( increments >= 0 ) {
                // Stop animation when you reach the anchor OR the bottom of the page
                stopAnimation = function () {
                    var travelled = window.pageYOffset;
                    if ( (travelled >= (endLocation - increments)) || ((window.innerHeight + travelled) >= document.body.offsetHeight) ) {
                        clearInterval(runAnimation);
                    }
                };
            }
            // If scrolling up
            else {
                // Stop animation when you reach the anchor OR the top of the page
                stopAnimation = function () {
                    var travelled = window.pageYOffset;
                    if ( travelled <= (endLocation || 0) ) {
                        clearInterval(runAnimation);
                    }
                };
            }

            // Loop the animation function
            var runAnimation = setInterval(animateScroll, 16);

        };

        // Define smooth scroll links
        var scrollToggle = document.querySelectorAll('.scroll');

        // For each smooth scroll link
        [].forEach.call(scrollToggle, function (toggle) {

            // When the smooth scroll link is clicked
            toggle.addEventListener('click', function(e) {

                // Prevent the default link behavior
                e.preventDefault();

                // Get anchor link and calculate distance from the top
                var dataID = toggle.getAttribute('href');
                var dataTarget = document.querySelector(dataID);
                var dataSpeed = toggle.getAttribute('data-speed');

                // If the anchor exists
                if (dataTarget) {
                    // Scroll to the anchor
                    smoothScroll(dataTarget, dataSpeed || 500);
                }

            }, false);

        });

    }

}