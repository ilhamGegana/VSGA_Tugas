<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan Persegi Panjang</title>
</head>
<body>
    <h2>Perhitungan Persegi Panjang</h2>
    <form method="post">
        <label for="panjang">Panjang:</label>
        <input placeholder="Dalam cm..." type="number" id="panjang" name="panjang" required><br><br>
        <label for="lebar">Lebar:</label>
        <input placeholder="Dalam cm..." type="number" id="lebar" name="lebar" required><br><br>
        <input type="submit" value="Hitung">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];

        // Fungsi untuk menghitung luas persegi panjang
        function hitungLuas($panjang, $lebar) {
            return $panjang * $lebar;
        }

        // Fungsi untuk menghitung keliling persegi panjang
        function hitungKeliling($panjang, $lebar) {
            return 2 * ($panjang + $lebar);
        }

        // Fungsi untuk menghitung panjang diagonal persegi panjang
        function hitungDiagonal($panjang, $lebar) {
            return sqrt(pow($panjang, 2) + pow($lebar, 2));
        }

        // Memasukkn hasil hitung luas, keliling, dan panjang diagonal ke variabel
        $luas = hitungLuas($panjang, $lebar);
        $keliling = hitungKeliling($panjang, $lebar);
        $diagonal = hitungDiagonal($panjang, $lebar);

        // Menampilkan hasil perhitungan
        echo "<h3>Hasil Perhitungan:</h3>";
        echo "<p>Panjang: $panjang cm</p>";
        echo "<p>Lebar: $lebar cm</p>";
        echo "<p>Luas: $luas cm persegi</p>";
        echo "<p>Keliling: $keliling cm</p>";
        echo "<p>Panjang Diagonal: " . number_format($diagonal, 2, ',', '.') . " cm</p>";
    }
    ?>
</body>
</html>
