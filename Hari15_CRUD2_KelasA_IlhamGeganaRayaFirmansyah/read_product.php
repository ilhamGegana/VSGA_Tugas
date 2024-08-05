<?php
require 'db_connect.php';

try {
    $sql = "SELECT name, price FROM products";
    $stmt = $pdo->query($sql);

    echo "<table border='1'>
            <tr>
                <th>Name</th>
                <th>Price</th>
            </tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>" . htmlspecialchars($row['price']) . "</td>
              </tr>";
    }

    echo "</table>
    <br>
          <a href='insert_product.php'> Masukkan produk baru
          <br>
          <a href='update_product.php'> Update Produk
          <br>
          <a href='filter_product.php'> Filter berdasarkan minimum harga
          <br>
          <a href='delete_product.php'> Hapus Produk";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
