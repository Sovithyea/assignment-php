<?php 
    include 'includes/header.php';
    session_start();
?>

<div class="container mt-5">
    <div class="card">
        <h2 class="card-title text-center">
            Login Page
        </h2>
        <div class="card-body">
            <form style="width: 50%; margin: auto;" action="#" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username : </label>
                    <input type="text" class="form-control" id="username" name="name">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password : </label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mt-4 mb-4 w-50 m-auto" style="display: flex; justify-content: space-between;">
                    <button class="btn btn-primary" name="login">Login</button>
                    <button class="btn btn-primary" name="create">Create account</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php 
    include "includes/connection.php";
    if(isset($_POST['create'])) {
        echo "<script>location.href = 'create-user.php';</script>";
    }
    if(isset($_POST['login'])) {
        $user_name = $_POST['name'];
        $user_password = $_POST['password'];
        $select = "SELECT * FROM users WHERE name = '$user_name'";
        $run_select = mysqli_query($conn, $select);
        if($run_select) {
            $row_user = mysqli_fetch_array($run_select);
            $db_name = $row_user['name'];
            $db_password = $row_user['password'];
            $db_id = $row_user['id'];
            $db_email = $row_user['email'];
            // var_dump($db_email);
            if($user_name == $db_name && $user_password == $db_password) {
                $_SESSION['id'] = $db_id;
                $_SESSION['name'] = $db_name;
                $_SESSION['email'] = $db_email;
                // var_dump($_SESSION['id']);
                echo "<script>location.href = 'view-product.php';</script>";
            } else {
                echo "Email or Password is wrong!";
            }   
        }  
    }

    include 'includes/footer.php';
?>