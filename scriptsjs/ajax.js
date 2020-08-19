function searchData() {
    let name = document.getElementById('search-name').value
    let result = document.getElementById('jumbotron-person')
    let ajax = new XMLHttpRequest()

    ajax.open('GET', `main.php?search-name=${name}`, true)

    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4){
            if(ajax.status == 200) {
                result.innerHTML = ajax.responseText
            } else {
                result.innerHTML = `There was a connection error: ${ajax.statusText}!`
            }
        }
    }

    ajax.send(null)

}