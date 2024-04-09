const filter1 = document.getElementById("filter1");
const filter1Max = document.getElementById("filter1-max");

// Update the max value based on the range value
filter1.addEventListener("input", function () {
  const maxValue = parseFloat(filter1.value) / parseFloat(filter1.max) * 100;
  filter1Max.innerText = maxValue.toFixed(1);
});


document.addEventListener('DOMContentLoaded', function () {
  var clearAllButton = document.getElementById('clear-all-filters');
  if (clearAllButton) {
    clearAllButton.addEventListener('click', function (event) {
      event.preventDefault(); 
      var form = this.closest('form'); 
      if (form) {
        var inputs = form.querySelectorAll('input[type="text"], select'); 
        inputs.forEach(function (input) {
          if (input.type === 'text') {
            input.value = ''; 
          } else if (input.tagName === 'SELECT') {
            input.selectedIndex = 0;
          }
        });

        
        filter1.value = 0;
        filter1Max.innerText = '100%';
      }
    });
  }
});


