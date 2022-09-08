<?php 
    include './includes/header.php';
    session_start();
    include "./includes/connection.php";
    if(!isset($_SESSION['name'])) {
        echo "<script>location.href = 'index.php';</script>";
    }
    if(isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];
        $select = "SELECT * FROM users WHERE id = '$edit_id'";
        $run = mysqli_query($conn, $select);
        $row_user = mysqli_fetch_array($run);
        $id = $row_user['id'];
        $name = $row_user['name'];
        $password = $row_user['password'];
        $phone = $row_user['phone'];
        $email = $row_user['email'];
        $role = $row_user['role'];
        $image = $row_user['image'];
        $date = $row_user['date'];
        // $datee = date("d-m-Y", strtotime($date));
    }
?>
<!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">User Edit</h2>
                                <!-- <button class="au-btn au-btn-icon au-btn--blue">
                                <i class="zmdi zmdi-plus"></i>add item</button> -->
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-12 col-lg-4">
                <br>
                    <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input value="<?= $name?>" class="au-input au-input--full" type="text" name="name" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input value="<?= $password ?>" class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input value="<?= $email?>" class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input value="<?= $phone?>" class="au-input au-input--full" type="number" name="phone" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="au-input au-input--full" style="height: 3rem;" name="role" id="role">
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Picture</label>
                                        <input value="$image" class="au-input au-input--full" type="file" name="image" placeholder="upload">
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input value="$datee" class="au-input au-input--full" type="date" name="date" required pattern="\d{4}-\d{2}-\d{2}" placeholder="Email">
                                    </div>
                                    <button name="update" class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Update</button>

                                </form>
                                <?php
                                include './includes/connection.php';
        if(isset($_POST['update'])) {
            $ename = $_POST['name'];
            $epassword = $_POST['password'];
            $eemail = $_POST['email'];
            $ephone = $_POST['phone'];
            $eimage = $_FILES['image']['name'];
            $etmp_name = $_FILES['image']['tmp_name'];
            $erole = $_POST['role'];
            $edate = $_POST['date'];
            if(empty($eimage)) {
                $eimage = $image;
            }
            $update = "UPDATE users SET name ='$ename', email='$eemail', password= '$epassword', phone = '$ephone',
                       image = '$eimage', role = '$erole', date = '$edate' WHERE id = '$edit_id'";
            $run_update = mysqli_query($conn, $update);
            if($run_update === true) {
                echo "Data has been updated"; 
                move_uploaded_file($etmp_name, "uploads/$eimage");
            } else {
                echo "Error";
            }
            echo "<script>location.href = 'view-user.php';</script>";
        }
    ?>

    </div>
                                </div>
            </div>
        </div>
    </div>
<?php 
    include './includes/footer.php';
?>