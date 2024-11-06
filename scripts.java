document.addEventListener('DOMContentLoaded', function () {
    // Validação de formulários
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const inputs = form.querySelectorAll('input, textarea');
            let valid = true;
            inputs.forEach(input => {
                if (!input.checkValidity()) {
                    valid = false;
                    input.classList.add('error');
                } else {
                    input.classList.remove('error');
                }
            });

            if (valid) {
                // Verificação do reCAPTCHA
                const recaptchaResponse = form.querySelector('.g-recaptcha-response').value;
                if (recaptchaResponse) {
                    // Exibir mensagem de sucesso
                    alert('Formulário enviado com sucesso!');
                    form.reset();
                } else {
                    alert('Por favor, confirme que você não é um robô.');
                }
            } else {
                alert('Por favor, preencha todos os campos corretamente.');
            }
        });
    });

    // Menu responsivo
    const navToggle = document.querySelector('.nav-toggle');
    const navMenu = document.querySelector('nav ul');
    navToggle.addEventListener('click', () => {
        navMenu.classList.toggle('show');
    });

    // Carrossel de imagens
    let slideIndex = 0;
    const slides = document.querySelectorAll('.carousel a');
    const totalSlides = slides.length;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = i === index ? 'block' : 'none';
        });
    }

    function nextSlide() {
        slideIndex = (slideIndex + 1) % totalSlides;
        showSlide(slideIndex);
    }

    function prevSlide() {
        slideIndex = (slideIndex - 1 + totalSlides) % totalSlides;
        showSlide(slideIndex);
    }

    document.querySelector('.next').addEventListener('click', nextSlide);
    document.querySelector('.prev').addEventListener('click', prevSlide);

    showSlide(slideIndex);
});
