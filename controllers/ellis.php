<?php 
/** This file handles the retrieval and serving of news articles */

class Ellis_controller {
   /** This templat variable will hold the view portion of our MVC for this controller */

   public $template = 'ellis';
   
   /** This is the default function that will be called by router php 
    * 
    *@param array $getVars the Get variables posted to index.php
   */

   public function main(array $getVars){

      $newsModel = new Ellis_Model;

      // get article
      $article = $newsModel -> get_article($getVars['article']);

      // create a new view and pass it our template
      $view = new View_Model($this -> template);

      // assign article data to view
      $view -> assign('title', $article['title']);
      $view -> assign('content', $article['content']);

   }
}