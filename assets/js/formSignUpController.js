// Function to show or hide password
export function showOrHidePasswordSignUp() {
	const i = document.getElementById("fa-eye-signup");
	const userPassword = document.getElementById("user-password-signup");

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

// Function to show or hide password confirm
export function showOrHidePasswordConfirmSignUp() {
	let iConfirm = document.getElementById("fa-eye-confirm");
	let userPasswordConfirm = document.getElementById("user-password-confirm");

	iConfirm.addEventListener("click", function () {
		let iClassConfirm = iConfirm.getAttribute("class");
		let userPasswordConfirmType = userPasswordConfirm.getAttribute("type");

		if (
			iClassConfirm === "fa-solid fa-eye-slash" &&
			userPasswordConfirmType === "password"
		) {
			iConfirm.setAttribute("class", "fa-solid fa-eye");
			userPasswordConfirm.setAttribute("type", "text");
			console.log("password confirm visible");
		} else {
			iConfirm.setAttribute("class", "fa-solid fa-eye-slash");
			userPasswordConfirm.setAttribute("type", "password");
			console.log("password confirm hidden");
		}
	});
}

// Function to stop submit
function onSubmitFormSignUp() {
	const btnToSignUp = document.getElementById("btn-to-signup");

	btnToSignUp.addEventListener("click", function (e) {
		const userName = document.getElementById("user-name");
		const userEmail = document.getElementById("user-email-signup");
		const userPhoneNumber = document.getElementById("user-phone-number");
		const userPassword = document.getElementById("user-password-signup");
		const userPasswordConfirm = document.getElementById(
			"user-password-confirm"
		);

		if (
			userName.value === "" ||
			userEmail.value === "" ||
			userPhoneNumber.value === "" ||
			userPassword.value === "" ||
			userPasswordConfirm.value === ""
		) {
			e.preventDefault();
			userName.style.borderColor = "red";
			console.log("Veuillez remplir tout les champs");
			return console.log(
				"One or many fields are not define.\nForme can't to be submited"
			);
		} else {
			const regexEmail = /^[a-z]+[0-9]*@gmail.com$/;
			const regexPassword = /^[a-zA-Z0-9]{6,8}$/;
			const regexPhoneNumber = /^([+]{1}[2]{2}[9]{1})*[0-9]{8}$/;

			if (
				!regexEmail.test(userEmail.value) ||
				!regexPassword.test(userPassword.value) ||
				!regexPhoneNumber.test(userPhoneNumber.value)
			) {
				e.preventDefault();
				console.log(
					"user email or password format not correct.\nVerify if the formats are respected."
				);
			}
		}
	});
}

// Function to test name field
function testNameFieldSignUp() {
	const userName = document.getElementById("user-name");
	const labelName = document.getElementById("label-name");

	userName.addEventListener("blur", function () {
		if (userName.value === "") {
			labelName.innerText = "Veuillez entrer votre nom";
			labelName.style.color = "red";
			userName.style.borderColor = "red";
			return console.log("empty user-name field");
		} else {
			labelName.innerText = "";
			userName.style.borderColor = "#fff";
			return console.log("non-empty user-name field");
		}
	});
}

// Function to test email field
function testEmailFieldSignUp() {
	const userEmail = document.getElementById("user-email-signup");
	const labelEmail = document.getElementById("label-email-signup");

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

// Function to test phone number field
function testPhoneNumberFieldSignUp() {
	const userPhoneNumber = document.getElementById("user-phone-number");
	const labelPhoneNumber = document.getElementById("label-phone-number");

	userPhoneNumber.addEventListener("blur", function () {
		if (userPhoneNumber.value === "") {
			labelPhoneNumber.innerText = "Veuillez entrer votre contact";
			labelPhoneNumber.style.color = "red";
			userPhoneNumber.style.borderColor = "red";
			return console.log("empty user-phone-number field");
		} else {
			labelPhoneNumber.innerText = "";
			userPhoneNumber.style.borderColor = "#fff";
			return console.log("non-empty user-phone-number field");
		}
	});
}

// Function to test password field
function testPasswordFieldSignUp() {
	const userPassword = document.getElementById("user-password-signup");
	const labelPassword = document.getElementById("label-password-signup");

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

// Function to test password confirm field
function testPasswordConfirmFieldSignUp() {
	const userPasswordConfirm = document.getElementById(
		"user-password-confirm"
	);
	const labelPasswordConfirm = document.getElementById(
		"label-password-confirm"
	);
	const iConfirm = document.getElementById("fa-eye-confirm");

	userPasswordConfirm.addEventListener("blur", function () {
		if (userPasswordConfirm.value === "") {
			labelPasswordConfirm.innerText =
				"Veuillez confirmer le mot de passe";
			labelPasswordConfirm.style.color = "red";
			userPasswordConfirm.style.borderColor = "red";
			iConfirm.style.position = "absolute";
			iConfirm.style.top = "50px";
			return console.log("empty user-password-confirm field");
		} else {
			labelPasswordConfirm.innerText = "";
			userPasswordConfirm.style.borderColor = "#fff";
			iConfirm.style.position = "absolute";
			iConfirm.style.top = "32px";
			return console.log("non-empty user-password-confirm field");
		}
	});
}

// Function to test identical password value
function testIdenticalPasswordSignUp() {
	const userPassword = document.getElementById("user-password-signup");
	const userPasswordConfirm = document.getElementById(
		"user-password-confirm"
	);
	const labelPasswordConfirm = document.getElementById(
		"label-password-confirm"
	);
	const iConfirm = document.getElementById("fa-eye-confirm");

	userPasswordConfirm.addEventListener("blur", function () {
		if (userPassword.value !== "") {
			if (userPasswordConfirm.value !== "") {
				if (userPassword.value !== userPasswordConfirm.value) {
					userPassword.style.borderColor = "orangered";
					userPasswordConfirm.style.borderColor = "orangered";
					labelPasswordConfirm.innerText =
						"Mots de passe non identiques.";
					labelPasswordConfirm.style.color = "orangered";
					iConfirm.style.position = "absolute";
					iConfirm.style.top = "50px";
					return console.log("passwords are not identical");
				} else {
					userPassword.style.borderColor = "#fff";
					userPasswordConfirm.style.borderColor = "#fff";
					labelPasswordConfirm.innerText = "";
					iConfirm.style.position = "absolute";
					iConfirm.style.top = "32px";
					return console.log("passwords are identical");
				}
			}
		}
	});
}

// Function to test empty fields
export function testEmptyFieldsSignUp() {
	testNameFieldSignUp();
	testEmailFieldSignUp();
	testPhoneNumberFieldSignUp();
	testPasswordFieldSignUp();
	testPasswordConfirmFieldSignUp();
	testIdenticalPasswordSignUp();
	onSubmitFormSignUp();
}

// Function to test email format
function testFormatEmailSignUp() {
	const regexEmail = /^[a-z]+[0-9]*@gmail.com$/;
	const userEmail = document.getElementById("user-email-signup");
	const labelEmail = document.getElementById("label-email-signup");

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

// Function to test phone-number format
function testFormatPhoneNumberSignUp() {
	const regexPhoneNumber = /^([+]{1}[2]{2}[9]{1})*[0-9]{8}$/;
	const userPhoneNumber = document.getElementById("user-phone-number");
	const labelPhoneNumber = document.getElementById("label-phone-number");
	const i = document.getElementById("fa-phone");

	userPhoneNumber.addEventListener("blur", function () {
		if (regexPhoneNumber.test(userPhoneNumber.value)) {
			i.style.position = "absolute";
			i.style.top = "32px";
			return console.log("format phone-number accepted");
		} else {
			labelPhoneNumber.innerText =
				"Invalide ex : +22966399757 ou 66399757";
			labelPhoneNumber.style.color = "orangered";
			userPhoneNumber.style.borderColor = "orangered";
			i.style.position = "absolute";
			i.style.top = "50px";
			return console.log("format phone-number not accepted");
		}
	});
}

// Function to test password format
function testFormatPasswordSignUp() {
	const regexPassword = /^[a-zA-Z0-9]{6,8}$/;
	const userPassword = document.getElementById("user-password-signup");
	const labelPassword = document.getElementById("label-password-signup");
	const i = document.getElementById("fa-eye-signup");

	userPassword.addEventListener("blur", function () {
		if (regexPassword.test(userPassword.value)) {
			i.style.position = "absolute";
			i.style.top = "32px";
			return console.log("format password accepted");
		} else {
			labelPassword.innerText =
				"6 à 8 caractères au plus. Pas de caractères spéciaux.";
			labelPassword.style.color = "orangered";
			userPassword.style.borderColor = "orangered";
			i.style.position = "absolute";
			i.style.top = "50px";
			return console.log("format password not accepted");
		}
	});
}

// Function to test password confirm format
function testFormatPasswordConfirmSignUp() {
	const regexPassword = /^[a-zA-Z0-9]{6,8}$/;
	const userPasswordConfirm = document.getElementById(
		"user-password-confirm"
	);

	userPasswordConfirm.addEventListener("blur", function () {
		if (regexPassword.test(userPasswordConfirm.value)) {
			return console.log("format password accepted");
		} else {
			userPasswordConfirm.style.borderColor = "orangered";
			return console.log("format password not accepted");
		}
	});
}

// Function to test format Data send by user
export function testFormatDataSignUp() {
	testFormatEmailSignUp();
	testFormatPhoneNumberSignUp();
	testFormatPasswordSignUp();
	testFormatPasswordConfirmSignUp();
	onSubmitFormSignUp();
}
