const search_bar = document.querySelector(".users .search input"),
search_btn = document.querySelector(".users .search button"),
user_list = document.querySelector(".users .users-list");

search_btn.onclick = ()=>{
    search_bar.classList.toggle("active");
    search_bar.focus();
    search_btn.classList.toggle("active");
    search_bar.value = "";
}

search_bar.onkeyup = () =>{
    let search_item = search_bar.value;
    if(search_item != ""){
        search_bar.classList.add("active");
    }
    else{
        search_bar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                user_list.innerHTML = data;
            }
        }
    }

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("search_item="+search_item);
}

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!search_bar.classList.contains("active")){
                    user_list.innerHTML = data;
                }
            }
        }
    }

    xhr.send();
}, 500); // runs after 500ms