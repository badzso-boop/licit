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

function userDelete(id) {
    console.log(id)
    window.location.href = 'components/user-delete.php?id='+id;
}

function showAlert(szoveg, link) {
    alert(szoveg);
    window.location.href = link;
}

function show(id) {
    switch (id) {
        case "users":
            document.getElementById(id).classList.remove('d-none')
            document.getElementById("products").classList.add('d-none')
            break;
        case "products":
            document.getElementById(id).classList.remove('d-none')
            document.getElementById("users").classList.add('d-none')
            break;
    }
}