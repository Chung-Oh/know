 $('#formQuestion').on('show.bs.modal', function (event) {
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
        modal.find('#question').val('Question...')
        modal.find('#alternative1').val('Alternative 1')
        modal.find('#alternative2').val('Alternative 2')
        modal.find('#alternative3').val('Alternative 3')
        modal.find('#alternative4').val('Alternative 4')
        modal.find('#alternative5').val('Alternative 5')
        modal.find('#radioAlternative1').prop('checked', true)
        modal.find('#btnFormQuestion').text('To save')
    }
})