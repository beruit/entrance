function Quiz(questions) {
    this.score = 0;
    this.questions = questions;
    this.questionIndex = 0;
}

Quiz.prototype.getQuestionIndex = function() {
    return this.questions[this.questionIndex];
}

Quiz.prototype.guess = function(answer) {
    if(this.getQuestionIndex().isCorrectAnswer(answer)) {
        swal({
  type: 'success',
  title: 'You are correct',
  showConfirmButton: false,
  timer: 800
});
        this.score++;
    }else{
        swal({
  type: 'warning',
  title: 'You are wrong',
  showConfirmButton: false,
  timer: 800
});
    }

    this.questionIndex++;
}

Quiz.prototype.isEnded = function() {
    return this.questionIndex === this.questions.length;
}
