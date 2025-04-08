new Swiper('.cardCat-wrapper', {
    
    spaceBetween: -30,
    loop: true,

    pagination: {
      el: '.swiper-pagination',
    },
    
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    
    breakpoints: {
        0:{
            slidesPerView: 1
        },
        968:{
            slidesPerView: 2
        },
        1476:{
          slidesPerView: 4
        },
        1080:{
            slidesPerView: 3
        },
    }
   
  });