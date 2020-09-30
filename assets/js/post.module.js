var createPost = (function(){

    var posts = document.querySelector('.posts'),
        textarea = document.getElementById('message'),
        titlearea = document.getElementById('title');

    function sendForm(form){
        var url = form.getAttribute('action');
    
        const formData = new FormData(form);
    
        fetch(url, {
            method: 'POST',
            body: formData
        }).then(function(response){
            return response.text();
        }).then(function(text){
            var post = JSON.parse(text);

            var newPost = document.createElement('div');
            var title = document.createElement('div');
            var h3 = document.createElement('h3');
            var text = document.createElement('div');
            var p = document.createElement('p');

            newPost.setAttribute('class', 'post');
            title.setAttribute('class', 'title');
            text.setAttribute('class', 'text');

            h3.innerText = post[1];
            p.innerText = post[0];

            title.append(h3);
            text.append(p);

            newPost.append(title, text);
            newPost.classList.add('fadeIn');

            posts.append(newPost);

            textarea.value = '';
            titlearea.value = '';

            console.log(post);

        }).catch(function(response){
            return;
        });
    }

    var createPost = function(){
        var form = document.getElementById('myForm');

        if(form){
            form.addEventListener('submit', function(e){
                e.preventDefault();
                sendForm(form);
            });
        }
    }

    return {
        createPost: createPost
    }
}());