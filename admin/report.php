<?php

include "../koneksi.php";
require_once '../dompdf/autoload.inc.php';


        use Dompdf\Dompdf;
        $dompdf = new Dompdf();

        $sql = mysqli_query($koneksi, "SELECT * FROM transaksi") or die (mysqli_error($koneksi));
        $html = '<center><h2>Laporan Penghasilan TB Abadi Jaya</h2></center><hr/><br/>';
        
        $html .= '<table border="1" width="100%">
                <tr>
                    <th>No</th>
                    <th>Id Transaksi</th>
                    <th>Id Produk</th>
					<th>Id Pembeli</th>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
                    <th>Total Bayar</th>
                    <th>Tanggal Transaksi</th>
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
                    <td> Rp.'.$data['harga_produk'].'</td>
                    <td> '.$data['jumlah'].'</td>
                    <td> Rp.'.$data['subtotal'].'</td>
                    <td>'.$data['tgl_transaksi'].'</td>
                            </tr>';
                    $no++;
                }
                $sql = mysqli_query($koneksi, "SELECT SUM(subtotal) AS laba From transaksi");
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
                $dompdf->stream('Laporan_AbadiJaya.pdf');
    
        header("Location: index3.php");
?>