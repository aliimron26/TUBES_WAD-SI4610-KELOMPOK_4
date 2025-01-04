<?php
include 'db.php'; // Include file koneksi

$username = $_SESSION['user']['username'];

// Ambil data dari form
$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$bio = $_POST['bio'];
$interest = implode(',', $_POST['interest']); 

// Query untuk update data
$sql = "UPDATE profil SET 
        name = ?, 
        email = ?, 
        bio = ?, 
        interest = ? 
        WHERE username = ?";

// Siapkan statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $bio, $interest, $username);

if ($stmt->execute()) {
    $_SESSION['user']['name'] = $name;
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['bio'] = $bio;
    $_SESSION['user']['interest'] = $interest;
    echo "Profil berhasil diperbarui!";
} else {
    echo "Terjadi kesalahan: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
