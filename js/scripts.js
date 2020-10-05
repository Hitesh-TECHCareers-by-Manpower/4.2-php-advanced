//alert( 'I\'m here!' );

//Retrieve form
const snackSearchForm = document.getElementById('search-form');
const snackSearchInput = document.getElementById('search-input');
const searchResultsList = document.getElementById('search-results');

//Listen for submit

snackSearchForm.addEventListener('submit', event => {
    event.preventDefault();
    //empty the snack search result list
    searchResultsList.innerHTML = '';

    fetch(`http://localhost:3000/api/snacks.php?search=${snackSearchInput.value}`)
        .then(response => response.json())
        .then(data => {
            //console.log(data);

            for (let snack of data) {
                // create elements
                const snackLI = document.createElement('LI');

                snackLI.innerHTML = `
            <h3>${snack[0]}</h3>
            <dl>
                <dt>Type</dt>
                <dd>${snack[1]}</dd>
                <dt>Price</dt>
                <dd>$${parseFloat(snack[2]).toFixed(2)}</dd>
                <dt>Calories</dt>
                <dd>${snack[3]}</dd>
            </dl>
            `;
                searchResultsList.append(snackLI);
                //empty the search field.
                snackSearchInput.value = '';
                
            }
        })
});