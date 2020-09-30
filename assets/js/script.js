//Checkbox
//*****************************************************/
var changeTheme = (function(){
    var checkbox = document.querySelector('input[name=theme]'),
        theme = localStorage.getItem('theme'),
        stroke = document.querySelector('path');

    return {
        run: function(){
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
            });
            
            let trans = () => {
                document.documentElement.classList.add('transition');
                window.setTimeout(() => {
                    document.documentElement.classList.remove('transition')
                }, 1000)
            }
        }
    }

}());

changeTheme.run();

//Menu
//*****************************************************/
var slidingMenu = (function(){
    var menuToggle = document.querySelector('.menu-toggle');
    var body       = document.body;

    return {
        run: function(){
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
    }
}());

slidingMenu.run();

//Post slider
//*****************************************************/
var slidingPost = (function(){

    var post = document.querySelector('.post-wrapper'),
        textarea = document.querySelector('textarea'),
        submit = document.querySelector('input'),
        postPrimary = document.querySelector('.primary'),
        postSecondary = document.querySelector('.secondary');

    return {
        run: function(){
            if(post){
                post.addEventListener('click', function(e){
                    if(e.target != textarea){
                        this.classList.toggle('flexed');
                        postPrimary.classList.toggle('unflexed');
                    }
                    
                });
            }
        }
    }

}());

slidingPost.run();

//Create post - fetch data from new-post.php
//*****************************************************/
createPost.createPost();