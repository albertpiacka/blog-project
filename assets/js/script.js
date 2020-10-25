//Checkbox
//*****************************************************/
var changeTheme = (function(){
    var checkbox = document.querySelector('input[name=theme]'),
        theme = localStorage.getItem('theme'),
        stroke = document.querySelector('path');

    return {
        run: function(){
            document.documentElement.setAttribute('data-theme', theme);

            if(checkbox){
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
            if(menuToggle){
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
    }
}());

slidingMenu.run();

// Create post - fetch data from new-post.php
// *****************************************************/
// createPost.createPost();

// Check if string had two dots at the end 
// *****************************************************/
function checkPar(){
    var postParagraphs = document.querySelectorAll('.post-paragraphs');

    postParagraphs.forEach(postPar => {
        var parText = postPar.children[postPar.children.length - 1].children.item(0).textContent;
        postPar.children[postPar.children.length - 1].children.item(0).textContent = parText.slice(0, parText.length - 1);

        if(postPar.children[postPar.children.length - 1].children.item(0).textContent == ""){
            postPar.children[postPar.children.length - 1].children.item(0).style.display = "none";
        }
    });

}

checkPar();


// Get length before submit and after submit
// *****************************************************/
var getLength = (function(){

    var run = function(){
        var form = document.querySelector('form');
        if(form){
            var txt = document.getElementById('message');
            var title = document.getElementById('title');

            var txtOldL = document.getElementById('txtOldLength');
            var txtNewL = document.getElementById('txtNewLength');
            var titleOldL = document.getElementById('titleOldLength');
            var titleNewL = document.getElementById('titleNewLength');

            if(txtOldL){
                txtOldL.value = txt.value.length;
            }
            if(titleOldL){
                titleOldL.value = title.value.length;
            }

            form.addEventListener('submit', function(){
                if(txtNewL){
                    txtNewL.value = txt.value.length;
                }
                if(titleNewL){
                    titleNewL.value = title.value.length;
                }
            });
        }
    }

    return {
        run: run
    }
}());

getLength.run();


// Resize the post when you click on it, not on a elements
// *****************************************************/
var post = (function(){
    var posts = document.querySelectorAll('.post');

    var resize = function(){
        if(posts){
            posts.forEach(post => {
                post.addEventListener('click', function(e){

                    console.dir(e.target.style);

                    if(e.target.nodeName == "I" || e.target.nodeName == "A") {
                        return false;
                    }
                    
                    let getSiblings = function(e) {
                        // for collecting siblings
                        let siblings = []; 
                        // if no parent, return no sibling
                        if(!e.parentNode) {
                            return siblings;
                        }
                        // first child of the parent node
                        let sibling  = e.parentNode.firstElementChild;
                        // collecting siblings
                        while (sibling) {
                            if (sibling.nodeType === 1 && sibling !== e) {
                                siblings.push(sibling);
                            }
                            sibling = sibling.nextSibling;
                        }
                        return siblings;
                    };
            
                    let siblings = getSiblings(post);
            
                    if(post.className == `post ${post.classList[1]} scaled`) {
                        post.classList.remove('scaled');
                        post.classList.add('unscaled');
            
                    } else if(post.className == `post ${post.classList[1]} unscaled`) {
                        post.classList.remove('unscaled');
                        post.classList.add('scaled');
                        siblings.forEach(sibling => {
                            sibling.classList.add('unscaled');
                            sibling.classList.remove('scaled');
                        });
                    } else {
                        post.classList.add('scaled');
                        siblings.forEach(sibling => {
                            if(sibling.classList.contains('scaled')){
                                sibling.classList.add('unscaled');
                                sibling.classList.remove('scaled');
                            }
                        });
                    }
                });
            });
        }
    }

    return {
        resize: resize
    }

}());

// post.resize();

// Hides the element after opacity drops to 0
// *****************************************************/

let alert = document.querySelector('.alert');

var hide = (function(){
   
    var it = function(el){
        if(el){
            var elCss = getComputedStyle(el);
            var delay = (parseInt(elCss.animationDelay) * 1000) + 1000;
            console.log(parseInt(delay));
            setTimeout(function(){
                if(elCss.opacity < 1){
                    alert.style.display = "none";
                }
            }, delay);
        }
    }

    return {
        it: it
    }
}());

hide.it(alert);

// If there is only 1 article, it gets display block
// *****************************************************/

var showOneArticle = (function(){
    var articles = document.getElementById('articles');
   
    var run = function(){
        if(articles){
            if(articles.classList.contains('1')){
                articles.style.display = "block";
            }
        }
    
        var article = document.querySelectorAll('.article');
    
        if(article){
            for(var i = 2; i < article.length; i++){
                article[i].style.display = "none";
            }
        }
    };

    return {
        run: run
    }
}());

showOneArticle.run();


// Input type file opens by clicking on overlay image
// *****************************************************/

var changeImg = (function(){
    var insertImg = document.querySelector('.insertImg'),
        imgFile = document.getElementById('file');

    var run = function(){
        if(insertImg){
            insertImg.addEventListener('click', function(){
                imgFile.click();
            });
        }
    }

    return {
        run: run
    }
}());

changeImg.run();

// Image changes after loading one to input
// *****************************************************/

var loadImg = (function(){
    const userImg = document.querySelector('.userImg');
    const fileSelector = document.getElementById('file');

    const run = function(){
        if(fileSelector && userImg){
            fileSelector.addEventListener('change', (event) => {
                const file = event.target.files;
                function readImage(file) {
                  // Check if the file is an image.
                  if (file.type && file.type.indexOf('image') === -1) {
                    console.log('File is not an image.', file.type, file);
                    return;
                  }
            
                  const reader = new FileReader();
                  reader.addEventListener('load', (event) => {
                    userImg.src = event.target.result;
                  });
                  reader.readAsDataURL(file);
                };
                readImage(file[0]);
            });
        }
    }

    return {
        run: run
    }
}());

loadImg.run();

// Fetch comments and show them with fade effect
// *****************************************************/

var createComment = (function(){

    var sendForm = function(form){
        var url = form.getAttribute('action');
    
        const formData = new FormData(form);
    
        fetch(url, {
            method: 'POST',
            body: formData
        }).then(function(response){
            return response.text();
        }).then(function(text){
            var comment = JSON.parse(text);

            console.log(comment);
            console.log(form.parentNode.children[0]);

            var newComment = document.createElement('div');
            var h3 = document.createElement('h3');
            var p = document.createElement('p');

            newComment.setAttribute('class', 'comment');

            h3.innerText = comment[1];
            p.innerText = comment[0];

            newComment.append(h3, p);
            newComment.classList.add('fadeIn');

            form.parentNode.children[0].append(newComment);

            form.parentNode.children[1][0].value = '';
        }).catch(function(response){
            return;
        });
    }
    
    return {
        sendForm: sendForm
    }
}());

const forms = document.querySelectorAll('form');

if(forms){
    forms.forEach(form => {

        form.addEventListener('submit', function(e){
            e.preventDefault();
            createComment.sendForm(form);
        });
    
    });
}



