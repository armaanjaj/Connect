const password_field = document.querySelector(".form input[type='password']"),
toggle_btn = document.querySelector(".form .field i");

toggle_btn.onclick = () =>{
    if(password_field.type === "password"){
        password_field.type = "text";
        toggle_btn.classList.add("active");
    }
    else{
        password_field.type = "password";
        toggle_btn.classList.remove("active");
    }
}