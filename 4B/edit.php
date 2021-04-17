<?php
include('config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $qq=$pdo->prepare("SELECT * FROM users_tb WHERE id='$id'");
	$qq->execute();
	$rr=$qq->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['edit'])){
        $name           = $_POST['name'];
        $foto           = $_FILES['photo']['name'];
        $dir_foto       = $_FILES['photo']['tmp_name'];
        $direktori_foto = "user/$foto";
        move_uploaded_file($dir_foto,"$direktori_foto");    
    
        $insert = $pdo->prepare("UPDATE users_tb SET name='$name',photo='$direktori_foto' WHERE id='$id'");
        $insert->execute();    
        ?>
        <script>
            alert('berhasil Ubah data programmer');
        </script>
        <meta http-equiv="refresh" content="0;url=index.php">
        <?php
    }
    ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <title>DUMBWAYS CRUD 4B</title>
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">            
            <br>
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                <form method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Foto</label>
                      <input type="file" name="photo" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Programmer</label>
                      <input type="text" name="name" class="form-control" value="<?php echo $rr['name'];?>" required>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit" name="edit">Ubah Data</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>  
    <?php
}
?>