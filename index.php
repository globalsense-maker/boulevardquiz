<!DOCTYPE html>
<html> 
<head>
<meta charset=utf-8 />
<title>Boulevard Quiz </title>
<link rel="stylesheet" href="css/main.css">

</head>
<body>
<div class="wrap" style="background-image: url('quiz_bg/img_quiz10.jpg');">
    <div class="form-header">
        <img src="quiz_bg/sch_logo1.jpg"/>
        
        <h1> <font color="purple">BIS Quiz</h1>
        <p><b>____________________________________________________________________<b></p>
        
        <div id="quiz"></div>
        <button id="submit">Get Results</button>
        <div id="results"></div>
    </div>
</div>




 




<script>

var myQuestions = [
    {
        question: "Boulevard International School was founded in the year?",
        answers: {
            a: 'may 2017',
            b: 'june 2018',
            c: 'august 2019'
        },
        correctAnswer: 'a'
    },
    {
        
        question : "Name of the screen that recognizes touch input is : ?",
        answers: {
            a: 'Recog screen',
            b: 'Point Screen',
            c: 'Touch Screen'  
        },
        correctAnswer: 'c'
    }
    
   
    
    

    
];

var quizContainer = document.getElementById('quiz');
var resultsContainer = document.getElementById('results');
var submitButton = document.getElementById('submit');

generateQuiz(myQuestions, quizContainer, resultsContainer, submitButton);

function generateQuiz(questions, quizContainer, resultsContainer, submitButton){

    function showQuestions(questions, quizContainer){
        // we'll need a place to store the output and the answer choices
        var output = [];
        var answers;

        // for each question...
        for(var i=0; i<questions.length; i++){
            
            // first reset the list of answers
            answers = [];

            // for each available answer...
            for(letter in questions[i].answers){

                // ...add an html radio button
                answers.push(
                    '<label>'
                        + '<input type="radio" name="question'+i+'" value="'+letter+'">'
                        + letter + ': '
                        + questions[i].answers[letter]
                    + '</label>'
                );
            }

            // add this question and its answers to the output
            output.push(
                '<div class="question">' + questions[i].question + '</div>'
                + '<div class="answers">' + answers.join('') + '</div>'
            );
        }

        // finally combine our output list into one string of html and put it on the page
        quizContainer.innerHTML = output.join('');
    }


    function showResults(questions, quizContainer, resultsContainer){
        
        // gather answer containers from our quiz
        var answerContainers = quizContainer.querySelectorAll('.answers');
        
        // keep track of user's answers
        var userAnswer = '';
        var numCorrect = 0;
        
        // for each question...
        for(var i=0; i<questions.length; i++){

            // find selected answer
            userAnswer = (answerContainers[i].querySelector('input[name=question'+i+']:checked')||{}).value;
            
            // if answer is correct
            if(userAnswer===questions[i].correctAnswer){
                // add to the number of correct answers
                numCorrect++;
                
                // color the answers green
                answerContainers[i].style.color = 'blue';
            }
            // if answer is wrong or blank
            else{
                // color the answers red
                answerContainers[i].style.color = 'red';
            }
        }

        // show number of correct answers out of total
        resultsContainer.innerHTML = numCorrect + ' out of ' + questions.length;
    }

    // show questions right away
    showQuestions(questions, quizContainer);
    
    // on submit, show results
    submitButton.onclick = function(){
        showResults(questions, quizContainer, resultsContainer);
    }

}
</script>

</body>
</html>




