const observerH1 = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');
        }
    });
});

const observerApresentacao = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show-dois');
        } else {
            entry.target.classList.remove('show-dois');
        }
    });
});


const h1 = document.querySelectorAll('h1');
const apresentacao = document.querySelectorAll('.img-apre');

h1.forEach((element) => observerH1.observe(element));
apresentacao.forEach((element) => observerApresentacao.observe(element));