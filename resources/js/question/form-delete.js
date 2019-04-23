$('#formDeleteQuestion').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var question = button.data('question') // Extract info from data-* attributes

    var modal = $(this)
    modal.find('#idQuestion').val(question.id)
    modal.find('#idMessage').text('Question ID : ' + question.id)
    modal.find('#question').text(question.content)

    // Put event of click to show Loading Animation component
    $('#delete').on('click', function() {
        $('.loading').css('display', 'block')
    })
})