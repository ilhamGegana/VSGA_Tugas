<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    try {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        echo "Produk berhasil dihapus. <br><a href='delete_product.php'> Kembali";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo '<form method="post" action="">
            <label for="id">ID Produk:</label>
            <input type="number" id="id" name="id" required>
            <input type="submit" value="Delete">
          </form><br>
          <a href="insert_product.php"> Masukkan produk baru
          <br>
          <a href="update_product.php"> Update Produk
          <br>
            <a href="read_product.php"> Lihat data produk
          <br>
          <a href="filter_product.php"> Filter berdasarkan minimum harga';
}
?>
