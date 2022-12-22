const container = document.querySelector(".container"),
  formvalid = document.querySelector("form"),
  eField = formvalid.querySelector(".email"),
  eInput = eField.querySelector("input"),
  pField = formvalid.querySelector(".password"),
  pInput = pField.querySelector("input"),
  signUp = document.querySelector(".signupLink"),
  login = document.querySelector(".loginLink");

/*    login form validation part*/
formvalid.addEventListener("submit", (e) => {
  let error = 0;
  var emailPattern = new RegExp(
    /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
  );

  if (eInput.value.trim() == "") {
    document.getElementById("errEmail").innerText = "Email can't be empty";
  } else if (!emailPattern.test(eInput.value)) {
    document.getElementById("errEmail").innerText =
      "Email must be in E-mail format";
  }

  if (pInput.value.trim() === "" || pInput.value.trim() == null) {
    error++;
    document.getElementById("errPassword").innerHTML =
      "Password cannot be empty";
  } else if (pInput.value.length <= 6) {
    error++;
    document.getElementById("errPassword").innerText =
      "Password must be longer than 6 characters";
  } else if (pInput.value.length >= 20) {
    error++;
    document.getElementById("errPassword").innerText =
      "password cannot be more than 20 characters";
  } else if (pInput.value === "password") {
    error++;
    document.getElementById("errPassword").innerText =
      "Please enter a secure password";
  }

  if (error > 0) {
    e.preventDefault();
  }
});

/* form validation for register form*/

const formReg = document.getElementById("createAccount"),
  usernameField = formReg.querySelector(".Username"),
  usernameInput = usernameField.querySelector("input"),
  emailInput = formReg.querySelector(".email"),
  emailValid = emailInput.querySelector("input"),
  pwArea = formReg.querySelector(".password"),
  pwCheck = pwArea.querySelector("input"),
  rePwArea = formReg.querySelector(".repassword"),
  reCheck = rePwArea.querySelector("input"),
  phoneNoField = formReg.querySelector(".phoneNo"),
  phoneNoValid = phoneNoField.querySelector("input"),
  addressField = formReg.querySelector(".address"),
  addressValid = addressField.querySelector("input"),
  genderField = formReg.querySelector(".gender"),
  genderValid = formReg.querySelector("input");

formReg.addEventListener("submit", (e) => {
  let error = 0;
  if (usernameInput.value.trim() === "" || usernameInput.value.trim() == null) {
    error++;
    document.getElementById("eerrUsername").innerHTML = "Please enter username";
  } else if (usernameInput.value.length >= 20) {
    error++;
    document.getElementById("eerrUsername").innerText =
      "Username can't be longer than 20 characters";
  }

  var userInput = /^[0-9]+$/;

  if (usernameInput.value.match(userInput)) {
    error++;
    document.getElementById("eerrUsername").innerText = "Invalid Username.";
  }

  // this is for email validatoion
  var emailCheck =
    /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (emailValid.value.trim() == "") {
    error++;
    document.getElementById("eerrEmail").innerText = "Email can't be empty";
  } else if (!emailCheck.test(emailValid.value)) {
    error++;
    document.getElementById("eerrEmail").innerText =
      "Email must be in E-mail format";
  }

  // this is for password and confirm password
  if (pwCheck.value.trim() === "" || pwCheck.value.trim() == null) {
    error++;
    document.getElementById("eerrPassword").innerHTML =
      "Password cannot be empty";
  } else if (pwCheck.value.length <= 6) {
    error++;
    document.getElementById("eerrPassword").innerText =
      "Password must be longer than 6 characters";
  } else if (pwCheck.value.length >= 20) {
    error++;
    document.getElementById("eerrPassword").innerText =
      "password cannot be more than 20 characters";
  } else if (pwCheck.value === "password") {
    error++;
    document.getElementById("eerrPassword").innerText =
      "Please enter a secure password";
  }

  if (reCheck.value.trim() === "" || reCheck.value.trim() == null) {
    error++;
    document.getElementById("eerrorRePassword").innerText =
      "Enter confirm password";
  }

  if (reCheck.value != pwCheck.value) {
    error++;
    document.getElementById("eerrorRePassword").innerText =
      "Password and Confirm password must be same.";
  }

  //this for Phone Number
  // let adfsdf= /^[0-9]{10}+$/;

  if (phoneNoValid.value.trim() == "") {
    error++;
    document.getElementById("eerrorPhoneNo").innerText =
      "Phone Number can't be empty";
  } else if (!phoneNoField.value == test("/^[0-9]{10}+$/")) {
    error++;
    document.getElementById("eerrorPhoneNo").innerText =
      "Numbers hould be in 10 digits";
  }

  // this is for Address
  if (addressValid.value.trim() == "") {
    error++;
    document.getElementById("eerrorAddress").innerText =
      "Address can't be empty";
  } else if (addressValid.value >= 6) {
    error++;
    document.getElementById("eerrorAddress").innerText =
      "There should be atleast 6 characters";
  }

  //this is for gender
  if (this.gender[0].checked == false && this.gender[1].checked == false) {
    //
    error++;
    document.getElementById("eerrorGender").innerText =
      "Choose your gender";
    
  }

  if (error > 0) {
    e.preventDefault();
  }
});

//new
// function setFormMessage(formElement, type, message) {
//   const messageElement = formElement.querySelector(".formMessage");

//   messageElement.textContent = message;
//   messageElement.classList.remove("formMessage--success, formMessage--error");
//   messageElement.classList.add(`formMessage--${type}`);
// }

// function setInputError(inputElement, message) {
//   inputElement.classList.add("formInput--error");
//   inputElement.parentElement.querySelector(
//     ".formInputErrorMessage"
//   ).textContent = message;
// }

// function clearInputError(inputElement) {
//   inputElement.classList.remove("formInput--error");
//   inputElement.parentElement.querySelector(
//     ".formInputErrorMessage"
//   ).textContent = "";
// }

// switching from login to signin and vice versa
document.addEventListener("DOMContentLoaded", () => {
  const loginForm = document.querySelector("#login");
  const createAccountForm = document.querySelector("#createAccount");

  document
    .querySelector("#linkCreateAccount")
    .addEventListener("click", (e) => {
      e.preventDefault();
      loginForm.classList.add("formHidden");
      createAccountForm.classList.remove("formHidden");
    });

  document.querySelector("#linkLogIn").addEventListener("click", (e) => {
    e.preventDefault();
    loginForm.classList.remove("formHidden");
    createAccountForm.classList.add("formHidden");
  });

  loginForm.addEventListener("submit", (e) => {
    // e.preventDefault();

    setFormMessage(loginForm, "error", "Invalid username/password combination");
  });

  document.querySelectorAll(".formInput").forEach((inputElement) => {
    inputElement.addEventListener("blur", (e) => {
      if (
        e.target.id === "signupUsername" &&
        e.target.value.length > 0 &&
        e.target.value.length < 3
      ) {
        setInputError(
          inputElement,
          "Username must be atleast 3 characters in length"
        );
      }
    });
    //input
    inputElement.addEventListener("click", (e) => {
      clearInputError(inputElement);
    });
  });
});
