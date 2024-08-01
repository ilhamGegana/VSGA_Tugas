<?php
include 'db_oop.php';
class update_mhs extends Database
{
    public function update($nim, $nama_mhs, $tempat_lahir, $tanggal_lahir, $jurusan, $prodi, $ipk)
    {
        $updt = $this->conn->prepare("UPDATE mahasiswa SET nama_mhs = ?, tempat_lahir = ?, tanggal_lahir = ?, jurusan = ?, prodi = ?, ipk = ? WHERE nim = ?");
        $updt->bind_param("sssssds", $nama_mhs, $tempat_lahir, $tanggal_lahir, $jurusan, $prodi, $ipk, $nim );
        if ($updt->execute()) {
            return "Data berhasil diperbarui.";
        } else {
            return "Error: " . $updt->error;
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $upd_mhs = new update_mhs();
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jurusan = $_POST['jurusan'];
    $prodi = $_POST['prodi'];
    $ipk = $_POST['ipk'];
    echo $upd_mhs->update($nim, $nama_mhs, $tempat_lahir, $tanggal_lahir, $jurusan, $prodi, $ipk);
}
?>
<form method="POST" action="">
    <h3>Update Mahasiswa</h3>
    Nim: <input type="text" name="nim" required><br>
    Nama Mahasiswa: <input type="text" name="nama_mhs" required><br>
    Tempat Lahir: <input type="text" name="tempat_lahir" required><br>
    Tanggal Lahir: <input type="date" name="tanggal_lahir" required><br>
    Jurusan: <input type="text" name="jurusan" required><br>
    Program Studi: <input type="text" name="prodi" required><br>
    IPK: <input type="number" step=any name="ipk" required><br>
    <input type="submit" value="Update">
    <br>
    <a href="tugas_mhs.php">Kembali ke halaman Create</a>
    <br>
</form>
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
