function riempi(){
     fetch("storicoRicerche.php")
      .then(onSucc)
        .then(onJson);

}

function onSucc(res){
    return res.json();
}

function onJson(json){
       console.log(json);
       const table = document.querySelector('table');
       for(let item of json){
            const tr = document.createElement('tr');
             const td1 = document.createElement('td');
              const td2 = document.createElement('td');
            td1.textContent = item.ric;
            td2.textContent = item.data_registrazione;
               tr.appendChild(td1);
                tr.appendChild(td2);
                table.appendChild(tr);
       }
}

riempi();