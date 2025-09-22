<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Form Approval</title>
  <style>
    body {
      font-family: system-ui, Arial, sans-serif;
      max-width: 600px;
      margin: 30px auto;
      padding: 20px;
      background: #f9f9f9;
    }
    .card {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    h2 { margin-top: 0; }
    .btn {
      display: inline-block;
      padding: 10px 16px;
      margin: 8px 6px 0 0;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      border: none;
      cursor: pointer;
    }
    .approve { background: #d4f8d4; }
    .reject { background: #ffd6d6; }
    .reschedule { background: #fff3cd; }
    #editForm {
      margin-top: 15px;
      padding: 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background: #fefefe;
      display: none;
    }
    #editForm input, #editForm textarea {
      width: 100%;
      padding: 8px;
      margin: 6px 0;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    #editForm button {
      background: #4caf50;
      color: #fff;
      border: none;
      padding: 10px;
      border-radius: 6px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>Approval Request</h2>
    <p><strong>ID:</strong> REQ-20250918-001</p>
    <p><strong>Pengirim:</strong> Budi</p>
    <p><strong>Deskripsi:</strong> Pembelian alat tulis kantor 10 unit</p>
    <p><strong>Jumlah:</strong> Rp 750.000</p>

    <button id="wa-approve" class="btn approve">Approve</button>
    <button id="wa-reject" class="btn reject">Reject</button>
    <button id="wa-reschedule" class="btn reschedule">Reschedule / Edit</button>

    <!-- Form edit (muncul setelah klik Reschedule) -->
    <div id="editForm">
      <h3>Reschedule / Edit Jadwal</h3>
      <label>Tanggal Baru:</label>
      <input type="date" id="newDate">
      <label>Jam Baru:</label>
      <input type="time" id="newTime">
      <label>Keterangan Tambahan:</label>
      <textarea id="note" rows="3"></textarea>
      <button id="submitEdit">Kirim Pembaruan</button>
    </div>
  </div>

<script>
const phone = "6285761016240"; // nomor WhatsApp kamu
const id = "REQ-20250918-001";

// Approve
document.getElementById('wa-approve').onclick = () => {
  const text = encodeURIComponent(`Permintaan ${id} telah *DISETUJUI* ✅`);
  window.location.href = `https://wa.me/${phone}?text=${text}`;
};

// Reject
document.getElementById('wa-reject').onclick = () => {
  const reason = prompt("Masukkan alasan penolakan:");
  if(reason){
    const text = encodeURIComponent(`Permintaan ${id} *DITOLAK* ❌\nAlasan: ${reason}`);
    window.location.href = `https://wa.me/${phone}?text=${text}`;
  }
};

// Reschedule/Edit
document.getElementById('wa-reschedule').onclick = () => {
  document.getElementById('editForm').style.display = 'block';
};

// Submit Edit
document.getElementById('submitEdit').onclick = () => {
  const tgl = document.getElementById('newDate').value;
  const jam = document.getElementById('newTime').value;
  const note = document.getElementById('note').value;
  if(tgl && jam){
    const text = encodeURIComponent(`Permintaan ${id} *DIRE-SCHEDULE* 🔄\nJadwal baru: ${tgl} ${jam}\nKeterangan: ${note}`);
    window.location.href = `https://wa.me/${phone}?text=${text}`;
  } else {
    alert("Tanggal dan jam wajib diisi!");
  }
};
</script>
</body>
</html>
