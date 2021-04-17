<?php
include('config.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete=$pdo->prepare("DELETE FROM users_tb WHERE id='$id'");
	$delete->execute();
    ?>
    <script>
        alert('berhasil hapus data programmer');
    </script>
    <meta http-equiv="refresh" content="0;url=index.php">
    <?php
}
?>