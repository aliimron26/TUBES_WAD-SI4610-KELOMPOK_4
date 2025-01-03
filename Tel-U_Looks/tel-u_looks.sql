
CREATE DATABASE telulooks;

USE telulooks;

CREATE TABLE rekomendasi (
    id_rekomendasi INT PRIMARY KEY AUTO_INCREMENT,
    nama_fashion VARCHAR(100) NOT NULL,
    deskripsi_fashion VARCHAR(255) NOT NULL,
    harga INT NOT NULL,
    link_affiliate_shopee VARCHAR(255),
    link_affiliate_tokopedia VARCHAR(255),
    link_affiliate_lazada VARCHAR(255),
    image VARCHAR(255),
    status VARCHAR(10),
    kategori VARCHAR(255)
);

CREATE TABLE users (
    id_user VARCHAR(10) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE admin (
    id_admin VARCHAR(10) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO admin (id_admin, nama, username, password) 
VALUES ('adm1', 'admin1', 'admin1', 'admin1');

CREATE TABLE komentar (
    id_komentar INT PRIMARY KEY AUTO_INCREMENT,
    id_user VARCHAR(10),
    isi_komentar TEXT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

CREATE TABLE contact (
    id_pesan INT PRIMARY KEY AUTO_INCREMENT,
    nama_pengirim VARCHAR(100), 
    subjek TEXT NOT NULL,
    isi_pesan TEXT NOT NULL,
    status VARCHAR(10)
);

CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE profil (
    id_profil INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    bio TEXT,
    interest VARCHAR(100),
    FOREIGN KEY (username) REFERENCES users(username)
);

SELECT * FROM articles ORDER BY created_at DESC;

CREATE TABLE wishlist (
    id_wishlist INT AUTO_INCREMENT PRIMARY KEY,
    id_rekomendasi INT,
    FOREIGN KEY (id_rekomendasi) REFERENCES rekomendasi(id_rekomendasi)
);

INSERT INTO articles (id, title, content, image, created_at, updated_at) VALUES
(1, 'Dari Medan Perang Hingga Red Carpet: Sejarah Menarik Sepatu High Heels', 'Sepatu high heels, simbol femininitas dan keanggunan, memiliki sejarah panjang yang dimulai di Persia kuno sebagai alat untuk menunggang kuda, sebelum menjadi simbol status di Eropa pada abad ke-16, terutama di kalangan bangsawan. Seiring waktu, desainnya berevolusi dari sepatu berat menjadi lebih ringan dan elegan, diadopsi oleh wanita pada abad ke-18 dan menjadi simbol seksualitas pada abad ke-20 berkat industri film dan fashion. Saat ini, high heels hadir dalam berbagai bentuk dan ukuran, menjadi pernyataan gaya dan simbol status yang mencerminkan perubahan sosial dan budaya. Perjalanan mereka dari medan perang hingga red carpet menunjukkan bagaimana fashion dapat berevolusi dan beradaptasi dengan zaman, mengingatkan kita bahwa fashion adalah cerminan sejarah dan budaya yang terus berkembang.', 'superai-image-1735914310396.jpg', '2025-01-03 14:21:23', '2025-01-03 14:38:43'),
(2, 'Fashion Berkelanjutan: Mengapa Penting untuk Masa Depan Kita', 'Fashion berkelanjutan, yang semakin penting di era modern ini, merujuk pada praktik dalam industri fashion yang bertujuan mengurangi dampak negatif terhadap lingkungan dan masyarakat melalui penggunaan bahan ramah lingkungan, proses produksi yang etis, dan pengurangan limbah. Dengan industri fashion menjadi salah satu penyumbang terbesar polusi, beralih ke praktik berkelanjutan dapat membantu mengurangi jejak karbon dan melindungi ekosistem, serta memastikan kesejahteraan pekerja yang sering kali bekerja dalam kondisi tidak aman. Konsumen juga memiliki peran penting dengan memilih merek yang berkomitmen pada keberlanjutan. Beberapa cara untuk menerapkan fashion berkelanjutan termasuk memilih bahan ramah lingkungan, mendukung merek berkelanjutan, membeli pakaian bekas, merawat pakaian dengan baik, dan menerapkan prinsip reduce, reuse, recycle. Dengan mendukung praktik berkelanjutan, kita tidak hanya melindungi lingkungan tetapi juga menciptakan industri fashion yang lebih etis dan bertanggung jawab.', 'superai-image-1735914310396.webp', '2025-01-03 14:25:22', '2025-01-03 14:39:23');

INSERT INTO rekomendasi (id_rekomendasi, nama_fashion, deskripsi_fashion, harga, link_affiliate_shopee, link_affiliate_tokopedia, link_affiliate_lazada, image, status, kategori) VALUES
(1, 'A Line Skirt', 'Padukan rok dengan atasan sesuai keinginan. Pakailah flat shoes atau sepatu kets yang sesuai dengan keinginan, dan tara! Kamu siap pergi ke kampus.', 150000, '', 'https://www.tokopedia.com/weilin89/rok-wanita-korean-sytle-rok-panjang-model-a-line-pinggang-karet-fit-145-brown-e9767?extParam=ivf%3Dfalse%26keyword%3Da+line+skirt%26search_id%3D20250102153248160551637296ED08FRTE%26src%3Dsearch', '', 'produk 1.jpg', 'Upload', 'Dosen,Mahasiswa'),
(2, 'Jeans Kulot dan Outer Sederhana', 'Gunakan celana jeans kulot untuk bisa mengantongi kakimu yang jenjang. Kenakan juga inner pakaian warna terang yang dikombinasikan dengan outer dengan gaya casual seperti ini. Dijamin, cantik banget!', 200000, 'https://shopee.co.id/Highwaist-Kulot-Loose-Jeans-Wanita-Non-stret-i.57844585.14763624570?sp_atk=8937a236-394e-4e9b-bbfd-1520465d450e&xptdk=8937a236-394e-4e9b-bbfd-1520465d450e', '', '', 'produk 2.jpg', 'Upload', 'Dosen, Mahasiswa'),
(3, 'Hammerstout - Combat Slim Type-2 Black - Celana Panjang Cargo', 'American twill material, Slim straight cut, 95% cotton 5% Polyester, Ykk zip fly, 2 safary pocket on back and side tight, 2 side pocket, Official hammerstout screenprinted on back waist.', 215500, 'https://shopee.co.id/product/81405316/11909795225?uls_trackid=51le8to100bp&utm_campaign=-&utm_content=----&utm_medium=affiliates&utm_source=an_11367620044&utm_term=cc9uty2ke7xj', '', '', 'produk 9.jpg', 'Upload', 'Mahasiswa'),
(4, 'Hammerstout - Combat Loose - Celana Cargo', 'Tactical Cargo Pants, Midweight twill, 95% cotton 5% polyester, Regular Cut, YKK zipper fly, Adjustable waist with nylon strap, Hammerstout signature button, Shrink to fit', 202500, 'https://shopee.co.id/product/81405316/2797015055?channel_code=MyCollection&utm_campaign=-&utm_content=----&utm_medium=affiliates&utm_source=an_11367620044&utm_term=cc9vrra57kf9', '', '', 'produk 10.jpg', 'Upload', 'Mahasiswa'),
(5, 'Jayashree Batik Slimfit Nava Black - Kemeja Batik Pria Lengan Panjang', 'Kemeja Batik Jayashree Official hadir sesuai dengan kebutuhan kamu. Produk Batik Jayashree memiliki fokus menjaga kelestarian Batik di Indonesia dengan sentuhan Modern ', 180000, 'https://shopee.co.id/product/53450585/6464600476?uls_trackid=51lea9im0283&utm_campaign=-&utm_content=----&utm_medium=affiliates&utm_source=an_11367620044&utm_term=cc9vvsxc32v4', '', '', 'produk 23.jpg', 'Upload', 'Dosen, Mahasiswa'),
(6, 'CUTOFF Clark Kemeja Pria Oxford Panjang', 'Clark Basic Oxford Shirt\r\nBreathe some new life into your formalwear with this basic but stylish Clark Basic Oxford shirt. Worn with matching trousers, it is perfect for work.', 179000, 'https://shopee.co.id/product/224582338/12798155098?uls_trackid=51lebmtm017e&utm_campaign=-&utm_content=----&utm_medium=affiliates&utm_source=an_11367620044&utm_term=cc9wyvkmhjr7', '', '', 'produk 11.jpg', 'Upload', 'Dosen, Mahasiswa'),
(7, 'COZYCLUB Frank Polo Knit Shirt - Kaos Kerah Pria - Kaos Lengan Pendek | 31', 'Cozyclub.id Frank Polo Knit Shirt\r\nMaterial : Knit Premium\r\nColor : Black | Brown | Beige | Denim | Navy | BW', 109000, 'https://shopee.co.id/product/951799285/20679747793?channel_code=MyCollection&uls_trackid=51lebv3e0196&utm_campaign=-&utm_content=----&utm_medium=affiliates&utm_source=an_11367620044&utm_term=cc9x6jumszzc', '', '', 'produk 12.jpg', 'Upload', 'Mahasiswa'),
(8, 'Convergent Jersey Oversize', 'Convergent Jersey adalah pilihan tepat untuk penampilan santai Anda. Dibuat dari bahan berkualitas tinggi yang nyaman dan ringan dipakai sepanjang hari.', 149000, 'https://shopee.co.id/product/686629020/26717459245?channel_code=MyCollection&uls_trackid=51led7hv0096&utm_campaign=id_lGo9NlrUgF&utm_content=----&utm_medium=affiliates&utm_source=an_11367620044&utm_term=cc9y5nquoood', '', '', 'produk 13.jpg', 'Upload', 'Mahasiswa');