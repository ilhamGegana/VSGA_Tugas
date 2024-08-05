<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $min_price = $_POST['min_price'];

    try {
        $sql = "SELECT name, price FROM products WHERE price > :min_price";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':min_price', $min_price, PDO::PARAM_STR);

        $stmt->execute();

        echo "<table border='1'>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                </tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['name']) . "</td>
                    <td>" . htmlspecialchars($row['price']) . "</td>
                  </tr>";
        }
        echo "</table>";
        echo "<a href='filter_product.php'> Kembali";
    } catch (PDOException $e) {
        echo "Error filtering products: " . $e->getMessage();
    }
} else {
    echo '<form method="post" action="">
            <label for="min_price">Harga minimum:</label>
            <input type="number" id="min_price" name="min_price" step="0.01" required>
            <input type="submit" value="Filter">
          </form><br>
          <a href="insert_product.php"> Masukkan produk baru
          <br>
          <a href="update_product.php"> Update Produk
          <br>
          <a href="read_product.php"> Lihat data produk
          <br>
          <a href="delete_product.php"> Hapus Produk';
}
?>
