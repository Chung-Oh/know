// Variables where will separated questions
var beg = [];
    int = [];
    adv = [];
    eru = [];
// List Categories
var geo = [];
    mat = [];
    por = [];
    sci = [];
    sto = [];

// Condition for Mobile when page reload, will show message on Card Graph
if (window.innerWidth <= 485) {
    $('.text-warning').removeAttr('hidden');
}

// Condition for Mobile when change screen between Portrait and Landscape
window.addEventListener('orientationchange', function() {
    if (window.innerWidth <= 485) {
        $('.text-warning').attr('hidden', true);
    } else {
        $('.text-warning').removeAttr('hidden');
    }
})

// Verify path, only Challenge page
if (window.location.pathname == '/admin/challenges') {
    var list = [];
    // Getting list questions
    var questions = JSON.parse($('#questionGraph')[0].dataset.questions)
    Object.keys(questions).forEach(function(key) {
        list.push(questions[key]);
    })
    getLevel(list);
}

// Separates questions by level
function getLevel(list) {
    $(list).each(function(index, question) {
        if (question.level_id == 1) {
            beg.push(question);
        } else if (question.level_id == 2) {
            int.push(question);
        } else if (question.level_id == 3) {
            adv.push(question);
        } else {
            eru.push(question);
        }
    });
    getCategory(beg, $('.beginner'));
    getCategory(int, $('.intermediate'));
    getCategory(adv, $('.advanced'));
    getCategory(eru, $('.erudit'));
}

// Separates questions by category
function getCategory(level, target) {
    $(level).each(function(index, question) {
        if (question.category_id == 1) {
            geo.push(question);
        } else if (question.category_id == 2) {
            mat.push(question);
        } else if (question.category_id == 3) {
            por.push(question);
        } else if (question.category_id == 4) {
            sci.push(question);
        } else {
            sto.push(question);
        }
    });
    isChallenge(geo, mat, por, sci, sto, target);
    cleanCategory();
}

// Clean all variables to pass again
function cleanCategory() {
    geo.length = 0;
    mat.length = 0;
    por.length = 0;
    sci.length = 0;
    sto.length = 0;
}

// Check if it is a challenge, any remaining values ​​will be filled in the Card Graph
function isChallenge(geo, mat, por, sci, sto, target) {
    sumGeo = geo.length;
    sumMat = mat.length;
    sumPor = por.length;
    sumSci = sci.length;
    sumSto = sto.length;
    total = sumGeo + sumMat + sumPor + sumSci + sumSto;
    for (var i = 0; i <= total; i++) {
        if (sumGeo >= 2 && sumMat >= 2 && sumPor >= 2 && sumSci >= 2 && sumSto >= 2) {
            sumGeo -= 2;
            sumMat -= 2;
            sumPor -= 2;
            sumSci -= 2;
            sumSto -= 2;
            total -= 10;
        }
    }
    checkCount(sumGeo, sumMat, sumPor, sumSci, sumSto, target);
}

// Check each category and pass to next function to fill the circle
function checkCount(geo, mat, por, sci, sto, target) {
    target.each(function(index, obj) {
        if (index == 0) {
            fill(geo, this);
        } else if (index == 1) {
            fill(mat, this);
        } else if (index == 2) {
            fill(por, this);
        } else if (index == 3) {
            fill(sci, this);
        } else if (index == 4) {
            fill(sto, this);
        }
    });
}

// Fill values getted in the Card Graph
function fill(category, target) {
    if (category == 1) {
        changeColor(target, 1);
    } else if (category >= 2) {
        changeColor(target, 2);
    }
}

// Change the color of Card Graph
function changeColor(target, type) {
    if (type == 1) {
        $(target.children[0]).removeClass('bg-secondary').addClass('bg-success');
    } else if (type == 2) {
        $(target.children[0]).removeClass('bg-secondary').addClass('bg-success');
        $(target.children[1]).removeClass('bg-secondary').addClass('bg-success');
    }
}