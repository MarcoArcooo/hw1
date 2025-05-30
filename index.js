

// _________________________________
function riempi(num){
    
    const principale = document.querySelector('#main');
    let element;
    for(let i = 0; i<=num;i++){
       element = creaFiglioPost(i%f.length, i);
        principale.appendChild(element);
    }

    console.log(principale.dataset.message);
}
 
prendiLink();

const f = [];

function prendiLink(){
    fetch("prendiFoto.php").then(onSucc).then(photoJson);
}

function photoJson(json){
    for(let i = 0; i<json.length; i++){
        f.push(json[i].coll);
    }
    riempi(11);
    const Listacuore = document.querySelectorAll(".cuore");
    for (let item of Listacuore){
    item.addEventListener('click', mettilike);
    
    }
    const listaPost = document.querySelectorAll('.post');
    for(let item of listaPost){
    item.addEventListener('click', mostraPost);
    }
    const chiudi = document.querySelector('#visFoto div');
    chiudi.addEventListener('click', chiudiPost);
}


function creaFiglioPost(n, seriale){
    let classe1 = "post";
     let classe2 = "post2";
    
    let element = document.createElement('div');
    element.classList.add(classe1);
    element.classList.add(classe2);
    element.style.backgroundImage = "url('" + f[n] + "')";
    element.id = seriale+1;
    
    let nome = document.createElement('p');
    nome.textContent = 'Nome '+seriale;
    element.appendChild(nome);
    if(document.querySelector('.pref') !== null){ 
        element = aggiungiDiv(element, "like.png");
    }
    
    return element;
}

 function aggiungiDiv(element, testo){
    const divv = document.createElement('div');
    const img = document.createElement('img');
        divv.classList.add('cuore');
    divv.classList.add('toglilike');
    img.src=testo;
    divv.appendChild(img);
    element.appendChild(divv);
     fetch("isLike.php?id="+encodeURIComponent(element.id)).then(onSucc).then(likeJson);
     
    return element;
 }
  function likeJson(json){
        
        if (json !== null){
        const photo = document.getElementById(json.id_foto);
        const divv =  photo.childNodes[1];
       divv.classList.add('mettilike');
        divv.classList.remove('toglilike');
             divv.addEventListener('click', toglilike);
    divv.removeEventListener('click', mettilike);
        divv.childNodes[0].src = "fire.png";
    }
  
}

  
//__________________________________
function mostraPost(event){
    const piccolo = event.currentTarget;
    const grande = document.querySelector('#postView');
    const foto = document.querySelector('#visFoto');
    grande.classList.remove('sparisci');
    foto.style.backgroundImage = piccolo.style.backgroundImage
    foto.classList.add(piccolo.classList[1]);
    document.body.classList.add('noscroll');
}

function chiudiPost(event){
    const grande = document.querySelector('#postView');
    grande.classList.add('sparisci');
    const foto = document.querySelector('#visFoto');
    foto.classList.remove(foto.classList[0]);
    document.body.classList.remove('noscroll');
}


// 
//_______________________________________________

function mettilike(event) {
    const divv = event.currentTarget;
    divv.classList.add('mettilike');
    divv.classList.remove('toglilike');

    const immagine = divv.childNodes[0];
    immagine.src = 'fire.png';

    divv.addEventListener('click', toglilike);
    divv.removeEventListener('click', mettilike);

    const post = divv.parentNode;
    let id = encodeURIComponent(post.id);
    let colleg = encodeURIComponent(post.style.backgroundImage);

    fetch('mettiLike.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id=' + id + '&l=' + colleg
    });

    event.stopPropagation();
}

function toglilike(event) {
    const divv = event.currentTarget;
    divv.classList.add('toglilike');
    divv.classList.remove('mettilike');

    const immagine = divv.childNodes[0];
    immagine.src = 'like.png';

    divv.addEventListener('click', mettilike);
    divv.removeEventListener('click', toglilike);

    const post = divv.parentNode;
    let id = encodeURIComponent(post.id);

    fetch('togliLike.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id=' + id
    });

    event.stopPropagation();
}



//
//
function appareMenu(event){
    const menuu = document.querySelector('#menuContainer');
    menuu.classList.remove('sparisci');
    event.currentTarget.removeEventListener('click', appareMenu)
    event.currentTarget.addEventListener('click', scompareMenu);

}
function scompareMenu(event){
    const menuu = document.querySelector('#menuContainer');
    menuu.classList.add('sparisci');
    event.currentTarget.addEventListener('click', appareMenu)
    event.currentTarget.removeEventListener('click', scompareMenu);
}

document.querySelector('#menu').addEventListener('click', appareMenu);
//_______________________________________________________
//_______________________________________________________
//_______________________________________________________



function take(event) {
    event.preventDefault();
    const inserimento = document.querySelector('#domandabox');
    const qu = encodeURIComponent(inserimento.value);

    if (inserimento.value) {
        console.log(qu);
        fetch("unsplash.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'q=' + qu
        })
        .then(onSucc, onErr)
        .then(onJson);
    }
}


function onErr(err){
    console.log('errore ->'+err);
}
function onSucc(res){
    return res.json();
}
function onJson(json){
    console.log(json.results);

    const blocco = document.querySelector('#ricerca');
    blocco.innerHTML = '';
    blocco.parentNode.classList.remove('sparisci');
    for(let item of json.results){
       const imag = document.createElement('img');
       imag.src = item.urls.small;
       blocco.appendChild(imag);
    }
    
}

const fform = document.querySelector('form');
if(fform !== null)
fform.addEventListener('submit', take);

function cercaFocus(event){
    const testo = event.currentTarget;
    frase = testo.value;
    testo.value = '';
}

const domanda = document.querySelectorAll('input');
for(let item of domanda){
item.addEventListener('focus', cercaFocus);
}

function chiudiRicerca(event){
    document.querySelector('#ricerca')
    .parentNode.classList.add('sparisci');

}

document.querySelector('#mostraRis').addEventListener('click', chiudiRicerca);
//_________________________________________________________
//____________________________________________________________
//________________________________________________________

function RandomRGB() {
    const n1 = Math.floor(Math.random() * 256);
    const n2 = Math.floor(Math.random() * 256);
    const n3 = Math.floor(Math.random() * 256);
    return `${n1},${n2},${n3}`;
}

function generaColore(event){
    event.preventDefault();
    const randomRGB = RandomRGB();
    const richiesta = 'colore.php?q='+encodeURIComponent(randomRGB);

    fetch(richiesta)
    .then(onSucc,onErr)
    .then(onJsonColor);
}


function onJsonColor(json){
    console.log(json);
    const immagine = document.querySelector('#colore img');
    immagine.src = json.image.named;
    const dati = document.querySelector('#dati');
    dati.innerHTML='';
    const span1 = document.createElement('span');
    span1.append('hex( '+json.hex.value+' )');
    const span2 = document.createElement('span');
    span2.append(json.cmyk.value);
    const span3 = document.createElement('span');
    span3.append(json.rgb.value);
    dati.appendChild(span1);
    dati.appendChild(span2);
    dati.appendChild(span3);
}
const genera = document.querySelector('#generaColore');
if (genera !== null)
genera.addEventListener('submit', generaColore);
//______________________________________________________________________________________
