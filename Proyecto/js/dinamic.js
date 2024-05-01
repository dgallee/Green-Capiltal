const searchInput = document.getElementById('search-input');
const searchLabel = document.querySelector('.search-label');

searchInput.addEventListener('focus', () => {
  searchLabel.style.top = '-15px';
  searchLabel.style.fontSize = '14px';
  searchLabel.style.opacity = '1';
});

searchInput.addEventListener('blur', () => {
  searchLabel.style.top = '50%';
  searchLabel.style.fontSize = '20px';
  searchLabel.style.opacity = '0.7';
});


const filter1 = document.getElementById("filter1");
const filter1Max = document.getElementById("filter1-max");

// Update the max value based on the range value
filter1.addEventListener("input", function () {
  const maxValue = Math.round((filter1.value / filter1.max) * 100);
  filter1Max.innerText = `$${maxValue}`;
  filter1.max = maxValue;
});