document.getElementById('buttonSubmitConnexion').addEventListener('click', function (e){
    e.preventDefault();

    fetch(HOME_URL,{
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify('Ma première requête')
    })
    .then(response => response.json())
    .then(data => console.log(data));
})