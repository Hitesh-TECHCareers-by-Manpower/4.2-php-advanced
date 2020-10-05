<?php

$GLOBALS['pageTitle'] = 'Cat Facts (external API Test)';

include './templates/header.php';


$dailyCatFactResponse = file_get_contents( 'https://cat-fact.herokuapp.com/facts/random' );

var_dump( $dailyCatFactResponse );





include './templates/footer.php';