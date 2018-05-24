<h2><?=ucfirst($title);?> Questions</h2>
<?php if (isset($_SESSION['error'])) :?>
    <div class="alert alert-danger">
        <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?>
    </div>
<?php endif; ?>
<?php if (isset($_SESSION['success'])) :?>
    <div class="alert alert-success">
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
    </div>
<?php endif; ?>
<hr>
<form method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="subject" value="<?=$title?>">
    <div class="col-md-6">
        <div class="form-group">
            <label for="question">Question</label>
            <input type="file" class="form-control" id="question" name="question">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="solution">Solution</label>
            <input type="file" class="form-control" id="solution" name="solution">
        </div>
    </div>
    <div ng-app="">
        <div class="form-group">
            <label for="options">Options</label>
            <input type="text" class="form-control" id="options" ng-model="options" name="options">
        </div>
        <div class="form-group">
            <label for="answer">Answer</label>
            <input type="text" class="form-control" id="answer" name="answer" value="{{options}}">
        </div>
    </div>
    <div class="form-group">
        <label for="hints">Hints</label>
        <input type="text" class="form-control" id="hints" name="hints">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

<?php
if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == 'POST') {
    $subject= $_POST['subject'];
    $options= $_POST['options'];
    $answer= $_POST['answer'];
    $hints= $_POST['hints'];

    $imageExt = pathinfo($_FILES['question']['name'], PATHINFO_EXTENSION);
    $imageName = md5(microtime()) . '.' . $imageExt;
    $tmpName = $_FILES['question']['tmp_name'];
    $error = $_FILES['question']['error'];
    $imgExt = ['jpg', 'png', 'jpeg', 'gif'];
    $uploadPath="images/".$title."/";
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
    $tmpName2 = $_FILES['solution']['tmp_name'];
    $error2 = $_FILES['solution']['error'];
    $imgExt2 = ['jpg', 'png', 'jpeg', 'gif'];
    $uploadPath2="images/".$title."/";
    if ($error2 == 0) {
        if (!in_array($imageExt2, $imgExt2)) {
            echo "image format only " . implode(',', $imgExt2) . " supported";
        } else {
            if (move_uploaded_file($tmpName2, $uploadPath2.$imageName2)) {
                $solution = $imageName2;
            }
        }
    }

    $query="insert into $title (question,options,answer,solution,hints,subject) 
                        values('$question','$options','$answer','$solution','$hints','$subject')";
    $result=mysqli_query($conn,$query);
    if($result==true){
        $_SESSION['success']='new question was added';
        header("Location:index.php?page=".$title);
        exit;
    }else{
        $_SESSION['error']='Oopss!!';
        header("Location:index.php?page=".$title);
        exit;
    }
};
?>