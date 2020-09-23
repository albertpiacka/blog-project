var checkbox = document.querySelector('input[name=theme]');

//Checkbox
var theme = localStorage.getItem('theme'),
    stroke = document.querySelector('path');
document.documentElement.setAttribute('data-theme', theme);

if(theme == 'dark') {
    checkbox.checked = true;
} 

checkbox.addEventListener('change', function() {
    if(this.checked) {
        trans()
        localStorage.setItem('theme', 'dark')
        document.documentElement.setAttribute('data-theme', 'dark')
    } else {
        trans()
        localStorage.setItem('theme', 'light')
        document.documentElement.setAttribute('data-theme', 'light')
    }
})

let trans = () => {
    document.documentElement.classList.add('transition');
    window.setTimeout(() => {
        document.documentElement.classList.remove('transition')
    }, 1000)
}

// Menu
var slidingMenu = function() {
  var menuToggle = document.querySelector('.menu-toggle');
  var body       = document.body;

  menuToggle.addEventListener('click', function(ev) {

    ev.preventDefault();
    if(body.classList.contains('menu-active')){
        body.classList.add('menu-inactive');
        body.classList.remove('menu-active');
    } else if(body.classList.contains('menu-inactive')){
        body.classList.add('menu-active');
        body.classList.remove('menu-inactive');
    } else body.classList.add('menu-active');

  });
}

slidingMenu();

//Posts
var post = document.querySelector('.post-wrapper'),
    textarea = document.querySelector('textarea'),
    submit = document.querySelector('input'),
    postPrimary = document.querySelector('.primary'),
    postSecondary = document.querySelector('.secondary');

if(post){
    post.addEventListener('click', function(e){
        if(e.target != textarea){
            this.classList.toggle('flexed');
            postPrimary.classList.toggle('unflexed');
        }
        
    });
}

// postSecondary.addEventListener('click', function(){
//     postSecondary.classList.toggle('slide-down');
// });


var form = document.getElementById('myForm'),
    textarea = document.getElementById('message'),
    posts = document.getElementById('posts');

if(form){
    form.addEventListener('submit', function(e){
        e.preventDefault();
    
        var url = form.getAttribute('action');
    
        const formData = new FormData(this);
    
        fetch(url, {
            method: 'POST',
            body: formData
        }).then(function(response){
            return response.text();
        }).then(function(text){
            var post = JSON.parse(text);
            var newPost = document.createElement('li');
    
            newPost.innerHTML = post;
    
            posts.append(newPost);
            textarea.value = '';
        }).catch(function(response){
            return;
        });
    
    });
}

