<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }catch (PDOException $f) {
        die("Connection failed: " . $f->getMessage());
}
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    require_once(__DIR__ . '/../model/config.php');

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $emailArray = array($email);
    $stmt->execute( $emailArray);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        session_start();
        $_SESSION["user"] = "yes";
        header("Location: index.php");
        exit();
    } 
    else {
        echo "<div class='alert alert-danger'>Email does not exist</div>";
    }
}
?>