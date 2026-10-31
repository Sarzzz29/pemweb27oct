<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Mahasiswa</title>
</head>

<body>
    <h1>Form Biodata Mahasiswa</h1>

    <form method="POST">
            <label>Nama: </label>
            <input type="text" name="nama" required>
    <br></br>
    
    <label>NIM: </label>
    <input type="text" name="nim" required> 

    <label>Program Studi: </label>
    <select name="prodi">
        <option value="Informatika">Informatika</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
    </select>
    <br><br>

    <button type="submit">Kirim Data</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = htmlspecialchars($_POST["nama"]);
        $nim = htmlspecialchars($_POST["nim"]);
        $prodi = htmlspecialchars($_POST["prodi"]);

        echo "<h2>Data Mahasiswa</h2>";
        echo "Halo, " . $nama . "!<br>";
        echo "NIM: " . $nim . "<br>";
        echo "Program Studi: " . $prodi . "<br>";
    }
    ?>

</body>
</html>
