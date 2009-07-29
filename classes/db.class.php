<?php

class db
{
    #the database object we are wrapping
    private $base;
    
    #constructor for the db class
    function __construct($base, $server, $user, $pass )
    {
        #make object
        $this->base = new mysqli($server, $user, $pass, $base);
        
        #make sure object is ok, if not, crap self
        if (mysqli_connect_error())
        {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
        
    }
    
    # query wrapper
}


?>