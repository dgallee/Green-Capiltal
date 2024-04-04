const filter1 = document.getElementById("filter1");
const filter1Max = document.getElementById("filter1-max");

// Update the max value based on the range value
filter1.addEventListener("input", function () {
  const maxValue = Math.round((filter1.value / filter1.max) * 100);
  filter1Max.innerText = `${maxValue}`;
});

document.addEventListener('DOMContentLoaded', function () {
  var clearAllButton = document.getElementById('clear-all-filters');
  if (clearAllButton) {
    clearAllButton.addEventListener('click', function (event) {
      event.preventDefault(); // Prevent the default action of the button
      var form = this.closest('form'); // Find the closest form
      if (form) {
        var inputs = form.querySelectorAll('input[type="text"], select'); // Select all text inputs and select elements
        inputs.forEach(function (input) {
          if (input.type === 'text') {
            input.value = ''; // Reset the value of each text input
          } else if (input.tagName === 'SELECT') {
            input.selectedIndex = 0; // Reset the value of the select element
          }
        });

        // Reset the filter1 range input
        filter1.value = 0;
        filter1Max.innerText = '100%';
      }
    });
  }
});