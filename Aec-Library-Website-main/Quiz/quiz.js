const questions = [
    {
        question: "Qui a écrit *Les Misérables* ?",
        reponses: ["Victor Hugo", "Émile Zola", "Albert Camus", "Gustave Flaubert"],
        correcte: "Victor Hugo"
    },
    {
        question: "Quel est le titre du premier roman de Marcel Proust ?",
        reponses: ["À l'ombre des fleurs", "Du côté de chez Swann", "Le Temps retrouvé", "Albertine disparue"],
        correcte: "Du côté de chez Swann"
    },
    {
        question: "Quel écrivain est connu pour son roman *Madame Bovary* ?",
        reponses: ["Honoré de Balzac", "Victor Hugo", "Gustave Flaubert", "Jules Verne"],
        correcte: "Gustave Flaubert"
    },
    {
        question: "Dans quel pays est né William Shakespeare ?",
        reponses: ["France", "Italie", "Angleterre", "Espagne"],
        correcte: "Angleterre"
    },
    {
        question: "Qui a écrit *Le vieil homme et la mer* ?",
        reponses: ["Ernest Hemingway", "F. Scott Fitzgerald", "John Steinbeck", "Mark Twain"],
        correcte: "Ernest Hemingway"
    },
    {
        question: "Quel est l'auteur de *1984* ?",
        reponses: ["George Orwell", "Aldous Huxley", "Ray Bradbury", "Philip K. Dick"],
        correcte: "George Orwell"
    },
    {
        question: "Quelle pièce de théâtre commence par *Ô rage ! Ô désespoir ! Ô vieillesse ennemie* ?",
        reponses: ["Le Cid", "Tartuffe", "Andromaque", "Phèdre"],
        correcte: "Le Cid"
    },
    {
        question: "Quel poète français a écrit *Les Fleurs du mal* ?",
        reponses: ["Arthur Rimbaud", "Paul Verlaine", "Charles Baudelaire", "Alfred de Musset"],
        correcte: "Charles Baudelaire"
    },
    {
        question: "Qui a écrit *Voyage au bout de la nuit* ?",
        reponses: ["Louis-Ferdinand", "Marcel Pagnol", "André Malraux", "Albert Camus"],
        correcte: "Louis-Ferdinand"
    },
    {
        question: "Dans quel roman trouve-t-on le personnage de Jean Valjean ?",
        reponses: ["Les Misérables", "Notre-Dame de Paris", "Le Père Goriot", "Germinal"],
        correcte: "Les Misérables"
    }
];

const changecol = document.getElementById('resultat');
let score = 0;
let indexquestion = 0;

function afficherQuestion() {
    let posquest = document.getElementById('question');
    posquest.textContent = questions[indexquestion].question;

    let posrep = document.querySelectorAll('.reponse');
    posrep.forEach((element, i) => {
        element.textContent = questions[indexquestion].reponses[i];
        element.onclick = function () {
            verifierReponse(questions[indexquestion].reponses[i]);
        };
    });
}

function verifierReponse(reponse) {
    let resultat = document.getElementById('resultat');
    if (reponse === questions[indexquestion].correcte) {
        score++;
        resultat.textContent = "Bonne réponse";
        resultat.style.color = "green"; // Changer la couleur en vert
    } else {
        resultat.textContent = "Mauvaise réponse";
        resultat.style.color = "red"; // Changer la couleur en rouge
    }

    setTimeout(() => {
        indexquestion++;
        resultat.textContent = "";
        if (indexquestion < questions.length) {
            afficherQuestion();
        } else {
            resultat.textContent = "Votre score est " + score;
            resultat.style.color = "black"; // Remettre la couleur par défaut
        }
    }, 1000);
}

window.onload = afficherQuestion;


   