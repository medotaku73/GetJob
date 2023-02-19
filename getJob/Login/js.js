function input_reset(){
    let inputsDiv = document.querySelectorAll(".inpt-box");
    let style = {
        border: "none",
        color:"#aaaaaa",
    }
    for (let i = 0; i < inputsDiv.length; i++) {
        Object.assign(inputsDiv[i].style, style);
    }
}


function show_sign(){
    let login_form = document.querySelector(".login-form");
    let sign_form = document.querySelector(".sign-form");
    login_form.style.opacity= 0;
    login_form.style.zIndex=-1;
    sign_form.style.opacity= 1;
    sign_form.style.zIndex=1;
}
function show_login(){
    let login_form = document.querySelector(".login-form");
    let sign_form = document.querySelector(".sign-form");
    sign_form.style.opacity = 0;
    sign_form.style.zIndex = -1;
    login_form.style.opacity = 1;
    login_form.style.zIndex = 1;

}



