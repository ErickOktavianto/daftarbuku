<?php
    require '../functions.php';
    $keyword=  $_GET['keyword'];

    $query =    "SELECT * FROM buku
                WHERE 
                jdl LIKE '%$keyword%' OR
                tgl LIKE '%$keyword%' OR
                pengarang LIKE '%$keyword%' OR
                penerbit LIKE '%$keyword%'
                ";
    $buku = query($query);
?>

<table border="1" cellpadding="10" cellspacing="0">

<tr>
    <th>No.</th>
    <th>Aksi</th>
    <th>Gambar</th>
    <th>Tanggal Terbit</th>
    <th>Judul</th>
    <th>Pengarang</th>
    <th>Penerbit</th>
</tr>
<?php $i = 1;?>
<?php foreach($buku as $row ) :?>


<tr>
    <td><?= $i;?></td>
    <td>
        <a class="ubah" href="ubah.php?id=<?= $row["id"];?>">Ubah</a>  |
        <a class="hapus" href="hapus.php?id=<?= $row["id"];?>" onclick ="return confirm('Yakin?')">Hapus</a>
    </td>
    <td>
        <img src="img/<?= $row["gambar"];?>" width="50">
    </td>
    <td><?= $row["tgl"];?></td>
    <td><?= $row["jdl"];?></td>
    <td><?= $row["pengarang"];?></td>
    <td><?= $row["penerbit"];?></td>
</tr>
<?php $i++; ?>
<?php endforeach;?>

</table>