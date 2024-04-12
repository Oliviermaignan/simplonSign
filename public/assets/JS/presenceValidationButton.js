export function presenceValidationButton(){
let AMTeacherValidation = document.getElementById('presenceValidationAMTeacher');
let PMTeacherValidation = document.getElementById('presenceValidationPMTeacher');

    if(AMTeacherValidation){
        AMTeacherValidation.addEventListener('click', ()=>{
            console.log('présence du boutton de validation prof AM');
        })
    }

    if(PMTeacherValidation){
        PMTeacherValidation.addEventListener('click', ()=>{
            console.log('présence du boutton de validation prof PM');
        })
    }
    
}
