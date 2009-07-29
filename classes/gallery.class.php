<?php
include_once("post.class.php");
/*******************************************************************************
 * Class    gallery
 * Purpose  This object keeps track of a gallery of posts.
 *
 * Attribs  id      - The id of the gallery
 *          name    - The name of the gallery
 *          desc    - A description of the gallery
 *          posts   - An array of posts
 *
 * Includes post.class.php
 ******************************************************************************/
public class gallery
{
    private $id;
    private $name;
    private $desc;
    private $posts;
    private $hasChanged;
    
    public function __construct($id,$name,$desc="",$posts="")
    {
        $this->id = $id;
        $this->name = $name;
        $this->desc = $desc;
        $this->posts = is_array($posts)?$posts:array();
        $this->hasChanged = false;
    }
    
    /***************************************************************************
     * Function newPost
     * Purpose  This will append a new post to the end of posts with the values
     *          passed in
     * Params   id      - The id of the post to be created
     *          image   - The path to the image that was created
     *          desc    - A desctition of the post
     **************************************************************************/
    public function newPost($id,$image,$desc)
    {
        $this->posts[] = new post($id,$image,$desc);
        $this->hasChanged = true;
    }
    
    /***************************************************************************
     * Function deletePost
     * Purpose  This will delete the post that has the id passed in.
     *          Returns true if a post was deleted and false otherwise
     * Params   id  - The id of the post to delete
     **************************************************************************/
    public function deletePost($id)
    {
        foreach($this->posts as $key=>$post)
        {
            if ( $post->getId() == $id )
            {
                unset($this->posts[$key]);
                return true;
            }
        }
        return false;
    }
    
    #printPosts()  for debugging a simple table view
    /***************************************************************************
     * Function printPosts
     * Purpose  This will print an html table containing all of the posts for
     *          this gallery. Mainly for debugging.
     * params   showImages  - True if you want an image, false for the path.
     *                        Assumed to be false.
     **************************************************************************/
    public function printPosts($showImages=false)
    {
        echo "<table id='posts>\n";
        foreach ($this->posts as $post)
        {
            echo "\t" . $post->getTableRow($showImages) . "\n";
        }
        echo "</table>\n";
    }
    
    #writeGallery
}
?>









