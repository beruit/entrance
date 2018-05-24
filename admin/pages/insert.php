<?php

if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == 'POST') {
    $subject= $_POST['subject'];
    $options= $_POST['options'];
    $answer= $_POST['answer'];
    $hints= $_POST['hints'];

    $imageExt = pathinfo($_FILES['question']['name'], PATHINFO_EXTENSION);
    $imageName = md5(microtime()) . '.' . $imageExt;
    $tmpName = $_FILES['upload']['tmp_name'];
    $error = $_FILES['upload']['error'];
    $imgExt = ['jpg', 'png', 'jpeg', 'gif'];
    $uploadPath='../images/';
    if ($error == 0) {
        if (!in_array($imageExt, $imgExt)) {
            echo "image format only " . implode(',', $imgExt) . " supported";
        } else {
            if (move_uploaded_file($tmpName, $uploadPath.$imageName)) {
                $question = $imageName;
            }
        }
    }

    $imageExt2= pathinfo($_FILES['solution']['name'], PATHINFO_EXTENSION);
    $imageName2 = md5(microtime()) . '.' . $imageExt2;
    $tmpName2 = $_FILES['upload']['tmp_name'];
    $error2 = $_FILES['upload']['error'];
    $imgExt2 = ['jpg', 'png', 'jpeg', 'gif'];
    $uploadPath2='../images/';
    if ($error2 == 0) {
        if (!in_array($imageExt2, $imgExt2)) {
            echo "image format only " . implode(',', $imgExt2) . " supported";
        } else {
            if (move_uploaded_file($tmpName2, $uploadPath2.$imageName2)) {
                $solution = $imageName2;
            }
        }
    }

    $query="insert into physics (question,options,answer,solution,hints,subject) 
                        values('$question','$options','$answer','$solution','$hints','$subject')";
    $result=mysqli_query($conn,$query);
    if($result==true){
        $_SESSION['success']='new question was added';
        header("Location:index.php?page=physics");
        exit;
    }else{
        $_SESSION['error']='Oopss!!';
        header("Location:index.php?page=physics");
        exit;
    }
};
