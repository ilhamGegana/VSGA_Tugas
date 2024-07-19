<?php
// Mendeklarasikan array untuk menyimpan data produk
$inventory = [
    [
        'nama_produk' => 'Shampo Head & Shoulders',
        'jumlah' => 10,
        'harga_per_produk' => 45000

    ],
    [
        'nama_produk' => 'Rinso Detergen',
        'jumlah' => 4,
        'harga_per_produk' => 30000
    ],
    [
        'nama_produk' => 'Sabun Lifebuoy',
        'jumlah' => 0,
        'harga_per_produk' => 5000
    ]
];

// Fungsi untuk menghitung total nilai inventaris per produk
function hitungTotalNilai($jumlah, $harga_per_produk)
{
    return $jumlah * $harga_per_produk;
}

$total_nilai_keseluruhan = 0;
// Menampilkan laporan inventaris
echo "<h2>Laporan Inventaris</h2>";
echo "<table border='1'>
        <tr>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga per Produk</th>
            <th>Total Nilai Inventaris</th>
            <th>Status Ketersediaan</th>
        </tr>";

foreach ($inventory as $item) {
    $total_nilai = hitungTotalNilai($item['jumlah'], $item['harga_per_produk']);
    $total_nilai_keseluruhan += $total_nilai;
    $status_ketersediaan = $item['jumlah'] > 0 ? 'Tersedia' : 'Tidak Tersedia';

    echo "<tr>
                    <td>{$item['nama_produk']}</td>
                    <td>{$item['jumlah']}</td>
                    <td>Rp " . number_format($item['harga_per_produk'], 0, ',', '.') . "</td>
                    <td>Rp " . number_format($total_nilai, 0, ',', '.') . "</td>
                    <td>{$status_ketersediaan}</td>
                  </tr>";
}

echo "</table>";
echo "<h3>Total Nilai Keseluruhan Inventaris: Rp " . number_format($total_nilai_keseluruhan, 0, ',', '.') . "</h3>";
