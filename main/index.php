<?php
    include_once("../lib/htmlHelper.php");
    include_once("../lib/db.php");
    
    echo htmlStart("Clockwork design -- Michael Telford");
    
    # This is the array of links that will be on this page
    $links = array("Home"=>"index.php",
                   "Galleries"=>"galleries.php",
                   "About me"=>"about.php",
                   "Contact Information"=>"info.php");
    
    
    heading("Home page");
    
    #echo out the links
    echo genLinks($links);
    
    echo "<div id='main'>\n";
    
    $db = new db("site","localhost","mike","default");
    
    #get the 4 most recient posts
    
    $db->query("SELECT title, description, image, created  FROM post ORDER BY created LIMIT 4");
    while ($line = $db->fetchNextObject()) {
        # we now have the results in the form $line->field
        $img = $line->image;
        $title = $line->title;
        $desc = $line->description;
        $time = $line->created;
        
        # echo time
        echo <<< SINGLEPOST

<div class='post'>
  <img src='$img' />
  <h3>$title</h3>
  <p>$desc</p>
  <p>$time</p>
</div>

SINGLEPOST;

    }
    
    

    echo "</div>";
    
    echo htmlEnd();
    
function __autoload($class) {
    require_once "../classes/$class.class.php";
}
?>