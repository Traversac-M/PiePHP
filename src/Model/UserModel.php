<?php 
namespace src\Model;

use \Core\Database;
use \PDO;

class UserModel
{
    private $email;
    private $password;
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }
    
    public function create()
    {
        $req = $this->pdo->prepare('INSERT INTO users
            (username, first_name, last_name, email, password, register_date) 
            VALUES (:uname, :fname, :lname, :email, :password, NOW())');
        $req->execute([':uname' => $_POST['registerUname'], 
                       ':fname' => $_POST['registerFname'],
                       ':lname' => $_POST['registerLname'],
                       ':email' => $_POST['registerMail'],
                    ':password' => hash('ripemd160', $_POST['registerPass'])]);
        return $req;
        Database::disconnect();
    }
    
    public function read()
    {
        $req = $this->pdo->prepare("SELECT * FROM users");
        $req->execute();
        $read = $req->fetch();
        Database::disconnect();
    }
    
    public function update()
    {
        $req = $this->pdo->prepare("UPDATE users 
                                    SET email = :email, 
                                    password = :password
                                    WHERE id = " . $_GET['id']);
        $req->execute([':email' => $_POST['registerMail'], 
                    ':password' => hash('ripemd160',$_POST['registerPass'])]);
        Database::disconnect();
    }
    
    public function delete()
    {
        $req = $this->pdo->prepare("DELETE FROM users 
                                    WHERE id=" . $_SESSION['id']);
        $req->execute();
        Database::disconnect();
    }
    
    public function read_all()
    {
        $req = $this->pdo->prepare("SELECT * FROM users");
        $req->execute();
        return $req;
    }

    public function login()
    {
        $req = $this->pdo->prepare("SELECT *
                                    FROM users
                                    WHERE email = :email
                                    AND password = :password");
        $req->execute([':email' => $_POST['loginMail'],
                    ':password' => hash('ripemd160', $_POST['loginPass'])]);
        return $req->fetch();
        Database::disconnect();
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /PiePHP/login');
    }

    public function changeUname()
    {
        $req = $this->pdo->prepare("UPDATE users 
                                    SET username = ?
                                    WHERE id = ?");
        $req->execute([$_POST['profileUname'], 
            $_SESSION['id']]);
    }
    
    public function changeFname()
    {
        $req = $this->pdo->prepare("UPDATE users 
                                    SET first_name = ? 
                                    WHERE id = ?");
        $req->execute([$_POST['profileFname'], 
            $_SESSION['id']]);
    }
    
    public function changeLname()
    {
        $req = $this->pdo->prepare("UPDATE users 
                                    SET last_name = ? 
                                    WHERE id = ?");
        $req->execute([$_POST['profileLname'], 
            $_SESSION['id']]);
    }
    
    public function changeMail()
    {
        $req = $this->pdo->prepare("UPDATE users 
                                    SET email = ? 
                                    WHERE id = ?");
        $req->execute([$_POST['profileMail'], $_SESSION['id']]);
    }
    
    public function changePass()
    {
        $req = $this->pdo->prepare("UPDATE users 
                                    SET password = ? 
                                    WHERE id = ?");
        $req->execute([hash('ripemd160',$_POST['profilePass']), 
            $_SESSION['id']]);
    }
}