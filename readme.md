# Lab7Web_PHP — Praktikum Pemrograman PHP

Praktikum dasar PHP: output, variabel, operator, percabangan, perulangan, array, function, form GET/POST, validasi input, dan mini project formulir data mahasiswa.

## 1. Tujuan

1. Menjalankan skrip PHP melalui web server lokal dan menampilkan output ke browser.
2. Memahami variabel, operator, percabangan (`if/elseif/else`), perulangan (`foreach`), dan array.
3. Membuat dan memakai function (`hitungDiskon()`, `formatRupiah()`).
4. Mengolah data form dengan metode GET dan POST.
5. Melakukan validasi input di sisi server dan mengamankan output dengan `htmlspecialchars()`.
6. Membuat mini project *Aplikasi Formulir Data Mahasiswa* beserta lima eksperimen mandiri.

## 2. Perangkat

| Perangkat | Keterangan |
|---|---|
| Bahasa | PHP 8.3 (CLI, built-in web server) |
| Editor | Visual Studio Code / editor teks apa pun |
| Browser | Google Chrome |
| Web server lokal | PHP built-in server (alternatif: XAMPP / Laragon) |
| Sistem operasi | Linux (juga berjalan di Windows/macOS) |

## 3. Cara Menjalankan Server Lokal

**Opsi A — PHP built-in server**

```bash
cd Lab7Web_PHP
php -S localhost:8000
```

Lalu buka `http://localhost:8000/` di browser.

**Opsi B — XAMPP / Laragon**

1. Salin folder `Lab7Web_PHP` ke `htdocs` (XAMPP) atau `www` (Laragon).
2. Jalankan Apache.
3. Buka `http://localhost/Lab7Web_PHP/`.

> File PHP harus dibuka lewat `http://localhost/...`, bukan dengan klik ganda (`file:///...`), karena kode PHP hanya dieksekusi oleh web server.

## 4. Struktur File

```
Lab7Web_PHP/
├── index.php          # Semua latihan 1–7 + Mini Project + Eksperimen 1–5
├── README.md          # Dokumentasi ini
├── Laporan_Praktikum_PHP.pdf   # Laporan (kode, screenshot, output)
└── screenshots/       # Bukti output browser
    ├── 00_halaman_penuh.png
    ├── 01_output_php.png
    ├── 02_nilai_rata_rata.png
    ├── 03a_array_daftar.png
    ├── 03b_cari_array_ditemukan.png
    ├── 03c_cari_array_tidak_ditemukan.png
    ├── 04_diskon_rupiah.png
    ├── 05_form_get.png
    ├── 06_form_post.png
    ├── 07a_barang_valid.png
    ├── 07b_barang_invalid.png
    ├── 08a_mini_valid_1.png
    ├── 08b_mini_valid_2.png
    ├── 08c_mini_invalid_1.png
    └── 08d_mini_invalid_2.png
```

Isi `index.php` dibagi per bagian (ditandai komentar di dalam kode):

| Bagian | Materi | Eksperimen |
|---|---|---|
| 1 | Menampilkan output PHP (`echo`, `date()`) | – |
| 2 | Variabel, operator, percabangan, nilai akhir & predikat | #1 Nilai rata-rata |
| 3 | Perulangan `foreach`, array, pencarian nama (GET) | #2 Cari nama di array |
| 4 | Function `hitungDiskon()` dan `formatRupiah()` | #3 Format Rupiah |
| 5 | Form pencarian kata (GET) | – |
| 6 | Form data mahasiswa sederhana (POST) | – |
| 7 | Form pengolahan data barang (POST, subtotal) | – |
| F | Mini Project: Formulir Data Mahasiswa | #4 Validasi NIM 8 digit, #5 Tombol Reset |

## 5. Ringkasan Hasil

