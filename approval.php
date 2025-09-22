<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $rekanan = $_POST["rekanan"];
    $tanggal = $_POST["tanggal"];
    $pekerjaan = $_POST["pekerjaan"];
    $lokasi = $_POST["lokasi"];
    $pengawas = $_POST["pengawas"];

    // Tambahan untuk reschedule
    $reschedule_tanggal = $_POST["reschedule_tanggal"] ?? "";
    $reschedule_jam = $_POST["reschedule_jam"] ?? "";
    $reschedule_ket = $_POST["reschedule_ket"] ?? "";

    // Pesan utama
    $pesan = "NAMA: $nama%0A".
             "REKANAN: $rekanan%0A".
             "HARI/TANGGAL: $tanggal%0A".
             "PEKERJAAN: $pekerjaan%0A".
             "LOKASI: $lokasi%0A".
             "PENGAWAS: $pengawas";

    // Kalau ada reschedule
    if (!empty($reschedule_tanggal) && !empty($reschedule_jam)) {
        $pesan .= "%0A%0A*RESCHEDULE* 🔄%0A".
                  "Tanggal Baru: $reschedule_tanggal%0A".
                  "Jam Baru: $reschedule_jam%0A".
                  "Keterangan: $reschedule_ket";
    }

    // Nomor WA tujuan (ganti dengan nomor kamu, format internasional)
    $nomor = "6285761016240";

    header("Location: https://wa.me/$nomor?text=$pesan");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Approval</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f7f7f7;
      padding: 30px;
    }
    .container {
      max-width: 600px;
      margin: auto;
      background: #fff;
      padding: 20px 30px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    label {
      font-weight: bold;
    }
    input, textarea {
      width: 100%;
      padding: 8px;
      margin: 6px 0 16px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    button {
      background: #4CAF50;
      color: #fff;
      border: none;
      padding: 12px 20px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      width: 100%;
    }
    button:hover {
      background: #45a049;
    }
    .reschedule-section {
      background: #fef9e7;
      border: 1px solid #f5d76e;
      padding: 12px;
      border-radius: 8px;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Form Approval</h2>
    <form method="post" action="">
      <label>Nama:</label>
      <input type="text" name="nama" required>

      <label>Rekanan:</label>
      <input type="text" name="rekanan" required>

      <label>Hari/Tanggal:</label>
      <input type="date" name="tanggal" required>

      <label>Pekerjaan:</label>
      <input type="text" name="pekerjaan" required>

      <label>Lokasi:</label>
      <input type="text" name="lokasi" required>

      <label>Pengawas:</label>
      <input type="text" name="pengawas" required>

      <div class="reschedule-section">
        <h3>Reschedule (Opsional)</h3>
        <label>Tanggal Baru:</label>
        <input type="date" name="reschedule_tanggal">

        <label>Jam Baru:</label>
        <input type="time" name="reschedule_jam">

        <label>Keterangan:</label>
        <textarea name="reschedule_ket" rows="3"></textarea>
      </div>

      <button type="submit">Kirim ke WhatsApp</button>
    </form>
  </div>
</body>
</html>
