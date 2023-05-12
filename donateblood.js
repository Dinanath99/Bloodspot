const form=document.getElementById('form');
const nameInput=document.getElementById('name');
const email=document.getElementById('email');
const contact=document.getElementById('contact');
const dob=document.getElementById('dob');
const address=document.getElementById('address');

form.addEventListener('submit',function(e){
    e.preventDefault();
    
    if(validateName() && validateEmail() && validatePhone() && validateDOB() && validateAddress()){
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

  function validateEmail(){
    const emailvalue = email.value.trim();
    const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (emailvalue === ''){
        setError(email, "Email is required", 'email-error');
    } else if(!emailRegex.test(emailvalue)) {
        setError(email, "Invalid email format!", 'email-error');
    } else {
        removeError( email, 'email-error');
        return true;
    }
 }


  function validatePhone(){
    const phonevalue = contact.value.trim();
    const phoneRegex = /^\d{10}$/;
    if (phonevalue === ''){
        setError(contact, "Phone number is required", 'contact-error');
    } else if(!phoneRegex.test(phonevalue)) {
        setError(contact, "Number must be atleast 10", 'contact-error');
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
    } else if (age < 18 || age > 60){
        setError(dob, "Your age must be between 18-60", 'dob-error');
    } else {
        removeError(dob, 'dob-error');
        return true;
    }
 }


  function validateAddress(){
    const addressvalue = address.value.trim();
    if (addressvalue === ''){
        setError(address, "Address is required", 'addr-error');
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
address.addEventListener('blur', validateAddress);