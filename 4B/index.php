<?php
include('config.php');

if(isset($_POST['submit_user'])){
    $name           = $_POST['name'];
    $foto           = $_FILES['photo']['name'];
    $dir_foto       = $_FILES['photo']['tmp_name'];
    $direktori_foto = "user/$foto";
    move_uploaded_file($dir_foto,"$direktori_foto");    

    $insert = $pdo->prepare("INSERT INTO users_tb(name, photo) VALUES('$name', '$direktori_foto')");
	$insert->execute();    
    ?>
    <script>
        alert('berhasil input data programmer');
    </script>
    <meta http-equiv="refresh" content="0;url=index.php">
    <?php
}

if(isset($_POST['submit_skill'])){    
    $name    = $_POST['name'];
    $user_id = $_POST['user_id'];

    $insert2 = $pdo->prepare("INSERT INTO skill_tb(name,user_id) VALUES('$name','$user_id')");
	$insert2->execute();    
    ?>
    <script>
        alert('berhasil input data skill programmer');
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
                      <input type="text" name="name" class="form-control" required>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit" name="submit_user">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                </form>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Dumbways Employee</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="proTeamScroll">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Programmer</th>
                                        <th>Skill</th>                                        
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $q=$pdo->prepare("SELECT * FROM users_tb");
                                $q->execute();
                                while ($r=$q->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td class="table-img"><img src="<?php echo $r['photo'];?>" alt=""></td>
                                    <td><?php echo $r['name'];?></td>
                                    <td>
                                    <?php
                                    $userId = $r['id'];
                                    $q1=$pdo->prepare("SELECT * FROM skill_tb WHERE user_id='$userId'");
                                    $q1->execute();
                                    while ($r1=$q1->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <div class="badge-outline col-red"><?php echo $r1['name'];?></div>
                                    <?php
                                    }
                                    ?>
                                    <br><br>
                                    <form method="post">
                                        <div class="form-group">
                                        <input type="hidden" name="user_id" value="<?php echo $r['id'];?>">
                                        <input type="text" name="name" placeholder="tambah skill" required>                                        
                                        <input type="submit" name="submit_skill" class="btn btn-sm btn-primary" value="+">
                                        </div>                                        
                                    </form>
                                    </td>
                                    <td>
                                    <div class="input-group"> 
                                        <a href="edit.php?id=<?php echo $r['id'];?>" class="btn btn-primary">Edit</a>
                                        <a href="delete.php?id=<?php echo $r['id'];?>" class="btn btn-danger">Delete</a>
                                    </div>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>