<?php
include '../Layouts/sidebar-admin.php';

include '../db.php'; 

if (!$conn) {
    die("Koneksi database gagal.");
}

// Query untuk mendapatkan semua data pengguna
$query = "SELECT id_user, nama, username, email FROM users";
$result = $conn->query($query);

?>

<!-- Konten Utama untuk Menampilkan Daftar Pengguna -->
<div class="content-wrapper">
    <div class="container-fluid mt-5">
        <h2>Daftar Pengguna</h2>

        <!-- Tabel Menampilkan Data Pengguna -->
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result && $result->num_rows > 0) {
                            // Menampilkan data setiap baris
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id_user'] . "</td>"; 
                                echo "<td>" . $row['nama'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Tidak ada pengguna yang ditemukan.</td></tr>"; 
                        }

                        if ($result) {
                            $result->free();
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
// Menutup koneksi database
$conn->close();
?>
