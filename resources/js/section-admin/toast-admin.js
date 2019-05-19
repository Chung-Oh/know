// Levels list
var beg = [];
    int = [];
    adv = [];
    eru = [];
// Categories List
var geo = [];
    mat = [];
    por = [];
    sci = [];
    sto = [];
// Sum all questions of each category
var sumGeo = 0;
    sumMat = 0;
    sumPor = 0;
    sumSci = 0;
    sumSto = 0;
    incToast = 0;

// Checks if this is the administrator section, function only for this section
if (window.location.pathname == '/admin/dashboard'
    || window.location.pathname == '/admin/questions'
    || window.location.pathname == '/admin/challenges'
    || window.location.pathname == '/admin/history'
    || window.location.pathname == '/admin/feedback') {
    initToast();
}

// Main function of Toast where call the all dependencies
function initToast() {
    // Verify if have a paragraphy with dataset, if has this element
    if ($('#questionsToast')[0].dataset.questions.length > 2) {
        // so create a list to filtered by level and category
        var list = JSON.parse($('#questionsToast')[0].dataset.questions);
        Object.keys(list).forEach(function(key) {
            // Conditions to filter by Levels
            if (list[key].level_id == 1) {
                beg.push(list[key]);
            } else if (list[key].level_id == 2) {
                int.push(list[key]);
            } else if (list[key].level_id == 3) {
                adv.push(list[key]);
            } else {
                eru.push(list[key]);
            }
        });
        // Function where you set up a call to next, where you will filter categories from a list of levels.
        // It also calls the function where it performs total sum of prepared challenges
        beginFiltering();
    }
}

// Calls all functions to perform filtering and algorithm when a challenge is ready
function beginFiltering() {
    // After of filtered the levels then call to filter by Categories
    // First arg is id level, second is the list objects, third message and fourth last register
    getCategory(1, beg, 'Beginner', $('#questionsBeg')[0].dataset.questions);
    getCategory(2, int, 'Intermediate', $('#questionsInt')[0].dataset.questions);
    getCategory(3, adv, 'Advanced', $('#questionsAdv')[0].dataset.questions);
    getCategory(4, eru, 'Erudit', $('#questionsEru')[0].dataset.questions);
}

// Filter by Category
function getCategory(idLevel, list, msg, lastRegister) {
    if (list.length > 0) {
        // Run the list passed in parameter
        $(list).each(function() {
            // The conditions are by category and level(this passed by parameter)
            if (this.category_id == 1 && this.level_id == idLevel) {
                geo.push(this);
            } else if (this.category_id == 2 && this.level_id == idLevel) {
                mat.push(this);
            } else if (this.category_id == 3 && this.level_id == idLevel) {
                por.push(this);
            } else if (this.category_id == 4 && this.level_id == idLevel) {
                sci.push(this);
            } else if (this.category_id == 5 && this.level_id == idLevel) {
                sto.push(this);
            }
        })
        // Pass the filtered category count and the element where you will get the final value
        levelSum(geo.length, mat.length, por.length, sci.length, sto.length, msg, lastRegister);
        // Clean all categories to be used the next call
        cleanCategories(geo, mat, por, sci, sto);
    }
}

// Sum of category question
function levelSum(geo, mat, por, sci, sto, msg, lastRegister) {
    sumGeo = geo;
    sumMat = mat;
    sumPor = por;
    sumSci = sci;
    sumSto = sto;
    // Once you pick up the past values, pass to the next function together
    checkSum(sumGeo, sumMat, sumPor, sumSci, sumSto, msg, lastRegister);
}

// Clean all Categories array to next call
function cleanCategories(geo, mat, por, sci, sto) {
    geo.length = 0;
    mat.length = 0;
    por.length = 0;
    sci.length = 0;
    sto.length = 0;
}

// Check if is a challenge ready
function checkSum(sumGeo, sumMat, sumPor, sumSci, sumSto, msg, lastRegister) {
    // Get date of last register
    var date = getLastRegister(lastRegister);
    var pass = 0; // Variable to verify if has challenge ready
    var sumChallenge = 0; // Sum of challenges ready
    // Total variable will be use to stop the condition
    var total = sumGeo + sumMat + sumPor + sumSci + sumSto;
    for (var i = 0; i <= total; i++) {
        if (sumGeo >= 2 && sumMat >= 2 && sumPor >= 2 && sumSci >= 2 && sumSto >= 2) {
            // If enter this condition, the incToast, pass and sumChallenge variable will be incremented
            incToast++;
            pass++;
            sumChallenge++;
            // All variables that has count of categories will be decremented
            sumGeo -= 2;
            sumMat -= 2;
            sumPor -= 2;
            sumSci -= 2;
            sumSto -= 2;
        }
    }
    if (pass) {
        // Condition to create a Toast with informations about Challenge
        var newMessage = sumChallenge + 'x ' + msg;
        newToast(incToast, date, newMessage);
    }
}

// Treat object to get Date of last register
function getLastRegister(obj) {
    var register = JSON.parse(obj);
    return register.updated_at;
}

// This create a new Toast
function newToast(inc, time, msg) {
    $('.container-toast').append(`
        <div class="toast-parent` + inc + `" aria-live="polite" aria-atomic="true" style="position: relative; min-height: 100px;">
            <!-- Position it -->
            <div class="toast-child pt-0">
                <!-- Then put toasts within -->
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                    <div class="toast-header">
                        <img src="../../favicon.ico" class="rounded mr-2" alt="Logo Eu Sei">
                        <strong class="mr-auto">Challenge ready</strong>
                        <small class="text-muted ml-1">` + time + `</small>
                        <button type="button" class="ml-2 mb-1 close close-toast" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        <span class="font-weight-bold">`+ msg + `</span> challenge ready to create
                    </div>
                </div>
            </div>
        </div>
    `);
}

// Toasts must be initialized with jQuery: select the specified element and call the toast() method
$(document).ready(function(){
    // Time life of the Toast
    setTimeout(function() {
        $('.container-toast').fadeOut(10000);
    }, 5000);
    // Initialized with jQuery method
    $('.toast').toast('show');
    // Putting event listener on buttons to close Toast
    closeToast();
})

// Close Toast when click
function closeToast() {
    // Run all objects that has class of toast button to close, and putting events of click for close
    $('.close-toast').each(function(index, obj) {
        obj.addEventListener('click', function() {
            // Get parent element to close when button was clicked
            $(this.parentNode.parentNode.parentNode.parentNode).remove();
        });
    });
}