-- Membuat database
CREATE DATABASE telulooks;

-- Menggunakan database yang baru dibuat
USE telulooks;

-- Membuat tabel rekomendasi
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

-- Membuat tabel users
CREATE TABLE users (
    id_user VARCHAR(10) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Membuat tabel admin
CREATE TABLE admin (
    id_admin VARCHAR(10) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Menambahkan data ke tabel admin
INSERT INTO admin (id_admin, nama, username, password) 
VALUES ('adm1', 'admin1', 'admin1', 'admin1');

-- Membuat tabel komentar
CREATE TABLE komentar (
    id_komentar INT PRIMARY KEY AUTO_INCREMENT,
    id_user VARCHAR(10),
    isi_komentar TEXT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

-- Membuat tabel report
CREATE TABLE report (
    id_report INT PRIMARY KEY AUTO_INCREMENT,
    nama_pelapor VARCHAR(100),
    permasalahan TEXT NOT NULL,
    fitur_direport VARCHAR(100) NOT NULL,
    isi_report TEXT NOT NULL
);

CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

SELECT * FROM articles ORDER BY created_at DESC;