| No | Latihan | Hasil |
|---|---|---|
| 1 | Output PHP | Menampilkan teks "PHP berhasil dijalankan" beserta waktu server (`date()`). |
| 2 | Nilai mahasiswa | Siti: tugas 85, UTS 78, UAS 90 → nilai akhir berbobot (30/30/40) = **84,90**, rata-rata = **84,33**, predikat **B**. |
| 3 | Array & pencarian | Daftar Alya, Bima, Citra, Doni. Pencarian "citra" ditemukan (tidak peka huruf besar/kecil), "Budi" tidak ditemukan. |
| 4 | Function | Harga Rp150.000 diskon 10% → **Rp135.000** (diformat dengan `formatRupiah()`). |
| 5 | Form GET | Kata kunci tampil kembali dan datanya terlihat di URL (`?kata=...`). |
| 6 | Form POST | Nama dan program studi ditampilkan setelah dikirim; data tidak muncul di URL. |
| 7 | Data barang | Buku Tulis, harga 7500 × 12 = **Rp90.000**. Input tidak valid (harga negatif / jumlah 0) ditolak dengan pesan error. |
| F | Mini project | Data valid ditampilkan dalam ringkasan; data tidak valid menampilkan daftar pesan kesalahan. |

### Kasus Input Valid dan Tidak Valid (Mini Project)

**Kasus valid**

| # | Nama | NIM | Prodi | Semester | Email | Hasil |
|---|---|---|---|---|---|---|
| 1 | Rina Putri | 20240123 | Teknik Informatika | 3 | rina@example.com | Diterima, ringkasan data tampil. |
| 2 | Dimas Pratama | 12345678 | Sistem Informasi | 7 | dimas.p@kampus.ac.id | Diterima, ringkasan data tampil. |

Alasan valid: nama dan prodi terisi, NIM hanya angka dengan panjang tepat 8 digit, semester bilangan bulat 1–14, dan format email sesuai `FILTER_VALIDATE_EMAIL`.

**Kasus tidak valid**

| # | Nama | NIM | Prodi | Semester | Email | Pesan yang muncul |
|---|---|---|---|---|---|---|
| 1 | Budi | 12345 | TI | 5 | budi@example.com | "NIM harus berupa angka dan harus pas 8 digit." |
| 2 | *(kosong)* | 2024ABCD | *(kosong)* | 20 | budi@@mail | Nama wajib diisi; NIM harus angka 8 digit; Program studi wajib diisi; Format email tidak valid; Semester harus 1 sampai 14. |

Pada kasus tidak valid, data tidak ditampilkan sebagai ringkasan dan isian form tetap terisi kembali (via `htmlspecialchars($_POST[...])`) agar pengguna tinggal memperbaikinya.

### Screenshot

| Latihan | File |
|---|---|
| 1 Output PHP | `screenshots/01_output_php.png` |
| 2 Nilai & rata-rata | `screenshots/02_nilai_rata_rata.png` |
| 3 Array & pencarian | `screenshots/03a…03c` |
| 4 Function & Rupiah | `screenshots/04_diskon_rupiah.png` |
| 5 Form GET | `screenshots/05_form_get.png` |
| 6 Form POST | `screenshots/06_form_post.png` |
| 7 Data barang | `screenshots/07a`, `07b` |
| Mini Project | `screenshots/08a…08d` |

## 6. Eksperimen Mandiri

1. **Nilai rata-rata** — `($tugas + $uts + $uas) / 3`, ditampilkan dengan `number_format()`.
2. **Cari nama di array** — form GET `carimhs` dicocokkan dengan `strcasecmp()` di dalam `foreach`.
3. **Format Rupiah** — function `formatRupiah()` memakai `number_format($angka, 0, ",", ".")`.
4. **Validasi NIM** — `ctype_digit($nim)` dan `strlen($nim) === 8`.
5. **Tombol Reset** — `<button type="reset">` mengosongkan isian di browser tanpa request ke server, sedangkan reload/submit menjalankan ulang skrip PHP di server.

## 7. Pertanyaan Evaluasi dan Jawaban

