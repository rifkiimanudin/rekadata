<!doctype html>
<html>

<head>
    <meta charset="utf-8">

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <?php foreach ($transaksi as $ts) : ?>
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="<?= base_url('assets/img/logo.png') ?>" style="width:100%; max-width:300px;">
                                </td>

                            </tr>
                        </table>
                </td>
            </tr>

            <tr class="information">
                <td>
                    <table>
                        <tr>
                            <td>
                                ID Pelanggan <br>
                                Nama <br>
                                No Telepon <br>
                                Email <br>
                                Alamat <br>
                            </td>
                            <td>
                                : <br>
                                : <br>
                                : <br>
                                : <br>
                                : <br>
                            </td>
                            <td>
                                <?= $ts['id']; ?> <br>
                                <?= $ts['nama']; ?><br>
                                <?= $ts['telp']; ?><br>
                                <?= $ts['email']; ?><br>
                                <?= $ts['alamat']; ?> <?= $ts['kec']; ?> <?= $ts['kota']; ?> <?= $ts['prov']; ?>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Memilih Paket
                </td>

                <td>
                    Harga
                </td>
            </tr>

            <tr class="item">
                <td>
                    <?= $ts['nama_paket']; ?>
                </td>

                <td>
                    <?= $ts['harga']; ?>
                </td>
            </tr>


            <tr class="item">
                <td>
                    <br><br> Disetujui, <br><br><br>
                </td>
            </tr>
            <tr>

            </tr>
            <tr class="item">
                <td>
                    Kasir
                </td>
            </tr>
        </table>
    <?php endforeach; ?>
    </div>
</body>

</html>

<script>
    window.print();
</script>