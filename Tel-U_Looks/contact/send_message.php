<?php
include '../db.php'; // Pastikan koneksi database valid

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data dari form
    $nama = trim($_POST['Nama'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $status = 'Terkirim';

    // Validasi input
    if (empty($nama) || empty($subject) || empty($message)) {
        echo json_encode([
            'success' => false,
            'message' => 'Semua field harus diisi.',
        ]);
        exit;
    }

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("INSERT INTO contact (nama_pengirim, subjek, isi_pesan, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $subject, $message, $status);

    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Pesan berhasil dikirim.',
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Gagal mengirim pesan. Silakan coba lagi.',
        ]);
    }

    $stmt->close();
    $conn->close();
    exit;
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Metode tidak valid.',
    ]);
    exit;
}
?>
