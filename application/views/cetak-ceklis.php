<html>
    <head>
    </head>
    <body onload="window.print()">
        <table width="100%" border="0" style="font-size: 19px">
            <tr>
                <td rowspan="3" >
                    <img class="g-width-1" src="<?= base_url('assets/undip.png') ?>" alt="Logo" style="width:85px; height:100px; display:block; margin-left: auto; margin-right: auto;">
                </td>
                <td  style="text-align: center" height="30px">
                    <b>FORMULIR CHECKLIST</b>
                </td>
            </tr>
            <tr>

                <td style="text-align: center">
                    <b>PENERIMAAN TENAGA KERJA KEPENDIDIKAN KONTRAK</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: center">
                    <b>UNIVERSITAS DIPONEGORO</b>
                </td>
            </tr>
        </table>
        <br>
        <hr>
        <br>
        <table border="1" style="border-collapse: collapse;"  cellpadding="10" width="100%"  style="font-size: 16px">
            <tr style="height:30px;">
                <td width="40%">KTP</td>
                <td width="50%"> <?= $ktp ?></td>
            </tr>
            <tr style="height:30px;">
                <td width="40%">Lamaran</td>
                <td width="50%"> <?= $lamaran ?></td>
            </tr>
            <tr style="height:30px;">
                <td width="40%">Ijazah</td>
                <td width="50%"> <?= $ijazah ?></td>
            </tr>
            <tr style="height:30px;">
                <td width="40%">Transkrip</td>
                <td width="50%"> <?= $transkrip ?></td>
            </tr>
            <tr style="height:30px;">
                <td width="40%">Akreditasi PTN</td>
                <td width="50%"> <?= $akreditasi ?></td>
            </tr>
            <tr style="height:30px;">
                <td width="40%">Akreditasi Prodi</td>
                <td width="50%"> <?= $akreditasi_prodi ?></td>
            </tr>
            <tr style="height:30px;">
                <td width="40%">Surat Keterangan Sehat</td>
                <td width="50%"> <?= $sks ?></td>
            </tr>
            <tr style="height:30px;">
                <td width="40%">Foto</td>
                <td width="50%"> <?= $foto ?></td>
            </tr>
            <tr style="height:100px;">
                <td colspan="2">Dokumen pendukung / yang dibawa pada saat TAHAP PEMBERKASAN : </td>
            </tr>
            <tr style="height:30px;">
                <td width="40%">Fotocopy Sertifikat Keahlian</td>
                <td width="50%"> Ada | Tidak ada</td>
            </tr>
            <tr style="height:30px;">
                <td width="40%">Foto Ukuran 4x6 (2 Lembar)</td>
                <td width="50%"> Ada | Tidak ada</td>
            </tr>
            <tr style="height:30px;">
                <td width="40%">Surat Keterangan Catatan Kepolisian (SKCK)</td>
                <td width="50%"> Ada | Tidak ada</td>
            </tr>
            <tr style="height:30px;">
                <td width="40%">Surat Keterangan Bebas Narkoba</td>
                <td width="50%"> Ada | Tidak ada</td>
            </tr>
            <tr style="height:30px;">
                <td width="40%">Toefl</td>
                <td width="50%"> Ada | Tidak ada</td>
            </tr>
            <tr style="height:30px;">
                <td width="40%">Daftar Riwayat Hidup</td>
                <td width="50%"> Ada | Tidak ada</td>
            </tr>
        </table>
        <br>
        <i style="color: red">*Formulir Registrasi, Formulir Checklist dan Seluruh berkas diatas <b>wajib</b> dibawa saat Pemberkasan</i>
        <table border="0" width="100%" style="font-size: 16px" cellpadding="10px">
            <tr>
                <td >
                </td>
                <td width="50%"  style="text-align: center">
                    Semarang, ..............................
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td style="text-align: center">
                    Verifikator
                    <br> 
                    <br>
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td  style="text-align: center">
                    (..............................................................)
                </td>
            </tr>
        </table>

        <?php
        $waktu = date('l, d-m-Y', strtotime("now"));
        $date = date('d');
        $d = date('D');
        $m = date('M');
        $y = date('Y');

        if ($d == 'Sun') {
            $hari = 'Minggu';
        } else if ($d == 'Mon') {
            $hari = 'Senin';
        } else if ($d == 'Tue') {
            $hari = 'Selasa';
        } else if ($d == 'Wed') {
            $hari = 'Rabu';
        } else if ($d == 'Thu') {
            $hari = 'Kamis';
        } else if ($d == 'Fri') {
            $hari = 'Jumat';
        } else if ($d == 'Sat') {
            $hari = 'Sabtu';
        }

        if ($m == 'Jan') {
            $bulan = 'Januari';
        } else if ($m == 'Feb') {
            $bulan = 'Februari';
        } else if ($m == 'Mar') {
            $bulan = 'Maret';
        } else if ($m == 'Apr') {
            $bulan = 'April';
        } else if ($m == 'May') {
            $bulan = 'Mei';
        } else if ($m == 'Jun') {
            $bulan = 'Juni';
        } else if ($m == 'Jul') {
            $bulan = 'Juli';
        } else if ($m == 'Aug') {
            $bulan = 'Agustus';
        } else if ($m == 'Sep') {
            $bulan = 'September';
        } else if ($m == 'Oct') {
            $bulan = 'Oktober';
        } else if ($m == 'Nov') {
            $bulan = 'November';
        } else if ($m == 'Dec') {
            $bulan = 'Desember';
        }
        ?>
    </body>
</html>