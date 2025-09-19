<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Approval</title>
  <meta property="og:title" content="Form Approval" />
  <meta property="og:description" content="Isi form approval dengan lengkap lalu pilih tindakan." />
  <meta property="og:image" content="https://kikimarkukii.github.io/approval-form/logo.png" />
  <meta property="og:url" content="https://kikimarkukii.github.io/approval-form/" />
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #fdf6ec;
      padding: 20px;
      color: #333;
    }
    h2 {
      text-align: center;
      color: #444;
    }
    form {
      max-width: 500px;
      margin: auto;
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }
    input {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    .btn {
      display: inline-block;
      margin-top: 15px;
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
    }
    .approve { background: #4CAF50; color: white; }
    .reject { background: #f44336; color: white; }
    .reschedule { background: #ff9800; color: white; }
  </style>
</head>
<body>
  <h2>Form Approval</h2>
  <form id="approvalForm">
    <label for="nama">NAMA:</label>
    <input type="text" id="nama" name="nama" required>

    <label for="rekanan">REKANAN:</label>
    <input type="text" id="rekanan" name="rekanan" required>

    <label for="tanggal">HARI/TANGGAL:</label>
    <input type="date" id="tanggal" name="tanggal" required>

    <label for="pekerjaan">PEKERJAAN:</label>
    <input type="text" id="pekerjaan" name="pekerjaan" required>

    <label for="lokasi">LOKASI:</label>
    <input type="text" id="lokasi" name="lokasi" required>

    <label for="pengawas">PENGAWAS:</label>
    <input type="text" id="pengawas" name="pengawas" required>

    <div style="text-align:center;">
      <button type="button" class="btn approve" onclick="sendWhatsApp('Approved')">APPROVE</button>
      <button type="button" class="btn reject" onclick="sendWhatsApp('Rejected')">REJECT</button>
      <button type="button" class="btn reschedule" onclick="sendWhatsApp('Reschedule')">RESCHEDULE</button>
    </div>
  </form>

  <script>
    function sendWhatsApp(action) {
      let nama = document.getElementById("nama").value;
      let rekanan = document.getElementById("rekanan").value;
      let tanggal = document.getElementById("tanggal").value;
      let pekerjaan = document.getElementById("pekerjaan").value;
      let lokasi = document.getElementById("lokasi").value;
      let pengawas = document.getElementById("pengawas").value;

      let message = `Approval Form\n\nNAMA: ${nama}\nREKANAN: ${rekanan}\nHARI/TANGGAL: ${tanggal}\nPEKERJAAN: ${pekerjaan}\nLOKASI: ${lokasi}\nPENGAWAS: ${pengawas}\n\nStatus: ${action}`;

      let url = "https://wa.me/6281234567890?text=" + encodeURIComponent(message); 
      window.open(url, "_blank");
    }
  </script>
</body>
</html>
