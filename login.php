

<?php
$host = 'localhost';
$db = 'users1';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if POST data is set
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare and execute query to verify credentials
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
        $stmt->execute(['username' => $username, 'password' => $password]);

        if ($stmt->rowCount() > 0) {
            echo 'Login successful';
        } else {
            echo 'Invalid username or password';
        }
    } else {
        echo 'Username and password required';
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

?>
