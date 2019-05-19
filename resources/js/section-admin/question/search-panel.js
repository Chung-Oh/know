// Manipulate columns depending on screen size
function checkDevice() {
    if (window.location.pathname == '/admin/questions') {
        if (window.innerWidth >= 995) {
            $('.sort-icon').removeAttr('hidden');
        } else if (window.innerWidth <= 485) {
            // Hidden icon sort
            $('.sort-icon').attr('hidden', true);
            // Hidden columns
            $('.more-info').attr('hidden', true);
            // Message to see more information Landscape
            $('#infoLand').removeAttr('hidden');
            // Message to see more information Column sort
            $('#infoColumn').removeAttr('hidden');
        } else {
            $('.sort-icon').attr('hidden', true);
            $('.more-info').removeAttr('hidden');
            $('#infoLand').attr('hidden', true);
            $('#infoColumn').removeAttr('hidden');
        }
    }
}

checkDevice(); // initialize the table manipulation

// Listeners to devices mobile, when change orientation
window.addEventListener('orientationchange', function() {
    if (window.innerWidth >= 995) {
        // Condition to Tablet
        $('.sort-icon').attr('hidden', true);
        $('.more-info').removeAttr('hidden');
        $('#infoColumn').removeAttr('hidden');
    } else if (window.innerWidth >= 765) {
        // Condition to Tablet
        $('.sort-icon').removeAttr('hidden');
        $('#infoColumn').attr('hidden', true);
    } else if (window.innerWidth >= 736) {
        // Condition to Mobile
        $('.sort-icon').attr('hidden', true);
        $('.more-info').attr('hidden', true);
        $('#infoLand').removeAttr('hidden');
        $('#infoColumn').removeAttr('hidden');
    } else if (window.innerWidth <= 485) {
        // Condition to Mobile
        $('.sort-icon').attr('hidden', true);
        $('.more-info').removeAttr('hidden');
        $('#infoLand').attr('hidden', true);
        $('#infoColumn').removeAttr('hidden');
    }
})

// Show message of no result
function noResult(cond) {
    if (cond) {
        $('#tbSearch').attr('hidden', true);
        $('#noResult').removeAttr('hidden');
        $('.loading').css('display', 'none');
    } else {
        $('#noResult').attr('hidden', true);
    }
}

// Listen-to-search event works, here it all starts
$('#search').on('click', function() {
    showQuestion($('#searchQuestion')[0].value);
});

// Using AJAX in querying Questions
function showQuestion(content) {
    // Show loading animation
    $('.loading').css('display', 'block');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            cleanRow(); // Clean all rows before the search
            // Condition if searching with empty field, will stop loading animation
            if (this.responseText.length == 2) {
                noResult(1);
            } else {
                showTable(this.responseText);
            }
        }
    }
    xhttp.open("GET", "/admin/questions/show/" + content, true);
    xhttp.send();
}

// Clean all the rows when one new search was be begin
function cleanRow() {
    $('.row-search').remove();
}

// Show table if case have a result or remove if dont have
function showTable(list) {
    if (list.length > 2) {
        $('#tbSearch').removeAttr('hidden');
        listHandler(list);
        // Remove message of No Result
        noResult(0);
    } else {
        $('#tbSearch').prop('hidden', true);
        cleanRow();
        if ($('#searchQuestion')[0].value != '') {
            // Show message No Result when dont have some register
            noResult(1);
        }
    }
}

// Convert the result list to JSON
function listHandler(questions) {
    var questions = JSON.parse(questions);
    $(questions).each(function(index, obj) {
        insert(index, obj);
    });
    checkDevice();
}

// Insert the question passed on parameter in the table row
function insert(index, question) {
    // Hidden loading animation
    $('.loading').css('display', 'none');
    var stringQuestion = JSON.stringify(question);
    var row = (`
        <tr class="row-search">
            <td>` + question.id + `</td>
            <td>` + question.content + `</td>
            <td>` + question.categories[0].name + `</td>
            <td class="more-info">` + question.levels[0].name + `</td>
            <td class="more-info">` + (question.challenge_id == null ? 'N/D' : question.challenge_id) + `</td>
            <td>
                <button type="button" class="btn btn-outline-info btn-sm fas fa-search icon-search" data-toggle="modal" data-target="#formDetailQuestion" data-question='` + stringQuestion + `' hidden></button>
                <button type="button" class="btn btn-outline-success btn-sm fas fa-pencil-alt" data-toggle="modal" data-target="#formCreateQuestion" data-question='` + stringQuestion + `' hidden></button>
                <button type="button" class="btn btn-outline-danger btn-sm fas fa-trash-alt" data-toggle="modal" data-target="#formDeleteQuestion" data-question='` + stringQuestion + `' hidden></button>
            </td>
        </tr>
    `);
    var table = $('#tbSearch tbody').append(row);
    getAlternatives(table[0].children[index], question.id);
    // Let the plugin know that we made a update
    // The resort flag set to anything BUT false (no quotes) will trigger an automatic
    // Table resort using the current sort, this code below is very important for the tablesorter to work
    var resort = true;
    $('#tbSearch').trigger('update', [resort]);
    // These two lines serve to correct table error, it updates
}

// Using AJAX for to get Alternatives
function getAlternatives(target, idQuestion) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var run = 1; // Variable to rename data attribute of alternatives
            // Convert String response to Json
            var alternatives = JSON.parse(this.responseText);
            if (alternatives.length == undefined) {
                Object.keys(alternatives).forEach(function(key) {
                    putData(target, run, alternatives[key]);
                    run++;
                })
            } else {
                $(alternatives).each(function(index, obj) {
                    putData(target, run, obj);
                    run++;
                });
            }
        }
    }
    xhttp.open("GET", "/admin/challenges/alternatives/" + idQuestion, true);
    xhttp.send();
    //Put keyup event to stop AJAX, because he has a loop where call another function
    $('#searchQuestion').on('keyup', function() {
        // Important when changing a key, it stops and searches for the next key
        xhttp.abort();
    });
}

// Put alternatives data attribute on elements the row
function putData(target, index, obj) {
    var alt = JSON.stringify(obj);
    target.children[5].children[0].setAttribute('data-alt' + index, '[' + alt + ']');
    target.children[5].children[1].setAttribute('data-alt' + index, '[' + alt + ']');
    if (index == 5) {
        showButton(
            target.children[5].children[0], // Button Detail
            target.children[5].children[1], // Button Edit
            target.children[5].children[2] // Button Delete
        );
    }
}

// Show buttons when all data attributes alternatives was be end
function showButton(buttonDetail, buttonEdit, buttonDelete) {
    $(buttonDetail).removeAttr('hidden');
    $(buttonEdit).removeAttr('hidden');
    $(buttonDelete).removeAttr('hidden');
}