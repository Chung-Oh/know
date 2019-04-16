// Fields in the Form vinculated in Level Challenge
var time = $('#times')
var experience = $('#experiences')
var opportunity = $('#opportunities')
// Element Select of Categories
var selectGeography = $('.questionGeography')
var selectMathematics = $('.questionMathematics')
var selectPortuguese = $('.questionPortuguese')
var selectScience = $('.questionScience')
var selectStory = $('.questionStory')

// Primary selection element in form, added event change here
$('#levelChallengeId').change(function() {
    allSelectQuestion() // Placing event of changes in the Selection of Questions
    cleanOptionPrimary() // Clean All tag Select
    // Here is Very Important, where we took the Option that was Selected in the Form
    var select = $('#levelChallengeId').find(':selected')

    // Convert string to JSON object
    var contentsLevel = JSON.parse(select[0].dataset.levelChallenge)
    var questions = JSON.parse(select[0].dataset.questions)

    // About Level Challenge
    time.text(contentsLevel.times[0].type)
    experience.text(contentsLevel.experiences[0].type)
    opportunity.text(contentsLevel.opportunities[0].type)

    // Questions bellow Form
    var option = Object.entries(questions)

    // Placing the options in the correct categories
    option.forEach(function(item) {
        // Condition to know if the category is right and if the question does not have a challenge
        if (item[1].category_id == 1 && item[1].challenge_id == null) {
            selectGeography.append("<option class='option-sec' data-content='" + item[1].content + "' value='"
                + item[1].id + "'>"  + contentHandler(item[1].content) + "</option>")
        }
        if (item[1].category_id == 2 && item[1].challenge_id == null) {
            selectMathematics.append("<option class='option-sec' data-content='" + item[1].content + "' value='"
                + item[1].id + "'>"  + contentHandler(item[1].content) + "</option>")
        }
        if (item[1].category_id == 3 && item[1].challenge_id == null) {
            selectPortuguese.append("<option class='option-sec' data-content='" + item[1].content + "' value='"
                + item[1].id + "'>"  + contentHandler(item[1].content) + "</option>")
        }
        if (item[1].category_id == 4 && item[1].challenge_id == null) {
            selectScience.append("<option class='option-sec' data-content='" + item[1].content + "' value='"
                + item[1].id + "'>"  + contentHandler(item[1].content) + "</option>")
        }
        if (item[1].category_id == 5 && item[1].challenge_id == null) {
            selectStory.append("<option class='option-sec' data-content='" + item[1].content + "' value='"
                + item[1].id + "'>"  + contentHandler(item[1].content) + "</option>")
        }
    })
})
// Placing Change Events in Select Questions
function allSelectQuestion() {
    // Generic variable to work with question content
    var content
    // When the question is selected the loop will go through and put the information in detail
    for (var i = 1; i <= 10; i++) {
        $('#question' + i).change(function(elemSelect) {
            // Remove attribute hidden of detail tag
            tagDetail = elemSelect.target.parentNode.children[1]
            tagDetail.removeAttribute('hidden')
            // Getting paragraphy of detail
            content = elemSelect.target.parentNode.children[1].children[1].children[0]
            // Put content in paragraphy
            content.innerHTML = elemSelect.target.options[elemSelect.target.options.selectedIndex].dataset.content
            idQuestion = elemSelect.target.options[elemSelect.target.options.selectedIndex].value
            tagOL = elemSelect.target.parentNode.children[1].children[2]

            // Using Ajax for to get Alternatives
            var xhttp = new XMLHttpRequest()
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Convert String response to Json
                    alternatives = JSON.parse(this.responseText)
                    // Reusing variable by putting Json to Array
                    alternatives = Object.entries(alternatives)
                    alternatives.forEach(function(alt, index) {
                        tagOL.children[index].innerHTML = alt[1].content
                        tagOL.children[index].setAttribute(
                            'class', alt[1].type == 1 ? 'text-warning font-weight-bold' : ''
                        )
                    })
                }
            }
            xhttp.open("GET", "/admin/challenges/" + idQuestion, true)
            xhttp.send()
        })
    }
}
// Clean options of select tag
function cleanOptionPrimary() {
    // This option-sec was create when primary select was changed, this code be there above in loop and condition if
    $('.option-sec').remove()
    // Clear the all Sub Categories Selection Elements
    for (var i = 0; i < 2; i++) {
        selectGeography[i][0].selected = true
        selectMathematics[i][0].selected = true
        selectPortuguese[i][0].selected = true
        selectScience[i][0].selected = true
        selectStory[i][0].selected = true
    }
    // When primary switch is changed it will hide the details
    var details = $('details')
    details.each(function(index, item) {
        item.setAttribute('hidden', true)
        item.removeAttribute('open')
    })
}
// Manipulate string to short
function contentHandler(content) {
    return content.length >= 50 ? (content.slice(0, 50) + '...') : content
}