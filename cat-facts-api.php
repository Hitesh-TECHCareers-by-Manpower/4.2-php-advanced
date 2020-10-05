<?php

$GLOBALS['pageTitle'] = 'Cat Facts (external API Test)';

include './templates/header.php';


$dailyCatFactResponse = file_get_contents( 'https://cat-fact.herokuapp.com/facts/random' );

//var_dump( $dailyCatFactResponse );

if ( $dailyCatFactResponse )
{
    $dailyCatFact = json_decode( $dailyCatFactResponse );
    ?>
        <h2>Today's Cat Fact:</h2>
        <p><?php echo $dailyCatFact->text; ?></p>
    <?php
    
}

?>
<h2>Request Animal Facts</h2>
<form action="#" method="POST">
    <label for="amount">Enter the Amount of Facts:
    <input type="number" id="amount" name="amount"></label>
    <label for="animal-type">Enter the Type of Animal:
    <select id="animal-type" name="type">
    <option value="cat">Cat</option>
    <option value="dog">Dog</option>
    <option value="horse">Horse</option>
    <option value="snail">Snail</option>
    </select>
    <input type="submit" value="Get Animal Facts!">
</form>
<?php

if ( isset( $_POST['amount'] ) && isset( $_POST['type'] ) )
{
$factsListResponse = file_get_contents( "https://cat-fact.herokuapp.com/facts/random?amount={$_POST['amount']}&animal_type={$_POST['type']}" );

//var_dump ( $factsListResponse );

if ( $factsListResponse )
{
    $factsList = json_decode( $factsListResponse );
    ?>
    <h2>List of <?php echo $_POST['type']; ?>
        Facts
    </h2>
    <?php if ( !empty( $factsList ) ) : ?>
        <ol>
            <?php foreach ( $factsList as $fact ) : ?>
                <li>
                    <?php echo $fact->text; ?>
                </li>
            <?php endforeach; ?>
        </ol>
        <?php else: ?>
            <p>No facts found.</p>
        <?php endif;?>
    <?php
    
}

}




include './templates/footer.php';