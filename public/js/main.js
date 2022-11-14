creditCardAutoComplete()
closedModalPopup();
toggleSearchInputForAdmin();
changeOrderRowColorWhenChangingState();
adminMenu();
adminRepas();
cart();

function closedModalPopup() {
    const divAlertSuccessSession = document.getElementById('divAlertSucccessInfoChanged');
    const btnCloseAlertSuccessSession = document.getElementById('btnAlertSucccessInfoChanged');

    if (btnCloseAlertSuccessSession) {
        btnCloseAlertSuccessSession.addEventListener('click', () => {
            divAlertSuccessSession.remove();
        })
    }
}



// **** TO FIX LATER ***

function creditCardAutoComplete() {
    if (document.title == 'Panier') {
        const selectCard = document.getElementById('ccUser');
        const clientCardName = document.getElementById('clientCardName');
        const clientCardNumber = document.getElementById('clientCardNumber');
        const clientCardCVC = document.getElementById('clientCardCVC');
        const clientCardMonth = document.getElementById('clientCardMonth');
        const clientCardYear = document.getElementById('clientCardYear');

        if (selectCard) {
            selectCard.addEventListener('change', () => {
                const value = selectCard.value;
                getCard(value);
            })
        }
        async function getCard(ccNumber) {


            // A METTRE EN HAUT DE LA PAGE ->
            // <meta name="csrf-token" content="{{ csrf_token() }}"
            // SUIVI DE CA COMME SELECTEUR ET A NETTRE DANS LE X-CSRF HEADERS DE NOTRE FETCH
            // const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // POSIBILITE DE METTRE DANS LURL DU FETCH
            // const urlReq = window.location.origin + "/getAuthUserCreditCard";

            const result = await fetch("/getAuthUserCreditCard", {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": document.querySelector('input[name=_token]').value
                },
                body: JSON.stringify(ccNumber),
            });
            const jsondata = await result.json(ccNumber);

            if (parseInt(ccNumber) > 1) {
                clientCardName.value = jsondata.name
                clientCardNumber.value = jsondata.card_number
                clientCardCVC.value = jsondata.cvc
                if (parseInt(jsondata.month) < 10)
                    clientCardMonth.value = '0' + jsondata.month
                else
                    clientCardMonth.value = jsondata.month
                clientCardYear.value = jsondata.year
            } else {
                clientCardName.value = ""
                clientCardNumber.value = ""
                clientCardCVC.value = ""
                clientCardMonth.value = ""
                clientCardYear.value = ""
            }
        }
    }
}


// // ======================================================================
// // EVERYTHING NEEDED FOR STRIPE FORM VALIDATION

// $(function() {
//     const h2pay = document.getElementById('h2Paiement');
//     const h2InvalidCardInfo = document.getElementById('h2InvalidCard');

//     var $form = $(".require-validation");
//     $('form.require-validation').bind('submit', function(e) {
//         const h2pay = document.getElementById('h1Paiement');

//         var $form = $(".require-validation"),
//             inputSelector = ['input[type=email]', 'input[type=password]',
//                 'input[type=text]', 'input[type=file]',
//                 'textarea'
//             ].join(', '),
//             $inputs = $form.find('.required').find(inputSelector),
//             $errorMessage = $form.find('div.error'),
//             valid = true;
//         $errorMessage.addClass('');
//         $('.has-error').removeClass('has-error');
//         $inputs.each(function(i, el) {
//             var $input = $(el);
//             if ($input.val() === '') {
//                 h2pay.remove();
//                 $input.parent().addClass('has-error');
//                 $errorMessage.removeClass('hide');
//                 e.preventDefault();
//             }
//         });
//         if (!$form.data('cc-on-file')) {
//             e.preventDefault();

//             Stripe.setPublishableKey($form.data('stripe-publishable-key'));
//             Stripe.createToken({
//                 number: $('.card-number').val(),
//                 cvc: $('.card-cvc').val(),
//                 exp_month: $('.card-expiry-month').val(),
//                 exp_year: $('.card-expiry-year').val()
//             }, stripeResponseHandler);
//         }
//     });

//     function stripeResponseHandler(status, response) {
//         if (response.error) {
//             $('.error')
//                 .removeClass('hide')
//                 .find('.alert')
//                 .text(response.error.message)

