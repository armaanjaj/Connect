const form = document.querySelector(".signup form"),
continue_btn = form.querySelector(".button input"),
error_text = form.querySelector(".error-txt");

// form.onsubmit =()=>{
//     e.preventDefault(); //preventing form from getting submitted
// }

continue_btn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./signup.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // console.log(data);
                if(data == "success"){
                    var link = window.location.href;
                    // window.location.href = link.substring(0, link.lastIndexOf("/")+1) + "users.php";
                    window.location.assign("http://localhost/proj/Realtime-chat-app/php/users.php");
                    // window.location.href.substring(0, window.location.href.lastIndexOf("/")+1) + "users.php";
                }
                else{
                    error_text.textContent = data;
                    error_text.style.display = "block";
                }
            }
        }
    }
    // Send form data to php through AJAX
    let form_data = new FormData(form);
    xhr.send(form_data); // sending form data to php
}