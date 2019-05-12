<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Task</title>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div>
            <div>
                <header>
                    <h1 class="text-center">Tasks</h1>
                    <hr>
                </header>
                <main>
                    <!-- sous vue.js -->
                    <div id='task_manager'>
                        <div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center">Id</td>
                                        <td class="text-center">Name</td>
                                        <td class="text-center">Date</td>
                                        <td class="text-center">Description</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='task in tasks'>
                                        <td class="text-center">{{ task.id_task }}</td>
                                        <td class="text-center">{{ task.name }}</td>
                                        <td class="text-center">{{ task.date }}</td>
                                        <td class="text-center">{{ task.description }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
                <footer>
                    <hr>
                    <p class="text-center">Copyright OCCHILUPO Andrea</p>
                </footer>
            </div>
        </div>
        <script>
var vm = new Vue({
    el: '#task_manager',
    data: {
        tasks: [{
                id_task: '0',
                name: 'test name',
                date: 'test date',
                description: 'test description'
            }]
    }
});
/**
 * AJAX pattern
 * demande au serveur de retourner les tasks contenue dans la db
 * @param 
 * @returns {tasks}
 */
function getTasks() {
    var xhttp = new XMLHttpRequest();
    // definition de la callback qui est appelée quand 
    // xhttp change (et donc quand la réponse arrive)
    xhttp.onreadystatechange = function () {
        // réponse correcte
        if (this.readyState === 4 && this.status === 200) {
            // récupère les données
            var tasks = JSON.parse(this.responseText);
            // efface la vue.js liste
            vm.tasks.splice(0);
            // mets la réponse dans la vue.js liste
            for (var i = 0; i < tasks.length; i++) {
                Vue.set(vm.tasks, i, tasks[i]);
            }
        }
        // si le serveur retourne une erreur
        else if (this.readyState === 4) {
            // affiche l'erreur
        } else {
            // ne nous intéresse pas
        }
    };
    xhttp.open("GET", "api/tasks.php", true);
    xhttp.send();
};
getTasks();
        </script>
    </body>
</html>