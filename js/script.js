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
    window.location.href = '../components/user-edit.php?id='+id;
}

function userDelete(id) {
    console.log(id)
    window.location.href = '../components/user-delete.php?id='+id;
}

function profile(id) {
    console.log(id)
    window.location.href = '../profile.php?id='+id;
}

function showAlert(szoveg, link) {
    alert(szoveg);
    window.location.href = link;
}

async function addInputs(linkek,name, placeholder) {
    let links = await document.getElementById(name)
    let t = linkek.split(",")
    
    for (let i = 0; i < 5; i++) {
        let input = document.createElement("input");
        
        input.type = "text"
        input.name = name + i
        input.classList.add("form-control")
        input.classList.add("my-2")
        input.placeholder = placeholder
        if (t[i] == undefined) {
            input.value = ""
        }
        else {
            input.value = t[i]
        }

        links.appendChild(input)
    }
}