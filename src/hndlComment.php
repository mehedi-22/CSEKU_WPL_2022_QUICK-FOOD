<?php 
    
    function getComment($id){
        $commentPath = "../file/";
        return file_get_contents($commentPath . "comment-$id.txt");
        
        
      }








?>