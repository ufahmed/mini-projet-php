<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }catch (PDOException $f) {
        die("Connection failed: " . $f->getMessage());
}

if (isset($_POST["submit"])) {
    $fullName = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeat_password"];
    $passwordHash = hash(PASSWORD_DEFAULT, $password);

    $errors = array();
    if (empty($fullName) || empty($email) || empty($password) || empty($passwordRepeat)) {
        $errors[] = "All fields are required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email is not valid";
    }
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }
    if ($password != $passwordRepeat) {
        $errors[] = "Password does not match";
    }

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $emailArray = array($email);
            $stmt->execute($emailArray);
    
            $rowCount = $stmt->rowCount();
    
            if ($rowCount > 0) {
                $errors[] = "Email already exists!";
            } 
            else {
                $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
                $userDetailsArray = array($fullName, $email, $passwordHash);
                $stmt->execute($userDetailsArray);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }
        } catch (PDOException $e) {
            die("Something went wrong: " . $e->getMessage());
        }
    } 
    else {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }
} 
?>