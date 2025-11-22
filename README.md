<h1 align="center">📚 PERPUS VARO — Library Management API & Web App</h1>

<p align="center">
  Project pengembangan dari tugas Sekokalan yang meminta pembuatan API sederhana 
  untuk <strong>CRUD Buku</strong> serta <strong>Transaksi Peminjaman dan Pengembalian Buku</strong>.
</p>

<hr>

<h2>📌 1. Deskripsi Project</h2>

<p>
  Project <strong>Perpus Varo</strong> adalah aplikasi perpustakaan sederhana berbasis web 
  yang dikembangkan dengan <strong>PHP Native</strong> dan <strong>MySQL</strong>. 
  Selain tampilan web utama, project ini juga menyediakan <strong>REST API sederhana</strong> 
  agar data buku dan transaksi dapat diuji menggunakan Postman.
</p>

<p>
  Fitur utama:
</p>

<ul>
  <li>CRUD Buku (Create, Read, Update, Delete)</li>
  <li>Peminjaman buku (stok otomatis berkurang)</li>
  <li>Pengembalian buku (stok otomatis bertambah)</li>
  <li>API endpoint siap diuji di Postman</li>
  <li>UI web sederhana untuk interaksi dengan sistem</li>
</ul>

<hr>

<h2>📁 2. Struktur File Utama</h2>

<pre>
perpus_varo/
│── api.php                → API utama CRUD + transaksi
│── config.php             → Koneksi database MySQL
│── index.php              → Halaman daftar buku
│── tambah_buku.php        → Tambah buku baru
│── edit_buku.php          → Edit data buku
│── hapus_buku.php         → Hapus buku
│── peminjaman.php         → Form peminjaman (via API)
│── pengembalian.php       → Form pengembalian buku
│── proses_peminjaman.php  → Proses peminjaman manual (tanpa API)
│── perpustakaan.sql       → Struktur dan data database
│── style.css              → Style tampilan web
│── /assets/               → Folder gambar dan style tambahan
</pre>

<hr>

<h2>🧩 3. API Endpoint & Cara Kerja</h2>

<p>Semua endpoint ditangani oleh <strong>api.php</strong> menggunakan parameter <code>?action=</code>.</p>

<h3>📘 A. CRUD Buku</h3>

<table>
<tr><th>Action</th><th>Method</th><th>URL</th><th>Deskripsi</th></tr>

<tr>
<td>get_buku</td>
<td>GET</td>
<td><code>api.php?action=get_buku</code></td>
<td>Menampilkan semua buku</td>
</tr>

<tr>
<td>tambah_buku</td>
<td>POST</td>
<td><code>api.php?action=tambah_buku</code></td>
<td>Menambah buku baru</td>
</tr>

<tr>
<td>edit_buku</td>
<td>POST</td>
<td><code>api.php?action=edit_buku</code></td>
<td>Mengubah buku berdasarkan ID</td>
</tr>

<tr>
<td>hapus_buku</td>
<td>POST</td>
<td><code>api.php?action=hapus_buku</code></td>
<td>Menghapus buku</td>
</tr>
</table>

<h3>📙 B. Transaksi Peminjaman</h3>

<table>
<tr><th>Action</th><th>Method</th><th>URL</th><th>Deskripsi</th></tr>

<tr>
<td>pinjam_buku</td>
<td>POST</td>
<td><code>api.php?action=pinjam_buku</code></td>
<td>Peminjaman buku sekaligus mengurangi stok</td>
</tr>

<tr>
<td>kembalikan_buku</td>
<td>POST</td>
<td><code>api.php?action=kembalikan_buku</code></td>
<td>Pengembalian buku & menambah stok</td>
</tr>
</table>

<hr>

<h2>🛠️ 4. Cara Menjalankan Project</h2>

<h3>1️⃣ Import Database</h3>
<ol>
  <li>Buka phpMyAdmin</li>
  <li>Buat database baru <strong>perpustakaan</strong></li>
  <li>Import file <strong>perpustakaan.sql</strong></li>
</ol>

<h3>2️⃣ Jalankan Web</h3>
<p>Letakkan folder project di:</p>

<pre>C:\xampp\htdocs\perpus_varo</pre>

Lalu buka browser:

<pre>http://localhost/perpus_varo/</pre>

<hr>

<h2>📮 5. Panduan Pengujian API dengan Postman</h2>

<h3>🟦 1. GET – Tampilkan Semua Buku</h3>
<pre>GET → http://localhost/perpus_varo/api.php</pre>

<h3>🟧 2. POST – Tambah Buku</h3>
<pre>POST → http://localhost/perpus_varo/api.php</pre>
Body → form-data:
<ul>
  <li>judul</li>
  <li>penulis</li>
  <li>tahun</li>
  <li>stok</li>
</ul>

<h3>🟩 3. PUT – Edit Buku</h3>
<pre>POST → http://localhost/perpus_varo/api.php</pre>
Body → form-data:
<ul>
  <li>id</li>
  <li>judul</li>
  <li>penulis</li>
  <li>tahun</li>
  <li>stok</li>
</ul>

<h3>🟥 4. DELETE – Hapus Buku</h3>
<pre>POST → http://localhost/perpus_varo/api.php</pre>
Body:
<ul>
  <li>id</li>
</ul>

<h3>🟦 5. POST – Pinjam Buku</h3>
<pre>POST → http://localhost/perpus_varo/api.php</pre>
Body:
<ul>
  <li>id_buku</li>
  <li>nama</li>
</ul>

<h3>🟩 6. POST – Kembalikan Buku</h3>
<pre>POST → http://localhost/perpus_varo/api.php?action=kembalikan_buku</pre>
Body:
<ul>
  <li>id (ID transaksi peminjaman)</li>
</ul>

<hr>

<h2>📸 Screenshot Pengujian API di Postman</h2>

<div style="display: flex; flex-direction: column; gap: 20px;">

  <div>
    <h3>Postman Test 1</h3>
    <img src="postman (1).png" alt="Postman 1" width="500">
  </div>

  <div>
    <h3>Postman Test 2</h3>
    <img src="postman (2).png" alt="Postman 2" width="500">
  </div>

  <div>
    <h3>Postman Test 3</h3>
    <img src="postman (3).png" alt="Postman 3" width="500">
  </div>

  <div>
    <h3>Postman Test 4</h3>
    <img src="postman (4).png" alt="Postman 4" width="500">
  </div>

</div>


<ul>
  <li>GET semua buku</li>
  <li>POST tambah buku</li>
  <li>POST edit buku</li>
  <li>POST hapus buku</li>
  <li>POST pinjam buku</li>
  <li>POST kembalikan buku</li>
</ul>

<hr>

<h2>✔️ 7. Kesimpulan</h2>
<p>
  Project ini berhasil mengembangkan aplikasi perpustakaan sederhana menjadi sistem berbasis API 
  untuk CRUD dan transaksi peminjaman. API sudah dapat diuji menggunakan Postman 
  dan aplikasi web tetap dapat digunakan dengan interface yang mudah dipahami.
</p>

<p><strong>Siap dikumpulkan dan dinilai! 🎉</strong></p>
