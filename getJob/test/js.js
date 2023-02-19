const searchInput = document.querySelector('#search-input');
const suggestionsList = document.querySelector('#suggestions-list');

// Create an array of sample data
const data = ['Apple', 'Banana']

function filterOptions() {
    // Get the input value
    const input = document.getElementById('myInput').value.toUpperCase();
    
    // Get the options in the select element
    const options = document.getElementById('mySelect').options;
    
    // Loop through the options and show only the ones that match the input value
    for (let i = 0; i < options.length; i++) {
      const option = options[i];
      const text = option.text.toUpperCase();
      if (text.includes(input)) {
        option.style.display = '';
      } else {
        option.style.display = 'none';
      }
    }
  }
  
