$('#formDetailChallenge').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var questions = button.data('questions');
    var challenge = button.data('challenge');
    var levelChallenge = $('#levelChallenge').data('level-challenge');

    var modal = $(this);
    modal.find('#formQuestionModalLabel').text('Challenge details with ID : ' + challenge.id);
    modal.find('#creator').text(challenge.users[0].name);
    modal.find('#createdAt').text(challenge.created_at);
    modal.find('#updatedAt').text(challenge.updated_at);
    getInfoLevel(challenge, levelChallenge);
    throwQuestions(questions);
})

// Get list of all Level Challenge dependencies that are in an element on the page and put in the Form
function getInfoLevel(challenge, levelChallenge) {
    $(levelChallenge).each(function(index, obj) {
        if (challenge.level_challenge_id == obj.id) {
            $('#level').text(obj.levels[0].name);
            $('#timeDetail').text(obj.times[0].type);
            $('#experienceDetail').text(obj.experiences[0].type);
            $('#opportunityDetail').text(obj.opportunities[0].type);
        }
    });
}

// Put all information about question on Form
function throwQuestions(questions) {
    var run = 0;
    var matters = ['Geography', 'Mathematics', 'Portuguese', 'Science', 'Story'];
    matters.forEach(function(matter, categoryId) {
        // Running an Object to get your Keys
        Object.keys(questions).forEach(function(key, index) {
            if (categoryId + 1 == questions[key].category_id) {
                // Get elements from the Form Details section
                run++;
                $('#detail' + run)[0].children[1].children[0].innerHTML = questions[key].content; // Content
                $('#detail' + run)[0].children[1].children[2].innerHTML = questions[key].users[0].name; // Creator
                $('#detail' + run)[0].children[1].children[3].innerHTML = questions[key].created_at; // Created At
                $('#detail' + run)[0].children[1].children[4].innerHTML = questions[key].updated_at; // Updated At
                getAlternatives($('#detail' + run)[0].children[1].children[1], questions[key].id); // List Alternative tag OL
            }
        });
    });
}

// Using AJAX for to get Alternatives
function getAlternatives(target, idQuestion) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Convert String response to Json
            var alternatives = JSON.parse(this.responseText);
            var index = 0;
            Object.keys(alternatives).forEach(function(key) {
                target.children[index].innerHTML = alternatives[key].content;
                target.children[index].setAttribute('class', alternatives[key].type == 1
                    ? 'text-warning font-weight-bold'
                    : ''
                );
                index++;
            });
        }
    }
    xhttp.open("GET", "/admin/challenges/alternatives/" + idQuestion, true);
    xhttp.send();
}