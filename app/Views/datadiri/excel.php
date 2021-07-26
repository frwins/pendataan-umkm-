<?php
header("content-type: application/vnd-ms-excel");
header("content-Disposition: attachment; filename=Data datadiri.xls");
?>

<html>

<body>
    <table border="1">
        <thead>
            <tr>
                <th scope="col">no</th>
                <th scope="col">No.KTP</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Pendapatan</th>
                <th scope="col">Telpon</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1; ?>
            <?php foreach ($datadiri as $d) : ?>

                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $d['KTP']; ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['alamat']; ?></td>
                    <td><?= $d['pekerjaan']; ?></td>
                    <td><?= $d['pendapatan']; ?></td>
                    <td><?= $d['telpon']; ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>