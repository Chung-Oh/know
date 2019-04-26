$('#formCreateQuestion').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var question = button.data('question') // Extract info from data-* attributes
    var alt1 = button.data('alt1')
    var alt2 = button.data('alt2')
    var alt3 = button.data('alt3')
    var alt4 = button.data('alt4')
    var alt5 = button.data('alt5')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    // This condition serve to evite bug when for create questions
    if (question) {
        // Modal Form Edit
        modal.find('#formQuestionModalLabel').text('Update Question with ID : ' + question.id)
        modal.find('form').attr('action', '/admin/questions/update')
        modal.find('#idQuestion').val(question.id)
        // Need remove attribute selected to display the value real when will edit
        modal.find('#categoryId').attr('selected', false)
        modal.find('#categoryId').attr('selected', true)
        modal.find('#levelId').attr('selected', false)
        modal.find('#levelId').attr('selected', true)

        modal.find('#categoryId').prop('value', question.category_id)
        modal.find('#categoryId').text(question.categories[0].name)
        modal.find('#levelId').prop('value', question.level_id)
        modal.find('#levelId').text(question.levels[0].name)
        modal.find('#question').val(question.content)
        modal.find('#alternative1').val(alt1[0].content)
        modal.find('#alternative2').val(alt2[0].content)
        modal.find('#alternative3').val(alt3[0].content)
        modal.find('#alternative4').val(alt4[0].content)
        modal.find('#alternative5').val(alt5[0].content)
        modal.find('#radioAlternative1').prop('checked', alt1[0].type === 1 ? true : false)
        modal.find('#radioAlternative2').prop('checked', alt2[0].type === 1 ? true : false)
        modal.find('#radioAlternative3').prop('checked', alt3[0].type === 1 ? true : false)
        modal.find('#radioAlternative4').prop('checked', alt4[0].type === 1 ? true : false)
        modal.find('#radioAlternative5').prop('checked', alt5[0].type === 1 ? true : false)
        modal.find('#btnFormQuestion').text('Update')
    } else {
        // Modal Form Create - here clean form
        modal.find('#formQuestionModalLabel').text('New Question')
        modal.find('form').attr('action', '/admin/questions/new')
        modal.find('#idQuestion').val('')
        modal.find('#categoryId').prop('value', '')
        modal.find('#categoryId').text('Choose a Category')
        modal.find('#levelId').prop('value', '')
        modal.find('#levelId').text('Choose a Level')
        // Remove content in field
        modal.find('#question').val('')
        modal.find('#alternative1').val('')
        modal.find('#alternative2').val('')
        modal.find('#alternative3').val('')
        modal.find('#alternative4').val('')
        modal.find('#alternative5').val('')
        // Put message in field
        modal.find('#question').attr('placeholder', 'Question...')
        modal.find('#alternative1').attr('placeholder', 'Alternative 1')
        modal.find('#alternative2').attr('placeholder', 'Alternative 2')
        modal.find('#alternative3').attr('placeholder', 'Alternative 3')
        modal.find('#alternative4').attr('placeholder', 'Alternative 4')
        modal.find('#alternative5').attr('placeholder', 'Alternative 5')
        modal.find('#radioAlternative1').prop('checked', true)
        modal.find('#btnFormQuestion').text('To save')
    }
})

// Loading Animation
$('#btnFormQuestion').on('click', function() {
    if ($('#btnFormQuestion')[0].textContent == 'Update') {
        $('.loading').css('display', 'block')
    } else {
        verifyFields()
    }
})

// Verify all inputs for to show Loading Animation to Form Create
function verifyFields() {
    verifySelect()
}
// Checks if Select fields have been triggered, if yes call function to check Text Area
function verifySelect() {
    var count = 0
    $('select').each(function() {
        count += Number(this.value)
        if (count >= 2) {
            verifyTextArea()
        }
    })
}
// Checks if the Text Area fields have been triggered, if yes
function verifyTextArea() {
    // Call the function to check the alternatives Input
    var arg = $('textArea')[0].value
    if (arg.length >= 1) {
        verifyInput()
    }
}
// Checks all if the Input fields have been triggered, if yes
function verifyInput() {
    var count = 0
    for (var i = 1; i <= 5; i++) {
        if ($('#alternative' + i)[0].value != '') {
            count++
            if (count == 5) {
                // Call the function to show Loading Animation
                $('.loading').css('display', 'block')
            }
        }
    }
}