let HTMLContainer = document.querySelector('#HTMLContainer');

if (document.getElementById('buttonSubmitConnexion')) {
    document.getElementById('buttonSubmitConnexion').addEventListener('click', (e)=>{
        e.preventDefault();
        appelFetchConnexion();
    })
}

function appelFetchConnexion(){
    //recup des inputs
    let emailInput = document.getElementById('emailConnexionInput').value;
    let passwordInput = document.getElementById('passwordConnexionInput').value;
    
    //construction de l'objet avec la data
    let dataObj = {
        "email": emailInput,
        "password": passwordInput,
    };

    
    let JSONdata = JSON.stringify(dataObj);

    fetch(HOME_URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSONdata
    })
    .then(response => response.text())
    .then(data => {
        if (data) {
            HTMLContainer.innerHTML = data;
        } else {
            console.log('La requête a echouée');
        }
    })
    .catch(error => {
        console.error('Erreur lors de la requête fetch:', error);
    });
}


