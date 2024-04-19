export function disablePmButton(){
    let PMTeacherValidation = document.getElementById('presenceValidationPMTeacher');
    if (PMTeacherValidation){
        if (PMTeacherValidation.innerText === 'Code déjà généré'){
            PMTeacherValidation.disabled = true;
            PMTeacherValidation.classList.add("btn-secondary");
        }
    }
}