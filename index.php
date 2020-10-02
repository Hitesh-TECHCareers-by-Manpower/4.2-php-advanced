<?php
session_start();

// GLOBAL variables are stored in PHP's
// $GLOBALS array.
$GLOBALS['pageTitle'] = 'Home';

// Show our header.
include './templates/header.php';
?>

<p>
  Welcome to our
  <?php echo $GLOBALS['pageTitle']; ?>
  page!
</p>

<?php if ( isset( $_SESSION['calcHistory'] ) ) : // Check if there IS a calc history! ?>
  <h2>Calculator History (From Session!)</h2>
  <ul>
    <?php foreach ( $_SESSION['calcHistory'] as $calculation ) : ?>
      <li>
        <?php echo $calculation; // Output the value from our calcHistory array! ?>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<?php // Show our footer.
include './templates/footer.php';