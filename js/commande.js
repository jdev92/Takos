// les différents éléments de la page
const pages = document.querySelectorAll(".page")
const headerCommand = document.querySelector(".headerCommand")
const nbPages = pages.length;
let pageActive = 1
// console.log(nbPages)

// on attend le chargement de la page avec window.onload pour charger toutes les ressources
window.onload = () => {
    // on affiche la page1 du formulaire
    document.querySelector(".page").style.display = "initial"

    // on affiche le n° des pages
    // on parcourt la liste des pages
    pages.forEach((page, index) => {
        // on crée l'élément du n° de page
        let element = document.createElement("div")
        element.classList.add("pageNum")
        element.id = "page" + (index + 1)
        if(pageActive === index + 1){
        //on ajoute une class active à l'élément
            element.classList.add("active") 
        }
        element.innerHTML = index + 1
        // console.log(element)
        headerCommand.appendChild(element)

    })

    //on gère les boutons "Suivant"
    let boutons = document.querySelectorAll(".nextCommande") 

    for(let bouton of boutons){
        bouton.addEventListener("click", pageSuivante)
        console.log(bouton)
    }

    //on gère les boutons "Précédent"
    boutons = document.querySelectorAll(".previous") 

    for(let bouton of boutons){
        bouton.addEventListener("click", pagePrecedente)
        console.log(bouton)
    }
}

// fonction qui fait avancer le formulaire d'une page
function pageSuivante(){
    
    // on masque toutes les pages
    for(let page of pages){
        page.style.display ="none"
    }
    
    // on affiche la page page suivante
    this.parentElement.nextElementSibling.style.display = "initial"
    
    //on désactive tous les n° de pages
    document.querySelector(".active").classList.remove("active")
    
    // on incrémente pageActive
    pageActive++
    // on reporte les informations à la page 3
    if (pageActive == 3){
        document.querySelector("#p_adresse_start").innerText = document.querySelector("#order_depart").value
        document.querySelector("#p_adresse_arrival").innerText = document.querySelector("#order_arrival").value
        if(document.querySelector('#order_car_id1').checked) {
            document.querySelector('#p_car').innerText = 'Berline'
        }
        if(document.querySelector('#order_car_id2').checked) {
            document.querySelector('#p_car').innerText = 'Eco'
        }
        if(document.querySelector('#order_car_id3').checked) {
            document.querySelector('#p_car').innerText = 'Van'
        }
        document.querySelector("#p_date").innerText = document.querySelector("#datepicker").value
    }

    // active la nouvelle page
    document.querySelector("#page"+pageActive).classList.add("active")
    
}

// fonction qui fait reculer le formulaire d'une page
function pagePrecedente(){
    
    // on masque toutes les pages
    for(let page of pages){
        page.style.display ="none"
    }
    
    // on affiche la page suivante
    this.parentElement.previousElementSibling.style.display = "initial"
    
    //on désactive tous les n°
    document.querySelector(".active").classList.remove("active")
    
    // on décrémente pageActive
    pageActive--

    // on active la nouvelle page
    document.querySelector("#page"+pageActive).classList.add("active")
}

