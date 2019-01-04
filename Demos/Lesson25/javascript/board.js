// definition des constantes
// état du jeu
const CONFIGURING = 1;  // jeu dans l'état CONFIGURING : le joueur ajoute les bateaux
const PLAYING = 2;      // jeu dans l'état PLAYING : le joueur joue
const DONE = 3;         // jeu dans l'état DONE : le jeu est terminé

var state = CONFIGURING;    // variable contenant l'état du jeu, valeur initale est CONFIGURING (1)

var size = 2;               // (sqrt) nombre de cellules du grid (tableau 2x2)

var sizeWidth = 6;
var sizeHeight = 4;


var nrShips = 0;            // nombre de bateaux (cellules) créés par l'utilisateur

/**
 * génère l'HTML d'une cellule
 * @param {string} board : le type de board (me | other)
 * @param {int} x : position x
 * @param {int} y : position y
 * @returns {String} le code HTML de la cellule
 */
function makeCellHtml(board, x, y) {
    return "<div data-board='" + board + "' data-x='" + x + "' data-y='" + y + "' class='cell'></div>";
}

/**
 * génère l'HTML d'un board (tableau)
 * @param {string} board
 * @param {int} size
 * @returns {String} le code HTML du board
 */
function makeBoardHtml(board, sizeWidth, sizeHeight) {
    var content = "";
    for (var i = 0; i < sizeWidth; i++) {    // boucle sur les lignes
        content += "<div>";
        for (var j = 0; j < sizeHeight; j++) {    // boucle sur les colonnes
            content += makeCellHtml(board, i, j);
        }
        content += "</div>";
    }
    return content;
}

// crée le board 'other'
document.getElementById("other").innerHTML = makeBoardHtml('other', sizeWidth, sizeHeight);
// crée le board 'me'
document.getElementById("me").innerHTML = makeBoardHtml('me', sizeWidth, sizeHeight);
// récupère la liste des cellules (du jeu)
var cellList = document.getElementsByClassName('cell');
// demande à l'engin Javascript (le brower) d'exécuter la fonction 'cellClicked' 
// lorsqu'une cellule est cliquée
// (quand je clique sur une cellule, la fonction 'cellClicked' est exécutée
