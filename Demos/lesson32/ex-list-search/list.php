<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <input id='search-input' type='text' name="filter" placeholder="recherche">
        <script>
            var searchInput = document.getElementById('search-input');
            var searchListener  = searchInput.addEventListener('keyup', search)
            function search(event) {
                var filter = event.target.value;
                console.log(filter);
                // requête
                // récupérer le body de la réponse
                // injecter la réponse HTML (non fait ici)
            }
        </script>
    </body>
</html>
