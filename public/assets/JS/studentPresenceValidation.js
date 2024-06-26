import { lateToast } from "./showLateToast.js";
export function studentPresenceValidationBtn (){
    let StudentPresenceValidationBtn = document.getElementById('StudentPresenceValidation');
    if(StudentPresenceValidationBtn){
        StudentPresenceValidationBtn.addEventListener('click', ()=>{
            let inputCodeValue = document.getElementById('inputCode').value;

                //construction de l'objet avec la data
            let dataObj = {
                "code": inputCodeValue,
            };

            let JSONdata = JSON.stringify(dataObj);

            fetch(HOME_URL + 'studentPresenceValidation', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSONdata
            })
            .then(response => response.json())
            .then(data => {
                if (data) {
                    const numberOfLate = data.numberOfElements;
                    const late = data.late;

                    //affichage du toast
                    lateToast(late, numberOfLate);

                } else {
                    console.log('La requête a echouée');
                }
            })
            .catch(error => {
                console.error('Erreur lors de la requête fetch:', error);
            });
        });
    };
}