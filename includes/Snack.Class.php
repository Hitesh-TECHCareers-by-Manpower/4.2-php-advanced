<?php
class Snack
{
  /**
   * We can set up properties like so...
   */
  public $name;
  public $type;
  public $price;
  public $calories;

  /**
   * Constructor method runs every time we
   * make a new instance of this class (a
   * new object following this blueprint.)
   */
  function __construct ( $snackName = '', $snackType = '', $snackPrice = 0.00, $snackCalories = 0 )
  {
    $this->name = $snackName;
    $this->type = $snackType;
    // For more verbose currency formatting, check out:
    // https://www.php.net/manual/en/numberformatter.formatcurrency.php
    // Thanks Fahad!
    $this->price = number_format(
      $snackPrice, // Number to format.
      2, // Number of decimal places.
      '.', // Decimal separator.
      ',' // Thousands separator. 1,000.00
    );
    $this->calories = ( (integer) $snackCalories ); // Convert $snackCalories to int. // Could instead use intval()
  }

  // Example of a custom method...
  public function caramelize()
  {
    $this->calories *= 2; // Same as... $this->calories = $this->calories * 2;
  }

  public function output()
  { // Remember, anything OUTSIDE of PHP tags is echo'd!
    // This means the below will be output WhEN this method is called!
    ?>
      <dl>
        <dt>Snack Name</dt>
        <dd><?php echo $this->name; ?></dd>
        <dt>Snack Type</dt>
        <dd><?php echo $this->type; ?></dd>
        <dt>Snack Price</dt>
        <dd><?php echo $this->price; ?></dd>
        <dt>Snack Calories</dt>
        <dd><?php echo $this->calories; ?></dd>
      </dl>
    <?php
  }
}

// Initialize a Snack object, pass arguments to __construct.
// $mySnack = new Snack( 'Oh Henry', 'chocolate', 1.895555, "200.907" );
// var_dump( $mySnack );

// Run a method from the object. We use the "->" arrow for this.
// $mySnack->caramelize();
// var_dump( $mySnack );

// Let's try outputting our snack...
// $mySnack->output();