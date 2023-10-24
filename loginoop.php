<?php
class User {
    private $koneksi;
    private $email;
    private $pass;

    public function __construct($email, $pass) {
        $this->koneksi = mysqli_connect("localhost", "root", "", "user");
        $this->email = $email;
        $this->pass = $pass;
    }

    public function login() {
        if(!empty(trim($this->email)) && !empty(trim($this->pass))){
            $query = "SELECT * FROM user_detail WHERE user_email = '$this->email'";
            $result = mysqli_query($this->koneksi, $query);
            $num = mysqli_num_rows($result);

            while ($row = mysqli_fetch_array($result)) {
                $userVal = $row['user_email'];
                $passVal = $row['user_password'];
                $userName = $row['user_fullname'];
            }

            if ($num != 0) {
                if($userVal==$this->email && $passVal=$this->pass){
                   header('location: home.php?user_fullname=' . urldecode($userName));
                }else{
                    $error = 'user atau password salah!!';
                   header('location: login.php');
                }
            }else{
                $error = 'user tidak ditemukan';
                header('location: login.php');
            }
        }else{
            $error = 'Data tidak boleh kosong';
            echo $error;
        }
    }
}
if(isset($_POST['submit'])){
    $user = new User($_POST['txt_email'], $_POST['txt_pass']);
    $user->login();
}
?>
