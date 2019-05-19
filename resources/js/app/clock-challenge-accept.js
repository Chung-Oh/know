// List of all Questions
var listQuestions = document.getElementById('listQuestions');
// Show message when time runs out
var message = document.querySelector('.time-over');
// Parent element of clock
var clock = document.querySelector('.clock-box');
// Form button will be submitted when the clock runs out
var button = document.getElementById('btnFormAccept');
// Elements where will refresh the time
var elemMinute = document.querySelector('.minute');
elemSecond = document.querySelector('.second');
// Variables about second
var fullSecond = '60';

// Call the function to start the second
(clock && elemMinute && elemSecond)
    ? initializeClock(elemMinute, elemSecond, fullSecond)
    : null;

// Start the clock
function initializeClock(minute, second, fullSecond) {
    refreshMinute(minute);
    refreshSecond(minute, second, fullSecond);
}

// Restart the second to 60 and decrease again
function refreshSecond(minute, second, fullSecond) {
    second.innerHTML = fullSecond;
    runSecond(minute, second, fullSecond);
}

// It decreases the Seconds
function runSecond(minute, second, fullSecond) {
    currentSecond = parseInt(second.textContent);
    running = setInterval(function() {
        currentSecond--;
        second.innerHTML = currentSecond;
        lessTen(minute, second, fullSecond, currentSecond, running);
    }, 1000);
}

// Set zero when the seconds were less than 10
function lessTen(minute, second, fullSecond, currentSecond, running) {
    if (currentSecond < 10) {
        tempSecond = '0' + currentSecond.toString();
        second.innerHTML = tempSecond;
    }
    secondIsZero(minute, second, fullSecond, currentSecond, running);
}

// When the second is zero refresh, need the fourth parameter to clear the Interval function
function secondIsZero(minute, second, fullSecond, currentSecond, running) {
    if (minute.textContent == 0 && currentSecond == 0) {
        timeOver(minute, second, running);
    } else if (currentSecond == 0) {
        refreshMinute(minute);
        refreshSecond(minute, second, fullSecond);
        clearInterval(running);
    }
}

// Decreases the minutes when the second reaches zero
function refreshMinute(minute) {
    currentMinute = parseInt(minute.textContent);
    currentMinute--;
    minute.innerHTML = currentMinute;
    if (currentMinute == 0) {
        lessOneMinute(clock);
    }
}

// When the minute is less than one
function lessOneMinute(clock) {
    // Changes the color of the watch from yellow to red
    clock.classList.remove('text-warning');
    clock.classList.add('text-danger');
    clock.classList.add('font-weight-bold');
}

// When the clock reaches zero, stop working
function timeOver(minute, second, running) {
    // Clear function interval to stop the second
    clearInterval(running);
    minute.innerHTML = '0';
    second.innerHTML = '00';
    // Getting list of Questions and hidding
    listQuestions.setAttribute('hidden', true);
    // Show message when time run out
    message.style.display = 'block';
    finishChallenge(button);
}

// Submitting the challenge when time is up
function finishChallenge(btn) {
    setTimeout(function() {
        // Show loading animation
        document.querySelector('.loading').style.display = 'block';
        // Changing the Type of Button to Submit
        btn.type = 'submit';
        // Submitting the form
        btn.click();
    }, 3000);
}