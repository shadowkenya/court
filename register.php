<?php
$conn = new mysqli("localhost", "root", "", "court");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = $_POST['full_name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    if ($password !== $confirm) {
        die("Passwords do not match.");
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $checkResult = $check->get_result();

    if ($checkResult->num_rows > 0) {
        die("Email already registered.");
    }

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (full_name, phone, email, password) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssss", $fullname, $phone, $email, $hashed);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!');window.location.href='login.html';</script>";
    } else {
        echo "Error during registration: " . $stmt->error;
    }

    $stmt->close();
    $check->close();
}
$conn->close();
?>
