const cardItems = document.querySelectorAll('.card-layout__item');
console.log('test');
cardItems.forEach((card) => {
  card.addEventListener('click', () => {
    card.classList.toggle('clicked');
  });
});

