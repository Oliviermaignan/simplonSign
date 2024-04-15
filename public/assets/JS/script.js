import { appelFetchConnexion } from "./appelFetchConnexion.js";

if (document.getElementById('buttonSubmitConnexion')) {
    document.getElementById('buttonSubmitConnexion').addEventListener('click', (e)=>{
        e.preventDefault();
        appelFetchConnexion();
    })
}

