<?php
include 'db_oop.php';
class delete_mhs extends Database
{
    public function delete($nim)
    {
        $stmt = $this->conn->prepare("DELETE FROM mahasiswa WHERE nim = ?");
        $stmt->bind_param("s", $nim);
        if ($stmt->execute()) {
            return "Data berhasil dihapus.";
        } else {
            return "Error: " . $stmt->error;
        }
    }
}
?>

<form method="POST" action="">
    <h3>Hapus Data Mahasiswa</h3>
    NIM: <input type="text" name="nim" required><br>
    <input type="submit" value="Hapus">
    <br>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mhs = new delete_mhs();
    $nim = $_POST['nim'];
    echo $mhs->delete($nim);
}
?>
<br>
<?php
class read_mhs extends Database
{
    public function read()
    {
        $sql = "SELECT nim, nama_mhs, tempat_lahir, tanggal_lahir, jurusan,prodi, ipk FROM mahasiswa";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table border='1' cellspacing='0' cellpadding='5'>";
            echo "<tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jurusan</th>
                <th>Program Studi</th>
                <th>IPK</th>
              </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>". $row["nim"]. "</td>
                    <td>". $row["nama_mhs"]. "</td>
                    <td>". $row["tempat_lahir"]. "</td>
                    <td>". $row["tanggal_lahir"]. "</td>
                    <td>". $row["jurusan"]. "</td>
                    <td>". $row["prodi"]. "</td>
                    <td>". $row["ipk"]. "</td>
                  </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }
}
$mhs = new read_mhs();
$mhs->read();
?>
<a href="tugas_mhs.php">Kembali ke halaman Create</a>