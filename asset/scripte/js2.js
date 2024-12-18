position.addEventListener("change", function (e) {
    e.preventDefault();
    if (position.value == "GK") {
        playerStatistique.classList.add("hidden");
        goalStatistique.classList.remove("hidden");

    } else {
        playerStatistique.classList.remove("hidden");
        goalStatistique.classList.add("hidden");

    }
})