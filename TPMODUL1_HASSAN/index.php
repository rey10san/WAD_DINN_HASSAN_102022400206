<?php
// Inisialisasi variabel
$nama = $email = $nim = $jurusan = $alasan = "";
$namaErr = $emailErr = $nimErr = $jurusanErr = $alasanErr = "";
$valid=false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaErr = $emailErr = $nimErr = $jurusanErr = $alasanErr = "";
    $valid = false;

    // **********************  1  **************************
    // Tangkap nilai nama dari form
    // silakan taruh kode kalian di bawah
    if (empty(trim($_POST["nama"]))) {
        $namaErr = "Nama harus diisi";
    } else {
        $nama = trim($_POST["nama"]);
    }

    // **********************  2  **************************
    // Tangkap nilai email dari form
    // silakan taruh kode kalian di bawah
    if (empty(trim($_POST["email"]))) {
        $emailErr = "Email harus diisi";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Email tidak valid";
    } else {
        $email = trim($_POST["email"]);
    }

    // **********************  3  **************************
    // Tangkap nilai NIM dari form
    // silakan taruh kode kalian di bawah
    if (empty(trim($_POST["nim"]))) {
        $nimErr = "NIM harus diisi";
    } elseif (!is_numeric($_POST["nim"])) {
        $nimErr = "NIM harus berupa angka";
    } else {
        $nim = trim($_POST["nim"]);
    }

    // **********************  4  **************************
    // Tangkap nilai jurusan (dropdown)
    // silakan taruh kode kalian di bawah
    
    if (empty($_POST["jurusan"])) {
        $jurusanErr = "Harus mengisi jurusan";
    } else {
        $jurusan = $_POST["jurusan"];
    }

    // **********************  5  **************************
    // Tangkap nilai alasan (textarea)
    // silakan taruh kode kalian di bawah
    
    if (empty(trim($_POST["alasan"]))) {
        $alasanErr = "Alasan harus diisi";
    } else {
        $alasan = trim($_POST["alasan"]);
    }

    if ($namaErr=="" && $nimErr=="" && $alasanErr=="" && $emailErr=="" && $jurusanErr=="") {
        $valid = true;
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <img src="EAD.png" alt="Logo EAD" class="logo">
  <h2>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</h2>
  <form method="post" action="">
    <label>Nama:</label>
    <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error"><?php echo $namaErr; ?></span>

    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr; ?></span>

    <label>NIM:</label>
    <input type="text" name="nim" value="<?php echo $nim; ?>">
    <span class="error"><?php echo $nimErr; ?></span>

    <label>Jurusan:</label>
    <select name="jurusan">
      <option value="">-- Pilih Jurusan --</option>
      <option value="Sistem Informasi">Sistem Informasi</option>
      <option value="Informatika">Informatika</option>
      <option value="Teknik Industri">Teknik Industri</option>
    </select>
    <span class="error"><?php echo $jurusanErr; ?></span>

    <label>Alasan Bergabung:</label>
    <textarea name="alasan"><?php echo $alasan; ?></textarea>
    <span class="error"><?php echo $alasanErr; ?></span>

    <button type="submit">Daftar</button>
  </form>

  <?php
  // **********************  6  **************************
  // Tampilkan hasil input dalam tabel + logo di atasnya jika semua valid
  // silakan taruh kode kalian di bawah
if ($valid){
    echo "<div class='output'>";
    echo "<img src='EAD.png' alt='Logo EAD' class='logo'>";
    echo "<table border='1'>";
    echo "<tr><td><strong>Nama</strong></td><td>" . $nama . "</td></tr>";
    echo "<tr><td><strong>Email</strong></td><td>" . $email . "</td></tr>";
    echo "<tr><td><strong>NIM</strong></td><td>" . $nim . "</td></tr>";
    echo "<tr><td><strong>Jurusan</strong></td><td>" . $jurusan . "</td></tr>";
    echo "<tr><td><strong>Alasan Bergabung</strong></td><td>" . nl2br($alasan) . "</td></tr>";
    echo "</table>";
    echo "</div>";
}
    
    
  ?>
</div>
</body>
</html>