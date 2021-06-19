<?php

include "config/connect.php";
include "library/app.php";

$go = new App();
$table = 'jenis';

@$field = array(
    'jenis' => $_POST['jenis']
);

$redirect = "?menu=type";
@$where = "jenisID = $_GET[id]";

if (isset($_POST['simpan'])) {
    $go->create($con, $table, $field, $redirect);
}

if (isset($_GET['hapus'])) {
    $go->delete($con, $table, $where, $redirect);
}

if (isset($_GET['edit'])) {
    $edit = $go->edit($con, $table, $where);
}

if (isset($_POST['ubah'])) {
    $go->update($con, $table, $field, $where, $redirect);
}

?>

<div class="w-100">
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Jenis Produk</h1>
    </div>

    <?php include('components/alert.html'); ?>

    <form class="mb-5" method="post">
        <h6>Jenis Produk</h6>
        <div class="input-group mb-3 w-25">
            <input class="form-control" type="text" name="jenis" value="<?php echo @$edit['jenis'] ?>" placeholder="Nama jenis produk" required>
        </div>
        <?php if (@$_GET['id'] == "") { ?>
            <input class="btn btn-success me-3" type="submit" name="simpan" value="Tambah"></input>
            <input class="btn btn-warning" type="submit" name="ubah" value="Ubah" disabled>
            <button class="btn btn-danger" type="button" disabled>Batal</button>
        <?php } else { ?>
            <input class="btn btn-success me-3" type="submit" name="simpan" value="Tambah" disabled></input>
            <input class="btn btn-warning" type="submit" name="ubah" value="Ubah">
            <a href="?menu=type" class="btn btn-danger">Batal</a>
        <?php } ?>
    </form>

    <div class="table-responsive">
        <table id="tb-type" class="display">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Jenis</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = $go->read($con, $table);
                $no = 0;
                if ($data == "") {
                    echo "<tr><td colspan='4'>No Data</td></tr>";
                } else {
                    foreach ($data as $r) {
                        $no++
                ?>
                        <tr>
                            <td class="text-center"><?php echo $no; ?></td>
                            <td><?php echo $r['jenis'] ?></td>
                            <td class="text-center">
                                <a class="btn btn-danger" href="?menu=type&hapus&id=<?php echo $r['jenisID'] ?>" onclick="return confirm('Hapus Data?')">Hapus</a>
                                <a class="btn btn-warning" href="?menu=type&edit&id=<?php echo $r['jenisID'] ?>">Edit</a>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>