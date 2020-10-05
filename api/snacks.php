<?php

//Goal: Return a JSON representaion of a snack.
//Parameter: Query parameter string "search" term.

header( 'Content-type: app/JSON; charset=UTF-8' );

if ( isset( $_GET['search'] ) && !empty( $_GET['search'] ) )
{
    echo "{\"response\":\"Search term: {$_GET['search']}\"}";
}

else
{
    echo "{\"response\":\"ERROR: No search term present.\"}";
}

