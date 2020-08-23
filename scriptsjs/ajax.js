function searchData() {
    let name = document.getElementById('search-name').value
    let result = document.getElementById('jumbotron-person')
    let ajax = new XMLHttpRequest()

    result.innerHTML = '<img src="img/loading_icon.jpg" width="120px">'

    ajax.open('GET', `main.php?search-name=${name}`, true)

    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            if (ajax.status == 200) {
                result.innerHTML = ajax.responseText
            } else {
                result.innerHTML = `There was a connection error: ${ajax.statusText}!`
            }
        }
    }

    ajax.send(null)

}

function insertData() {

    let name = document.getElementById('insertName').value
    let address = document.getElementById('insertAddress').value
    let phone_contact = document.getElementById('insertPhone').value
    let email = document.getElementById('insertEmail').value

    console.log(name, address, phone_contact, email)

    let response = document.getElementById('res')

    let ajax = new XMLHttpRequest()

    response.innerHTML = '<img src="img/loading_icon.jpg" width="120px">'

    ajax.open("GET", `main.php?name=${name}&address=${address}&phone_contact=${phone_contact}&email=${email}`, true)

    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            if (ajax.status == 200) {
                response.innerHTML = ajax.responseText
            } else {
                response.innerHTML = `There was a connection error: ${ajax.statusText}!`
            }
        }
    }

    ajax.send(null)

}

function deleteStudent(id) {
    let result = document.getElementById('jumbotron-person')
    let ajax = new XMLHttpRequest()

    result.innerHTML = '<img src="img/loading_icon.jpg" width="120px">'


    ajax.open('GET', `main.php?delete=${id}`, true)

    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            if (ajax.status == 200) {
                result.innerHTML = ajax.responseText
            } else {
                result.innerHTML = `There was a connection error: ${ajax.statusText}!`
            }
        }
    }

    ajax.send(null)
}
