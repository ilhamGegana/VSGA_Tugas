<!DOCTYPE html>
<html>

<head>
    <title>Status Kelulusan Mahasiswa</title>
</head>

<body>
    <h2>Cek Status Kelulusan Mahasiswa</h2>
    <form method="post">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br><br>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        <label for="nilai_q1">Nilai Quiz 1:</label>
        <input type="number" id="nilai_q1" name="nilai_q1" required><br><br>
        <label for="nilai_q2">Nilai Quiz 2:</label>
        <input type="number" id="nilai_q2" name="nilai_q2" required><br><br>
        <label for="nilai_uts">Nilai UTS:</label>
        <input type="number" id="nilai_uts" name="nilai_uts" required><br><br>
        <label for="nilai_uas">Nilai UAS:</label>
        <input type="number" id="nilai_uas" name="nilai_uas" required><br><br>
        <label for="nilai_proyek">Nilai Proyek:</label>
        <input type="number" id="nilai_proyek" name="nilai_proyek" required><br><br>
        <input type="submit" value="Cek Kelulusan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $nilai_q1 = $_POST['nilai_q1'];
        $nilai_q2 = $_POST['nilai_q2'];
        $nilai_uts = $_POST['nilai_uts'];
        $nilai_uas = $_POST['nilai_uas'];
        $nilai_proyek = $_POST['nilai_proyek'];

        // menghitung nilai akhir
        function hitungNilaiAkhir($q1, $q2, $uts, $uas, $proyek)
        {
            return ($q1 * 0.1) + ($q2 * 0.1) + ($uts * 0.1) + ($uas * 0.2) + ($proyek * 0.5);
        }

        // Memasukkan hasil nilai akhir ke variabel
        $nilai_akhir = hitungNilaiAkhir($nilai_q1, $nilai_q2, $nilai_uts, $nilai_uas, $nilai_proyek);

        // Menentukan status kelulusan
        $status_kelulusan = $nilai_akhir > 60 ? 'Lulus' : 'Tidak Lulus';

        // Menampilkan hasil perhitungan dan status kelulusan
        echo "<h3>Hasil Perhitungan:</h3>";
        echo "<p>NIM: $nim</p>";
        echo "<p>Nama: $nama</p>";
        echo "<p>Nilai Akhir: " . number_format($nilai_akhir, 2, ',', '.') . "</p>";
        echo "<p>Status Kelulusan: $status_kelulusan</p>";
    }
    ?>
</body>

</html>
