

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
function Gdporiginal(){
    let txt = document.getElementById("demo1");
    txt.remove();
    document.getElementById("purpleBubble1").style.transform = "";
    let leTexte = '<p class="monTexte">Gestion de projet</p>';
    document.getElementById("purpleBubble1").innerHTML = leTexte;
}
function Gdp(){
    this.style.transform = "perspective(500px) translate3d(10px,0px,100px)";
    let leTexte = "<p id='demo1'>Plus de 20 années d'expérience en gestion de projet</p>";
    this.innerHTML = leTexte;
    let txt = document.getElementById("demo1"); 
    txt.style.textAlign = "center";
    txt.style.fontSize = "1.8em";
    txt.style.paddingTop = "5vh";
}
function Mtdoriginal(){
    let txt = document.getElementById("demo2");
    txt.remove();
    document.getElementById("purpleBubble2").style.transform = "";
    let leTexte = '<p class="monTexte">Méthodes</p>';
    document.getElementById("purpleBubble2").innerHTML = leTexte;
}
function Mtd(){
    this.style.transform = "perspective(500px) translate3d(10px,0px,100px)";
    let leTexte = "<p id='demo2'>Coach Agile et Scrum Master, PMO, Formatrice en Méthodologie (V, W)</p>";
    this.innerHTML = leTexte;
    let txt = document.getElementById("demo2"); 
    txt.style.textAlign = "center";
    txt.style.fontSize = "1.8em";
    txt.style.paddingTop = "5vh";
}
window.onload = function() {
    document.getElementById("purpleBubble1").addEventListener("mouseenter", Gdp);
    document.getElementById("purpleBubble2").addEventListener("mouseenter", Mtd);

    document.getElementById("purpleBubble1").addEventListener("mouseout", Gdporiginal);
    document.getElementById("purpleBubble2").addEventListener("mouseout", Mtdoriginal); 
}