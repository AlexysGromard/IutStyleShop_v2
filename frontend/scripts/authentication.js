document.addEventListener('keyup', function(e) {
    if (e.target.tagName === 'INPUT') {
        goToNextInput(e);
    }
});

document.addEventListener('keydown', function(e) {
    if (e.target.tagName === 'INPUT') {
        onKeyDown(e);
    }
});

document.addEventListener('click', function(e) {
    if (e.target.tagName === 'INPUT') {
        onFocus(e);
    }
});

function goToNextInput(e) {
    var key = e.which;
    var t = e.target;
    var sib = t.nextElementSibling;

    if (key !== 9 && (key < 48 || key > 57)) {
        e.preventDefault();
        return false;
    }

    if (key === 9) {
        return true;
    }

    // Correction : Vérifiez si sib est null avant d'appeler querySelector
    if (!sib) {
        sib = t.parentElement.nextElementSibling;
        if (sib) {
            sib = sib.querySelector('input');
        }
    }

    if (sib) {
        sib.select();
        sib.focus();
    }
}

function onKeyDown(e) {
    var key = e.which;

    if (key === 9 || (key >= 48 && key <= 57)) {
        return true;
    }

    e.preventDefault();
    return false;
}

function onFocus(e) {
    e.target.select();
}
