const cardItems = document.querySelectorAll('.card-layout__item');
cardItems.forEach((card) => {
  card.addEventListener('click', () => {
    card.classList.toggle('clicked');
  });
});

