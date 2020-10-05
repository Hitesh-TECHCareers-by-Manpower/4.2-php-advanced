<?php
//we need to use session_start to declare

session_start();
if ( !isset( $_SESSION['calcHistory'] ) )
{
  $_SESSION['calcHistory'] = array();
}

// Try to avoid use of globals unless they are absolutely necessary...
$GLOBALS['pageTitle'] = 'PHP Calculator';

// Show our header.
include './templates/header.php';

//if we want to read values from a GET method submission
echo '<pre>';
var_dump( $_GET );
var_dump( $_POST );
echo '</pre>';

$result = FALSE;
if ( !empty( $_GET ) )
{
    switch ( $_GET['op'] )
    {
        case 'addition':
            $opSymbol = '+';
            $result = $_GET['value1'] + $_GET['value2'];
            break;
        case 'substraction':
            $opSymbol = '-';
            $result = $_GET['value1'] - $_GET['value2'];
            break;
        case 'multiplication':
            $opSymbol = '&times;';
            $result = $_GET['value1'] * $_GET['value2'];
            break;
        case 'division':
            $opSymbol = '&divide;';
            $result = $_GET['value1'] / $_GET['value2'];
            break;
    }
    array_push( $_SESSION['calcHistory'], "{$_GET['value1']} {$opSymbol} {$_GET['value2']} = {$result}" );
  

   
}
echo'<pre>';  //new line and space
var_dump( $_SESSION );
var_dump( $result );
echo'<pre>';

?>

<p>
  Welcome to our Calculator page!
</p>

<form method="GET" action="calc.php">
  <label for="num1">
    Enter first operand:
    <input
      id="num1"
      name="value1"
      type="number"
      value="">
  </label>
  <label for="operator">
    Select an operator:
    <select id="operator" name="op">
      <option value="addition">
        +
      </option>
      <option value="substraction">
        -
      </option>
      <option value="multiplication">
        &times;
      </option>
      <option value="division">
        &divide;
      </option>
    </select>
  </label>
  <label for="num2">
    Enter second operand:
    <input
      id="num2"
      name="value2"
      type="number"
      value="">
  </label>
  <input type="submit" value="Calculate!">
</form>

<?php if (  $result != FALSE ) : ?>
<P>
Your result for your calculation is:
<?php echo $result; ?>
</p>
<?php endif; ?>

<?php
// Show our footer.
include './templates/footer.php';
