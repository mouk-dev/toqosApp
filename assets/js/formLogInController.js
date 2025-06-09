// Function to show or hide password
export function showOrHidePasswordLogIn() {
	const i = document.getElementById("fa-eye-login");
	const userPassword = document.getElementById("user-password-login");

	i.addEventListener("click", function () {
		const iClass = i.getAttribute("class");
		const userPasswordType = userPassword.getAttribute("type");

		if (
			iClass === "fa-solid fa-eye-slash" &&
			userPasswordType === "password"
		) {
			i.setAttribute("class", "fa-solid fa-eye");
			userPassword.setAttribute("type", "text");
			console.log("password visible");
		} else {
			i.setAttribute("class", "fa-solid fa-eye-slash");
			userPassword.setAttribute("type", "password");
			console.log("password hidden");
		}
	});
}

// Function to stop submit
function onSubmitFormLogIn() {
	const btnToLogIn = document.getElementById("btn-to-login");

	btnToLogIn.addEventListener("click", function (e) {
		const userEmail = document.getElementById("user-email-login");
		const userPassword = document.getElementById("user-password-login");

		if (userEmail.value === "" || userPassword.value === "") {
			e.preventDefault();
			userEmail.style.borderColor = "red";
			return console.log(
				"One or many fields are not define.\nForme can't to be submited"
			);
		} else {
			const regexEmail = /^[a-z]+[0-9]*@gmail.com$/;
			const regexPassword = /^[a-zA-Z0-9@#&€$_!?]{6,8}$/;
			if (
				!regexEmail.test(userEmail.value) ||
				!regexPassword.test(userPassword.value)
			) {
				e.preventDefault();
				console.log(
					"user email ou password format not correct.\nVerify if the formats are respected."
				);
			}
		}
	});
}

// Function to test email field
function testEmailFieldLogIn() {
	const userEmail = document.getElementById("user-email-login");
	const labelEmail = document.getElementById("label-email-login");

	userEmail.addEventListener("blur", function () {
		if (userEmail.value === "") {
			labelEmail.innerText = "Veuillez entrer votre email";
			labelEmail.style.color = "red";
			userEmail.style.borderColor = "red";
			return console.log("empty user-email field");
		} else {
			labelEmail.innerText = "";
			userEmail.style.borderColor = "#fff";
			return console.log("non-empty user-email field");
		}
	});
}

// Function to test password field
function testPasswordFieldLogIn() {
	const userPassword = document.getElementById("user-password-login");
	const labelPassword = document.getElementById("label-password-login");

	userPassword.addEventListener("blur", function () {
		if (userPassword.value === "") {
			labelPassword.innerText = "Veuillez créer un mot de passe";
			labelPassword.style.color = "red";
			userPassword.style.borderColor = "red";
			return console.log("empty user-password field");
		} else {
			labelPassword.innerText = "";
			userPassword.style.borderColor = "#fff";
			return console.log("non-empty user-password field");
		}
	});
}

// Function to test empty fields
export function testEmptyFieldsLogIn() {
	testEmailFieldLogIn();
	testPasswordFieldLogIn();
	onSubmitFormLogIn();
}

// Function to test email format
function testFormatEmailLogIn() {
	const regexEmail = /^[a-z]+[0-9]*@gmail.com$/;
	const userEmail = document.getElementById("user-email-login");
	const labelEmail = document.getElementById("label-email-login");

	userEmail.addEventListener("blur", function () {
		if (regexEmail.test(userEmail.value)) {
			return console.log("format email accepted");
		} else {
			labelEmail.innerText = "email invalid : example@gmail.com";
			labelEmail.style.color = "orangered";
			userEmail.style.borderColor = "orangered";
			return console.log("format email not accepted");
		}
	});
}

// Function to test password format
function testFormatPasswordLogIn() {
	const regexPassword = /^[a-zA-Z0-9@#&€$_!?]{6,8}$/;
	const userPassword = document.getElementById("user-password-login");
	const labelPassword = document.getElementById("label-password-login");
	const i = document.getElementById("fa-eye-login");

	userPassword.addEventListener("blur", function () {
		if (regexPassword.test(userPassword.value)) {
			i.style.position = "absolute";
			i.style.top = "32px";
			return console.log("format password accepted");
		} else {
			labelPassword.innerText = "6 à 8 caractères au plus.";
			labelPassword.style.color = "orangered";
			userPassword.style.borderColor = "orangered";
			i.style.position = "absolute";
			i.style.top = "32px";
			return console.log("format password not accepted");
		}
	});
}

// Function to test format Data send by user
export function testFormatDataLogIn() {
	testFormatEmailLogIn();
	testFormatPasswordLogIn();
	onSubmitFormLogIn();
}
