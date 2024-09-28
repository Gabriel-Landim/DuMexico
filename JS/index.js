document.addEventListener('DOMContentLoaded', () => {
    const carouselSlide = document.querySelector('.container-carrousel');
    const images = document.querySelectorAll('.container-carrousel img');

    if (!carouselSlide || images.length === 0) {
        console.error('Carousel slide or images not found');
        return;
    }

    let counter = 1;
    let currentImageSize = images[0].clientWidth;

    // Clonar a primeira e última imagens para criar o loop infinito
    const firstClone = images[0].cloneNode(true);
    const lastClone = images[images.length - 1].cloneNode(true);

    firstClone.id = 'first-clone';
    lastClone.id = 'last-clone';

    carouselSlide.appendChild(firstClone);
    carouselSlide.insertBefore(lastClone, carouselSlide.firstChild);

    const allImages = document.querySelectorAll('.container-carrousel img');
    currentImageSize = allImages[0].clientWidth;

    // Definir a posição inicial do carrossel
    carouselSlide.style.transform = `translateX(${-currentImageSize * counter}px)`;

    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');

    let isTransitioning = false;

    // Função para avançar o slide
    function nextSlide() {
        if (isTransitioning) return;
        isTransitioning = true;
        counter++;
        carouselSlide.style.transition = 'transform 0.5s ease-in-out';
        carouselSlide.style.transform = `translateX(${-currentImageSize * counter}px)`;
    }

    // Função para retroceder o slide
    function prevSlide() {
        if (isTransitioning) return;
        isTransitioning = true;
        counter--;
        carouselSlide.style.transition = 'transform 0.5s ease-in-out';
        carouselSlide.style.transform = `translateX(${-currentImageSize * counter}px)`;
    }

    // Evento de transição para criar o loop infinito
    carouselSlide.addEventListener('transitionend', () => {
        if (allImages[counter].id === 'first-clone') {
            carouselSlide.style.transition = 'none';
            counter = 1;
            carouselSlide.style.transform = `translateX(${-currentImageSize * counter}px)`;
        }

        if (allImages[counter].id === 'last-clone') {
            carouselSlide.style.transition = 'none';
            counter = allImages.length - 2;
            carouselSlide.style.transform = `translateX(${-currentImageSize * counter}px)`;
        }

        isTransitioning = false;
    });

    // Eventos de clique nos botões
    nextBtn.addEventListener('click', () => {
        nextSlide();
        resetAutoSlide();
    });

    prevBtn.addEventListener('click', () => {
        prevSlide();
        resetAutoSlide();
    });

    // Auto slide a cada 3 segundos
    let autoSlide = setInterval(nextSlide, 3000);

    // Função para resetar o auto slide quando o usuário interage
    function resetAutoSlide() {
        clearInterval(autoSlide);
        autoSlide = setInterval(nextSlide, 3000);
    }

    // Ajustar o tamanho das imagens ao redimensionar a janela
    window.addEventListener('resize', () => {
        currentImageSize = images[0].clientWidth;
        carouselSlide.style.transition = 'none';
        carouselSlide.style.transform = `translateX(${-currentImageSize * counter}px)`;
    });
});
