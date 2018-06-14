<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>plants</title>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
        <!-- Bootstrap core CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/narrow-jumbotron.css" rel="stylesheet" type="text/css"/>
        <style>
            .hide {
                display: none;
            }
            .small-font {
                font-size: 0.7em;
            }
        </style>
    </head>
    <body>
        <div class='container' style='max-width: 1000px'>
            <div class='jumbotron' style='border-radius: 20px'>
                <header>
                    <h1 class="display-3">Plant</h1>
                    <hr>
                </header>
                <main>
                    <!-- sous vue.js -->
                    <div id='plant_manager'>
                        <div id='search'>
                            <!-- cet input invoque la fonction search (sans tag form !)-->
                            <input 
                                type='text' 
                                name='familar-name' 
                                class="form-control form-control-lg" 
                                style='text-align: center; border-radius: 15px; max-width: 75%; margin: 0 auto 15px auto;'
                                placeholder='recherche' 
                                onkeyup="search(this.value)">
                            <p id='connection-lost' class='hide'>Connexion perdue</p>
                        </div>
                        <div class='lead small-font '>
                            <!-- table bootstrap : https://mdbootstrap.com/content/tables/ -->
                            <table class="table table-bordered table-hover">
                                <!-- TODO why style is not working on thead -->
                                <thead class="blue-grey lighten-4">
                                    <tr>
                                        <td>Nom Familier</td>
                                        <td>Nom Scientifique</td>
                                        <td>Type</td>
                                        <td>Région</td>
                                        <td>Taille</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='plant in plants'>
                                        <td>{{ plant.familiar_name }}</td>
                                        <td>{{ plant.scientific_name }}</td>
                                        <td>{{ plant.kind }}</td>
                                        <td>{{ plant.region }}</td>
                                        <td>{{ plant.high }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
                <footer>
                    <hr>
                    Copyright EPFC
                </footer>
            </div>
        </div>
        <script>
            var vm = new Vue({
                el: '#plant_manager',
                data: {
                    plants: [{
                            familiar_name: 'rose',
                            scientific_name: 'TX123',
                            type: 'fleur',
                            region: 'world',
                            high: 40
                        }]
                }
            });
            /**
             * AJAX pattern
             * demande au serveur de retourner les plantes dont le nom 
             * correspond au filtre
             * @param {type} filter
             * @returns {plantes}
             */
            function search(filter) {
                var xhttp = new XMLHttpRequest();
                // definition de la callback qui est appelée quand 
                // xhttp change (et donc quand la réponse arrive)
                xhttp.onreadystatechange = function () {
                    // réponse correcte
                    if (this.readyState === 4 && this.status === 200) {
                        // cache le fait qu'on a perdu la connection
                        document.getElementById('connection-lost').style.display = 'hide';
                        // récupère les données
                        var plants = JSON.parse(this.responseText);
                        // efface la vue.js liste
                        vm.plants.splice(0);
                        // mets la réponse dans la vue.js liste
                        for (var i = 0; i < plants.length; i++) {
                            Vue.set(vm.plants, i, plants[i]);
                        }
                    }
                    // si le serveur retourne une erreur
                    else if (this.readyState === 4) {
                        // affiche l'erreur
                        document.getElementById('connection-lost').style.display = 'block';
                    } else {
                        // ne nous intéresse pas
                    }
                };
                xhttp.open("GET", "api/plants.php?filter=" + filter, true);
                xhttp.send();
            }
            ;
            // initialisation du tableau
            search('');
        </script>
    </body>
</html>
