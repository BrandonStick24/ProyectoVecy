document.addEventListener('DOMContentLoaded', function() {
    const track = document.querySelector('.slider-track');
    const items = document.querySelectorAll('.category-item');
    const prevBtn = document.querySelector('.slider-prev');
    const nextBtn = document.querySelector('.slider-next');
    const itemWidth = items[0].offsetWidth;
    const visibleItems = 3;
    let currentPosition = 0;
    let isAnimating = false;
    
    // Clonar items para efecto infinito
    const firstItems = Array.from(items).slice(0, visibleItems);
    const lastItems = Array.from(items).slice(-visibleItems);
    
    firstItems.forEach(item => {
        const clone = item.cloneNode(true);
        track.appendChild(clone);
    });
    
    lastItems.forEach(item => {
        const clone = item.cloneNode(true);
        track.insertBefore(clone, track.firstChild);
    });
    
    // Recalcular después de clonar
    const allItems = document.querySelectorAll('.category-item');
    const totalItems = allItems.length;
    
    // Posición inicial (centrada en los items originales)
    currentPosition = -visibleItems * itemWidth;
    track.style.transform = `translateX(${currentPosition}px)`;
    
    function updateActiveItems() {
        const centerPosition = -currentPosition / itemWidth;
        
        allItems.forEach((item, index) => {
            if (index >= centerPosition - 1 && index < centerPosition + visibleItems) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    }
    
    function moveSlider(direction) {
        if (isAnimating) return;
        isAnimating = true;
        
        if (direction === 'next') {
            currentPosition -= itemWidth;
        } else {
            currentPosition += itemWidth;
        }
        
        track.style.transition = 'transform 0.5s ease';
        track.style.transform = `translateX(${currentPosition}px)`;
        
        // Resetear posición para efecto infinito
        setTimeout(() => {
            if (direction === 'next' && currentPosition <= -totalItems * itemWidth + visibleItems * itemWidth) {
                currentPosition = -visibleItems * itemWidth;
                track.style.transition = 'none';
                track.style.transform = `translateX(${currentPosition}px)`;
                setTimeout(() => {
                    track.style.transition = 'transform 0.5s ease';
                }, 50);
            } else if (direction === 'prev' && currentPosition >= 0) {
                currentPosition = - (totalItems - 2 * visibleItems) * itemWidth;
                track.style.transition = 'none';
                track.style.transform = `translateX(${currentPosition}px)`;
                setTimeout(() => {
                    track.style.transition = 'transform 0.5s ease';
                }, 50);
            }
            
            updateActiveItems();
            isAnimating = false;
        }, 500);
    }
    
    // Event listeners para los botones
    prevBtn.addEventListener('click', () => moveSlider('prev'));
    nextBtn.addEventListener('click', () => moveSlider('next'));
    
    // Inicializar
    updateActiveItems();
    
    // Auto-desplazamiento opcional
    // setInterval(() => moveSlider('next'), 3000);
});