import { presenceValidationButton } from "./codeGenerator.js";
import { fetchDeconnexion } from "./fetchDeconnexion";
import { studentPresenceValidationBtn } from "./studentPresenceValidation.js";
export function appelFetchConnexion(){
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
            presenceValidationButton();
            fetchDeconnexion();
            studentPresenceValidationBtn();
        } else {
            console.log('La requête a echouée');
        }
    })
    .catch(error => {
        console.error('Erreur lors de la requête fetch:', error);
    });
}