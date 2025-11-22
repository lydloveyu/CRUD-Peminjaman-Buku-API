<?php
// Mengimpor koneksi database
include 'config.php'; 

// Header untuk JSON dan CORS
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

// Fungsi kirim response JSON
function sendResponse($status, $message, $data = null, $total = 0) {
    $response = [
        "status" => $status,
        "message" => $message,
        "total_data" => $total,
        "data" => $data
    ];
    echo json_encode($response, JSON_PRETTY_PRINT);
    exit;
}

// Mendapatkan metode permintaan
$method = $_SERVER['REQUEST_METHOD'];

// Ambil input dari JSON atau query string
if ($method == 'GET') {
    $input = $_GET;
} else {
    $raw = file_get_contents("php://input");
    $input = json_decode($raw, true) ?? [];
}

// --- ROUTING API BERDASARKAN METODE ---
switch ($method) {

    case 'GET':
        $id = isset($input['id']) ? (int)$input['id'] : 0;
        if ($id > 0) {
            $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id = $id");
            $data = mysqli_fetch_assoc($query);
            if ($data) {
                $data['stok'] = (int)$data['stok'];
                $data['tahun'] = (int)$data['tahun'];
                sendResponse("success", "Data buku ID $id berhasil diambil", $data, 1);
            } else {
                sendResponse("error", "Buku dengan ID $id tidak ditemukan");
            }
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id DESC");
            $buku_data = [];
            while($d = mysqli_fetch_assoc($query)){
                $d['stok'] = (int)$d['stok'];
                $d['tahun'] = (int)$d['tahun'];
                $buku_data[] = $d;
            }
            sendResponse("success", "Daftar buku berhasil diambil", $buku_data, count($buku_data));
        }
        break;

    case 'POST':
        $judul = mysqli_real_escape_string($koneksi, $input['judul'] ?? '');
        $penulis = mysqli_real_escape_string($koneksi, $input['penulis'] ?? '');
        $tahun = isset($input['tahun']) ? (int)$input['tahun'] : 0;
        $stok = isset($input['stok']) ? (int)$input['stok'] : 0;

        if (empty($judul) || empty($penulis) || $tahun <= 0 || $stok < 0) {
            sendResponse("error", "Semua kolom (judul, penulis, tahun, stok) wajib diisi dengan benar.");
        }

        $query = "INSERT INTO buku (judul, penulis, tahun, stok) VALUES ('$judul', '$penulis', $tahun, $stok)";
        if (mysqli_query($koneksi, $query)) {
            $new_id = mysqli_insert_id($koneksi);
            sendResponse("success", "Buku berhasil ditambahkan", ['id' => $new_id], 1);
        } else {
            sendResponse("error", "Gagal menambahkan buku: " . mysqli_error($koneksi));
        }
        break;

    case 'PUT':
        $id = isset($input['id']) ? (int)$input['id'] : 0;
        $judul = mysqli_real_escape_string($koneksi, $input['judul'] ?? '');
        $penulis = mysqli_real_escape_string($koneksi, $input['penulis'] ?? '');
        $tahun = isset($input['tahun']) ? (int)$input['tahun'] : 0;
        $stok = isset($input['stok']) ? (int)$input['stok'] : 0;

        if ($id <= 0) {
            sendResponse("error", "ID buku wajib diisi untuk operasi UPDATE.");
        }
        if (empty($judul) || empty($penulis) || $tahun <= 0 || $stok < 0) {
            sendResponse("error", "Semua kolom (judul, penulis, tahun, stok) wajib diisi dengan benar.");
        }

        $query = "UPDATE buku SET 
                    judul='$judul', 
                    penulis='$penulis', 
                    tahun=$tahun, 
                    stok=$stok 
                  WHERE id=$id";

        if (mysqli_query($koneksi, $query)) {
            if (mysqli_affected_rows($koneksi) > 0) {
                sendResponse("success", "Data buku ID $id berhasil diperbarui");
            } else {
                sendResponse("warning", "Data buku ID $id tidak ada perubahan atau ID tidak ditemukan");
            }
        } else {
            sendResponse("error", "Gagal memperbarui buku: " . mysqli_error($koneksi));
        }
        break;

    case 'DELETE':
        $id = isset($input['id']) ? (int)$input['id'] : 0;
        if ($id <= 0) {
            sendResponse("error", "ID buku wajib diisi untuk operasi DELETE.");
        }

        $query = "DELETE FROM buku WHERE id=$id";
        if (mysqli_query($koneksi, $query)) {
            if (mysqli_affected_rows($koneksi) > 0) {
                sendResponse("success", "Buku ID $id berhasil dihapus");
            } else {
                sendResponse("warning", "Buku ID $id tidak ditemukan");
            }
        } else {
            sendResponse("error", "Gagal menghapus buku: " . mysqli_error($koneksi));
        }
        break;

    default:
        sendResponse("error", "Metode permintaan ($method) tidak didukung.");
        break;
}
?>
