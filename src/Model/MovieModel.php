<?php 
namespace src\Model;

use \PDO;
use \Core\Database;

class MovieModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }
    
    public function read_movies()
    {
        $search = htmlspecialchars($_POST['searchFilm']);
        $search = trim($search);
        $req = $this->pdo->prepare("SELECT id_film, titre, genre.nom AS genre,
                                     distrib.nom AS distrib, resum, annee_prod,
                                     duree_min
                                    FROM film
                                    LEFT JOIN genre 
                                     ON genre.id_genre = film.id_genre
                                    LEFT JOIN distrib 
                                     ON distrib.id_distrib = film.id_distrib
                                    WHERE titre 
                                     LIKE '%$search%' OR genre.nom 
                                     LIKE '%$search%' OR distrib.nom 
                                     LIKE '%$search%'
                                     LIMIT 10");
        $req->execute([$search]);
        return $req->fetchAll();
    }

    public function read_all_movies()
    {
        $req = $this->pdo->prepare("SELECT id_film, titre, genre.nom AS genre,
                                     distrib.nom AS distrib, resum, annee_prod,
                                     duree_min  
                                    FROM film
                                    LEFT JOIN genre 
                                     ON genre.id_genre = film.id_genre
                                    LEFT JOIN distrib 
                                     ON distrib.id_distrib = film.id_distrib
                                    ORDER BY id_film ASC
                                    LIMIT 3");
        $req->execute();
        return $req->fetchAll();
    }

    public function addMovie()
    {
        $req = $this->pdo->prepare("INSERT INTO film 
                (id_genre, id_distrib, titre, resume, date_debut_affiche, 
                date_fin_affiche, duree_min, annee_prod)
                                    VALUES (:id_genre, null, :titre, :resume, 
                                        null, null, :duree_min, :annee_prod)");
        $req->execute([':id_genre' => $_POST['addGenre'], 
                       ':titre' => $_POST['addTitle'],
                       ':resume' => $_POST['addResume'],
                       ':duree_min' => $_POST['addLength'],
                    ':annee_prod' => $_POST['addYear']]);
        return $req;
        Database::disconnect();
    }

    public function addGenre()
    {
        $req = $this->pdo->prepare('INSERT INTO genre (nom) 
                                    VALUES (?)');
        $req->execute([$_POST['newGenre']]);
        echo "lol";
        return $req;
    }

    public function read_genre()
    {
        $req = $this->pdo->prepare("SELECT *
                                    FROM genre");
        $req->execute();
        return $req->fetchAll();    }

    // public function changeTitle()
    // {
    //     $req = $this->pdo->prepare("UPDATE film 
    //                                 SET username = ?
    //                                 WHERE resume = ?");
    //     $req->execute([$_POST['movieTitle']]);
    // }

    // public function changeGenre()
    // {
    //     $req = $this->pdo->prepare("UPDATE film 
    //                                 SET id_genre = ?");
    //     $req->execute([$_POST['movieGenre']]);
    // }

    // public function changeResume()
    // {
    //     $req = $this->pdo->prepare("UPDATE film 
    //                                 SET resume = ?
    //                                 WHERE resume = ?");
    //     $req->execute([$_POST['movieResume']]);
    // }

    // public function changeDate()
    // {
    //     $req = $this->pdo->prepare("UPDATE film 
    //                                 SET annee_prod = ?
    //                                 WHERE annee_prod = ?");
    //     $req->execute([$_POST['movieYear']]);
    // }

    //     public function changeLength()
    // {
    //     $req = $this->pdo->prepare("UPDATE film 
    //                                 SET duree_min = ?
    //                                 WHERE duree_min = ?");
    //     $req->execute([$_POST['movieLength']]);
    // }

    public function deleteMovie()
    {
        $req = $this->pdo->prepare("DELETE FROM film 
                                    WHERE id_film=" . $_POST['movieDelete']);
        $req->execute();
    }

    public function deleteGenre()
    {
        $req = $this->pdo->prepare("DELETE FROM genre 
                                    WHERE id_genre=" . $_POST['genreDelete']);
        $req->execute();
    }    
}