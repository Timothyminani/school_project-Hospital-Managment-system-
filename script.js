const Add_doctor = document.getElementById("Add_doctor");
const UserCreateA = document.getElementById("UserCreateA");
const close = document.getElementById("close");

if(Add_doctor){
    Add_doctor.addEventListener('click', function(){
        UserCreateA.classList.add('active');
    })
}

if(close){
    close.addEventListener('click', function(){
        UserCreateA.classList.remove('active');
    })
}


const Add_Nurse = document.getElementById("Add_Nurse");
const UserCreateAN = document.getElementById("UserCreateA");
const closeN = document.getElementById("close");

if(Add_Nurse){
    Add_Nurse.addEventListener('click', function(){
        UserCreateAN.classList.add('active');
    })
}

if(closeN){
    closeN.addEventListener('click', function(){
        UserCreateAN.classList.remove('active');
    })
}



const Add_Receptionist = document.getElementById("Add_Receptionist");
const UserCreateAR = document.getElementById("UserCreateA");
const closeR = document.getElementById("close");

if(Add_Receptionist){
    Add_Receptionist.addEventListener('click', function(){
        UserCreateAR.classList.add('active');
    })
}

if(closeR){
    closeR.addEventListener('click', function(){
        UserCreateAR.classList.remove('active');
    })
}









