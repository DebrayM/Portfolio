

// Expression régulière permettant la vérification syntaxique d'une adresse email
function checkEmail(email)
{
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function verifEmail() {

    let error = document.createElement('p');
    error.classList.add('err'); // ajoute la classe CSS err pour l'affichage en rouge
    error.style.display = "block";
    error.innerText = "Veuillez entrer une adresse email valide svp";

    if (checkEmail(this.value)) {
        this.style.borderColor = "green";
        if (!this.nextSibling.length) {
            this.nextElementSibling.remove(error);
        }
    } else {
        // rouge
        this.style.borderColor = 'red';
        if (this.nextSibling.length) {
            this.after(error);
        }
             
    }
}

// Expression régulière permettant la vérification syntaxique du nom
function checkNom(nom)
{
    const re = /^([a-zA-Z ]+)$/;
    return re.test(nom);
}

function verifNom() {
    let error = document.createElement('p');
    error.classList.add('err'); // ajoute la classe CSS err pour l'affichage en rouge
    error.style.display = "block";
    error.innerText = "Veuillez entrer une adresse email valide svp";

    if (checkNom(this.value)) {
        this.style.borderColor = "green";
        if (!this.nextSibling.length) {
            this.nextElementSibling.remove(error);
        }
    } else {
        // rouge
        this.style.borderColor = 'red';
        if (this.nextSibling.length) {
            this.after(error);
        }       
    }
}


window.onload = function() {

}