**1. Apa perbedaan pemrosesan client-side dan server-side?**

Client-side diproses di browser pengguna (misalnya HTML, CSS, JavaScript): kode dikirim ke pengguna dan dijalankan di perangkatnya, hasilnya langsung terlihat tanpa permintaan ke server, dan kodenya dapat dilihat pengguna. Server-side diproses di server (misalnya PHP): browser mengirim request, server mengeksekusi skrip, lalu hanya mengirim hasil berupa HTML ke browser. Kode PHP asli tidak pernah sampai ke pengguna, dan server-side dapat mengakses database serta berkas di server.

**2. Mengapa file PHP harus dijalankan melalui web server?**

Karena PHP adalah bahasa yang harus diinterpretasikan oleh PHP interpreter yang dipanggil oleh web server (Apache, Nginx, atau built-in server). Jika dibuka langsung lewat `file:///`, browser hanya menampilkan kode sebagai teks karena browser tidak bisa mengeksekusi PHP. Web server juga yang menyediakan data request seperti `$_GET`, `$_POST`, dan `$_SERVER`.

**3. Apa fungsi tanda `$` pada variabel PHP?**

Tanda `$` menandai bahwa sebuah nama adalah variabel, misalnya `$nama = "Siti";`. Tanpa `$`, PHP menganggapnya sebagai konstanta, nama function, atau kata kunci. Contoh lain adalah variabel superglobal seperti `$_GET` dan `$_POST`.

**4. Apa perbedaan metode GET dan POST?**

| Aspek | GET | POST |
|---|---|---|
| Letak data | Di URL (query string), mis. `?kata=php` | Di body request, tidak terlihat di URL |
| Keamanan | Data terlihat, tersimpan di riwayat/bookmark/log | Tidak tampil di URL (tetap harus divalidasi dan dilindungi HTTPS) |
| Batas data | Terbatas panjang URL | Jauh lebih besar |
| Kegunaan | Mengambil/mencari data, bisa di-bookmark | Mengirim/mengubah data, mis. form data mahasiswa |
| Akses di PHP | `$_GET` | `$_POST` |

**5. Mengapa input pengguna perlu divalidasi di sisi server?**

Validasi di sisi client (atribut HTML atau JavaScript) mudah dilewati, misalnya lewat developer tools, curl, atau skrip. Server tidak boleh memercayai data apa pun dari pengguna. Validasi server memastikan data benar (tipe, panjang, format, rentang), mencegah data rusak, dan melindungi dari serangan seperti XSS dan SQL injection. Pada praktikum ini terlihat saat atribut `required` dinonaktifkan, server tetap menolak data yang salah.

**6. Apa fungsi `htmlspecialchars()` ketika menampilkan data dari form?**

Fungsi ini mengubah karakter khusus HTML (`<`, `>`, `&`, `"`, `'`) menjadi entitas HTML (`&lt;`, `&gt;`, dst.) sehingga input pengguna ditampilkan sebagai teks biasa, bukan dieksekusi sebagai HTML atau JavaScript. Dengan begitu serangan XSS, misalnya input `<script>alert(1)</script>`, dapat dicegah.

**7. Apa manfaat penggunaan function dalam program PHP?**

- **Reusable**: ditulis sekali, dipanggil berkali-kali (`formatRupiah()` dipakai di bagian 4 dan 7).
- **Terstruktur dan mudah dibaca**: program dipecah menjadi bagian kecil bernama jelas.
- **Mudah dirawat**: perubahan cukup dilakukan di satu tempat.
- **Mudah diuji dan dikembangkan**: logika terpisah dari tampilan, mengurangi duplikasi kode.

## 8. Pengumpulan (Git)

```bash
cd Lab7Web_PHP
git init
git add .
git commit -m "Lab7Web_PHP: praktikum PHP, mini project, README, dan laporan"
git branch -M main
git remote add origin <URL-repository-anda>
git push -u origin main
```

Kumpulkan URL repository sesuai arahan dosen.
