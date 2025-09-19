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
    <button id="wa-reschedule" class="btn reschedule">Reschedule</button>
  </div>

<script>
const phone = "6281234567890"; // nomor admin (format internasional tanpa +)
const id = "REQ-20250918-001";

document.getElementById('wa-approve').onclick = () => {
  const text = encodeURIComponent(`Permintaan ${id} telah *DISETUJUI* ✅`);
  window.location.href = `https://wa.me/${phone}?text=${text}`;
};

document.getElementById('wa-reject').onclick = () => {
  const reason = prompt("Masukkan alasan penolakan:");
  const text = encodeURIComponent(`Permintaan ${id} *DITOLAK* ❌\nAlasan: ${reason}`);
  window.location.href = `https://wa.me/${phone}?text=${text}`;
};

document.getElementById('wa-reschedule').onclick = () => {
  const tgl = prompt("Masukkan tanggal baru (YYYY-MM-DD):");
  const jam = prompt("Masukkan jam baru (HH:MM):");
  if(tgl && jam){
    const text = encodeURIComponent(`Permintaan ${id} *DIRE-SCHEDULE* 🔄\nJadwal baru: ${tgl} ${jam}`);
    window.location.href = `https://wa.me/${phone}?text=${text}`;
  }
};
</script>
</body>
</html>
