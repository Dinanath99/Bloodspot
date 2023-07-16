const form=document.getElementById('form');
const nameInput=document.getElementById('Pname');
const email=document.getElementById('email');
const contact=document.getElementById('contact');
const dob=document.getElementById('dob');
const qty=document.getElementById('qty');
const img=document.getElementById('image');
const address=document.getElementById('address');

form.addEventListener('submit', function(e) {
    e.preventDefault();
    if ((validateName() && validateEmail() && validatePhone() && validateDOB() && validateQty() && validateImg() && validateAddress())) {
        form.submit();
    }
});

function validateName(){
    const namevalue = nameInput.value.trim();
    const nameregex = /^[a-zA-Z\s]+$/;
    if(namevalue == ''){
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
    if (emailvalue == ''){
        setError(email, "Email is required", 'email-error');
        return false;
    } else if(!emailRegex.test(emailvalue)) {
        setError(email, "Invalid email format!", 'email-error');
        return false;
    } else {
        removeError( email, 'email-error');
        return true;
    }
 }


function validatePhone(){
    const phonevalue = contact.value.trim();
    const phoneRegex = /^9\d{9}$/;
    if (phonevalue == ''){
        setError(contact, "Phone number is required", 'contact-error');
        return false;
    } else if(!phoneRegex.test(phonevalue)) {
        setError(contact, "Incorrect Phone Number", 'contact-error');
        return false;
    } else {
        removeError(contact, 'contact-error');
        return true;
    }
 }

function validateDOB(){
    const dobvalue = dob.value.trim();
    if (dobvalue == ''){
        setError(dob, "Date of Birth is required", 'dob-error');
        return false;
    }  else {
        removeError(dob, 'dob-error');
        return true;
    }
 }

function validateQty(){
    const qtyvalue = qty.value.trim();
    if (qtyvalue == ''){
        setError(qty, "Quantity is required", 'qty-error');
        return false;
    }  else {
        removeError(qty, 'qty-error');
        return true;
    }
 }

function validateImg() {
    const file = img.files[0];
    const fileName = file.name;
    const imageRegex = /\.(jpeg|jpg|png)$/;
    if  (!imageRegex.test(fileName)) {
        setError(img, "Invalid image file. Only JPEG, JPG, and PNG file are allowed.", 'image-error');
        return false;
      } else {
        removeError(img, 'image-error');
        return true;
      }
    }

function validateAddress(){
    const addressvalue = address.value.trim();
    if (addressvalue == ''){
        setError(address, "Address is required", 'addr-error');
    }  else {
        removeError(address, 'addr-error');
        return true;
    }
 }

function setError(inputElement, message, errorId) {
    const errorElement = document.getElementById(errorId);
    errorElement.textContent = message;
    inputElement.classList.add('error-message');

}

function removeError( inputElement, errorId) {
    const errorElement = document.getElementById(errorId);
    errorElement.textContent = '';
    inputElement.classList.remove('error-message');

}

nameInput.addEventListener('blur', validateName);
email.addEventListener('blur', validateEmail);
contact.addEventListener('blur', validatePhone);
dob.addEventListener('blur', validateDOB);
qty.addEventListener('blur', validateQty);
img.addEventListener('change', validateImg);
address.addEventListener('blur', validateAddress);