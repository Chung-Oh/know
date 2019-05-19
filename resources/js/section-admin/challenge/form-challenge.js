// Fields in the Form vinculated in Level Challenge
var time = $('#time');
    experience = $('#experience');
    opportunity = $('#opportunity');
// Element Select of Categories
var selectGeography = $('.questionGeography');
    selectMathematics = $('.questionMathematics');
    selectPortuguese = $('.questionPortuguese');
    selectScience = $('.questionScience');
    selectStory = $('.questionStory');

// Primary selection element in form, added event change here
$('#primarySelect').change(function() {
    allSelectQuestion(); // Placing event of changes in the Selection of Questions
    cleanOptionPrimary(); // Clean All tag Select
    // Here is Very Important, where we took the Option that was Selected in the Form
    var select = $('#primarySelect').find(':selected');
    // Convert string to JSON object
    var contentsLevel = JSON.parse(select[0].dataset.levelChallenge);
    var questions = JSON.parse(select[0].dataset.questions);
    // About Level Challenge
    time.text(contentsLevel.times[0].type);
    experience.text(contentsLevel.experiences[0].type);
    opportunity.text(contentsLevel.opportunities[0].type);
    // Questions below Form
    var option = Object.entries(questions);
    // Placing the options in the correct categories
    inputOptions(option);
})

// Placing Change Events in Select Questions
function allSelectQuestion() {
    // Generic variable to work with question content
    var content;
    // When the question is selected the loop will go through and put the information in detail
    for (var i = 1; i <= 10; i++) {
        $('#question' + i).change(function(elemSelect) {
            // Remove attribute hidden of detail tag
            var tagDetail = elemSelect.target.parentNode.children[1];
            tagDetail.removeAttribute('hidden');
            // Getting paragraphy of detail
            content = elemSelect.target.parentNode.children[1].children[1].children[0];
            // Put content in paragraphy
            content.innerHTML = elemSelect.target.options[elemSelect.target.options.selectedIndex].dataset.content;
            idQuestion = elemSelect.target.options[elemSelect.target.options.selectedIndex].value;
            var tagOL = elemSelect.target.parentNode.children[1].children[1].children[1];
            // Call AJAX below for to get Alternatives
            getAlternatives(tagOL);
        })
    }
}

// Putting the options about level challenge
function inputOptions(option) {
    option.forEach(function(item) {
        // Condition to know if the category is right and if the question does not have a challenge
        if (item[1].category_id == 1 && item[1].challenge_id == null) {
            selectGeography.append("<option class='option-sec' data-content='" + item[1].content + "' value='"
                + item[1].id + "'>"  + contentHandler(item[1].content) + "</option>");
        }
        if (item[1].category_id == 2 && item[1].challenge_id == null) {
            selectMathematics.append("<option class='option-sec' data-content='" + item[1].content + "' value='"
                + item[1].id + "'>"  + contentHandler(item[1].content) + "</option>");
        }
        if (item[1].category_id == 3 && item[1].challenge_id == null) {
            selectPortuguese.append("<option class='option-sec' data-content='" + item[1].content + "' value='"
                + item[1].id + "'>"  + contentHandler(item[1].content) + "</option>");
        }
        if (item[1].category_id == 4 && item[1].challenge_id == null) {
            selectScience.append("<option class='option-sec' data-content='" + item[1].content + "' value='"
                + item[1].id + "'>"  + contentHandler(item[1].content) + "</option>");
        }
        if (item[1].category_id == 5 && item[1].challenge_id == null) {
            selectStory.append("<option class='option-sec' data-content='" + item[1].content + "' value='"
                + item[1].id + "'>"  + contentHandler(item[1].content) + "</option>");
        }
    })
}

// Clean options of select tag
function cleanOptionPrimary() {
    // This option-sec was create when primary select was changed, this code be there above in loop and condition if
    $('.option-sec').remove();
    // Clear the all Sub Categories Selection Elements
    for (var i = 0; i < 2; i++) {
        selectGeography[i][0].selected = true;
        selectMathematics[i][0].selected = true;
        selectPortuguese[i][0].selected = true;
        selectScience[i][0].selected = true;
        selectStory[i][0].selected = true;
    }
    // When primary switch is changed it will hide the details
    var details = $('.info-detail');
    details.each(function(index, item) {
        item.setAttribute('hidden', true);
        item.removeAttribute('open');
    });
}

