<style>
    * {
        font-family: Arial, Helvetica, sans-serif
    }

    .text-center {
        text-align: center;
    }

    table {
        width: 100%;
    }

    footer {
        position: fixed;
        /* height: 240px; */
        bottom: 0px;
    }
</style>

<p style="text-align:center;">
    <strong>Surat Perjanjian Kerjasama <br> Pesona Plesiran Indonesia</strong>
</p>
<p style="text-align:justify;">Pada hari ini {{ $cooperation->created_at->isoFormat('DD MMMM YYYY') }}, yang bertanda tangan di bawah ini:</p>
<p style="text-align:justify;">PIHAK PERTAMA:</p>
<ul>
    <li>
        <p style="text-align:justify;">Nama: CV Pesona Plesiran Indonesia</p>
    </li>
</ul>
<p style="text-align:justify;">Selanjutnya dalam perjanjian ini disebut sebagai
    <strong>PIHAK PERTAMA.</strong>
</p>
<p style="text-align:justify;">PIHAK KEDUA:</p>
<ul>
    <li>
        NIK: {{ $cooperation->nik }}
    </li>
    <li>
        Nama: {{ $cooperation->nama . ' (' . $cooperation->nama_usaha . ')' }}
    </li>
</ul>
<p style="text-align:justify;">Selanjutnya dalam perjanjian ini disebut sebagai <strong>PIHAK KEDUA.</strong></p>
<p style="text-align:justify;">Kedua belah pihak sepakat untuk melakukan kerjasama dalam jasa dengan ketentuan sebagai
    berikut:</p>
<ol>
    <li>
        <p style="text-align:justify;">Lingkup Jasa</p>
        <p style="text-align:justify;"><strong>PIHAK PERTAMA</strong> akan menyediakan Biro Perjalanan & Travelling
            kepada<strong> PIHAK
                KEDUA</strong> sesua dengan permintaan dan spesifikasi yang telah disepakati oleh kedua belah pihak.</p>
    </li>
    <li>
        <p style="text-align:justify;">Waktu dan Biaya</p>
        <p style="text-align:justify;">Waktu pelaksanaan jasa danbiaya yang terkait akan ditentukan dalam setiap
            perjanjian proyek yang dibuat antara <strong>PIHAK PERTAMA</strong> dan <strong>PIHAK KEDUA</strong>. Setiap
            proyek akan memiliki perjanjian tersendiri yang mencangkup detail waktu, biaya, dan spesifikasi.</p>
    </li>
    <li>
        <p style="text-align:justify;">Kepemilikan Hasil</p>
        <p style="text-align:justify;">Hasil dari jasa yang diberikan oleh <strong>PIHAK PERTAMA</strong> akan menjadi
            milik <strong>PIHAK KEDUA</strong> setelah pembayaran penuh atas jasa tersebut telah diterima oleh
            <strong>PIHAK PERTAMA</strong>.
        </p>
    </li>
    <li>
        <p style="text-align:justify;">Kualitas Jasa</p>
        <p style="text-align:justify;"><strong>PIHAK PERTAMA</strong> akan memberikan jasa sesuai dengan standar
            kualitas yang diharapkan dan spesifikasi yang telah disepakati. <strong>PIHAK KEDUA</strong> berhak meminta
            perbaikan atau revisi jika hasil jasa tidak sesuai dengan kesepakatan.</p>
    </li>
    <li>
        <p style="text-align:justify;">Pembayaran</p>
        <p style="text-align:justify;">Pembayaran atas jasa yang diberikan oleh <strong>PIHAK PERTAMA</strong> akan dilakukan sesuai
            dengan perjanjian proyek yang telah disepakati. Ketentuan pembayaran akan diatur dalam setiap perjanjian
            proyek yang dibuat.</p>
    </li>
    <li>
        <p style="text-align:justify;">Pengakhiran Kerjasama</p>
        <p style="text-align:justify;">Kerjasama ini dapat diakhiri oleh salah satu pihak dengan memberikan
            pemberitahuan tertulis kepada pihak lain paling lambat 1 bulan sebelum pengakhiran. Pemberitahuan ini harus
            mencantumkan alasan pengakhiran.</p>
    </li>
    <li>
        <p style="text-align:justify;">Kerahasiaan</p>
        <p style="text-align:justify;"><strong>PIHAK PERTAMA</strong> dan <strong>PIHAK KEDUA</strong> akan menjaga
            kerahasiaan informasi dan data yang saling berhubungan selama berlangsungnya kerjasama ini.</p>
    </li>
</ol>
<p>Demikian bentuk kerjasama ini dibuat dengan komitmen bersama, dan dipergunakan sebagaimana mestinya. Atas
    kerjasamanya kami ucapkan terimakasih.</p>
<table>
    <tr>
        <td>Pihak Kedua</td>
        <td>Pihak Pertama</td>
    </tr>
    <tr>
        <td>{{ $cooperation->nama }}</td>
        <td>CV Pesona Plesiran Indonesia</td>
    </tr>
</table>
<footer>
    <div style="font-size: 10pt">
        <div style="font-weight: bold">Note:</div>
        Berkas Perjanjian Kerjasama ini bersifat <b>Rahasia</b>, kami tidak bertanggung jawab atas kebocoran data atas kelalaian tersebut.
    </div>
</footer>
