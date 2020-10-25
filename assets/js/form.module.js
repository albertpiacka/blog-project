// Ajax na zobrazovanie registracneho/prihlasovacieho formularu
//
// var signUp = document.querySelector('.sign-up');
// signUp.addEventListener('click', function(e){
//     e.preventDefault();
//     var url = this.getAttribute('href');
//     fetch(url)
//         .then(function(response) {
//             // When the page is loaded convert it to text
//             return response.text()
//         })
//         .then(function(html) {
//             // Initialize the DOM parser
//             var parser = new DOMParser();
//             var main = document.querySelector('.main');

//             // Parse the text
//             var doc = parser.parseFromString(html, "text/html");

//             // You can now even select part of that html as you would in the regular DOM
//             // Example:
//             var targetEl = doc.querySelector('.form-container');

//             main.append(targetEl);
            
            
            
//         })
//         .catch(function(err) {  
//             console.log('Failed to fetch page: ', err);  
//         });
// });