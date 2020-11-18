function maxKm() {
    const wiersze = document.getElementsByClassName("obiekt");
    const poleTxt = Number(document.getElementById("maxD").value);
    for (let i = 0; i < wiersze.length; i++) {
        let wiersz = wiersze[i].dataset.distance;
        console.log(wiersz);
        if (wiersz > poleTxt) {
            wiersze[i].style.display = "none";
        }
    }
}
