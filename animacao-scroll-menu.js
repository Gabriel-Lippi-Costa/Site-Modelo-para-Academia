window.addEventListener("scroll", function() {
    let header = document.querySelector("header");

    if (header) { // Verifica se o elemento existe
        header.classList.toggle("rolagem", window.scrollY > 0);
    }
});
