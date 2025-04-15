const registerButton = document.getElementById("register");
const loginButton = document.getElementById("login");
const container= document.getElementById("container");


loginButton.addEventListener("click",()=>{
    container.classList.remove("right-panel-active")
});

registerButton.addEventListener("click",()=>{   S
    container.classList.add("right-panel-active")
});
