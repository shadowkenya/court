<?php
session_start();
include 'db.php'; // database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Fetch user
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['userid'] = $user['id'];
            $_SESSION['username'] = $user['fullname'];
            echo "<script>window.location.href='user-dashboard.php';</script>";
exit();

        } else {
            echo "<script>alert('Invalid password'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('No account found for this email'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
