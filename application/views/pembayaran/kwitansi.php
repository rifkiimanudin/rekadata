<h1>
    <center>
        <font face="Courier New" size="5">Kwitansi Pembayaran<br> PT Rekadata Pratama Medianet</font>
</h1>

<font face="Courier New" />

<table>

    <?php foreach ($transaksi as $ts) : ?>

        <tr>
            <td width="25%">ID Costumer</td>
            <td>:</td>
            <td><?= $ts['id']; ?></td>
        </tr>

        <tr>
            <td>Nama Costumer</td>
            <td>:</td>
            <td><?= $ts['nama']; ?></td>
        </tr>

        <tr>
            <td>Nama Paket</td>
            <td>:</td>
            <td><?= $ts['nama_paket']; ?></td>
        </tr>

        <tr>
            <td>Harga</td>
            <td> : </td>
            <td><?= $ts['harga']; ?></td>
        </tr>
        <hr><br>

        <tr>
            <td>Total Harga</td>
            <td>:</td>
            <td><?= $ts['harga']; ?></td>
        </tr>

    <?php endforeach; ?>

</table>

<script>
    window.print();
</script>