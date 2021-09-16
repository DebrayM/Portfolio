

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
function checkNom(email)
{
    const re = /^([a-zA-Z ]+)$/;
    return re.test(email);
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

function isMobileDevice() { 
    if( navigator.userAgent.match(/iPhone/i)
    || navigator.userAgent.match(/webOS/i)
    || navigator.userAgent.match(/Android/i)
    || navigator.userAgent.match(/iPad/i)
    || navigator.userAgent.match(/iPod/i)
    || navigator.userAgent.match(/BlackBerry/i)
    || navigator.userAgent.match(/Windows Phone/i)
    ){
       return true;
     }
    else {
       return false;
     }
   }

function Gdp(){
    let leTexte = "<p>Plus de 20 années d'expérience en gestion de projet</p>";
    this.innerHTML = leTexte;
    this.style.transform = "perspective(500px) translate3d(10px,0px,100px)";
}

function Mtd(){
    this.style.transform = "perspective(500px) translate3d(10px,0px,100px)";
}
window.onload = function() {

    document.getElementById("purpleBubble1").addEventListener("click", Gdp);
    document.getElementById("purpleBubble2").addEventListener("click", Mtd);

}