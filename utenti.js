let i;
function view(event){
    const inp = event.currentTarget;
     i = inp.value;
    inp.type = "text";
    inp.addEventListener('blur', hide);
    inp.removeEventListener('focus', view);
    
}
function hide(event){
     const inp = event.currentTarget;
     inp.type = "password";
    inp.addEventListener('focus', view);
    inp.removeEventListener('blur', hide);
    inp.value = i;
}

document.querySelector('input').addEventListener('focus', view);
///_________________________________________________________________


function numLike(){
    fetch("contaLike.php")
      .then(onSucc)
        .then(onJson);

}

function onSucc(res){
    return res.json();
}

function onJson(json){
        const h = document.querySelector('h3');
        h.textContent = 'Numero like: '+json.num;
}

numLike();


