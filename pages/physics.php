<?php
if(isset($_POST['next']))
{
    $a=$_POST['a'];
}
if(!isset($a)){
    $a=0;
}
$count_sql="SELECT COUNT(*) FROM $title";
$count_query=mysqli_query($conn,$count_sql);
$count=mysqli_fetch_row($count_query);
if($a >= $count[0]){
    $row[1]="quiz completed";
}else {
    $query = "SELECT * FROM $title limit 1 offset $a";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
}
?>


<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php?page=home">Back To Home || <?=ucfirst($title)?> Mutiple Chioce Questions</a>
        </div>
    </div>
</div>
<div id="headerwrap">
    <div id="quiz" class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div id="status" class="pull-left" ></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php  if($a < $count[0]){ ?>
                <img src="admin/images/<?=$title?>/<?=$row[1]?>">
                <div class="col-md-6 col-md-offset-3" style="margin-top: 10px;">
                    <?php $chioce=explode(';',$row[2]);?>
                    <form method="post" action="">
                        <?php $b=$a+1;
                        echo "<input type='hidden' value='$b' name='a'>"; ?>
                <button id="btn0" class="btn btn-success" type='submit' name='next' value='<?=$chioce[0]?>'><?=$chioce[0]?></button>
                <button id="btn1" class="btn btn-success" type='submit' name='next' value='<?=$chioce[1]?>'><?=$chioce[1]?></button>
                <button id="btn2" class="btn btn-success" type='submit' name='next' value='<?=$chioce[2]?>'><?=$chioce[2]?></button>
                <button id="btn3" class="btn btn-success" type='submit' name='next' value='<?=$chioce[3]?>'><?=$chioce[3]?></button>
                <button id="btn3" class="btn btn-success" type='submit' name=reset' value='reset'>Reset</button>
                    </form>
                </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top: 10px;">
                <button class="btn btn-primary pull-left">Solution of Previous Ques.</button>
                <button class="btn btn-primary pull-right">Hints</button>
                <?php }else{
                    echo "<h1>!!You have finished the quiz!!</h1>";
                    echo "<h3>Total Questions: $a</h3>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<div id="footerwrap">
</div>
<?php if($row[3] == $_POST['next']):?>
    <?php echo "oh oh"; ?>
    <script>
  swal({
  type: 'success',
  title: 'You are correct',
  showConfirmButton: false,
  timer: 800
});
</script>
    <?php else:?>
<script>
    swal({
    type: 'warning',
    title: 'You are wrong',
    showConfirmButton: false,
    timer: 800
    });
</script>
<?php endif; ?>
