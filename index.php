<?php
session_start();
include "config/config.php";
if(isset($_SESSION['id_admin'])==0){
echo '<script>alert("Anda Harus Login Terlebih Dahulu !!!");
window.location.href="login.php"</script>';
}else{ 

    if ($_SESSION['nama_level']=='Administrator' ||   $_SESSION['nama_level']=='User'  ){ 
?>
<?php  
} 
}
?>