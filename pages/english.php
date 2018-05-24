

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php?page=home">Back To Home || <?=ucfirst($title)?> Mutiple Chioce Questions</a>
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
        <p id="question" class="img-responsive img-rounded" style="height:100px;"></p>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3" class="buttons" style="margin-top: 10px;">
        <button id="btn0" class="btn btn-success"><span id="choice0"></span></button>
        <button id="btn1" class="btn btn-success"><span id="choice1"></span></button>
        <button id="btn2" class="btn btn-success"><span id="choice2"></span></button>
        <button id="btn3" class="btn btn-success"><span id="choice3"></span></button>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3" style="margin-top: 10px;">
        <p id="progress">Question x of y</p>
        <button class="btn btn-primary pull-left">Solution of Previous Ques.</button>
        <button class="btn btn-primary pull-right">Hints</button>
    </div>
</div>
</div>
</div>
<div id="footerwrap">
</div>


<script src="assets/javascript.js" type="text/javascript"></script>
<script src="assets/quiz.js"></script>
<script src="assets/question.js"></script>
<script src="assets/timer.js"></script>
<?php require 'assets/app.php'; ?>