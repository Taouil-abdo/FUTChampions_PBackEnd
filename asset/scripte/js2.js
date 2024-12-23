let position=document.getElementById("position");

position.addEventListener("change", function (e) {
    e.preventDefault();
    if (position.value == "GK") {
        playerStatistique.classList.add("hidden");
        goalStatistique.classList.remove("hidden");

    } else {
        playerStatistique.classList.remove("hidden");
        goalStatistique.classList.add("hidden");

    }
});

let btnAjouter = document.getElementById("btnAjouter");
 let formParent=document.getElementById("form-parent");

 btnAjouter.addEventListener("click",function(){
    formParent.classList.toggle("hidden");
 })