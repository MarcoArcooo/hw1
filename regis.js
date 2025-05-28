let erroreUs = false;
let errorePw = false;
let erroreMail = false;
let erroreCpass = false;
function Username(event) {
    const input = event.currentTarget;
    input.classList.remove('bordoRosso');
    
    console.log(input.value);
    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        erroreUs = true;
        input.classList.add('bordoRosso');
    } else{
        erroreUs = false;
    }
}
function Speciali(str) {
      const caratteriSpeciali = "$%&/()";
      for (let i = 0; i < str.length; i++) {
        if (caratteriSpeciali.includes(str[i])) {
          return true;
        }
      }
      return false;
    }
function Pass(event) {
    const passwordInput = event.currentTarget;
    passwordInput.classList.remove('bordoRosso');
    console.log(passwordInput.value);
    if(passwordInput.value.length < 8 || !Speciali(passwordInput.value)){ 
         errorePw = true;
        passwordInput.classList.add('bordoRosso');
    }
    else{
        errorePw = false;
    }

}

function Registra(event) {
    if(erroreUs || errorePw || erroreMail || erroreCpass){
        event.preventDefault();
    }
}

function ControllaEmail(event){
    const input = event.currentTarget;
    input.classList.remove('bordoRosso');

    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(input.value).toLowerCase())) {
        erroreMail = true;
        input.classList.add('bordoRosso');
    } else{
        erroreMail = false;
    }
}
function ConfirmPassword(event){
    const input = event.currentTarget;
    input.classList.remove('bordoRosso');
    const pass = document.querySelector('#password').value;
     if (input.value !== pass) {
       erroreCpass = true;
        input.classList.add('bordoRosso');
    } else {
        erroreCpass = false;
    }
}
document.querySelector('#username').addEventListener('blur', Username);
document.querySelector('#password').addEventListener('blur', Pass);
document.querySelector('form').addEventListener('submit', Registra);
document.querySelector('#email').addEventListener('blur', ControllaEmail);
document.querySelector('#cpass').addEventListener('blur', ConfirmPassword);