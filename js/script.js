function hello() {
    console.log("Hello!");
}

function removeHideClass(id) {
    document.getElementById(id).classList.remove('d-none')
    let myTimeout = setTimeout(fadeOut.bind(null, id), 4000);
    myTimeout = setTimeout(addHideClass.bind(null, id), 5000);
}

function fadeOut(id) {
    document.getElementById(id).classList.add('fade-out')
}

function addHideClass(id) {
    document.getElementById(id).classList.add('d-none')
}

function userEdit(id) {
    console.log(id)
    window.location.href = 'components/user-edit.php?id='+id;
}