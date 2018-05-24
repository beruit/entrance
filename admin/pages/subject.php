<?php
if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == 'POST') {
    $subName= $_POST['sub_name'];
    $query="insert into tbl_subject(sub_name) VALUES ('$subName')";
    $result=mysqli_query($conn,$query);
    if($result==true){
        $_SESSION['success']="new subject is inserted";
        header('Location:index.php?page=subject');
        exit;
    }else{
        $_SESSION['error']="There was a problem";
    }
}
$query2="select * from tbl_subject order by id desc";
$result2=mysqli_query($conn,$query2);
?>
<div class="col-md-12">
    <h1>Add Category</h1>
    <hr>
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
    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Subject Name</label>
            <input type="text" name="sub_name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-info">Add Subject</button>
        </div>
    </form>
    <table class="table table-bordered">
  <tr>
      <th>SN</th>
      <th>Subject</th>
      </tr>
        <?php foreach ($result2 as $key=>$data):?>
        <tr>
            <th><?=++$key?></th>
            <th><?=$data['sub_name']?></th>
        </tr>
        <?php endforeach; ?>
    </table>
</div>