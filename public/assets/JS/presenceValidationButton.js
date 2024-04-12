export function presenceValidationButton(){
console.log('hihihi');
let AMTeacherValidation = document.getElementById('presenceValidationAMTeacher');
let PMTeacherValidation = document.getElementById('presenceValidationPMTeacher');
console.log(AMTeacherValidation);
console.log(PMTeacherValidation);

if(AMTeacherValidation){
    AMTeacherValidation.addEventListener('click', ()=>{
        console.log('présence du boutton de validation prof AM');
    })
}

if(PMTeacherValidation){
    console.log('présence du boutton de validation prof PM')
}
}
