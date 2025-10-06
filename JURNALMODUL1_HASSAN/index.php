<?php
// **********************  1  **************************
// Inisialisasi variabel
$nama=$email=$nohp=$jumtik=$film="";
$namaErr=$emailErr=$nohpErr=$jumtikErr=$filmErr="";
$nohp="";
$jumtik="";


// **********************  2  **************************
// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // **********************  3  **************************
    // Ambil nilai Nama dari form
    // silakan taruh kode kalian di bawah
    //buatkan validasi yang sesuai
    $nama=trim($_POST["nama"]);
    if (empty($nama)){
      $namaErr="Nama harus diisi";
    }

    // **********************  4  **************************
    // Ambil nilai Email dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
     $email=trim($_POST["email"]);
    if (empty($email)){
      $emailErr="Email harus diisi";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr="Format email tidak sesuai";
    }

    // **********************  5  **************************
    // Ambil nilai Nomor HP dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $nohp=trim($_POST["nohp"]);
    if (empty($nohp)){
      $nohpErr="Nomor telepon harus diisi";
    }
    elseif(!is_numeric($nohp)){
      $nohpErr="Nomor telepon harus berupa angka";
    }

    // **********************  6  **************************
    // Ambil nilai Film (dropdown)
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
     $film=trim($_POST["film"]);
    if (empty($film)){
      $filmErr="Pilih satu film";
    }

    // **********************  7  **************************
    // Ambil nilai Jumlah Tiket dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
     $jumtik=trim($_POST["jumtik"]);
    if (empty($jumtik)){
      $jumtikErr="Harus mengisi jumlah tiket";
    }
    elseif(!is_numeric($jumtik)){
      $jumtikErr="Jumlah tiket telepon harus berupa angka";
    }

$valid=false;
if(!$namaErr&&!$nohpErr&&!$jumtikErr&&!$filmErr&&!$emailErr){
  $valid=true;
}
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pemesanan Tiket Bioskop</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <!-- **********************  8  **************************
       Tambahkan nilai atribut di dalam src dengan nama file gambar logo bioskop
  -->
  <img src="" alt="Logo Bioskop EAD" class="logo">

  <h2>Form Pemesanan Tiket Bioskop</h2>
  <form method="post" action="">
    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Nama:</label>
    <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error"><?php echo $namaErr ? "* $namaErr":"";?> </span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr ? "* $emailErr":"";?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Nomor HP:</label>
    <input type="text" name="nomor" value="<?php echo $nohp; ?>">
    <span class="error"><?php echo $nohpErr ? "* $nohpErr":"";?></span>

    <label>Pilih Film:</label>
    <select name="film">
      <option value="">-- Pilih Film --</option>
      <option value="Interstellar">Interstellar</option>
      <option value="Inception">Inception</option>
      <option value="Oppenheimer">Oppenheimer</option>
      <option value="Avengers: Endgame">Avengers: Endgame</option>
    </select>
    <span class="error"><?php echo $filmErr ? "* $filmErr":""; ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Jumlah Tiket:</label>
    <input type="text" name="jumlah" value="<?php echo $jumtik; ?>">
    <span class="error"><?php echo $jumtikErr ? "* $jumtikErr":"";?></span>

    <button type="submit">Pesan Tiket</button>
  </form>
  
  <!-- **********************  9  ************************** -->
  <!-- Tampilkan hasil input dalam tabel jika semua valid -->
  <!-- silakan taruh kode kalian di bawah -->
  <?php  
  if($valid=true){
    ?>
    <div class = "form-container">
    <table>
      <head>
        <tr>
          <th width="15%">Nama</th>
          <th width="20%">Email</th>
          <th width="15%">No Telepon</th>
          <th width="15%">Film</th>
          <th width="15%">Jumlah Tiket</th>
        </tr>
      </head>
        <tr>
          <td><?php echo $nama; ?></td>
          <td><?php echo $email; ?></td>
          <td><?php echo $nohp; ?></td>
          <td><?php echo $film; ?></td>
          <td><?php echo $jumtik; ?></td>
        </tr>
    </table>

    <?php
  }

 
  
  ?>
</div>
</body>
</html>
