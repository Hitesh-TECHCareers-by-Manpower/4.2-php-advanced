<?php
    $GLOBALS['pageTitle'] = 'Snacks Object Practice';
    require_once './includes/Snack.Class.php';
    include './templates/header.php';

    $snacks = [];

    //let's retrieve our list from JSON
    $snacksFileString = file_get_contents( './data/snacks.json' );

    if ( $snacksFileString )
    {
        $snacksArray = json_decode( $snacksFileString );
        if ( $snacksArray )
        {
            foreach ( $snacksArray as $snack )
            {
               $snacks[] = new Snack( ...$snack );
               // $snacks[] = new Snack(
                //    $snack[0],
                //    $snack[1],
                //    $snack[2],
                //    $snack[3]
                //);
            }
            //var_dump( $snacks );
        }
    }

?>

<h2>Our Snacks</h2>
<?php if ( !empty( $snacks ) ) : ?>

<?php foreach ( $snacks as $snack ) $snack->output(); ?>
<?php else : ?>
<p>Sorry, no snacks found!</p>
<?php endif; ?>

<?php include './templates/footer.php'; ?>