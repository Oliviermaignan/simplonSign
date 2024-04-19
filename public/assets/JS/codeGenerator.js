export function presenceValidationButton(){
let AMTeacherValidation = document.getElementById('presenceValidationAMTeacher');
let PMTeacherValidation = document.getElementById('presenceValidationPMTeacher');
let coursContainer = document.querySelector('.cours-container');
let HTMLContainer = document.querySelector('#HTMLContainer');
let displayCodeContainerAM = document.querySelector('.displayCode.AM');
let displayCodeContainerPM = document.querySelector('.displayCode.PM');

    if (displayCodeContainerAM || displayCodeContainerPM){
        if (PMTeacherValidation.innerText === 'non disponible'){
            PMTeacherValidation.classList.add("btn-secondary");
            PMTeacherValidation.disabled = true;
        } 
        if (AMTeacherValidation.innerText === 'signatures reccueillies'){
            AMTeacherValidation.classList.add("btn-secondary");
            AMTeacherValidation.disabled = true;
        }
    }


    if(AMTeacherValidation){
        AMTeacherValidation.addEventListener('click', ()=>{
            appelFetchCreationCodeAM();
            AMTeacherValidation.classList.add("btn-warning");
            AMTeacherValidation.innerText = 'signatures en cours'
            AMTeacherValidation.disabled = true;
        })
    }

    if(PMTeacherValidation){

        PMTeacherValidation.addEventListener('click', ()=>{
            appelFetchCreationCodePM();
        })
    }


    function appelFetchCreationCodeAM(){
        let dataObj = {
            "coucou": "coucou",
        };
    
        
        let JSONdata = JSON.stringify(dataObj);
    
        fetch(HOME_URL + 'creationCode', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSONdata
        })
        .then(response => response.text())
        .then(data => {
            if (data) {
                displayCodeContainerAM.innerHTML = data;
            } else {
                console.log('La requête a echouée');
            }
        })
        .catch(error => {
            console.error('Erreur lors de la requête fetch:', error);
        });
    }

    function appelFetchCreationCodePM(){
        let dataObj = {
            "coucou": "coucou",
        };
    
        
        let JSONdata = JSON.stringify(dataObj);
    
        fetch(HOME_URL + 'creationCode', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSONdata
        })
        .then(response => response.text())
        .then(data => {
            if (data) {
                displayCodeContainerPM.innerHTML = data;
            } else {
                console.log('La requête a echouée');
            }
        })
        .catch(error => {
            console.error('Erreur lors de la requête fetch:', error);
        });
    }
    
}
