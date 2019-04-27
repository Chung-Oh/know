// Levels list
var beg = []
    int = []
    adv = []
    eru = []
// Categories List
var geo = []
    mat = []
    por = []
    sci = []
    sto = []
// Sum all questions of each category
var sumGeo = 0
    sumMat = 0
    sumPor = 0
    sumSci = 0
    sumSto = 0

// Verify if have a paragraphy with dataset, if has this element
if ($('#questions-panel')[0]) {
    // so create a list to filtered by level and category
    var list = JSON.parse($('#questions-panel')[0].dataset.questions)
    Object.keys(list).forEach(function(key) {
        // Conditions to filter by Levels
        if (list[key].level_id == 1) {
            beg.push(list[key])
        } else if (list[key].level_id == 2) {
            int.push(list[key])
        } else if (list[key].level_id == 3) {
            adv.push(list[key])
        } else {
            eru.push(list[key])
        }
    })
    // Function where you set up a call to next, where you will filter categories from a list of levels.
    // It also calls the function where it performs total sum of prepared challenges
    beginFiltering()
}

// Calls all functions to perform filtering and algorithm when a challenge is ready
function beginFiltering() {
    // After of filtered the levels then call to filter by Categories
    // First arg is id level, second is the list objects and third is element where will put count
    getCategory(1, beg, $('#Beginning')[0])
    getCategory(2, int, $('#Intermediate')[0])
    getCategory(3, adv, $('#Advanced')[0])
    getCategory(4, eru, $('#Erudit')[0])
    // Calls the function where it performs total sum of prepared challenges
    sumTotal(
        $('#Beginning')[0],
        $('#Intermediate')[0],
        $('#Advanced')[0],
        $('#Erudit')[0],
        $('#totalReady')[0]
    )
}

// Filter by Category
function getCategory(idLevel, list, target) {
    // Run the list passed in parameter
    $(list).each(function() {
        // The conditions are by category and level(this passed by parameter)
        if (this.category_id == 1 && this.level_id == idLevel) {
            geo.push(this)
        } else if (this.category_id == 2 && this.level_id == idLevel) {
            mat.push(this)
        } else if (this.category_id == 3 && this.level_id == idLevel) {
            por.push(this)
        } else if (this.category_id == 4 && this.level_id == idLevel) {
            sci.push(this)
        } else if (this.category_id == 5 && this.level_id == idLevel) {
            sto.push(this)
        }
    })
    // Pass the filtered category count and the element where you will get the final value
    levelSum(geo.length, mat.length, por.length, sci.length, sto.length, target)
    // Clean all categories to be used the next call
    cleanCategories(geo, mat, por, sci, sto)
}

// Sum of category question
function levelSum(geo, mat, por, sci, sto, target) {
    sumGeo = geo
    sumMat = mat
    sumPor = por
    sumSci = sci
    sumSto = sto
    // Once you pick up the past values, pass to the next function together with
    // element target and value 0 to be use in the increment on table
    checkSum(sumGeo, sumMat, sumPor, sumSci, sumSto, target, 0)
}

// Clean all Categories array to next call
function cleanCategories(geo, mat, por, sci, sto) {
    geo.length = 0
    mat.length = 0
    por.length = 0
    sci.length = 0
    sto.length = 0
}

// Check if is a challenge ready
function checkSum(sumGeo, sumMat, sumPor, sumSci, sumSto, target, init) {
    // Total variable will be use to stop the condition
    var total = sumGeo + sumMat + sumPor + sumSci + sumSto
    // Get the value passed in the variable init and put in the variable question
    // it will be used to represent the value of the challenge that is ready
    var question = init
    for (var i = 0; i <= total; i++) {
        if (sumGeo >= 2 && sumMat >= 2 && sumPor >= 2 && sumSci >= 2 && sumSto >= 2) {
            // If enter this condition, the question variable will be incremented
            question++
            target.innerHTML = question
            // All variables that has count of categories will be decremented
            sumGeo -= 2
            sumMat -= 2
            sumPor -= 2
            sumSci -= 2
            sumSto -= 2
        }
    }
}

// Sum of all challenges prepared to be created
function sumTotal(beg, int, adv, eru, total) {
    total.innerHTML = Number(beg.textContent)
        + Number(int.textContent)
        + Number(adv.textContent)
        + Number(eru.textContent)
}