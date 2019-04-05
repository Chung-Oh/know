$('#formDetail').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget) // Button that triggered the modal
    let question = button.data('question') // Extract info from data-* attributes
    let alt1 = button.data('alt1')
    let alt2 = button.data('alt2')
    let alt3 = button.data('alt3')
    let alt4 = button.data('alt4')
    let alt5 = button.data('alt5')

    let modal = $(this)
    modal.find('#formQuestionModalLabel').text('Question details with ID : ' + question.id)
    modal.find('#category').val(question.categories[0].name)
    modal.find('#level').val(question.levels[0].name)
    modal.find('#contentQuestion').val(question.content)
    modal.find('#alt1').text(alt1[0].content)
    modal.find('#alt2').text(alt2[0].content)
    modal.find('#alt3').text(alt3[0].content)
    modal.find('#alt4').text(alt4[0].content)
    modal.find('#alt5').text(alt5[0].content)
    modal.find('#creator').val(question.users[0].name)
    modal.find('#created_at').val(dateFull(question.created_at))
    modal.find('#updated_at').val(dateFull(question.updated_at) == dateFull(question.created_at)
        ? 'No update'
        : dateFull(question.updated_at))

    // Looking by true alternative
    let alternatives = []
    alternatives.push(alt1, alt2, alt3, alt4, alt5)
    alternatives.forEach(function (alt) {
        if (alt[0].type === 1) {
            modal.find('#altTrue').text('True is : ' + alt[0].content)
        }
    })
})

function dateHandler(date) {
    var day = date.slice(8, 10)
    var month = date.slice(5, 7)
    var year = date.slice(0, 4)
    var msg = day + '/' + month + '/' + year

    return msg
}

function timeHandler(date) {
    var second = date.slice(17, 19)
    var minute = date.slice(14, 16)
    var hour = date.slice(11, 13)
    var msg = hour + ':' + minute + ':' + second + ' hrs - '

    return msg
}

function dateFull(date) {
    var dat = dateHandler(date)
    var time = timeHandler(date)
    var msg = time + dat

    return msg
}