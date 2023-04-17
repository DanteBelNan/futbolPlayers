const cardItems = document.querySelectorAll('.clickable');
console.log("test");
cardItems.forEach((card) => {
  card.addEventListener('click', () => {
    card.classList.toggle('clicked');
  });
});