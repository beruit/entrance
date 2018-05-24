<?php
if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $question = $_POST['question'];
    $options = $_POST['options'];
    $answer = $_POST['answer'];
    $subject= $_POST['subject'];
    $query = "INSERT INTO $title (question,options,answer,subject)
            VALUES ('$question','$options','$answer','$subject')";
    $result = mysqli_query($conn, $query);
    if($result==true){
        $_SESSION['success']='new question was added';
        header("Location:index.php?page=".$title);
        exit;
    }else{
        $_SESSION['error']='Oopss!!';
        header("Location:index.php?page=".$title);
        exit;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="PublicAdmin/ckeditor/contents.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
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

<div class="col-md-8">
    <form method="post" action="" enctype="multipart/form-data">
        <input type="hidden" value="<?=$title?>" name="subject">
        <div ng-app="">
            qestion
            <input type="text" name="question" class="form-control" >
            <br>
            options
            <h3 ng-bind="option"></h3>
            <input type="text" name="options" ng-model="option" class="form-control" required>
            <br>
            answer
            <input type="text" name="answer" value="{{option}}" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
<div class="col-md-4"><p id="ckeditor"></p></div>

<script src="bootstrap/js/angular.min.js"></script>
<script src="PublicAdmin/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ckeditor');
</script>
</body>
</html>
