// // All categories cards
var beginningWait = $('.BeginningWait')
var intermediateWait = $('.IntermediateWait')
var advancedWait = $('.AdvancedWait')
var eruditWait = $('.EruditWait')
// Card Ready
var beginningReady = $('#BeginningReady')
var intermediateReady = $('#IntermediateReady')
var advancedReady = $('#AdvancedReady')
var eruditReady = $('#EruditReady')

function bindCard(current, target) {
    // Get value of current to work
    var geo =  Number(current[0].textContent)
    var mat =  Number(current[1].textContent)
    var por =  Number(current[2].textContent)
    var sci =  Number(current[3].textContent)
    var sto =  Number(current[4].textContent)
    // Adding all questions and dividing to loop through
    var all = Math.round((geo + mat + por + sci + sto) / 10)
    // Variable responsible for to sum and add to in target
    var sum = 0

    for (var i = 0; i <= all; i++) {
        // Condition where all questions have two questions
        if (geo >= 2 && mat >= 2 && por >= 2 && sci >= 2 && sto >= 2) {
            // If enter this condition, the sum variable will receive the value
            sum += 10
            // All categories will decrements to dont enter this condition again
            geo = geo - 2
            mat = mat - 2
            por = por - 2
            sci = sci - 2
            sto = sto - 2
            // Here the sum variable will place the value on the target rounded to down
            target[0].textContent = Math.floor(sum / 10)
        }
    }
    // Clean sum variable to next call
    sum = 0
}

// Condition for just the page of questions, no error on other pages
if (window.location.pathname == '/admin/questions') {
    bindCard(beginningWait, beginningReady)
    bindCard(intermediateWait, intermediateReady)
    bindCard(advancedWait, advancedReady)
    bindCard(eruditWait, eruditReady)
    sumReady()
}

// Sum all questions ready
function sumReady() {
    sum = 0
    sum += Number($(beginningReady)[0].textContent)
    sum += Number($(intermediateReady)[0].textContent)
    sum += Number($(advancedReady)[0].textContent)
    sum += Number($(eruditReady)[0].textContent)
    $('#totalReady')[0].innerHTML = sum
}