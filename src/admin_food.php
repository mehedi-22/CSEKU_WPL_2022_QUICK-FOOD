<?php 
  require_once "./hndlImage.php";
  require_once "./testQuery.php";
  require_once "./hndlComment.php";
  require_once "../Database/Connection.php";
  

  if(isset($_POST['submit'])){
    $firsKey = array_key_first($_FILES);
    $imageName = $firsKey;
    $uploadedImgName = uploadImage($imageName);
    $query = new TestQuery(Connection::make());
    $query->insert("reviewfoods",$uploadedImgName);
  }

  if(isset($_POST['submitComment'])){
      $commentPath = "../file/";
  
      if(isset($_POST['comment-1'])){
            file_put_contents($commentPath . "comment-1.txt",$_POST['comment-1']) ;        
        }else if(isset($_POST['comment-2'])){
            file_put_contents($commentPath . "comment-2.txt",$_POST['comment-2']) ;        
        }else if(isset($_POST['comment-3'])){
            file_put_contents($commentPath . "comment-3.txt",$_POST['comment-3']) ;        
        }
      
  }
  


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../dist/output.css"/>
</head>
<body class=" bg-gray-100 w-full">
    <?php require_once('./admin_nav.php') ?>

<h2 class=" font-serif text-3xl ">Select Rivew  Poster : </h2>

<div class="grid grid-cols-4 gap-10 mt-14  px-48">
    <div>
        <div class="imgClass  ">
            <img class=" m-auto object-fill  h-72" src="../images/reviewImg/reviewImage-01.png" alt="image">
        </div>
        <div>
            <form action="admin_food.php" method="post" enctype="multipart/form-data">
                <input type="file" name="reviewImage-01" id="none">
                <input class="  my-3 block rounded-md w-full text-white bg-blue-400 py-2 border border-gray-400" type="submit" value="upload" name="submit">
            </form>
        </div>
    </div>

    <div>
        <div class="imgClass ">
            <img class=" object-fill  h-72" src="../images/reviewImg/reviewImage-02.png" alt="image">
        </div>
            
        <div>
            <form action="admin_food.php" method="post" enctype="multipart/form-data">
                <input type="file" name="reviewImage-02" id="none">
                <input class="my-3 block rounded-md w-full text-white bg-blue-400 py-2 border border-gray-400" type="submit" value="upload" name="submit">
            </form>
        </div>
    </div>  
    
    <div>
        <div   class="imgClass  ">
          <img   class=" object-fill  h-72" src="../images/reviewImg/reviewImage-03.png" alt="image">
        </div>
              
        <div>
            <form action="admin_food.php" method="post" enctype="multipart/form-data">
                <input type="file" name="reviewImage-03" id="none">
                <input class="  my-3 block rounded-md w-full text-white bg-blue-400 py-2 border border-gray-400" type="submit" value="upload" name="submit">
            </form>
        </div>
    </div>      
</div>

<!--                      review   sec                             -->

<div class="grid grid-cols-4 gap-10 mt-14  px-48">
    <div>
            <form action="admin_food.php" method="post" enctype="multipart/form-data">
                <textarea  
                    placeholder="Enter text here..." 
                    class="w-full h-28 text-start" 
                    name="comment-1"    
                > <?php echo getComment(1)?> 
                </textarea>
                <input class="  my-3 block rounded-md w-full text-white bg-green-400 py-2 border border-gray-400" type="submit" value="upload" name="submitComment">

            </form>
        
    </div>

    <div>
            <form action="admin_food.php" method="post" enctype="multipart/form-data">
                <textarea  
                    placeholder="Enter text here..." 
                    class="w-full h-28" 
                    name="comment-2"
                > <?php echo getComment(2)  ?>
                </textarea>
                <input class="  my-3 block rounded-md w-full text-white bg-green-400 py-2 border border-gray-400" type="submit" value="upload" name="submitComment">

            </form>
        
    </div>
    <div>
            <form action="admin_food.php" method="post" enctype="multipart/form-data">
                <textarea  
                    placeholder="Enter text here..." 
                    class="w-full h-28" 
                    name="comment-3"
                > <?php echo getComment(3)  ?>
                </textarea>
                <input class="  my-3 block rounded-md w-full text-white bg-green-400 py-2 border border-gray-400" type="submit" value="upload" name="submitComment">

            </form>
        
    </div>      
</div>

</body>
</html>