// Manipulate string to short
function contentHandler(content) {
    return content.length >= 50 ? (content.slice(0, 50) + '...') : content;
}

// Function helper to above loop
function firstOptionQuestion(category, listQuestions) {
    // Take the last questions (those of the challenge), and put in the select tag
    var type = 0; // Variable to distinguish last and penultimate question, to be presented in the select tag
    var selectQuestion = category.children[0]; // Getting element Select
    if (Number(category.name.charAt(category.name.length - 1)) % 2) {
        type = 2;
    } else {
        type = 1;
    }
    // Remove and add the selected attribute to stay focused on the first option
    selectQuestion.removeAttribute('selected');
    selectQuestion.setAttribute('selected', true);
    // Put value ID on Select Tag
    selectQuestion.setAttribute('value', category.children[category.children.length - type].value);
    // Put question content on data attribute
    insertDataOption(selectQuestion, listQuestions);
    // Put text of question on Select Tag
    selectQuestion.innerHTML = category.children[category.children.length - type].textContent;
    // Put question in paragraphy
    var detailParagraphy = category.parentNode.children[1].children[1].children[0];
    detailParagraphy.innerHTML = category.children[category.children.length - type].dataset.content;
    // Getting id of question to pass on parameter to AJAX
    idQuestion = category.children[category.children.length - type].value;
    // Getting tag OL to pass alternatives after response of AJAX
    var tagOL = category.parentNode.children[1].children[1].children[1];
    // Call AJAX below for to get Alternatives
    getAlternatives(tagOL);
    // Removing attribute hidden of Detail Tag
    category.parentNode.children[1].removeAttribute('hidden');
    // Remove the options that belong to the challenge from the list
    removeLastOption(category, category.children[category.children.length - 1]);
    removeLastOption(category, category.children[category.children.length - 1]);
}

// Insert data content in option
function insertDataOption(target, args) {
    args.forEach(function(item) {
        if (target.value == item.id) {
            target.setAttribute('data-content', item.content);
        }
    });
}

// Removing option of edit the list option below
function removeLastOption(parent, child) {
    parent.removeChild(child);
}

function listAllQuestions(questions, challenge) {
    // List of questions that do not have challenges
    // Taken from the select primary to concatenate when you edit the challenge
    var listQuestions = [];
    var temp;
    for (var i = 1; i < 5; i++) {
        if ($('#primarySelect')[0].children[i].dataset.questions.length > 2) {
            temp = JSON.parse($('#primarySelect')[0].children[i].dataset.questions);
            for (var index in temp) {
                listQuestions.push(temp[index]);
            }
        }
    }
    // Fix bug, Array for the first challenge and objects for the others
    if (questions.length == 10) {
        // Placing the questions that will be edited in the list of questions
        $(questions).each(function(index, question) {
            listQuestions.push(question);
        });
    } else {
        for (var index in questions) {
            listQuestions.push(questions[index]);
        }
    }
    // Filtering questions by category and level
    var matters = ['Geography', 'Mathematics', 'Portuguese', 'Science', 'Story'];
    matters.forEach(function(matter, indexCat) {
        $('.question' + matter).each(function(index, category) {
            listQuestions.forEach(function(question) {
                if (question.category_id == (indexCat + 1) && question.level_id == challenge.level_challenge_id) {
                    $(category).append("<option class='option-sec' data-content='" + question.content + "' value='"
                        + question.id + "'>"  + contentHandler(question.content) + "</option>");
                }
            });
            firstOptionQuestion(category, listQuestions);
        })
    })
}

// Clear all sub-categories
function cleanSubCategories() {
    for (var i = 1; i <= 10; i++) {
        $('#question' + i)[0].children[0].innerHTML = 'Choose a Question ' + i;
        $('#question' + i)[0].children[0].value = '';
        $('#question' + i)[0].children[0].dataset.content = '';
    }
}

