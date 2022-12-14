const form = document.querySelector(".signup form"),
continue_btn = form.querySelector(".button input"),
error_text = form.querySelector(".error-txt");

form.onsubmit =(e)=>{
    e.preventDefault(); //preventing form from getting submitted
}

continue_btn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data === "success"){
                    // var link = window.location.href;
                    // window.location.href = link.substring(0, link.lastIndexOf("/")+1) + "users.php";
                    // window.location.assign("http://localhost/proj/Realtime-chat-app/php/users.php");
                    // window.location.href.substring(0, window.location.href.lastIndexOf("/")+1) + "users.php";
                    location.href="http://localhost/proj/Realtime-chat-app/users.php";
                }
                else{
                    error_text.style.display = "block";
                    error_text.textContent = data;
                }
            }
        }
    }
    // Send form data to php through AJAX
    let form_data = new FormData(form);
    xhr.send(form_data); // sending form data to php
}