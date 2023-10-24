<?php
require ('koneksi.php');
require ('query.php');

$obj =  new crud;

if(!$obj->detailData($_GET['id'])) die ("Error : id tidak ada");
if($_SERVER['REQUEST_METHOD']=='POST'):
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    $name = $_POST['txt_nama'];
    if($obj->updateData($email, $pass, $name, $obj->id)) :
        echo '<div class="alert-success">Data berhasil disimpan</div';
        header("location:home.php");
    else:
        echo '<div class="alert-danger">Data berhasil disimpan</div';
        header("location:home.php");
    endif;
endif;
?>
<html>
    <head> 
        <title>Register</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['$_REQUEST_URI']; ?>" method="POST">
            <p><input type="hidden" name="txt_id" value="<?php echo $id; ?>"></p>
            <p>email <input type="text" name="txt_email" value="
            <?php echo $obj->user_email; ?>" readonly></p>
            <p>password : <input type="password" name="txt_pass" value="
            <?php echo $obj->user_password; ?>"></p>
            <p>nama <input type="text" name="txt_namea" value="
            <?php echo $obj->user_fullname; ?>"></p>
            <button type="submit" name="update">Update</button>
        </form>
        <p><a href="home.php">Kembali</p>
    </body>
</html>