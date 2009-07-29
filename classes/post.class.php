<?php

/*******************************************************************************
 * Class    post
 * Purpose  This object is a representation of a post.
 *
 * Attribs: id      - The id for this post.
 *          image   - The location of the image being posted
 *          desc    - A description to go along with the post
 *          time    - Time that the post was createdd
 *
 * Note: posts are created by a gallery
 * 
 ******************************************************************************/
public class post
{
    private $id;
    private $image;
    private $desc;
    private $time;
    
    public function __construct($id,$image,$desc="",$time="")
    {
        $this->id = $id;
        $this->image = $image;
        $this->desc = $desc;
        $this->time = $time==""?time():$time;
    }
    
    
    
    /** Getters for the attributes **/
    
    /***************************************************************************
     * Function getImagePath
     * Purpose  This function returns the path to the image for this post
     **************************************************************************/
    public function getImagePath()
    {
        return $this->image;
    }
    
    /***************************************************************************
     * Function getDescription
     * Purpose  This function returns the description for this post
     **************************************************************************/
    public function getDescription()
    {
        return $this->desc;
    }
    
    /***************************************************************************
     * Function getId
     * Purpose  This function returns the id for this post
     **************************************************************************/
    public function getId()
    {
        return $this->id;
    }
    
    /***************************************************************************
     * Function getTime
     * Purpose  This function gets the time that this post was created
     *          Measured in seconds since epoc
     **************************************************************************/
    public function getTime()
    {
        return $this->time;
    }
    
    /***************************************************************************
     * Function write
     * Purpose  This will pass this posts information to the write method of the
     *          writer passed to it
     * Params   writer - This is an object with a write method that accepts a
     *                   posts information and writes it out ( somehow )
     **************************************************************************/
    public function write($writer)
    {
        if (method_exists($writer,"writePost"))
        {
            $writer->write($this->id,
                           $this->image,
                           $this->desc,
                           $this->time);
        }
        else
        {
            
            die("Post: " . $this->id . " was passed $writer instead of a writer class");
        }
    }
    
    /***************************************************************************
     * Function getTableRow
     * Purpose  This will return a table row containing the posts info
     * Params   showImage   - True if you want an image, false for the path.
     *                        Assumed to be false.
     **************************************************************************/
    public function getTableRow($showImage=false)
    {
        $id = $this->id;
        $image = $showImage?"<img src='":""
        $image .= $this->image;
        $image .= $showImage?"' />":"";
        $desc = $this->desc;
        $time = $this->time;
        
        $temp = array($id,$image,$desc,$time);
        
        $output = "<tr>";
        
        foreach($temp as $x)
        {
            $output .= "<td>$x</td>";
        }
        
        return $output . "</tr>";
    }
}
?>







