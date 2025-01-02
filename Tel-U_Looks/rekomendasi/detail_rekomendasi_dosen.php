<?php
// Memulai sesi
session_start();

// Memasukkan Header
include '../Layouts/main-navbar.php';

// Data produk
$produk = [
    [
        'id' => 1,
        'nama' => 'A Line Skirt',
        'gambar' => '../assets/img/gallery/produk 1.jpg',
        'deskripsi' => 'Salah satu fashion items penolong yang bisa kamu ambil dari lemari saat hari pertama semester baru perkuliahan adalah a-line midi skirt. 
        Padukan rok dengan atasan sesuai keinginan. Pakailah flat shoes atau sepatu kets yang sesuai dengan keinginan, dan tara! Kamu siap pergi ke kampus.',
        'harga' => 'Rp 150.000',
        'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
    ],
    [
      'id' => 2,
      'nama' => 'Jeans Kulot dan Outer Sederhana',
      'gambar' => '../assets/img/gallery/produk 2.jpg',
      'deskripsi' => 'Outer tampaknya selalu menjadi pakaian yang selalu menarik bagi para hijabers. Sebab, outer memang dirancang secara khusus agar bisa sesuai dengan berbagai macam tampilan outfit yang dipakai oleh banyak orang. 
      Gunakan celana jeans kulot untuk bisa mengantongi kakimu yang jenjang. Kenakan juga inner pakaian warna terang yang dikombinasikan dengan outer dengan gaya casual seperti ini. Dijamin, cantik banget!',
      'harga' => 'Rp 200.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
    ],
    [
      'id' => 3,
      'nama' => 'Sweater',
      'gambar' => '../assets/img/gallery/produk 3.jpg',
      'deskripsi' => 'Outfit yang satu ini bisa menjadi andalan kamu saat cuaca dingin atau hujan tiba. Selain membuat tubuh lebih hangat, memadukan sweater menggunakan celana jeans atau bahan juga cukup stylish untuk dikenakan saat kuliah, lho. 
      Kamu juga bisa menambahkan kemeja di dalam sweater agar terlihat semi-formal.',
      'harga' => 'Rp 250.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
    ],
    [
      'id' => 4,
      'nama' => 'Denim Vest',
      'gambar' => '../assets/img/gallery/produk 4.jpeg',
      'deskripsi' => 'Denim vest memiliki model yang sama dengan sweater vest. Hanya saja, yang satu ini berbahan denim atau serat katun kokoh berwarna biru.
      Karena bahan dasar yang berbeda itu pula, kesan yang ditimbulkan saat memakainya pun berbeda. Orang yang memakai denim vest akan terlihat lebih boyish dan cool.
      Memakai denim vest juga bisa jadi alternatif bagi kamu yang ingin memakai setelan berkerah tapi tidak ingin terlihat terlalu kaku dan formal.',
      'harga' => 'Rp 300.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
    ],
    [
      'id' => 5,
      'nama' => 'Kemeja Batik',
      'gambar' => '../assets/img/gallery/produk 5.jpg',
      'deskripsi' => 'Meskipun terlihat formal dan kaku, sebenarnya baju batik bisa menjadi keren dengan jenis celana dan sepatu yang sesuai, lho. 
      Dengan memilih kemeja yang dari bahan katun premium dan dilapisi oleh furing, kemeja batik yang kamu gunakan akan menjadi kemeja yang sangat nyaman dan tidak akan bikin kepanasan saat mengikuti perkuliahan.',
      'harga' => 'Rp 350.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
    ],
    [
      'id' => 6,
      'nama' => 'Blazer',
      'gambar' => '../assets/img/gallery/produk 6.jpg',
      'deskripsi' => 'Blazer adalah salah satu penyelamat di kala kamu tidak tahu lagi haru mengenakan outfit apa ke kampus. 
      Padukan blazer dengan kaos atau kemeja polos, juga celana favorit. Jangan lupa kenakan sepatu yang nyaman, ya! Tambahkan totebag untuk membawa peralatan perkuliahanmu.',
      'harga' => 'Rp 400.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
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
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
    ],
    [
      'id' => 8,
      'nama' => 'Perpaduan Kaos/Kemeja dengan Celana Jeans',
      'gambar' => '../assets/img/gallery/produk 8.jpg',
      'deskripsi' => 'Tentunya perpaduan kaos/kemeja dengan celana jeans adalah hal yang sangat sering digunakan oleh para mahasiswa.',
      'harga' => 'Rp 500.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id',
            'tokopedia' => 'https://www.tokopedia.com',
            'lazada' => 'https://www.lazada.co.id'
        ],
    ],
    [
      'id' => 9,
      'nama' => 'BAJU TENUN COUPLE TUNIK MARWA X KEMEJA (WHITE-GREY)',
      'gambar' => '../assets/img/gallery/produk 16.jpg',
      'deskripsi' => 'Tampilkan kekompakan dengan pasanganmu dalam set couple tenun Marwa. Desain eksklusif, bahan berkualitas, dan jahitan rapi membuat set ini tahan lama. Cocok untuk acara formal maupun santai.',
      'harga' => 'Rp95.000 - Rp205.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id/product/17288248/2982834747?channel_code=MyCollection&uls_trackid=51l3hcqk047e&utm_campaign=-&utm_content=----&utm_medium=affiliates&utm_source=an_11367620044&utm_term=cc23frrr45bm',
            'tokopedia' => '',
            'lazada' => ''
        ],
    ],
    [
      'id' => 10,
      'nama' => 'S E I A | SEJIWA SET COUPLE HITAM BATIK',
      'gambar' => '../assets/img/gallery/produk 17.jpg',
      'deskripsi' => '✨Sejiwa set couple✨ dengan motif batik cap handmade

      💡 Kelebihan Sejiwa Rok Lilit:
      ✅ Bahan rayon premium dijamin adem, jatuh & flowy, ga nerawang
      ✅ Size Pinggang Adjustable
      ✅ Cocok untuk acara formal/casual😍
      
      💡Kelebihan Sejiwa Kemeja:
      ✅ Bahan katun premium dijamin adem, elegant, ga nerawang
      ✅ Cocok untuk acara formal/casual😍',
      'harga' => 'Rp134.100 - Rp170.100 ',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id/product/961146820/18975900958?uls_trackid=51l3hgoq0083&utm_campaign=-&utm_content=----&utm_medium=affiliates&utm_source=an_11367620044&utm_term=cc23izf4bmts',
            'tokopedia' => '',
            'lazada' => ''
        ],
    ],
    [
      'id' => 11,
      'nama' => 'CUTOFF Clark Kemeja Pria Oxford Panjang',
      'gambar' => '../assets/img/gallery/produk 11.jpg',
      'deskripsi' => 'Dibuat dari bahan plain oxford fabric yang memberikan kesan nyaman dan lembut ketika digunakan
      -Dengan button down collar membuat kerah tetap stay dan tegak saat beraktivitas
      -Bagian belakang kemeja terdapat back pleat yang dapat menyamarkan postur punggung agar terkesan lebih rapi.
      -Cuttingan Modern Fit yang mengikuti bentuk tubuh bikin look lebih stylish dan rapi',
      'harga' => 'Rp179.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id/product/224582338/12798155098?channel_code=MyCollection&uls_trackid=51l3fdni017e&utm_campaign=-&utm_content=----&utm_medium=affiliates&utm_source=an_11367620044&utm_term=cc21x6n4siv3',
            'tokopedia' => '',
            'lazada' => ''
        ],
    ],
    [
      'id' => 12,
      'nama' => 'Assojar - Couple Batik Sekar set / Baju setelan couple batik',
      'gambar' => '../assets/img/gallery/produk 18.jpg',
      'deskripsi' => 'Nikmati pesona batik Indonesia dengan set couple Batik Sekar. Motif sekar yang unik dan detail, dipadukan dengan bahan berkualitas tinggi. Tunjukkan sisi klasik dan modernmu bersama pasangan.',
      'harga' => 'Rp585.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id/product/268063807/11799719185?uls_trackid=51l3hj1e005l&utm_campaign=-&utm_content=----&utm_medium=affiliates&utm_source=an_11367620044&utm_term=cc23kukenydh',
            'tokopedia' => '',
            'lazada' => ''
        ],
    ],
    [
      'id' => 13,
      'nama' => 'Jayashree Batik Slimfit Nava Black - Kemeja Batik Pria Lengan Panjang',
      'gambar' => '../assets/img/gallery/produk 23.jpg',
      'deskripsi' => 'Kemeja Batik Jayashree Official hadir sesuai dengan kebutuhan kamu. Produk Batik Jayashree memiliki fokus menjaga kelestarian Batik di Indonesia dengan sentuhan Modern dari segi warna dan ukuran yang lebih trendy sehingga membuat kamu tampil lebih elegan dengan motif yang ciamik. Semua produk yang kami tampilkan adalah "realpict" dari Jayashree, jadi kamu tidak perlu khawatir untuk keaslian produk-nya.',
      'harga' => 'Rp180.000',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id/product/53450585/6464600476?uls_trackid=51l3sp6l0196&utm_campaign=-&utm_content=----&utm_medium=affiliates&utm_source=an_11367620044&utm_term=cc2c7qgjqnbq',
            'tokopedia' => '',
            'lazada' => ''
        ],
    ],
    [
      'id' => 14,
      'nama' => 'Coop Design - Zion Celana Bahan Kerja Panjang Formal Trousers Pants Slimfit Pria',
      'gambar' => '../assets/img/gallery/produk 24.jpg',
      'deskripsi' => 'Coop Design - Zion Celana Panjang Formal Pria adalah pilihan sempurna untuk menambah koleksi pakaian formal Anda, menawarkan kombinasi antara gaya yang sophisticated dan kenyamanan yang tak tertandingi. Dengan desain yang terperinci dan bahan berkualitas, celana ini siap menjadi andalan untuk setiap acara formal atau profesional. Anda bisa langsung membelinya satu set dengan Blazer formal dan paket bundling aksesoris dasi serta ikat pinggang (dikirim warna random)',
      'harga' => 'Rp118.900',
      'link_affiliate' => [
            'shopee' => 'https://shopee.co.id/product/225351054/10573356540?utm_campaign=-&utm_content=----&utm_medium=affiliates&utm_source=an_11367620044&utm_term=cc2comt5scvb',
            'tokopedia' => '',
            'lazada' => ''
        ],
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

// Cek status login pengguna
$isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <!-- Tambahkan SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Tambahkan Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <img src="<?php echo htmlspecialchars($detail['gambar']); ?>" alt="<?php echo htmlspecialchars($detail['nama']); ?>" class="img-fluid">
            </div>
            <div class="col-md-7">
                <h2><?php echo htmlspecialchars($detail['nama']); ?></h2>
                <p><?php echo htmlspecialchars($detail['deskripsi']); ?></p>
                <p><strong>Harga:</strong> <?php echo htmlspecialchars($detail['harga']); ?></p>

                <!-- Tombol Affiliate -->
                <button id="buyProductBtn" class="btn mt-3" style="background-color:#059ea3; color:white">Beli Produk</button>

                <!-- Tombol Wishlist -->
                <button id="wishlistBtn" class="btn btn-danger mt-3">Tambah ke Wishlist</button>
            </div>
        </div>
    </div>

    <!-- Modal Pilihan Platform -->
    <div class="modal fade" id="platformModal" tabindex="-1" aria-labelledby="platformModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="platformModalLabel">Pilih Platform untuk Membeli Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Silakan pilih platform tempat Anda ingin membeli produk ini:</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="<?php echo htmlspecialchars($detail['link_affiliate']['shopee']); ?>" target="_blank" class="btn btn-warning">Shopee</a>
                        <a href="<?php echo htmlspecialchars($detail['link_affiliate']['tokopedia']); ?>" target="_blank" class="btn btn-success">Tokopedia</a>
                        <a href="<?php echo htmlspecialchars($detail['link_affiliate']['lazada']); ?>" target="_blank" class="btn btn-primary">Lazada</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Tombol Beli Produk
        const buyProductBtn = document.getElementById("buyProductBtn");

        buyProductBtn.addEventListener("click", function () {
            const platformModal = new bootstrap.Modal(document.getElementById("platformModal"));
            platformModal.show();
        });

        // Tombol Wishlist
        const wishlistBtn = document.getElementById("wishlistBtn");

        wishlistBtn.addEventListener("click", function () {
            <?php if ($isLoggedIn): ?>
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Wishlist Anda telah tersimpan!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });

                // Kirim data wishlist ke server (Opsional)
                fetch("wishlist.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ productId: <?php echo $detail['id']; ?> }),
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        Swal.fire({
                            title: 'Error!',
                            text: data.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menyimpan wishlist.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
            <?php else: ?>
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Silakan login terlebih dahulu untuk menambahkan ke wishlist.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            <?php endif; ?>
        });
    });
    </script>
</body>
</html>

<?php
// Memasukkan Footer
include '../Layouts/footer.php';
?>