verifyUserInfoRegex();

function verifyUserInfoRegex() {

    const regexName = /^[A-zÀ-ú -]{2,100}$/;
    const regexNumber = /^[0-9]{0,7}$/;
    const regexZipCode = /^[a-zA-Z]\d[a-zA-Z][ -]?\d[a-zA-Z]\d$/;
    const regexTel = /^\d{3}[- ]?\d{3}[ -]?\d{4}$/;
    const regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    const regexTicketDescription = /^[A-zÀ-ú \'@$,-.#0-9]{50,400}$/;
    const regexTicketMessage = /^[A-zÀ-ú \'@$,-.#0-9]{2,400}$/;
    const regexCardNumber = /^\d{4}[-]\d{4}[-]\d{4}[-]\d{3,4}$/;
    const regexCardMonth = /^0[1-9]|1[0-2]$/;
    const regexCardYear = /^202[2-9]$/;
    const regexCardCVC = /^\d{3,4}$/;


    const regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%\.\,#*?&])[A-Za-z\d@$#!\.\,%*?&]{8,}$/;

    // Dynamic password regex
    const regexPasswordMinCharCount = /^[\w\W]{8,50}$/;
    const regexPasswordMaxCharCount = /^[\w\W0-9]{1,50}$/;
    const regexPasswordMajChar = /[A-Z]{1,}/;
    const regexPasswordMinChar = /[a-z]{1,}/;
    const regexPasswordNumber = /[0-9]{1,}/;
    const regexPasswordSpecialChar = /[@$!%.*?&]{1,}/;




    if (document.title == "New ticket") {
        const description = document.getElementById('textareaNewTicket')

        description.addEventListener('input', () => {
            if (regexTicketDescription.test(description.value)) {
                description.classList.remove('is-invalid')
                description.classList.add('is-valid')
            }
            else {
                description.classList.remove('is-valid')
                description.classList.add('is-invalid')
            }
        })
    }

    if (document.title == "Ticket messages") {
        const message = document.getElementById('responseMessageTicketTextarea')

        message.addEventListener('input', () => {
            if (regexTicketMessage.test(message.value)) {
                message.classList.remove('is-invalid')
                message.classList.add('is-valid')
            }
            else {
                message.classList.remove('is-valid')
                message.classList.add('is-invalid')
            }
        })
    }


    if (document.title == "Panier") {
        const name = document.getElementById('clientCardName')
        const cardNumber = document.getElementById('clientCardNumber')
        const cardMonth = document.getElementById('clientCardMonth')
        const cardYear = document.getElementById('clientCardYear')
        const cardCVC = document.getElementById('clientCardCVC')

        name.addEventListener('input', () => {
            if (regexName.test(name.value)) {
                name.classList.remove('is-invalid')
                name.classList.add('is-valid')
            }
            else {
                name.classList.remove('is-valid')
                name.classList.add('is-invalid')
            }
        })
        cardNumber.addEventListener('input', () => {
            if (regexCardNumber.test(cardNumber.value)) {
                cardNumber.classList.remove('is-invalid')
                cardNumber.classList.add('is-valid')
            }
            else {
                cardNumber.classList.remove('is-valid')
                cardNumber.classList.add('is-invalid')
            }
        })
        cardMonth.addEventListener('input', () => {
            if (regexCardMonth.test(cardMonth.value)) {
                cardMonth.classList.remove('is-invalid')
                cardMonth.classList.add('is-valid')
            }
            else {
                cardMonth.classList.remove('is-valid')
                cardMonth.classList.add('is-invalid')
            }
        })
        cardYear.addEventListener('input', () => {
            if (regexCardYear.test(cardYear.value)) {
                cardYear.classList.remove('is-invalid')
                cardYear.classList.add('is-valid')
            }
            else {
                cardYear.classList.remove('is-valid')
                cardYear.classList.add('is-invalid')
            }
        })
        cardCVC.addEventListener('input', () => {
            if (regexCardCVC.test(cardCVC.value)) {
                cardCVC.classList.remove('is-invalid')
                cardCVC.classList.add('is-valid')
            }
            else {
                cardCVC.classList.remove('is-valid')
                cardCVC.classList.add('is-invalid')
            }
        })
    }

    if (document.title == "Register" ||
        document.title == "Admin edit" ||
        document.title == "Admin index" ||
        document.title == "Client infos" ||
        document.title == "Client rechercher" ||
        document.title == 'Panier' ||
        document.title == "Commande - Mon panier") {
        const prenom = document.getElementsByName('prenom')[0];
        const nom = document.getElementsByName('nom')[0];
        const rue = document.getElementsByName('rue')[0];
        const noPorte = document.getElementsByName('noPorte')[0];
        const appartement = document.getElementsByName('appartement')[0];
        const zip_code = document.getElementsByName('zip_code')[0];
        const tel = document.getElementsByName('tel')[0];
        const ville = document.getElementsByName('ville')[0];


        prenom.addEventListener('input', () => {
            if (regexName.test(prenom.value)) {
                prenom.classList.remove('is-invalid')
                prenom.classList.add('is-valid')
            }
            else {
                prenom.classList.remove('is-valid')
                prenom.classList.add('is-invalid')
            }
        })



        nom.addEventListener('input', () => {
            if (regexName.test(nom.value)) {
                nom.classList.remove('is-invalid')
                nom.classList.add('is-valid')
            }
            else {
                nom.classList.remove('is-valid')
                nom.classList.add('is-invalid')
            }
        })



        rue.addEventListener('input', () => {
            if (regexName.test(rue.value)) {
                rue.classList.remove('is-invalid')
                rue.classList.add('is-valid')
            }
            else {
                rue.classList.remove('is-valid')
                rue.classList.add('is-invalid')
            }
        })



        noPorte.addEventListener('input', () => {
            if (regexNumber.test(noPorte.value)) {
                noPorte.classList.remove('is-invalid')
                noPorte.classList.add('is-valid')
            }
            else {
                noPorte.classList.remove('is-valid')
                noPorte.classList.add('is-invalid')
            }
        })



        appartement.addEventListener('input', () => {
            if (regexNumber.test(appartement.value)) {
                appartement.classList.remove('is-invalid')
                appartement.classList.add('is-valid')
            }
            else {
                appartement.classList.remove('is-valid')
                appartement.classList.add('is-invalid')
            }
        })



        zip_code.addEventListener('input', () => {
            if (regexZipCode.test(zip_code.value)) {
                zip_code.classList.remove('is-invalid')
                zip_code.classList.add('is-valid')
            }
            else {
                zip_code.classList.remove('is-valid')
                zip_code.classList.add('is-invalid')
            }
        })



        tel.addEventListener('input', () => {
            if (regexTel.test(tel.value)) {
                tel.classList.remove('is-invalid')
                tel.classList.add('is-valid')
            }
            else {
                tel.classList.remove('is-valid')
                tel.classList.add('is-invalid')
            }
        })



        ville.addEventListener('input', () => {
            if (regexName.test(ville.value)) {
                ville.classList.remove('is-invalid')
                ville.classList.add('is-valid')
            }
            else {
                ville.classList.remove('is-valid')
                ville.classList.add('is-invalid')
            }
        })



    }



    if (document.title == "Register" ||
        document.title == "Admin edit" ||
        document.title == "Admin index" ||
        document.title == "Client infos" ||
        document.title == "Client rechercher" ||
        document.title == "Client gestion" ||
        document.title == "Commande - Mon panier" ||
        document.title == "Login") {
        const email = document.getElementsByName('email')[0];
        const tel = document.getElementsByName('tel')[0];



        email.addEventListener('input', () => {
            if (regexEmail.test(email.value)) {
                email.classList.remove('is-invalid')
                email.classList.add('is-valid')
            }
            else {
                email.classList.remove('is-valid')
                email.classList.add('is-invalid')
            }
        })

        if (document.title !== "Client gestion") {
            password.addEventListener('input', () => {
                if (regexPassword.test(password.value)) {
                    password.classList.remove('is-invalid')
                    password.classList.add('is-valid')
                }
                else {
                    password.classList.remove('is-valid')
                    password.classList.add('is-invalid')
                }
            })
        }

        if (document.title !== "Login") {
            tel.addEventListener('input', () => {
                if (regexTel.test(tel.value)) {
                    tel.classList.remove('is-invalid')
                    tel.classList.add('is-valid')
                }
                else {
                    tel.classList.remove('is-valid')
                    tel.classList.add('is-invalid')
                }
            })
        }
    }


    if (document.title == "Register" ||
        document.title == "Client infos" ||
        document.title == "Admin edit" ||
        document.title == "Admin index" ||
        document.title == "Client rechercher") {
        const password = document.getElementById('password')
        const smallMinCharCount = document.getElementById('minCharCountPass')
        const smallMaxCharCount = document.getElementById('maxCharCountPass')
        const smallMajChar = document.getElementById('majCharPass')
        const smallMinChar = document.getElementById('minCharPass')
        const smallNumChar = document.getElementById('numCharPass')
        const smallSpeChar = document.getElementById('speCharPass')

        const minCharCountPassInvalidIcon = document.getElementById('minCharCountPassInvalidIcon')
        const minCharCountPassValidIcon = document.getElementById('minCharCountPassValidIcon')
        const maxCharCountPassValidIcon = document.getElementById('maxCharCountPassValidIcon')
        const maxCharCountPassInvalidIcon = document.getElementById('maxCharCountPassInvalidIcon')
        const majCharCountPassValidIcon = document.getElementById('majCharCountPassValidIcon')
        const majCharCountPassInvalidIcon = document.getElementById('majCharCountPassInvalidIcon')
        const minCharPassValidIcon = document.getElementById('minCharPassValidIcon')
        const minCharPassInvalidIcon = document.getElementById('minCharPassInvalidIcon')
        const smallNumCharInvalidIcon = document.getElementById('smallNumCharInvalidIcon')
        const smallNumCharValidIcon = document.getElementById('smallNumCharValidIcon')
        const smallSpeCharValidIcon = document.getElementById('smallSpeCharValidIcon')
        const smallSpeCharInvalidIcon = document.getElementById('smallSpeCharInvalidIcon')

        password.addEventListener('input', () => {
            if (regexPasswordMinCharCount.test(password.value)) {
                smallMinCharCount.classList.remove('text-danger')
                smallMinCharCount.classList.add('text-success')
                minCharCountPassValidIcon.classList.remove('d-none')
                minCharCountPassInvalidIcon.classList.add('d-none')

            }
            else {
                smallMinCharCount.classList.remove('text-success')
                smallMinCharCount.classList.add('text-danger')
                minCharCountPassValidIcon.classList.add('d-none')
                minCharCountPassInvalidIcon.classList.remove('d-none')

            }
        })


        password.addEventListener('input', () => {
            if (regexPasswordMaxCharCount.test(password.value)) {
                smallMaxCharCount.classList.remove('text-danger')
                smallMaxCharCount.classList.add('text-success')
                maxCharCountPassValidIcon.classList.remove('d-none')
                maxCharCountPassInvalidIcon.classList.add('d-none')
            }
            else {
                smallMaxCharCount.classList.add('text-danger')
                smallMaxCharCount.classList.add('text-danger')
                maxCharCountPassValidIcon.classList.add('d-none')
                maxCharCountPassInvalidIcon.classList.remove('d-none')
            }
        })


        password.addEventListener('input', () => {
            if (regexPasswordMajChar.test(password.value)) {
                smallMajChar.classList.remove('text-danger')
                smallMajChar.classList.add('text-success')
                majCharCountPassValidIcon.classList.remove('d-none')
                majCharCountPassInvalidIcon.classList.add('d-none')
            }
            else {
                smallMajChar.classList.add('text-danger')
                smallMajChar.classList.add('text-danger')
                majCharCountPassValidIcon.classList.add('d-none')
                majCharCountPassInvalidIcon.classList.remove('d-none')
            }
        })


        password.addEventListener('input', () => {
            if (regexPasswordMinChar.test(password.value)) {
                smallMinChar.classList.remove('text-danger')
                smallMinChar.classList.add('text-success')
                minCharPassValidIcon.classList.remove('d-none')
                minCharPassInvalidIcon.classList.add('d-none')
            }
            else {
                smallMinChar.classList.add('text-danger')
                smallMinChar.classList.add('text-danger')
                minCharPassValidIcon.classList.add('d-none')
                minCharPassInvalidIcon.classList.remove('d-none')
            }
        })

        password.addEventListener('input', () => {
            if (regexPasswordNumber.test(password.value)) {
                smallNumChar.classList.remove('text-danger')
                smallNumChar.classList.add('text-success')
                smallNumCharValidIcon.classList.remove('d-none')
                smallNumCharInvalidIcon.classList.add('d-none')
            }
            else {
                smallNumChar.classList.add('text-danger')
                smallNumChar.classList.add('text-danger')
                smallNumCharValidIcon.classList.add('d-none')
                smallNumCharInvalidIcon.classList.remove('d-none')
            }
        })

        password.addEventListener('input', () => {
            if (regexPasswordSpecialChar.test(password.value)) {
                smallSpeChar.classList.remove('text-danger')
                smallSpeChar.classList.add('text-success')
                smallSpeCharValidIcon.classList.remove('d-none')
                smallSpeCharInvalidIcon.classList.add('d-none')
            }
            else {
                smallSpeChar.classList.add('text-danger')
                smallSpeChar.classList.add('text-danger')
                smallSpeCharValidIcon.classList.add('d-none')
                smallSpeCharInvalidIcon.classList.remove('d-none')
            }
        })
    }
}


















