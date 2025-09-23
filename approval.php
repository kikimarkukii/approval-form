<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Approval</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f7f7f7; padding: 30px; }
    .container { max-width: 600px; margin: auto; background: #fff; padding: 20px 30px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    h2 { text-align: center; margin-bottom: 20px; }
    label { font-weight: bold; }
    input, textarea { width: 100%; padding: 8px; margin: 6px 0 16px; border: 1px solid #ccc; border-radius: 6px; }
    button { background: #4CAF50; color: #fff; border: none; padding: 12px 20px; font-size: 16px; border-radius: 8px; cursor: pointer; width: 100%; }
    button:hover { background: #45a049; }
    .reschedule-section { background: #fef9e7; border: 1px solid #f5d76e; padding: 12px; border-radius: 8px; margin-top: 20px; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Form Approval</h2>
    <form id="approvalForm">
      <label>Nama:</label>
      <input type="text" id="nama" required>

      <label>Rekanan:</label>
      <input type="text" id="rekanan" required>

      <label>Hari/Tanggal:</label>
      <input type="date" id="tanggal" required>

      <label>Pekerjaan:</label>
      <input type="text" id="pekerjaan" required>

      <label>Lokasi:</label>
      <input type="text" id="lokasi" required>

      <label>Pengawas:</label>
      <input type="text" id="pengawas" required>

      <div class="reschedule-section">
        <h3>Reschedule (Opsional)</h3>
        <label>Tanggal Baru:</label>
        <input type="date" id="reschedule_tanggal">

        <label>Jam Baru:</label>
        <input type="time" id="reschedule_jam">

        <label>Keterangan:</label>
        <textarea id="reschedule_ket" rows="3"></textarea>
      </div>

      <button type="submit">Kirim ke WhatsApp</button>
    </form>
  </div>

<script>
document.getElementById("approvalForm").addEventListener("submit", function(e) {
  e.preventDefault();

  const nama = document.getElementById("nama").value;
  const rekanan = document.getElementById("rekanan").value;
  const tanggal = document.getElementById("tanggal").value;
  const pekerjaan = document.getElementById("pekerjaan").value;
  const lokasi = document.getElementById("lokasi").value;
  const pengawas = document.getElementById("pengawas").value;

  const reschedule_tanggal = document.getElementById("reschedule_tanggal").value;
  const reschedule_jam = document.getElementById("reschedule_jam").value;
  const reschedule_ket = document.getElementById("reschedule_ket").value;

  let pesan = `NAMA: ${nama}\nREKANAN: ${rekanan}\nHARI/TANGGAL: ${tanggal}\nPEKERJAAN: ${pekerjaan}\nLOKASI: ${lokasi}\nPENGAWAS: ${pengawas}`;

  if (reschedule_tanggal && reschedule_jam) {
    pesan += `\n\n*RESCHEDULE* 🔄\nTanggal Baru: ${reschedule_tanggal}\nJam Baru: ${reschedule_jam}\nKeterangan: ${reschedule_ket}`;
  }

  const nomor = "6285761016240"; // nomor WA kamu
  const url = `https://wa.me/${nomor}?text=${encodeURIComponent(pesan)}`;
  window.open(url, "_blank");
});
</script>
</body>
</html>
