<?php

include "../koneksi.php";
require_once '../dompdf/autoload.inc.php';


        use Dompdf\Dompdf;
        $dompdf = new Dompdf();

        $sql = mysqli_query($koneksi, "SELECT * FROM transaksi ORDER BY tgl_transaksi");
        $html = '<center><h2>Laporan Penghasilan TB Abadi Jaya</h2></center><hr/><br/>';
        
        $html .= '<table border="1" width="100%">
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
					<th>ID Produk</th>
					<th>ID Pembeli</th>
					<th>Nama Produk</th>
					<th>Harga Produk</th>
                    <th>Jumlah</th>
                    <th>Sub Total</th>
                    <th>Tanggal</th>
				</tr>';
                $no=1;
                while($data = mysqli_fetch_assoc($sql)) {
                    //menampilkan data perulangan
                    $html .= '<tr>
                    <td>'.$no.'</td>
                    <td>'.$data['id_transaksi'].'</td>
                    <td>'.$data['id_produk'].'</td>
                    <td>'.$data['id_pembeli'].'</td>
                    <td>'.$data['nama_produk'].'</td>
                    <td>'.$data['harga_produk'].'</td>
                    <td>'.$data['jumlah'].'</td>
                    <td>'.$data['subtotal'].'</td>
                    <td>'.$data['tgl_transaksi'].'</td>
                            </tr>';
                    $no++;
                }
                $sql = mysqli_query($koneksi, "Select SUM(subtotal) AS laba From transaksi");
                $pendapatan = $sql->fetch_object()->laba;

                $html .= '<tr>
                        <td colspan="8">Total Pendapatan</td>
                        <td>Rp. '.$pendapatan.'</td>
                    </tr>';

                $html .= "</html>";
                $dompdf->loadHtml($html);
                // Setting ukuran dan orientasi kertas
                $dompdf->setPaper('A4', 'potrait');
                // Rendering dari HTML Ke PDF
                $dompdf->render();
                // Melakukan output file Pdf
                $dompdf->stream('Laporan_TB-Abadi-Jaya.pdf');
    
        header("Location: laporan.php");
?>