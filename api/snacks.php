<?php

//Goal: Return a JSON representaion of a snack.
//Parameter: Query parameter string "search" term.

header( 'Content-type: app/JSON; charset=UTF-8' );
//header( 'Access-Control-Allow-Origin: *' );
//header( 'Access-Control-Allow-Method: GET' );


if ( isset( $_GET['search'] ) && !empty( $_GET['search'] ) )
{
    //echo "{\"response\":\"Search term: {$_GET['search']}\"}";
    $snacksJSONString = file_get_contents( '../data/snacks.json' );

    //echo $snacksJSONString;
    if ( $snacksJSONString !== FALSE )
    {
        $snacksList = json_decode( $snacksJSONString );
        if ( $snacksList !==  NULL )
        {
            $matchingSnacks = array();
            foreach ( $snacksList as $snack )
            {
                if ( stristr( $snack[0], $_GET['search'] ) )
                {
                    array_push( $matchingSnacks, $snack );
                }
            }
            echo json_encode( $matchingSnacks );
        }
        else
        {
            echo "{\"response\":\"ERROR: Unable to retrieve snacks list from JSON.\"}"; 
        }
    }
    else
    {
        echo "{\"response\":\"ERROR: Unable to retrieve snacks list.\"}"; 
    }
}

else
{
    echo "{\"response\":\"ERROR: No search term present.\"}";
}

