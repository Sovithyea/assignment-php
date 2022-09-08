<?php 
    include './includes/header.php';
?>
<!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">User Register</h2>
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
                                        <input class="au-input au-input--full" type="text" name="name" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="au-input au-input--full" type="number" name="phone" placeholder="Phone">
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
                                        <input class="au-input au-input--full" type="file" name="image" placeholder="upload">
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="au-input au-input--full" type="date" name="date" required pattern="\d{4}-\d{2}-\d{2}" placeholder="Email">
                                    </div>
                                    <button name="submit" class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>

                                </form>
                                <?php
                                    include "./includes/connection.php";
                                    if(isset($_POST['submit'])) {
                                        $name = $_POST['name'];
                                        $phone = $_POST['phone'];
                                        $email = $_POST['email'];
                                        $role = $_POST['role'];
                                        $password = $_POST['password'];
                                        $image = $_FILES['image']['name'];
                                        $tmp_name = $_FILES['image']['tmp_name'];
                                        $date = $_POST['date'];
                                        $insert = "INSERT INTO users(name,password, phone, email, role, image,date)
                                                VALUES ('$name', '$password', '$phone', '$email', '$role', '$image', '$date')";
                                        $run_insert = mysqli_query($conn, $insert);
                                        if($run_insert === true) {
                                            echo "Data has been installed"; 
                                            move_uploaded_file($tmp_name, "uploads/$image");
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