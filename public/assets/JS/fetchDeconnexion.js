export function fetchDeconnexion (){
let deconnexionBtn = document.getElementById('connexion');

    if (deconnexionBtn){
        deconnexionBtn.addEventListener('click', ()=>{
            
            fetch(HOME_URL + 'deconnexion', {
                method: 'post',
                credentials: 'same-origin'
            })
            .then(response => response.text())
            .then(data => {
                if (data) {
                    window.location.href = HOME_URL;
                } else {
                    console.log('La requête de déconnexion a echouée');
                }
            })
            .catch(error => console.log(error))
        

        })
    };
}