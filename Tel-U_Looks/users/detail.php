<?php
// Memasukkan Header
include 'header.php';

// Data produk (contoh hardcoded, bisa diganti dengan database)
$produk = [
    1 => [
        'nama' => 'Produk 1',
        'gambar' => 'assets/img/gallery/produk_1.jpg',
        'deskripsi' => 'Deskripsi untuk Produk 1.',
        'harga' => 'Rp 150.000',
    ],
    2 => [
        'nama' => 'Produk 2',
        'gambar' => 'assets/img/gallery/produk_2.jpg',
        'deskripsi' => 'Deskripsi untuk Produk 2.',
        'harga' => 'Rp 200.000',
    ],
    3 => [
        'nama' => 'Produk 3',
        'gambar' => 'assets/img/gallery/produk_3.jpg',
        'deskripsi' => 'Deskripsi untuk Produk 3.',
        'harga' => 'Rp 250.000',
    ],
    4 => [
        'nama' => 'Produk 4',
        'gambar' => 'assets/img/gallery/produk_4.jpeg',
        'deskripsi' => 'Deskripsi untuk Produk 4.',
        'harga' => 'Rp 300.000',
    ],
];

// Ambil ID produk dari URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Periksa apakah produk tersedia
if (!array_key_exists($id, $produk)) {
    echo "Produk tidak ditemukan!";
    exit;
}

// Data produk yang akan ditampilkan
$detail = $produk[$id];
?>

<!-- Konten Utama Detail Produk -->
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <img src="<?php echo $detail['gambar']; ?>" alt="<?php echo $detail['nama']; ?>" class="img-fluid">
    </div>
    <div class="col-md-6">
      <h2><?php echo $detail['nama']; ?></h2>
      <p><?php echo $detail['deskripsi']; ?></p>
      <p><strong>Harga:</strong> <?php echo $detail['harga']; ?></p>
      <p>© 2024 Tel-U Looks. All rights reserved.</p>
    </div>
  </div>
</div>

<?php
// Memasukkan Footer
include 'footer.php';
?>
