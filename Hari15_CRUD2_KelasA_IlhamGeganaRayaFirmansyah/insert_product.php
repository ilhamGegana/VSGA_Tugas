<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];

    try {
        $sql = "INSERT INTO products (name, price) VALUES (:name, :price)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);

        $stmt->execute();
        echo "Produk berhasil dimasukkan. <br><a href='insert_product.php'> Kembali";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo '<form method="post" action="">
            <label for="name">Nama Produk:</label>
            <input type="text" id="name" name="name" required>
            <label for="price">Harga:</label>
            <input type="number" id="price" name="price" step="0.01" required>
            <input type="submit" value="Insert">
          </form><br>
          <a href="update_product.php"> Update Produk
          <br>
          <a href="delete_product.php"> Hapus Produk
          <br>
          <a href="read_product.php"> Lihat data produk
          <br>
          <a href="filter_product.php"> Filter berdasarkan minimum harga';
}
