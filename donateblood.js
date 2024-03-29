const form=document.getElementById('form');
const nameInput=document.getElementById('name');
const email=document.getElementById('email');
const contact=document.getElementById('contact');
const dob=document.getElementById('dob');
const weight=document.getElementById('weight');
const address=document.getElementById('address');

form.addEventListener('submit',function(e){
    e.preventDefault();
    
    if(validateName() && validateEmail() && validatePhone() && validateDOB() && validateWeight() && validateAddress()){
    form.submit();
  }
});

function validateName(){
    const namevalue = nameInput.value.trim();
    const nameregex = /^[a-zA-Z\s]+$/;
    if(namevalue === ''){
      setError(nameInput, 'Name needs to be filled out', 'name-error');
      return false;
    } else if (!nameregex.test(namevalue)){
     setError(nameInput, "Name shouldn't contain number.", 'name-error');
     return false;
    }else{
     removeError(nameInput, 'name-error');
     return true;
    }
  }

  function validateEmail() {
    const emailValue = email.value.trim();
    const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (emailValue === '') {
      setError(email, "Email is required", 'email-error');
      return false;
    } else if (!emailRegex.test(emailValue)) {
      setError(email, "Invalid email format!", 'email-error');
      return false;
    } else {
      removeError(email, 'email-error');
      return true;
    }
  }


  function validatePhone(){
    const phonevalue = contact.value.trim();
    const phoneRegex = /^9\d{9}$/;
    if (phonevalue === ''){
        setError(contact, "Phone number is required", 'contact-error');
        return false;
    } else if(!phoneRegex.test(phonevalue)) {
        setError(contact, "Invalid Phone Number", 'contact-error');
        return false;
    } else {
        removeError(contact, 'contact-error');
        return true;
    }
 }
  function validateDOB(){
    const dobvalue = dob.value.trim();
    const current = new Date();
    const given = new Date(dobvalue);
    const age = current.getFullYear() - given.getFullYear();
    if (dobvalue === ''){
        setError(dob, "Date of Birth is required", 'dob-error');
        return false;
    } else if (age < 18 || age > 60){
        setError(dob, "Your age must be between 18-60", 'dob-error');
        return false;
    } else {
        removeError(dob, 'dob-error');
        return true;
    }
 }
  function validateWeight(){
    const weightvalue = weight.value.trim();
    if (weightvalue === ''){
        setError(weight, "Weight is required", 'weight-error');
        return false;
    } else if (weightvalue < 50){
        setError(weight, "You must weigh at least 50 kg.", 'weight-error');
        return false;
    } else {
        removeError(weight, 'weight-error');
        return true;
    }
 }


  function validateAddress(){
    const addressvalue = address.value.trim();
    if (addressvalue === ''){
        setError(address, "Address is required", 'addr-error');
        return false;
    }  else {
        removeError(address, 'addr-error');
        return true;
    }
 }

 // Set error message
function setError(inputElement, message, errorId) {
    const errorElement = document.getElementById(errorId);
    errorElement.textContent = message;
    inputElement.classList.add('error-message');

}

// Remove error message
function removeError( inputElement, errorId) {
    const errorElement = document.getElementById(errorId);
    errorElement.textContent = '';
    inputElement.classList.remove('error-message');

}

nameInput.addEventListener('blur', validateName);
email.addEventListener('blur', validateEmail);
contact.addEventListener('blur', validatePhone);
dob.addEventListener('blur', validateDOB);
weight.addEventListener('blur', validateWeight);
address.addEventListener('blur', validateAddress);