//                 if (h2pay.nextElementSibling.tagName !== "P"){
//                     h2pay.insertAdjacentHTML('afterend',"<p id='h2InvalidCard' class='text-danger fs-5 fw-bold'>Les informations de la carte sont invalides, veuillez réessayer</p>")
//                 }
//         } else {
//             /* token contains id, last4, and card type */
//             var token = response['id'];
//             $form.find('input[type=text]').empty();
//             $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
//             $form.get(0).submit();
//         }
//     }
// });
// =======================MENU ADMIN===================================
function adminMenu() {
    if (document.title == 'Menu ajout') {

        let menuTypeSelect = document.querySelector('#menu_type');
        let mealsSelectAdminItems = document.querySelectorAll('.menu_add_admin .meal');
        let mealsSelectAdmin = document.querySelector('.menu_add_admin #meals');
        let divContainer = document.querySelector('.meals_menu_container');
        let buttons = divContainer.querySelectorAll('button');
        let counter = document.querySelector('.menu_add_admin .mealsCounter');
        let maxMealBox = document.querySelector('.maxMealBox');
        let alreadyTaken = document.querySelector('.alreadyTaken');
        let nbRepasCounter = 0;

        menuTypeSelect.addEventListener('change', () => {
            document.querySelectorAll(".checkBox_container input").forEach(item => {
                item.removeAttribute("checked");
                maxMealBox.classList.add('displayNone');
                nbRepasCounter = 0;
                counter.innerHTML = nbRepasCounter + "/10";
            })
            divContainer.innerHTML = "";
            mealsSelectAdminItems.forEach($meal => {
                $meal.classList.remove('displayNone');
                if (menuTypeSelect.value == "Végétarien") {
                    if (!$meal.classList.contains("vegetarian")) {
                        console.log(menuTypeSelect.value);
                        $meal.classList.add('displayNone');
                    }
                }
                else if (menuTypeSelect.value == "Sans Gluten") {
                    if (!$meal.classList.contains("gluten_free")) {
                        console.log(menuTypeSelect.value);
                        $meal.classList.add('displayNone');
                    }
                }
            })
        });

        mealsSelectAdmin.addEventListener('change', () => {

            if (nbRepasCounter < 10) {
                document.querySelector(".meal-" + mealsSelectAdmin.value).setAttribute('checked', 'checked');

                let exists = false;
                divContainer.querySelectorAll('div').forEach(item => {
                    if (item.classList.contains('meal-' + mealsSelectAdmin.value))
                        exists = true;
                })

                if (!exists) {
                    divContainer.innerHTML += '<div id="meal-' + mealsSelectAdmin.value + '" class="adminMealDiv meal-' + mealsSelectAdmin.value + '"><p>' + document.querySelector('#meals [value="' + mealsSelectAdmin.value + '"]').innerHTML + '</p><button type="button"><i class="fa-sharp fa-solid fa-circle-xmark"></i></button></div>'
                    nbRepasCounter++;
                    counter.innerHTML = nbRepasCounter + "/10";
                    alreadyTaken.classList.add('displayNone');
                }
                else {
                    alreadyTaken.classList.remove('displayNone');
                }


                buttons = divContainer.querySelectorAll('button');
                addEventOnMealDel(buttons, maxMealBox, counter, nbRepasCounter);
            }
            else {
                maxMealBox.classList.remove('displayNone');
            }

        });



    }

    if (document.title == 'Menu modification') {
        let mealsSelectAdminItems = document.querySelectorAll('.menu_edit_admin .meal');
        let mealsSelectAdmin = document.querySelector('.menu_edit_admin #meals');
        let divContainer = document.querySelector('.meals_menu_container');
        let buttons = divContainer.querySelectorAll('button');
        let counter = document.querySelector('.menu_edit_admin .mealsCounter');
        let maxMealBox = document.querySelector('.maxMealBox');
        let alreadyTaken = document.querySelector('.alreadyTaken');
        let nbRepasCounter = document.querySelectorAll('input[checked]').length;

        addEventOnMealDel(buttons, maxMealBox, counter, nbRepasCounter)

        console.log(nbRepasCounter);

        mealsSelectAdmin.addEventListener('change', () => {

            if (nbRepasCounter < 10) {
                document.querySelector(".meal-" + mealsSelectAdmin.value).setAttribute('checked', 'checked');

                let exists = false;
                divContainer.querySelectorAll('div').forEach(item => {
                    if (item.classList.contains('meal-' + mealsSelectAdmin.value))
                        exists = true;
                })

                if (!exists) {
                    divContainer.innerHTML += '<div id="meal-' + mealsSelectAdmin.value + '" class="adminMealDiv meal-' + mealsSelectAdmin.value + '"><p>' + document.querySelector('#meals [value="' + mealsSelectAdmin.value + '"]').innerHTML + '</p><button type="button"><i class="fa-sharp fa-solid fa-circle-xmark"></i></button></div>'
                    nbRepasCounter++;
                    counter.innerHTML = nbRepasCounter + "/10";
                    alreadyTaken.classList.add('displayNone');
                }
                else {
                    alreadyTaken.classList.remove('displayNone');
                }


                buttons = divContainer.querySelectorAll('button');
                addEventOnMealDel(buttons, maxMealBox, counter, nbRepasCounter);
            }
            else {
                maxMealBox.classList.remove('displayNone');
            }

        });


    }
}

