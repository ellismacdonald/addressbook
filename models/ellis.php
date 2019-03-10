<?php 
/** The news model does the back- end heavy lifting for the news controller */


class Ellis_Model {

   /** Array of articles. Array keys are titles, array values are corresponding articles */

   private $articles = array(
      // article 1
      'about' => array (
         'title' => 'My name is Ellis MacDonald',
         'content' => 'Welcome to my website! This is just a demonstration of mvc.'
      ),
   );

   public function __construct() {
      // print 'I am the news model';
   }

   /**
    * 
    *@param string $articleName
    *
    *@return array $article
    */

   public function get_article($articleName){
      // fetch article from array
      $article = $this -> articles[$articleName];

      return $article;
   }
}