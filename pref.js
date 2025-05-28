function riempi(){
    fetch("TuttiLike.php").then(onSucc, onErr).then(onJson);
}

function onErr(err){
    console.log('errore ->'+err);
}
function onSucc(res){
    return res.json();
}

function onJson(json){
    if(json !== null){
        const principale = document.querySelector('#mainPref');
         let element;
        for(let i = 0; i<json.length; i++){
           
             element = creaFiglioPost(json[i].foto, json[i].id_foto);
             principale.appendChild(element);
        }
    }

}

function creaFiglioPost(u, id){
    let classe1 = "post";
    console.log(u+" "+id);
    let element = document.createElement('div');
    element.classList.add(classe1);
    element.style.backgroundImage = u;
    element.id = id;

    return element;
}
riempi();

