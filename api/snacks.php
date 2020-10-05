<?php
/**
 * Goal: Return a JSON representation of a Snack.
 * Parameter: Query parameter string "search" term.
 */

// Headers are sent "under-the-radar" to give additional info
// about the request / response. In this case, we are
// describing the "file-type" or how we intend the content body
// / string to be read / treated.
header( 'Content-type: app/JSON; charset=UTF-8' );

// First, let's make sure there is a search term present.
if ( isset( $_GET['search'] ) && !empty( $_GET['search'] ) )
{ // JSON object response w/the search term.
  //echo "{\"response\":\"Search term: {$_GET['search']}\"}";
  // Retrieve the list of snacks.
  $snacksJSONString = file_get_contents(
    '../data/snacks.json'
  ); // Test the output...
  // echo $snacksJSONString;
  // Check if we were able to read the file.
  if ( $snacksJSONString !== FALSE )
  { // Decode this JSON string so that we can use PHP to work with the data.
    $snacksList = json_decode( $snacksJSONString );
    if ( $snacksList !== NULL ) // Make sure conversion was a success!
    { // Now that we have a PHP array... we can deal with this request!
      $matchingSnacks = array(); // Array for storing matches!
      foreach ( $snacksList as $snack )
      { // Check if there is a match in our snack name vs search.
        if ( stristr( $snack[0], $_GET['search'] ) )
        { // If there is, add it to our match array.
          array_push( $matchingSnacks, $snack );
        }
      }
      // Respond with the matching snacks array as a JSON string!
      echo json_encode( $matchingSnacks );
    }
    // If we were NOT able to read the JSON as PHP Array/Object.
    else
    {
      echo "{\"response\":\"ERROR: Unable to convert Snacks list from JSON.\"}";
    }
  }
  // If we were NOT able to read the file.
  else
  {
    echo "{\"response\":\"ERROR: Unable to retrieve Snacks list.\"}";
  }
}
// If there is no search present, a default / fall-back response.
else
{ // JSON object response w/status info.
  echo "{\"response\":\"ERROR: No search term present.\"}";
}