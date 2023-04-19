const checkboxes1 = document.querySelectorAll('input[name="filters[]"]');
const checkboxes2 = document.querySelectorAll('input[name="playerCard[]"]');
const checkboxes3 = document.querySelectorAll('input[name="mixTeams[]"]');

// Función para actualizar los tres arrays de checkboxes
function updateCheckboxes(event) {
  const isChecked = event.target.checked;
  const value = event.target.value;
  checkboxes1.forEach((checkbox) => {
    if (checkbox.value === value) {
      checkbox.checked = isChecked;
    }
  });
  checkboxes2.forEach((checkbox) => {
    if (checkbox.value === value) {
      checkbox.checked = isChecked;
    }
  });
  checkboxes3.forEach((checkbox) => {
    if (checkbox.value === value) {
      checkbox.checked = isChecked;
    }
  });
}

// Agregar evento de clic a los checkboxes
checkboxes1.forEach((checkbox) => {
  checkbox.addEventListener('click', updateCheckboxes);
});
checkboxes2.forEach((checkbox) => {
  checkbox.addEventListener('click', updateCheckboxes);
});
checkboxes3.forEach((checkbox) => {
  checkbox.addEventListener('click', updateCheckboxes);
});

