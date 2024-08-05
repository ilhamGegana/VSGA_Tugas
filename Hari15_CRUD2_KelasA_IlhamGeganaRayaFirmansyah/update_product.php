<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $price = $_POST['price'];

    try {
        $sql = "UPDATE products SET price = :price WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':price', $price);

        $stmt->execute();
        echo "Product price updated successfully. <br><a href='update_product.php'> Kembali";
    } catch (PDOException $e) {
        echo "Error updating product: " . $e->getMessage();
    }
} else {
    echo '<form method="post" action="">
            <label for="id">ID Produk:</label>
            <input type="number" id="id" name="id" required>
            <label for="price">Harga baru:</label>
            <input type="number" id="price" name="price" step="0.01" required>
            <input type="submit" value="Update">
          </form><br>
          <a href="insert_product.php"> Masukkan produk baru
          <br>
          <a href="delete_product.php"> Hapus Produk
          <br>
          <a href="filter_product.php"> Filter berdasarkan minimum harga
          <br>
          <a href="read_product.php"> Lihat data produk';
}
?>