// Test that this file is loaded properly!
// alert( 'I\'m here!' );

/**
 * Retrieve the form, input, and ul.
 */
const snackSearchForm = document.getElementById( 'search-form' );
const snackSearchInput = document.getElementById( 'search-input' );
const searchResultsList = document.getElementById( 'search-results' );

// Only continue if this page has the form.
if ( snackSearchForm ) {
  /**
   * Listen for a submit.
   */
  snackSearchForm.addEventListener( 'submit', event => {
    // Stop the form from submitting the traditional way.
    event.preventDefault();
    // Empty the snack search result list.
    searchResultsList.innerHTML = '';
    // Attempt a fetch for results.
    fetch ( `http://localhost:80/api/snacks.php?search=${snackSearchInput.value}` )
      .then( response => response.json() )
      .then( data => {
        // console.log( data );
        for ( let snack of data ) {
          // Create element.
          const snackLI = document.createElement( 'LI' );
          // Populate the element.
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
          // Add the list item to the full list.
          searchResultsList.append( snackLI );
          // Empty the search field.
          snackSearchInput.value = '';
        }
      } )
  } );
}