<?php
  $GLOBALS['pageTitle'] = 'Snacks Object Practice';
  // Require will cause a fatal error if the file is not found.
  // _once means if it has been required already, subsequent requires will not run the file again.
  require_once './includes/Snack.Class.php';
  // If an include can't find the file, it results only in a warning (your execution will still continue.)
  include './templates/header.php';

  // An array to store instances of Snack.
  $snacks = [];
  // Let's retrieve our list of snacks from the JSON.
  // Also look into... fopen() fread() fwrite()
  $snacksFileString = file_get_contents( './data/snacks.json' ); // Retrieves the contents of the file as a STRING.
  // If the snacks file was found and read...
  if ( $snacksFileString )
  { // Convert the JSON to a PHP array or object.
    $snacksArray = json_decode( $snacksFileString );
    // If conversion was successful...
    if ( $snacksArray )
    {
      // Let's loop through and make Snack objects!
      foreach ( $snacksArray as $snack )
      {
        // $snacks[] = $value
        // is the same as...
        // array_push( $snacks, $value )
        $snacks[] = new Snack( ...$snack );
        // $snacks[] = new Snack(
        //   $snack[0],
        //   $snack[1],
        //   $snack[2],
        //   $snack[3]
        // );
      } // Check if our Snack array looks good!
      // var_dump( $snacks );
    }
  }
?>

<h2>Our Snacks</h2>
<?php if ( !empty( $snacks ) ) : // If there are snacks, output them! ?>
  <?php foreach ( $snacks as $snack ) $snack->output(); ?>
<?php else : // If there are no snacks though... ?>
  <p>Sorry, no snacks found!</p>
<?php endif; ?>

<?php include './templates/footer.php';