<?php
require('assets/fpdf/fpdf.php');
include '../koneksi/koneksi.php';
// Mendapatkan ID pemesanan yang dipilih
$id = $_GET['id'];

// Menjalankan query untuk mendapatkan data pemesanan
$query = "SELECT * FROM pemesanan WHERE id = '$id'";
$result = mysqli_query($conn, $query);

// Memeriksa apakah query berhasil dijalankan
if (!$result) {
  echo "Error: " . mysqli_error($conn);
  exit();
}

// Membuat objek PDF
$pdf = new FPDF ('P', 'mm', 'A5');

// Mengatur halaman PDF
$pdf->SetMargins(20, 15, 15);





// Menambahkan halaman baru
$pdf->AddPage();

// Mencetak struk
$pdf->SetFont('helvetica', '', 10);

$row = mysqli_fetch_assoc($result);
$pdf->Cell(0, 5,  'Nota', 0, 1, 'R');
$pdf->Cell(0, 5, '#'.$row['id'], 0, 1, 'R');
$pdf->Cell(0, 5, '', 0, 1, 'C');
$pdf->SetFont('helvetica', 'B', 15);
$pdf->Cell(0, 5, '       HOMELASH NISA     ', 0, 1, 'C');
$pdf->SetFont('helvetica', '', 8);

$pdf->Cell(0, 5,  '       Ngronggah, Jl. Menur Raya, RT.002/RW.009, Sanggrahan     ', 0, 1, 'C');
$pdf->Cell(0, 3,  '       Kec. Grogol, Kabupaten Sukoharjo,      ', 0, 1, 'C');
$pdf->Cell(0, 5,  '       Jawa Tengah 57552      ', 0, 1, 'C');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(0, 5, '_________________________________________________________', 0, 1, 'C');

$pdf->Cell(90, 5, 'Nama: ' . $row['nama'], 0, 0, 'L');
$pdf->Cell(0, 5,  $row['tanggal'], 0, 1, 'L');

$pdf->Cell(0, 5, '_________________________________________________________', 0, 1, 'C');
$pdf->Cell(0, 5, '     DETAIL PEMESANAN     ', 0, 1, 'C');
$pdf->Cell(0, 5, '=======================================================', 0, 1, 'C');

$pdf->Cell(0, 5, 'Jenis Pesanan: ' . $row['jenis_pesanan'], 0, 1, 'L');
$pdf->Cell(0, 5, 'Ket                  : ' . $row['keterangan'], 0, 1, 'L');
$pdf->Cell(0, 5, '_________________________________________________________', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5, 'Total Harga: Rp' . $row['harga'], 0, 1, 'R');

// Mengoutputkan PDF
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(0, 5,  '            ', 0, 1, 'C');
$pdf->Cell(0, 5,  '            ', 0, 1, 'C');
$pdf->Cell(0, 5,  '       Terima kasih atas kepercayaan Anda     ', 0, 1, 'C');
$pdf->Cell(0, 5,  '       Kami harap Anda puas dengan layanan kami dan      ', 0, 1, 'C');
$pdf->Cell(0, 5,  '       kembali lagi di Homelash Nisa     ', 0, 1, 'C');
$pdf->Output('struk_pemesanan.pdf', 'I');

// Menutup koneksi
mysqli_close($conn);
