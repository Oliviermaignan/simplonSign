export function lateToast(retard, numberOfLate){
    let isLate = retard;
    let howManyLate = numberOfLate;
    console.log(howManyLate);
    let toastBody = document.querySelector('.toast-body');
    let toastHeader = document.querySelector('.toast-header');
    let toastHeaderText = document.querySelector('.toast-header strong');
    let img = document.querySelector('.toast-container img')
    const toastLiveExample = document.getElementById('liveToast');
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);

    if (isLate){

        if (howManyLate>=3){
            
            img.src = '/assets/img/cake.png';
            img.style.width = '20%';
            toastHeader.classList.remove('bg-warning');
            toastHeader.classList.add('bg-danger');
            toastHeaderText.innerText = 'Alert retard';
            toastBody.innerHTML = "Let's go gateau"
            toastBody.innerHTML += "<br> Ca fait " + howManyLate + " fois";
            toastBootstrap.show()
        } 
        if (howManyLate===2){

            img.src = '/assets/img/cake.png';
            img.style.width = '10%';
            toastHeader.classList.remove('bg-warning');
            toastHeader.classList.add('bg-danger');
            toastHeaderText.innerText = 'Alert retard';
            toastBody.innerHTML = 'Vous êtes en retard...'
            toastBody.innerHTML += "<br> Vous êtes proche du gateau";
            toastBootstrap.show()
        }
        if (howManyLate===1){
            img.src = '/assets/img/cake.png';
            img.style.width = '05%';
            toastHeader.classList.remove('bg-danger');
            toastHeader.classList.add('bg-warning');
            toastHeaderText.innerText = 'Alert retard';
            toastBody.innerHTML = 'Vous êtes en retard...'
            toastBody.innerHTML += "<br> Ca fait " + howManyLate + " fois";
            toastBootstrap.show()
        }
    } else {
        img.src = '/assets/img/cake.png';
        img.style.width = '05%';
        toastHeader.classList.remove('bg-danger');
        toastHeader.classList.remove('bg-warning');
        toastHeader.classList.add('bg-success');
        toastHeaderText.innerText = 'Merci de la signature';
        toastBody.innerHTML = "Vous êtes à l'heure"
        toastBootstrap.show()
    }

    


};