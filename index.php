<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Praktikum PHP Lengkap, Mini Project, & Eksperimen Mandiri</title>
</head>

<body>

    <h1>Praktikum Pemrograman PHP</h1>

    <!------------------------------------------------------------------------>
    <!-- 1. MENAMPILKAN OUTPUT PHP -->
    <!------------------------------------------------------------------------>
    <?php
    echo "<p><b>1. Output PHP:</b> PHP berhasil dijalankan. Waktu server: " . date("d-m-Y H:i:s") . "</p>";
    ?>

    <hr>

    <!------------------------------------------------------------------------>
    <!-- 2. VARIABEL, OPERATOR, PERCABANGAN, & NILAI RATA-RATA (Eksperimen #1) -->
    <!------------------------------------------------------------------------>
    <?php
    $namaSiti = "Siti";
    $tugas = 85;
    $uts = 78;
    $uas = 90;

    $nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);
    
    // Eksperimen 1: Hitung nilai rata-rata dari tiga komponen nilai
    $nilaiRataRata = ($tugas + $uts + $uas) / 3;

    if ($nilaiAkhir >= 85) {
        $predikat = "A";
    } elseif ($nilaiAkhir >= 75) {
        $predikat = "B";
    } elseif ($nilaiAkhir >= 60) {
        $predikat = "C";
    } else {
        $predikat = "D";
    }
    ?>
    <h3>2. Nilai Mahasiswa & Rata-rata</h3>
    <p>
        Nama: <?php echo htmlspecialchars($namaSiti); ?><br>
        Nilai Akhir (Bobot): <?php echo number_format($nilaiAkhir, 2); ?><br>
        Nilai Rata-rata: <?php echo number_format($nilaiRataRata, 2); ?><br>
        Predikat: <?php echo $predikat; ?>
    </p>

    <hr>

    <!------------------------------------------------------------------------>
    <!-- 3. PERULANGAN, ARRAY, & PENCARIAN ARRAY (Eksperimen #2) -->
    <!------------------------------------------------------------------------>
    <?php
    $mahasiswa = ["Alya", "Bima", "Citra", "Doni"];

    // Eksperimen 2: Cari nama dari array data sederhana menggunakan GET
    $hasilCariMhs = "";
    if (isset($_GET["carimhs"]) && !empty($_GET["carimhs"])) {
        $keywordMhs = trim($_GET["carimhs"]);
        foreach ($mahasiswa as $mhs) {
            if (strcasecmp($mhs, $keywordMhs) === 0) {
                $hasilCariMhs = "Mahasiswa atas nama '" . htmlspecialchars($mhs) . "' ditemukan di dalam array!";
                break;
            }
        }
        if ($hasilCariMhs === "") {
            $hasilCariMhs = "Mahasiswa '" . htmlspecialchars($keywordMhs) . "' tidak ditemukan di array.";
        }
    }
    ?>
    <h3>3. Daftar Mahasiswa & Pencarian Array</h3>
    <ol>
        <?php foreach ($mahasiswa as $mhs): ?>
            <li><?php echo htmlspecialchars($mhs); ?></li>
        <?php endforeach; ?>
    </ol>

    <form method="GET" action="">
        <label for="carimhs">Cari Nama dalam Array:</label>
        <input id="carimhs" name="carimhs" type="text" value="<?php echo htmlspecialchars($_GET['carimhs'] ?? ''); ?>">
        <button type="submit">Cari</button>
    </form>
    <?php if ($hasilCariMhs !== "") echo "<p><b>$hasilCariMhs</b></p>"; ?>

    <hr>

    <!------------------------------------------------------------------------>
    <!-- 4. MEMBUAT FUNCTION & FORMAT RUPIAH (Eksperimen #3) -->
    <!------------------------------------------------------------------------>
    <?php
    function hitungDiskon($harga, $persen) {
        $potongan = $harga * ($persen / 100);
        return $harga - $potongan;
    }

    // Eksperimen 3: Function untuk mengubah format harga menjadi Rupiah
    function formatRupiah($angka) {
        return "Rp" . number_format($angka, 0, ",", ".");
    }

    $hargaAsli = 150000;
    $hargaDiskon = hitungDiskon($hargaAsli, 10);
    ?>
    <h3>4. Perhitungan Diskon & Format Rupiah</h3>
    <p>
        Harga Asli: <?php echo formatRupiah($hargaAsli); ?><br>
        Harga setelah diskon 10%: <?php echo formatRupiah($hargaDiskon); ?>
    </p>

    <hr>

    <!------------------------------------------------------------------------>
    <!-- 5. FORM PENCARIAN KATA (GET) -->
    <!------------------------------------------------------------------------>
    <h3>5. Form Pencarian (GET)</h3>
    <form method="GET" action="">
        <label for="kata">Kata kunci:</label>
        <input id="kata" name="kata" type="text" value="<?php echo htmlspecialchars($_GET['kata'] ?? ''); ?>">
        <button type="submit">Cari</button>
    </form>
    <?php
    if (isset($_GET["kata"]) && $_GET["kata"] !== "") {
        $kataCari = trim($_GET["kata"]);
        echo "<p>Kata kunci dicari: " . htmlspecialchars($kataCari, ENT_QUOTES, "UTF-8") . "</p>";
    }
    ?>

    <hr>

    <!------------------------------------------------------------------------>
    <!-- 6. FORM DATA MAHASISWA (POST SEDERHANA) -->
    <!------------------------------------------------------------------------>
    <h3>6. Form Data Mahasiswa (POST)</h3>
    <form method="POST" action="">
        <label for="nama_mhs">Nama:</label><br>
        <input id="nama_mhs" name="nama_mhs" type="text" required><br><br>

        <label for="prodi_sederhana">Program Studi:</label><br>
        <input id="prodi_sederhana" name="prodi_sederhana" type="text" required><br><br>

        <button type="submit" name="kirim_sederhana">Kirim Data</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["kirim_sederhana"])) {
        $namaMhs = trim($_POST["nama_mhs"] ?? "");
        $prodiMhs = trim($_POST["prodi_sederhana"] ?? "");

        if ($namaMhs === "" || $prodiMhs === "") {
            echo "<p style='color:red;'>Semua kolom wajib diisi.</p>";
        } else {
            echo "<p><b>Data Diterima:</b><br>";
            echo "Nama: " . htmlspecialchars($namaMhs, ENT_QUOTES, "UTF-8") . "<br>";
            echo "Program Studi: " . htmlspecialchars($prodiMhs, ENT_QUOTES, "UTF-8") . "</p>";
        }
    }
    ?>

    <hr>

    <!------------------------------------------------------------------------>
    <!-- 7. PENGOLAHAN DATA BARANG -->
    <!------------------------------------------------------------------------>
    <h3>7. Form Pengolahan Data Barang</h3>
    <form method="POST" action="">
        <label>Nama barang: <input name="barang" type="text" required></label><br><br>
        <label>Harga: <input name="harga_brg" type="number" min="0" step="0.01" required></label><br><br>
        <label>Jumlah: <input name="jumlah_brg" type="number" min="1" step="1" required></label><br><br>
        <button type="submit" name="hitung_barang">Hitung Subtotal</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["hitung_barang"])) {
        $barang = trim($_POST["barang"] ?? "");
        $hargaInput = $_POST["harga_brg"] ?? "";
        $jumlahInput = $_POST["jumlah_brg"] ?? "";

        if (
            $barang === "" ||
            !is_numeric($hargaInput) ||
            !ctype_digit((string) $jumlahInput) ||
            (float) $hargaInput < 0 ||
            (int) $jumlahInput < 1
        ) {
            $errorBarang = "Periksa kembali nama barang, harga, dan jumlah.";
        } else {
            $subtotal = (float) $hargaInput * (int) $jumlahInput;
        }

        if (isset($errorBarang)) {
            echo "<p style='color:red;'>" . htmlspecialchars($errorBarang) . "</p>";
        } elseif (isset($subtotal)) {
            echo "<p><b>Hasil Perhitungan Barang:</b><br>";
            echo "Barang: " . htmlspecialchars($barang) . "<br>";
            echo "Subtotal: " . formatRupiah($subtotal) . "</p>";
        }
    }
    ?>

    <hr>

   <!------------------------------------------------------------------------>
    <!-- F. MINI PROJECT: APLIKASI FORMULIR DATA MAHASISWA & EKSPERIMEN #4 & #5 -->
    <!------------------------------------------------------------------------>
    <?php
    // Bagian Pemrosesan Data Mini Project
    $dataMaha = null;
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit_mini"])) {
        $nama = trim($_POST["nama"] ?? "");
        $nim = trim($_POST["nim"] ?? "");
        $prodi = trim($_POST["prodi"] ?? "");
        $semesterInput = $_POST["semester"] ?? "";
        $email = trim($_POST["email"] ?? "");

        if ($nama === "") {
            $errors[] = "Nama wajib diisi.";
        }
        
        // Eksperimen 4: Validasi NIM agar hanya berisi angka dan panjang tepat 8 digit
        if ($nim === "") {
            $errors[] = "NIM wajib diisi.";
        } elseif (!ctype_digit($nim) || strlen($nim) !== 8) {
            $errors[] = "NIM harus berupa angka dan harus pas 8 digit.";
        }

        if ($prodi === "") {
            $errors[] = "Program studi wajib diisi.";
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Format email tidak valid.";
        }
        
        if (!ctype_digit((string)$semesterInput) || (int)$semesterInput < 1 || (int)$semesterInput > 14) {
            $errors[] = "Semester harus berupa angka 1 sampai 14.";
        }

        if (empty($errors)) {
            $dataMaha = compact("nama", "nim", "prodi", "email");
            $dataMaha["semester"] = (int)$semesterInput;
        }
    }
    ?>

    <h3>F. Mini Project — Aplikasi Formulir Data Mahasiswa</h3>

    <!-- Menampilkan Pesan Error jika Ada -->
    <?php if (!empty($errors)): ?>
        <div style="color: red; background: #ffeeee; padding: 10px; margin-bottom: 10px;">
            <b>Terjadi Kesalahan:</b>
            <ul>
                <?php foreach ($errors as $err): ?>
                    <li><?php echo htmlspecialchars($err); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Form HTML + Tombol Reset (Eksperimen #5) -->
    <form method="POST" action="">
        <label for="nama_mp">Nama:</label><br>
        <input type="text" id="nama_mp" name="nama" value="<?php echo htmlspecialchars($_POST['nama'] ?? ''); ?>"><br><br>

        <label for="nim_mp">NIM (Harus 8 Digit Angka):</label><br>
        <input type="text" id="nim_mp" name="nim" value="<?php echo htmlspecialchars($_POST['nim'] ?? ''); ?>"><br><br>

        <label for="prodi_mp">Program Studi:</label><br>
        <input type="text" id="prodi_mp" name="prodi" value="<?php echo htmlspecialchars($_POST['prodi'] ?? ''); ?>"><br><br>

        <label for="semester_mp">Semester (1-14):</label><br>
        <input type="number" id="semester_mp" name="semester" value="<?php echo htmlspecialchars($_POST['semester'] ?? ''); ?>"><br><br>

        <label for="email_mp">Email:</label><br>
        <input type="text" id="email_mp" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"><br><br>

        <button type="submit" name="submit_mini">Kirim Data Mahasiswa</button>
        
        <!-- Eksperimen 5: Tombol Reset -->
        <button type="reset">Reset Form</button>
    </form>

    <!-- Penjelasan Eksperimen 5 -->
    <p style="font-size: 0.9em; color: #555;">
        <i>Catatan Eksperimen 5: Tombol <b>Reset</b> membersihkan isian form di sisi browser secara instan tanpa memuat ulang ke server, sedangkan pemrosesan ulang/reload server mengeksekusi ulang script PHP di backend.</i>
    </p>

    <!-- Menampilkan Ringkasan Data jika Valid -->
    <?php if ($dataMaha !== null): ?>
        <div style="background: #eeffee; padding: 10px; margin-top: 15px; border: 1px solid #ccffcc;">
            <h3>Ringkasan Data Mahasiswa Berhasil Dikirim:</h3>
            <p>Nama: <?php echo htmlspecialchars($dataMaha["nama"]); ?></p>
            <p>NIM: <?php echo htmlspecialchars($dataMaha["nim"]); ?></p>
            <p>Program Studi: <?php echo htmlspecialchars($dataMaha["prodi"]); ?></p>
            <p>Semester: <?php echo htmlspecialchars($dataMaha["semester"]); ?></p>
            <p>Email: <?php echo htmlspecialchars($dataMaha["email"]); ?></p>
        </div>
    <?php endif; ?>

</body>

</html>