// Modal Form for Create and Edit
$('#formCreateChallenge').on('show.bs.modal', function(event) {
    // Invoke function to show Tag Detail
    allSelectQuestion();
    // Clean all categories options
    $('.option-sec').remove();
    // Getting data attributes by event change
    var button = $(event.relatedTarget);
    var challenge = button.data('challenge');
    var questions = button.data('questions');

    var modal = $(this);
    if (challenge) {
        modal.find('#formChallengeModalLabel').text('Update Challenge with ID : ' + challenge.id);
        modal.find('form').attr('action', '/admin/challenges/update');
        modal.find('#idChallenge').val(challenge.id);
        modal.find('#primarySelect').attr('disabled', true);
        modal.find('#levelChallengeId').prop('value', challenge.level_challenge_id);
        $('.bool').removeAttr('disabled') // Removing attribute Disabled for to Update
        modal.find('#btnFormChallenge').text('Update');
        // Get Level Challenge object and add to Form
        getInfoLevelChallenge(challenge.level_challenge_id);
        // List of questions that do not have challenges
        // Taken from the select primary to concatenate when you edit the challenge
        listAllQuestions(questions, challenge);
    } else {
        modal.find('#formChallengeModalLabel').text('New Challenge');
        modal.find('form').attr('action', '/admin/challenges/new');
        modal.find('#idChallenge').val('');
        modal.find('#primarySelect').removeAttr('disabled');
        modal.find('#levelChallengeId').prop('value', '');
        modal.find('#levelChallengeId').text('Choose a Level');
        modal.find('#levelChallengeId').removeAttr('selected');
        modal.find('#levelChallengeId').attr('selected', true);
        $(time).text('');
        $(experience).text('');
        $(opportunity).text('');
        cleanOptionPrimary();
        cleanSubCategories();
        $('.bool').attr('disabled', true); // Add attribute disabled in all tag select Questions
        modal.find('#btnFormChallenge').text('To save');
    }
})

// Using AJAX for to get informations about Level Challenges
function getInfoLevelChallenge(idLevelChallenge) {
    var listInfoLevels = JSON.parse($('#levelChallenge')[0].dataset.levelChallenge);
    $(listInfoLevels).each(function(index, obj) {
        if (idLevelChallenge == obj.id) {
            // Need remove attribute selected to display the value real when will edit
            $('#levelChallengeId').attr('selected', false);
            $('#levelChallengeId').attr('selected', true);
            // // Putting return info on form
            $('#levelChallengeId').text(obj.levels[0].name);
            $('#experience').text(obj.experiences[0].type);
            $('#opportunity').text(obj.opportunities[0].type);
            $('#time').text(obj.times[0].type);
        }
    });
}

// Using AJAX for to get Alternatives
function getAlternatives(list) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Convert String response to Json
            var alternatives = JSON.parse(this.responseText);
            // Reusing variable by putting Json to Array
            alternatives = Object.entries(alternatives);
            alternatives.forEach(function(alt, index) {
                list.children[index].innerHTML = alt[1].content;
                list.children[index].setAttribute(
                    'class', alt[1].type == 1 ? 'text-warning font-weight-bold' : ''
                );
            });
        }
    }
    xhttp.open("GET", "/admin/challenges/alternatives/" + idQuestion, true);
    xhttp.send();
    // Here it is very important, when the update button is clicked, it will cancel the AJAX request.
    $('#btnFormChallenge').on('click', function(event) {
        xhttp.abort(); // Because it was not showing the message of success
    });
}

// Loading Animation when update button be clicked
$('#btnFormChallenge').on('click', function(event) {
    if ($('#btnFormChallenge')[0].textContent == 'Update') {
        $('.loading').css('display', 'block');
    } else {
        var count = 0;
        $('select').each(function() {
            if (this.value > 0) {
                count++;
                if (count == 11) {
                    $('.loading').css('display', 'block');
                }
            }
        })
    }
});