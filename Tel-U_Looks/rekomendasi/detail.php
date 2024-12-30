<?php
// Memasukkan Header
include '../Layouts/navbar.php';

// Data produk
$produk = [
    [
      'id' => 1,
      'nama' => 'A Line Skirt',
      'gambar' => '../assets/img/gallery/produk 1.jpg',
      'deskripsi' => 'Salah satu fashion items penolong yang bisa kamu ambil dari lemari saat hari pertama semester baru perkuliahan adalah a-line midi skirt. 
      Padukan rok dengan atasan sesuai keinginan. Pakailah flat shoes atau sepatu kets yang sesuai dengan keinginan, dan tara! Kamu siap pergi ke kampus.',
      'harga' => 'Rp 150.000',
    ],
    [
      'id' => 2,
      'nama' => 'Jeans Kulot dan Outer Sederhana',
      'gambar' => '../assets/img/gallery/produk 2.jpg',
      'deskripsi' => 'Outer tampaknya selalu menjadi pakaian yang selalu menarik bagi para hijabers. Sebab, outer memang dirancang secara khusus agar bisa sesuai dengan berbagai macam tampilan outfit yang dipakai oleh banyak orang. 
      Gunakan celana jeans kulot untuk bisa mengantongi kakimu yang jenjang. Kenakan juga inner pakaian warna terang yang dikombinasikan dengan outer dengan gaya casual seperti ini. Dijamin, cantik banget!',
      'harga' => 'Rp 200.000',
    ],
    [
      'id' => 3,
      'nama' => 'Sweater',
      'gambar' => '../assets/img/gallery/produk 3.jpg',
      'deskripsi' => 'Outfit yang satu ini bisa menjadi andalan kamu saat cuaca dingin atau hujan tiba. Selain membuat tubuh lebih hangat, memadukan sweater menggunakan celana jeans atau bahan juga cukup stylish untuk dikenakan saat kuliah, lho. 
      Kamu juga bisa menambahkan kemeja di dalam sweater agar terlihat semi-formal.',
      'harga' => 'Rp 250.000',
    ],
    [
      'id' => 4,
      'nama' => 'Denim Vest',
      'gambar' => '../assets/img/gallery/produk 4.jpeg',
      'deskripsi' => 'Denim vest memiliki model yang sama dengan sweater vest. Hanya saja, yang satu ini berbahan denim atau serat katun kokoh berwarna biru.
      Karena bahan dasar yang berbeda itu pula, kesan yang ditimbulkan saat memakainya pun berbeda. Orang yang memakai denim vest akan terlihat lebih boyish dan cool.
      Memakai denim vest juga bisa jadi alternatif bagi kamu yang ingin memakai setelan berkerah tapi tidak ingin terlihat terlalu kaku dan formal.',
      'harga' => 'Rp 300.000',
    ],
    [
      'id' => 5,
      'nama' => 'Kemeja Batik',
      'gambar' => '../assets/img/gallery/produk 5.jpg',
      'deskripsi' => 'Meskipun terlihat formal dan kaku, sebenarnya baju batik bisa menjadi keren dengan jenis celana dan sepatu yang sesuai, lho. 
      Dengan memilih kemeja yang dari bahan katun premium dan dilapisi oleh furing, kemeja batik yang kamu gunakan akan menjadi kemeja yang sangat nyaman dan tidak akan bikin kepanasan saat mengikuti perkuliahan.',
      'harga' => 'Rp 350.000',
    ],
    [
      'id' => 6,
      'nama' => 'Blazer',
      'gambar' => '../assets/img/gallery/produk 6.jpg',
      'deskripsi' => 'Blazer adalah salah satu penyelamat di kala kamu tidak tahu lagi haru mengenakan outfit apa ke kampus. 
      Padukan blazer dengan kaos atau kemeja polos, juga celana favorit. Jangan lupa kenakan sepatu yang nyaman, ya! Tambahkan totebag untuk membawa peralatan perkuliahanmu.',
      'harga' => 'Rp 400.000',
    ],
    [
      'id' => 7,
      'nama' => 'Kaos dan Celana Jeans',
      'gambar' => '../assets/img/gallery/produk 7.jpeg',
      'deskripsi' => 'Rekomendasi outfit kuliah yang simple tapi stylish adalah perpaduan antara kaos dan celana jeans. 
      Dua fashion items ini seakan jadi andalan bagi mahasiswa yang ingin tampil minimalis. 
      Untuk menghasilkan look yang stylish, kamu bisa memilih kaos berkerah crew neck atau kerah berbentuk O. 
      Pemilihan kerah ini akan membuat look kamu jadi lebih rapi meskipun mengenakan kaos yang santai. 
      Berikutnya, kamu bisa memaksimalkan penampilan dengan memasukkan kaos ke dalam celana jeans. 
      Trik ini membuat look kamu akan semakin elegan sekaligus kasual.',
      'harga' => 'Rp450.000',
    ],
    [
      'id' => 8,
      'nama' => 'Perpaduan Kaos/Kemeja dengan Celana Jeans',
      'gambar' => '../assets/img/gallery/produk 8.jpg',
      'deskripsi' => 'Tentunya perpaduan kaos/kemeja dengan celana jeans adalah hal yang sangat sering digunakan oleh para mahasiswa.',
      'harga' => 'Rp 500.000',
    ],
];

// Ambil ID produk dari URL dan validasi
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Cari produk berdasarkan ID
$detail = array_filter($produk, function ($item) use ($id) {
    return $item['id'] === $id;
});

// Ambil data produk pertama (jika ditemukan)
$detail = !empty($detail) ? array_values($detail)[0] : null;

// Periksa apakah produk ditemukan
if (!$detail) {
    echo "<div class='container mt-5'><h3>Produk tidak ditemukan!</h3></div>";
    include '../Layouts/footer.php';
    exit;
}
?>

<!-- Konten Utama Detail Produk -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Products</title>
</head>
<body>
  <div class="container mt-5">
      <div class="row">
          <div class="col-md-5">
              <img src="<?php echo htmlspecialchars($detail['gambar']); ?>" alt="<?php echo htmlspecialchars($detail['nama']); ?>" class="img-fluid">
          </div>
          <div class="col-md-5">
              <h2><?php echo htmlspecialchars($detail['nama']); ?></h2>
              <p><?php echo htmlspecialchars($detail['deskripsi']); ?></p>
              <p><strong>Harga:</strong> <?php echo htmlspecialchars($detail['harga']); ?></p>
          </div>
      </div>
  </div>
</body>
</html>

<?php
// Memasukkan Footer
include '../Layouts/footer.php';
?>