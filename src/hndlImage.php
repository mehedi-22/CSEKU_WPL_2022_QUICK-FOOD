<?php

  function uploadImage($imgName, $uploadPath ="../images/reviewImg"){
        $tempName = $_FILES[$imgName]["tmp_name"];
        $extension = "png"; 
        //pathinfo($_FILES[$imgName]["name"], PATHINFO_EXTENSION);
        $baseName =  $uploadPath ."/". $imgName.".$extension";
        //echo $extension;
        if(move_uploaded_file($tempName,$baseName)){
            echo '<script type="text/JavaScript"> 
                  alert("Uploaded Successfully");
                  </script>';
        }else{
            echo '<script type="text/JavaScript"> 
                    alert("failed");
                    windows.location = windows.location;
                  </script>';
        }
    return $imgName.".".$extension;
  }  

  

?>