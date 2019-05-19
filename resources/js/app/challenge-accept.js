// Getting all the questions
var questions = $('.question');
// The button will have two values, Next to go to next question and Finish to finish challenge
var button = $('#btnFormAccept');
// Circles representing the questions already resolved
var dot = $('.dot');
// Elements at the bottom of the form
var line = $('#endLine');
    bottomForm = $('#endForm');
// This variable represents the problem that is currently being
var indexQuestion = 0;
    indexAlt = 1

// Putting the first question in display
initialize(questions[indexQuestion]);

// Put listeners on button when was be clicked to go next question
button.on('click', function() {
    checkFields($('.alternative-accept-' + (indexAlt)));
});

// Show first Question
function initialize(question) {
    $(question).removeAttr('hidden');
    line.removeAttr('hidden');
    bottomForm.removeAttr('hidden');
}

// Only continue if some entry has filled
function checkFields(alt) {
    alt.each(function() {
        if ($(this).prop('checked')) {
            nextQuestion(questions[indexQuestion], questions[indexQuestion + 1]);
            checkStage(indexAlt, $('#btnFormAccept'));
        }
    });
}

// Change button type by removing button type to submit
function checkStage(alt, button) {
    if (alt == 10) {
        button[0].innerHTML = 'Finish';
    } else if (alt == 11) {
        load();
        button[0].type = 'submit';
    }
}

// When call do you pass the current question and next question
function nextQuestion(current, next) {
    changeDot(dot[indexQuestion]);
    $(current).attr('hidden', true);
    $(next).removeAttr('hidden');
    indexQuestion++;
    indexAlt++;
}

//Change the color of the circles representing the resolved questions
function changeDot(obj) {
    $(obj).removeClass('bg-secondary').addClass('bg-success');
}

// Displays Loading Animation
function load() {
    $('.loading').css('display', 'block');
}