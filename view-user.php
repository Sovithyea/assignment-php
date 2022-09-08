<?php 
include './includes/header.php';
session_start();
include "./includes/connection.php";
if(!isset($_SESSION['name'])) {
    echo "<script>location.href = 'index.php';</script>";
}
    if(isset($_GET['delete'])) {
      $delete_id = $_GET['delete'];
      $delete = "DELETE FROM users WHERE id = '$delete_id'";
      $run_delete = mysqli_query($conn, $delete);
      if($run_delete === true) {
        echo "Record has been deleted";
      } else {
        echo "Failed, Try again";
      }
}?>

?>

<div class="main-content">
        <div class="section__content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Users</h2>
                                <!-- <button class="au-btn au-btn-icon au-btn--blue">
                                <i class="zmdi zmdi-plus"></i>add item</button> -->
                        </div>
                    </div>
                </div>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Password</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
          include "./includes/connection.php";
          $select = "SELECT * FROM users";
          $run = mysqli_query($conn, $select);
          while ($row_user = mysqli_fetch_array($run)) {
            $id = $row_user['id'];
            $name = $row_user['name'];
            $password = $row_user['password'];
            $phone = $row_user['phone'];
            $email = $row_user['email'];
            $role = $row_user['role'];
            $image = $row_user['image'];
            $date = $row_user['date'];
            $datee = date("d-m-Y", strtotime($date));
        ?>

                        <tr>
                            <td><?= $id?></td>
                            <td><?= $name?></td>
                            <td><?= $password?></td>
                            <td><?= $phone?></td>
                            <td><?= $email?></td>
                            <td><?= $role?></td>
                            <td> <img src="uploads/<?= $image;?>" style="width: 50px; height: 50px ;"></td>
                            <td><?= $datee?></td>
                            <td> <a href="/edit-user.php?edit=<?= $id;?>">
              <svg style="width: 1.5rem; text-decoration: none; color: #334155;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
              </svg>
            </a>  
</td>
                            <td><a href="/view-user.php?delete=<?= $id;?>">
              <svg style="width: 1.5rem; text-decoration: none; color: #334155;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
              </svg>
            </a>    
</td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
<?php 
    include './includes/footer.php';
?>