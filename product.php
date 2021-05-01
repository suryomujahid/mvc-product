<?php

include "config/connect.php";
include "library/app.php";

$go = new App();

$table = 'product';
$tanggal = date('Y-m-d');
$redirect = "?menu=product";
@$tempat = "image";
@$where = "productID = $_GET[id]";

if (isset($_POST['simpan'])) {
    $foto = $_FILES['foto'];
    $upload = $go->upload($foto, $tempat);
    @$field = array(
        'nama' => @$_POST['product'],
        'jenisID' => @$_POST['jenis'],
        'foto' => $upload,
        'tglInput' => $tanggal,
        'ket' => @$_POST['ket']
    );
    $go->create($con, $table, $field, $redirect);
}

if (isset($_GET['hapus'])) {
    $go->delete($con, $table, $where, $redirect);
}

if (isset($_GET['edit'])) {
    $sql = "SELECT product .*, jenis FROM product
			INNER JOIN jenis on product.jenisID = jenis.jenisID
			WHERE $where";
    $jalan = mysqli_query($con, $sql);
    $edit = mysqli_fetch_assoc($jalan);
}

if (isset($_POST['ubah'])) {
    $foto = $_FILES['foto'];
    $upload = $go->upload($foto, $tempat);

    if (empty($_FILES['foto']['name'])) {
        @$field = array(
            'nama' => @$_POST['product'],
            'jenisID' => @$_POST['jenis'],
            'tglinput' => $tanggal,
            'ket' => @$_POST['ket']
        );
        $go->update($con, $table, $field, $where, $redirect);
    } else {
        @$field = array(
            'nama' => @$_POST['product'],
            'jenisID' => @$_POST['jenis'],
            'foto' => $upload,
            'tglinput' => $tanggal,
            'ket' => @$_POST['ket']
        );
        $go->update($con, $table, $field, $where, $redirect);
    }
}
?>

<div class="w-100">
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produk</h1>
    </div>

    <?php include('components/alert.html'); ?>

    <form class="mb-5" method="post" enctype="multipart/form-data">
        <div class="d-flex flex-wrap">
            <div class="me-auto col-12 col-md-6">
                <h6>Nama Produk</h6>
                <div class="input-group mb-3">
                    <input id="pr-name" class="form-control" type="text" name="product" value="<?= @$edit['nama'] ?>" placeholder="Nama Produk" required>
                </div>
                <h6>Keterangan Produk</h6>
                <div class="input-group mb-3">
                    <textarea class="form-control" id="pr-desc" name="ket" placeholder="Keterangan Produk"><?= @$edit['ket'] ?></textarea>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <h6>Upload Foto</h6>
                <div class="input-group mb-3">
                    <input class="form-control" id="pr-photo" type="file" name="foto" accept="image/png, .jpeg, .jpg, image/gif" style="color:transparent;" onchange="this.style.color = 'black';">
                </div>
                <h6>Jenis Produk</h6>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="pr-type">Opsi</label>
                    <select class="form-select" id="pr-type" name="jenis" required>
                        <option value="<?= $edit['jenisID'] ?>"><?= @$edit['jenis'] ?></option>
                        <?php
                        $tableJenis = 'jenis';
                        $jenis = $go->read($con, $tableJenis);
                        foreach ($jenis as $r) {
                        ?>
                            <option value="<?= $r['jenisID'] ?>"><?= $r['jenis'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <?php if (@$_GET['id'] == "") { ?>
            <input class="btn btn-success me-3" type="submit" name="simpan" value="Tambah"></input>
            <input class="btn btn-warning" type="submit" name="ubah" value="Ubah" disabled>
            <button class="btn btn-danger" type="button" disabled>Batal</button>
        <?php } else { ?>
            <input class="btn btn-success me-3" type="submit" name="simpan" value="Tambah" disabled></input>
            <input class="btn btn-warning" type="submit" name="ubah" value="Ubah">
            <a href="?menu=product" class="btn btn-danger">Batal</a>
        <?php } ?>
    </form>

    <div class="table-responsive">
        <table id="tb-product" class="display">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama Product</th>
                    <th>Jenis</th>
                    <th class="text-center">Foto</th>
                    <th>Tanggal Input</th>
                    <th>Keterangan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                $sql = "SELECT product .*, jenis FROM product
                INNER JOIN jenis on product.jenisID = jenis.jenisID";
                $jalan = mysqli_query($con, $sql);
                while ($r = mysqli_fetch_assoc($jalan)) {
                    $no++
                ?>
                    <tr>
                        <td class="text-center"><?= $no ?></td>
                        <td><?= $r['nama'] ?></td>
                        <td><?= $r['jenis'] ?></td>
                        <td class="text-center"><img src="image/<?= $r['foto'] ?>" width="75" height="75"></td>
                        <td><?= $r['tglinput'] ?></td>
                        <td><?= $r['ket'] ?></td>
                        <td class="text-end">
                            <a class="btn btn-danger" href="?menu=product&hapus&id=<?php echo $r['productID'] ?>" onclick="return confirm('Hapus Data?')">Hapus</a>
                            <a class="btn btn-warning" href="?menu=product&edit&id=<?php echo $r['productID'] ?>">Edit</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>