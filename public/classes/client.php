<?php
session_start();
class Client {
    private $pdo;
    private $nom;
    private $prenom;
    private $address;
    private $email;
    private $password;

    public function __construct($nom, $prenom, $address, $email, $password, $hashPassword = true) {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setAddress($address);
        $this->setEmail($email);
        if ($hashPassword) {
            $this->setPassword($password);
        } else {
            $this->setPlainPassword($password);
        }

        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=electronicsstore", "root", "");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            throw new Exception("Invalid email format");
        }
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function setPlainPassword($password) {
        $this->password = $password;
    }

    public function save() {
        $stmt = $this->pdo->prepare("INSERT INTO client (nom, prenom, address, email, password) VALUES (:nom, :prenom, :address, :email, :password)");
        $stmt->execute([
            ':nom' => $this->getNom(),
            ':prenom' => $this->getPrenom(),
            ':address' => $this->getAddress(),
            ':email' => $this->getEmail(),
            ':password' => $this->getPassword()
        ]);
        $a=$this->getEmail();
            header("Location: ../hover.php?mail=$a");
        exit();
    }

    public function test_exist_client() {
        $stmt = $this->pdo->prepare("SELECT id,nom,prenom,address,password FROM client WHERE email = :email");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindParam(':email', $this->getEmail());
        $stmt->execute();
        $table = $stmt->fetch();
        $_SESSION['IDclient']=$table['id'];
        $a=$this->getEmail();
        if ($table && password_verify($this->password, $table['password'])) {
            $_SESSION['IDclient']=$table['id'];
            $_SESSION['nameclient']=$table['nom'];
            $_SESSION['prenameclient']=$table['prenom'];
            if ($this->getEmail() == "aichamoh2003@gmail.com"){
                header("Location: ../admin_choose_page.php?mail=$a");
                exit();
            }else{
                header("Location: ../hover.php?mail=$a");
                exit();
            }
        } else {
            header("Location: ../sign_in.php");
            exit();
        }
    }
    public function getname(){
        $stmt = $this->pdo->prepare("SELECT nom,prenom FROM client WHERE email = :email");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindParam(':email', $this->getEmail());
        $stmt->execute();
        $table = $stmt->fetch();
        return $table;

    }
}

// Registration
if ($_SESSION['verify'] == 1) {
    $name = $_SESSION['Firstname'];
    $prenom = $_SESSION['Familyname'];
    $address = $_SESSION['Address'];
    $email = $_SESSION['Email'];
    $password = $_SESSION['password'];
    $confirm_password = $_SESSION['confirm_password'];
    if(empty($name) || empty($prenom) || empty($address) || empty($email) || empty($password) || empty($confirm_password)){
        header("Location: ../sing_up.html");
            exit();
    }
    
    if ($password === $confirm_password) {
         
        $customer = new Client($name, $prenom, $address, $email, $password);
        $customer->save();
        

    }  
}

// Login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Login'])) {
    $email_login = $_POST['mail'];
    $password_login = $_POST['password_sign'];
    if(empty($email_login) || empty($password_login)){
        $error_message = "Incorrect+email+or+password";
        header("Location: ../sign_in.php ");
            exit();
    }

    $customer_test = new Client('', '', '', $email_login, $password_login, false); 
    $customer_test->setPlainPassword($password_login);  
    $customer_test->test_exist_client();
}
?>