function addEventOnMealDel(buttons, maxMealBox, counter, nbRepasCounter) {
    buttons.forEach(item => {
        item.addEventListener('click', () => {
            item.parentElement.remove();
            document.querySelector(".checkBox_container ." + item.parentElement.id).removeAttribute('checked');
            maxMealBox.classList.add('displayNone');
            nbRepasCounter--;
            counter.innerHTML = nbRepasCounter + "/10";
        })
    });

}


// ======================================================================
// CECI SERA POUR DISPLAY TOGGLE LES SEARCH VIA EMAIL AND TEL FOR ADMIN CLIENT SEARCH

function toggleSearchInputForAdmin() {
    if (document.title == 'Client gestion') {
        const emailLink = document.querySelector('#linkSearchEmail');
        const divEmailSearch = document.querySelector('#divSearchEmail');

        const telLink = document.querySelector('#linkSearchTel');
        const divTelSearch = document.querySelector('#divSearchTel');

        emailLink.addEventListener('click', (e) => {
            if (divEmailSearch.classList.contains('d-none')) {
                divEmailSearch.classList.toggle('d-none')
                divTelSearch.classList.toggle('d-none')
            }
        })

        telLink.addEventListener('click', (e) => {
            if (divTelSearch.classList.contains('d-none')) {
                divTelSearch.classList.toggle('d-none')
                divEmailSearch.classList.toggle('d-none')
            }
        })
    }
}
// ======================================================================

function adminRepas() {
    if (document.title == 'Repas ajouter') {
        let ingredientContainer = document.querySelector('.mealAddAdmin .ingredient_container');
        let ingredientButton = document.querySelector('.mealAddAdmin .ingrediants > button');


        ingredientButton.addEventListener('click', () => {
            ingredientContainer.insertAdjacentHTML("beforeend", '<div class="ingredient_item d-flex mb-2"><input class="form-control" type="text" name="ingredient[]" id="ingredient-' + ingredientContainer.querySelectorAll('div').length + '" /><button type="button" class="btn btn-primary ms-2 deleteButton">Supprimer</button></div>');
            ingredientContainer.querySelectorAll('.ingredient_item').forEach((item, key) => {
                if (key > 0)
                    item.querySelector('.deleteButton').addEventListener('click', () => {
                        item.remove();
                    });
            });

        });



    }
}

//CART

function cart() {
    if (document.title == "Panier") {
        let portionSelect = document.querySelector('#portion');
        changePrice(portionSelect)
        portionSelect.addEventListener('change', () => {
            changePrice(portionSelect);
        });
    }
}

function changePrice(portionSelect) {

    let info = document.querySelector('.priceInfo');
    let button = document.querySelector('.payButton');

    let infos = info.querySelectorAll('.price');
    let price;
    let number = info.firstElementChild.innerHTML;
    infos.forEach(item => {
        if (item.firstElementChild.innerHTML == portionSelect.value) {
            price = item.lastElementChild.innerHTML;
        }
    });

    if (price && number)
        button.innerHTML = "Payer maintenant " + (price * number) + ",00$";
}


function changeOrderRowColorWhenChangingState() {
    let rowSelect = document.querySelectorAll(".tr_commande_select");
    if (document.title == "Admin Orders") {
        rowSelect.forEach(select => {
            select.addEventListener('change', (e) => {
                $value = select.value.split('-');
                switch ($value[1]) {
                    case "Annulé":
                        e.target.parentElement.parentElement.classList.remove('greenRow', 'blueRow', 'redRow');
                        e.target.parentElement.parentElement.classList.add('yellowRow');
                        break;
                    case "Completé":
                        e.target.parentElement.parentElement.classList.remove('yellowRow', 'blueRow', 'redRow');
                        e.target.parentElement.parentElement.classList.add('greenRow');
                        break;
                    case "En attente":
                        e.target.parentElement.parentElement.classList.remove('greenRow', 'yellowRow', 'redRow');
                        break;
                    case "Erreur":
                        e.target.parentElement.parentElement.classList.remove('greenRow', 'blueRow', 'yellowRow');
                        e.target.parentElement.parentElement.classList.add('redRow');
                        break;
                }
            })
        });
    }
}