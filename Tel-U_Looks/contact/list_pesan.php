<?php
include '../Layouts/sidebar-admin.php';

// Koneksi ke database
include '../db.php'; 

if (!$conn) {
    die("Koneksi database gagal.");
}

$query = "SELECT * FROM contact";
$result = $conn->query($query);

?>

<div class="content-wrapper">
    <div class="container-fluid mt-5">
        <h2>Daftar Pengguna</h2>

        <!-- Tabel Menampilkan Data Pengguna -->
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Pengirim</th>
                            <th>Subjek</th>
                            <th>Isi Pesan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['nama_pengirim'] . "</td>"; 
                                echo "<td>" . $row['subjek'] . "</td>";
                                echo "<td>" . $row['isi_pesan'] . "</td>";
                                echo "<td>" . $row['status'] . "</td>";
                                echo "<td>
                                        <a href='detail_pesan.php?id_pesan=" . $row['id_pesan'] . "' class='btn btn-warning btn-sm'>Review</a>   
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Tidak ada pesan yang ditemukan.</td></tr>"; 
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
