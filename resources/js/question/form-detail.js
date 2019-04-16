$('#formDetail').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var question = button.data('question') // Extract info from data-* attributes
    var alt1 = button.data('alt1')
    var alt2 = button.data('alt2')
    var alt3 = button.data('alt3')
    var alt4 = button.data('alt4')
    var alt5 = button.data('alt5')

    var modal = $(this)
    modal.find('#formQuestionModalLabel').text('Question details with ID : ' + question.id)
    modal.find('#level').text(question.levels[0].name)
    modal.find('#category').text(question.categories[0].name)
    modal.find('#contentQuestion').val(question.content)
    modal.find('#alt1').text(alt1[0].content)
    modal.find('#alt2').text(alt2[0].content)
    modal.find('#alt3').text(alt3[0].content)
    modal.find('#alt4').text(alt4[0].content)
    modal.find('#alt5').text(alt5[0].content)
    modal.find('#creator').text(question.users[0].name)
    modal.find('#created_at').text(question.created_at)
    modal.find('#updated_at').text(question.updated_at == question.created_at
        ? 'N/D'
        : question.updated_at)

    // Looking by true alternative
    var alternatives = []
    alternatives.push(alt1, alt2, alt3, alt4, alt5)
    alternatives.forEach(function(alt) {
        if (alt[0].type === 1) {
            modal.find('#altTrue').text('True is : "' + alt[0].content + '".')
        }
    })
})