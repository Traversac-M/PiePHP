<?php 
namespace src\Controller;

use \Core\Controller;
use \src\Model\MovieModel;

class MovieController extends Controller
{
  private $pdo;
  private $movie;

  public function __construct()
  {
    $this->movie = new MovieModel();
  }

  public function movieAction()
  {
    if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
      if(isset($_POST['showSubmit']) && !empty($_POST['searchFilm'])) {
        MovieController::ReadMovieAction();
      } else {
        MovieController::ReadAllMovieAction();
        }
      if(isset($_POST['movieDelete'])) {
        MovieController::deleteMovieAction();
      }
      if(isset($_POST['submitDelete'])) {
        MovieController::deleteGenreAction();
      }
      if(isset($_POST['addMovie']) && !empty($_POST['addTitle']) && 
        !empty($_POST['addGenre']) && !empty($_POST['addResume']) && 
        !empty($_POST['addYear']) && !empty($_POST['addLength'])) {
  
        MovieController::addMovieAction();
      }
      if(isset($_POST['addGenre']) && !empty($_POST['newGenre'])) {
        MovieController::addGenreAction();
      }
    } else {
      header('Location: /PiePHP/home');
    }
  }
// Affiche le film recherché
  public function readMovieAction()
  {
    $read = $this->movie->read_movies();
    $genre = $this->movie->read_genre();
    $this->render('index', ['read' => $read, 'genre' => $genre]);
  }
// Affiche la totalité des films de la BDD
  public function readAllMovieAction()
  {
    $read = $this->movie->read_all_movies(); 
    $genre = $this->movie->read_genre();
    $this->render('index', ['read' => $read, 'genre' => $genre]);
  }
// Ajoute un film dans la BDD
  public function addMovieAction()
  {
    $film = $this->movie->addMovie();
  }
// Ajoute un genre dans la BDD
  public function addGenreAction()
  {
    $film = $this->movie->addGenre();
  }
//Supprime un film de la BDD
  public function deleteMovieAction()
  {
    $delete = $this->movie->deleteMovie();
  }
//Supprime un genre de la BDD
  public function deleteGenreAction()
  {
    $delete = $this->movie->deleteGenre();
  } 
}