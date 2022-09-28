const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
input_field = form.querySelector(".input-field"),
send_btn = form.querySelector("button"),
chat_box = document.querySelector(".chat-box");

form.onsubmit =(e)=>{
    e.preventDefault(); //preventing form from getting submitted
}

input_field.focus();
input_field.onkeyup = ()=>{
    if(input_field.value != ""){
        send_btn.classList.add("active");
    }else{
        send_btn.classList.remove("active");
    }
}

send_btn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                input_field.value = ""; // leave the insert field blank once the user sent the message
                scrollToBottom();
            }
        }
    }
    // Send form data to php through AJAX
    let form_data = new FormData(form);
    xhr.send(form_data); // sending form data to php
}

chat_box.onmouseenter = ()=>{
    chat_box.classList.add("active");
}

chat_box.onmouseleave = ()=>{
    chat_box.classList.remove("active");
}

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chat_box.innerHTML = data;
                if(!chat_box.classList.contains("active")){ // if active class not contains in chatbox the scroll to bottom
                    scrollToBottom();
                }
            }
        }
    }
    
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500); // runs after 500ms

function scrollToBottom(){
    chat_box.scrollTop = chat_box.scrollHeight;
}