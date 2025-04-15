
function loadHTML(elementId, filePath) {
            fetch(filePath)
                .then(response => response.text())
                .then(data => {
                    document.getElementById(elementId).innerHTML = data;
                })
                .catch(error => console.error('Error loading the file:', error));
        }

        loadHTML('bodytrang', 'body.html');
        loadHTML('footertrang','footer.html')
        loadHTML('headertrang', 'header.php');


        