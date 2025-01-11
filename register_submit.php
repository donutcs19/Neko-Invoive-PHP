<?php
require_once './config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $profile_image = $_POST['profile_image'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $verifiedEmail = $_POST['verifiedEmail'];
    $nickname = $_POST['nickname'];
    $position = $_POST['position'];
    $organize = $_POST['organize'];
    $urole = $_POST['urole'];

    

    $stmt = $pdo->prepare("
    INSERT INTO users (
        token, email, full_name, picture, first_name, last_name, gender, verifiedEmail, 
        nickname, position, organize, urole, user_create_at, user_update_at, last_login
    ) VALUES (
        :token, :email, :full_name, :picture, :first_name, :last_name, :gender, :verifiedEmail, 
        :nickname, :position, :organize, :urole, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP
    )
");


$stmt->bindParam(':token', $token);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':full_name', $name);
$stmt->bindParam(':picture', $profile_image);
$stmt->bindParam(':first_name', $firstName);
$stmt->bindParam(':last_name', $lastName);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':verifiedEmail', $verifiedEmail);
$stmt->bindParam(':nickname', $nickname);
$stmt->bindParam(':position', $position);
$stmt->bindParam(':organize', $organize);
$stmt->bindParam(':urole', $urole);


if ($stmt->execute()) {
    header('Location: user');
    exit();
} else {
    echo "Error: " . implode(" | ", $stmt->errorInfo());
}

}
?>
