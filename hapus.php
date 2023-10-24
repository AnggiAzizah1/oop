<?php
require ('koneksi.php');
require ('query.php');

$id = $_GET['id'];
$obj =  new crud;
if(!$obj->detailData($_GET['id'])) die("Error : id tidak ada");
//if(!$obj->detailData_duatest($id)) die("Error : id tidak ada");
    if ($obj->delete($obj->id)):
        echo '<div class="alert-success">Data berhasil dihapus</div';
    else:
        echo '<div class="alert-danger">Data berhasil disimpan</div';
    endif;
?>