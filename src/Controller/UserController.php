<?php 
namespace src\Controller;

use \PDO;
use \Core\Database;
use \Core\Controller;
use \src\Model\UserModel;

class UserController extends Controller
{
  private $pdo;
  private $user;

  public function __construct()
  {
    $this->pdo = Database::connect();
    $this->user = new UserModel();
  }

  public function indexAction()
  {
    $this->render('index');
  }

// Ajoute une entrée dans la base de données.
  public function addAction()
  {
    $this->render('register');
    if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
      if (isset($_POST['registerSubmit'])) {
        if (!empty($_POST['registerPass']) && !empty($_POST['registerMail']) 
          && !empty($_POST['registerUname']) && !empty($_POST['registerFname'])
          && !empty($_POST['registerLname'])) {
          if (preg_match("/^[a-z]+[\w.-]*$/i", $_POST['registerUname']) &&
              preg_match("/^[a-z]+[\w.-]*$/i", $_POST['registerFname']) &&
              preg_match("/^[a-z]+[\w.-]*$/i", $_POST['registerLname']) ) {
              return UserController::registerAction();
          } else {
            echo '<script> alert("Wrong format !")</script>';
          } 
        } else {
          echo '<script> alert("Empty fields !")</script>';
        }
      }
    } else {
      return UserController::indexAction();
    }   
  }

  public function registerAction()
  {
    $email = htmlspecialchars($_POST['registerMail']);
    $username = htmlspecialchars($_POST['registerUname']);
    $password = hash('ripemd160',$_POST['registerPass']);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $checkData = $this->pdo->prepare("SELECT * FROM users 
        WHERE email = :email OR username = :username");
      $checkData->bindParam(':email', $email , PDO::PARAM_STR);
      $checkData->bindParam(':username', $username , PDO::PARAM_STR);
      $checkData->execute();
      $Count = $checkData->rowCount();
      if ($Count  > 0) {
        echo '<script> alert("Email or Username already taken !")</script>';
      } else {
        $res = $this->user->create();
        header('Location: /PiePHP/login');
      }
    }
  }

//Fonction de login.
  public function loginAction()
  {
    $this->render('login');
    if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
      if(isset($_POST['loginSubmit']) && !empty($_POST['loginMail']) 
        && !empty($_POST['loginPass'])) {

        $res = $this->user->login();
        if ($res) {
          $_SESSION['id'] = $res['id'];
          $_SESSION['username'] = $res['username'];
          $_SESSION['first_name'] = $res['first_name'];
          $_SESSION['last_name'] = $res['last_name'];
          $_SESSION['email'] = $res['email'];
          header('Location: /PiePHP/home');
        } else { 
          echo '<script> alert("Wrong Email or Password !")</script>';
        }
      }
    } else {
      return UserController::indexAction();
    }
  }

//Fonction de Logout.
  public function logoutAction()
  {
    $logout = $this->user->logout();
  }

//Suppression de compte.
  public function deleteAction()
  {
    $delete = $this->user->logout();
    $delete = $this->user->delete();
    header('Location: /PiePHP/home');
  }



//Modifications d'informations personnelles.
  public function showAction()
  {
    if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
      $this->render('show');
      if(isset($_POST['profileSubmit']) && !empty($_POST['profileUname'])) {
          UserController::changeUnameAction();
      }
      if(isset($_POST['profileSubmit']) && !empty($_POST['profileFname'])) {
          UserController::changeFnameAction();
      }
      if(isset($_POST['profileSubmit']) && !empty($_POST['profileLname'])) {
          UserController::changeLnameAction();
      }
      if(isset($_POST['profileSubmit']) && !empty($_POST['profileMail'])) {
          UserController::changeMailAction();
      }
      if(isset($_POST['profileSubmit']) && !empty($_POST['profilePass'])) {
          UserController::changePassAction();
      }
      if(isset($_POST['deleteSubmit'])) { 
        UserController::deleteAction();
      }      
    } else { $this->render('index'); }
  }

//Changement d'username.
  public function changeUnameAction()
  {
    if (preg_match("/^[a-z]+[\w.-]*$/i", $_POST['profileUname'])) {
      $this->user->changeUname();
      echo "<script> alert('Data changed !')</script>";
    } else {
        echo '<script> alert("Wrong format !")</script>';
    }
  }

//Changement de Prénom.
  public function changeFnameAction()
  {
    if (preg_match("/^[a-z]+[\w.-]*$/i", $_POST['profileFname'])) {
      $this->user->changeFname();
      echo "<script> alert('Data changed !')</script>";
    } else {
        echo '<script> alert("Wrong format !")</script>';
    }
  }

//Changement de Nom de Famille.
  public function changeLnameAction()
  {
    if (preg_match("/^[a-z]+[\w.-]*$/i", $_POST['profileLname'])) {
      $this->user->changeLname();
      echo "<script> alert('Data changed !')</script>";
    } else {
        echo '<script> alert("Wrong format !")</script>';
    }
  }

//Changement d'Email.
  public function changeMailAction()
  {
    if(isset($_POST['profileSubmit']) && !empty($_POST['profileMail'])) {
      $this->user->changeMail();
      echo "<script> alert('Data changed !')</script>";
    } else {
        echo '<script> alert("Wrong format !")</script>';
      }
  }

//Changement de Password.
  public function changePassAction()
  {
    if(isset($_POST['profileSubmit']) && !empty($_POST['profilePass'])) {
      $this->user->changePass();
      echo "<script> alert('Data changed !')</script>";
    } else {
        echo '<script> alert("Wrong format !")</script>';
      }
  }
}