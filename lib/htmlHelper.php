<?php

/*******************************************************************************
 * Function htmlStart
 * Pupose   This function will return the begining of the html document up to
 *          and including the opening body tag. This function mainly exists so
 *          I don't have to retype that annoying docstring business.
 * Params   $title  - This is the title for the web page. Defaults to an easy
 *                    to notice "CHANGE THE TITLE MORAN!"
 ******************************************************************************/
function htmlStart($title="CHANGE THE TITLE MORAN!")
{
    return <<< HTMLSTART
<html>
<head>
  <title>$title</title>
  <link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

HTMLSTART;

}

/*******************************************************************************
 * Function htmlEnd
 * Purpose  This function will return the end of the html document.  It closes
 *          the body tag and the html tag. Much less exciting then htmlStart.
 ******************************************************************************/
function htmlEnd()
{
    return <<< HTMLEND

</body>
</html>
HTMLEND;
}

/*******************************************************************************
 * Function genLinks
 * Purpose  This function takes in an array in the form $name=>$address and
 *          returns a string <a> tags in a div with id='links'
 ******************************************************************************/
function genLinks($places)
{
    $html = "<div id='links'>\n";
    foreach ( $places as $name => $address )
    {
        $html .= "<a id='link' href='$address'>$name</a>\n";
    }
    return $html . "</div>";
}

function heading($str, $s=1)
{
    echo "<h$s style='text-align: center'>$str</h$s>\n";
}


?>