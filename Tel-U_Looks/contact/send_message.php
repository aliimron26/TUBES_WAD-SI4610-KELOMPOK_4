<?php
include '../db.php'; // Pastikan file ini berisi koneksi ke database dan menggunakan variabel $conn

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dan hindari kesalahan dengan real_escape_string
    $nama = $conn->real_escape_string($_POST['Nama']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);
    $status = 'Terkirim';

    // Validasi data
    if (!empty($nama) && !empty($subject) && !empty($message)) {
        // Query untuk menyimpan data ke tabel contact
        $sql = "INSERT INTO contact (nama_pengirim, subjek, isi_pesan, status) 
                VALUES ('$nama', '$subject', '$message', '$status')";

        if ($conn->query($sql) === TRUE) {
            // Redirect ke halaman ../index.php setelah berhasil
            header("Location: ../index.php#contact?status=success");
            exit();
        } else {
            // Redirect dengan pesan kesalahan
            header("Location: ../index.php#contact?status=error&message=" . urlencode($conn->error));
            exit();
        }
    } else {
        // Redirect jika ada field yang kosong
        header("Location: ../index.php#contact?status=error&message=" . urlencode("Harap isi semua bidang."));
        exit();
    }
}

// Tutup koneksi
$conn->close();
?>
