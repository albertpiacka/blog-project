// Ajax na zobrazovanie registracneho/prihlasovacieho formularu

let signIn = document.querySelector('.sign-in a');
let signUp = document.querySelector('.sign-up a');

let signControls = [signIn, signUp];

signControls.forEach( sign => {
    sign.addEventListener('click', function(e){
        e.preventDefault();
        var url = this.getAttribute('href');
        returnData(url);
    });
});

function returnData(url){
    fetch(url)
        .then(function(response) {
            // When the page is loaded convert it to text
            return response.text()
        })
        .then(function(html) {
            // Initialize the DOM parser
            var parser = new DOMParser();
            let overlayInit = document.querySelector('.overlay');

            var main = document.querySelector('.content-container');
            let body = document.querySelector('body');
            let wrapper = document.querySelector('.wrapper');
            let sideMenu = document.querySelector('.side-menu');

            let overlay = document.createElement('div');
            overlay.classList.add('overlay');

            // Parse the text
            var doc = parser.parseFromString(html, "text/html");

            // You can now even select part of that html as you would in the regular DOM
            // Example:
            var targetEl = doc.querySelector('.form-container');

            wrapper.style.filter = "blur(4px)";
            sideMenu.style.filter = "blur(4px)";

            overlay.classList.add('fadeIn');
            targetEl.classList.add('fadeIn');

            overlay.append(targetEl);
            body.append(overlay);

            let thisElement = targetEl.children[0].id;
            var circle = document.querySelector(`#${thisElement} a`);

            if(circle){
                circle.addEventListener('click', function(e) {
                    e.preventDefault();

                    overlay.classList.remove('fadeIn');
                    targetEl.classList.remove('fadeIn');

                    overlay.classList.add('fadeOut');
                    targetEl.classList.add('fadeOut');
                    
                    wrapper.style.filter = "blur(0px)";
                    sideMenu.style.filter = "blur(0px)";

                    setTimeout( () => {
                        if(overlay.className == 'overlay fadeOut'){
                            overlay.removeChild(targetEl); 
                            body.removeChild(overlay); 
                        }
                    }, 1000);
                });
            }
            
            
        })
        .catch(function(err) {  
            console.log('Failed to fetch page: ', err);  
        });
}



