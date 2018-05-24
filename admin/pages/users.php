<?php
$query="SELECT * from tbl_users left join tbl_images on tbl_users.uid=tbl_images.user_id";
$resultdata=mysqli_query($conn,$query);

if (isset($_POST['deleteUser'])) {
    $userId = $_POST['de_user_id'];
    $sql = "SELECT tbl_users.*,tbl_images.image_name FROM tbl_users
    LEFT JOIN tbl_images ON tbl_users.uid=tbl_images.user_id  WHERE tbl_users.uid =" . $userId;
    $delete_result = mysqli_query($conn, $sql);
    $deleteUserData = mysqli_fetch_assoc($delete_result);
    $userImage = $deleteUserData['image_name'];
    $deletePath = '../images/UserImages/' . $userImage;
    if (file_exists($deletePath) && is_file($deletePath)) {
        unlink($deletePath);
    }

    $queries = "delete from tbl_users where uid=" . $userId;

    $res = mysqli_query($conn, $queries);

    if ($res == true) {
        $_SESSION['success'] = 'user was deleted';
        header('Location:index.php?page=users');
        exit;
    } else {
        $_SESSION['errors'] = 'user was not deleted';
        header('Location:index.php?page=users');
        exit;

    }

}
if (isset($_POST['editUser'])) {
    $userId = $_POST['de_user_id'];
    $sql = "SELECT tbl_users.*,tbl_images.image_name FROM tbl_users
    LEFT JOIN tbl_images ON tbl_users.uid=tbl_images.user_id  WHERE tbl_users.uid =" . $userId;
    $edit_result = mysqli_query($conn, $sql);
    $editUserData = mysqli_fetch_assoc($edit_result);

}

if (isset($_POST['updateUser'])) {
    $userId = $_POST['update_user_id'];
    if (!empty($_FILES['fileUpdate']['name'])) {
        $fetchUser = "SELECT tbl_users.*,tbl_images.image_name FROM tbl_users
    LEFT JOIN tbl_images ON tbl_users.uid=tbl_images.user_id  WHERE tbl_users.uid =" . $userId;
        $userResult = mysqli_query($conn, $fetchUser);
        $updateImage = mysqli_fetch_assoc($userResult);
        $userImage = $updateImage['image_name'];
        $imagePath = "../images/UserImages/" . $userImage;
        if (file_exists($imagePath) && is_file($imagePath)) {
            unlink($imagePath);
        }
        $imageExt = pathinfo($_FILES['fileUpdate']['name'], PATHINFO_EXTENSION);
        $imageName = md5(microtime()) . '.' . $imageExt;
        $tmpName = $_FILES['fileUpdate']['tmp_name'];
        $size = $_FILES['fileUpdate']['size'];
        $error = $_FILES['fileUpdate']['error'];
        $imgExt = ['jpg', 'png', 'jpeg', 'gif'];
        if ($error == 0) {
            if (!in_array($imageExt, $imgExt)) {
                echo "image format only " . implode(',', $imgExt) . " supported";
            } else {
                move_uploaded_file($tmpName,"../images/UserImages/" . $imageName);
            }
        }
        if(empty($userImage)){
            $query3 = "insert into tbl_images (image_name,user_id) values('$imageName','$userId')";
            $result3 = mysqli_query($conn, $query3);
        }else{
        $query1 = "UPDATE tbl_images SET image_name='$imageName' WHERE user_id=" . $userId;
        $result1 = mysqli_query($conn, $query1);}
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
//    $gender = $_POST['gender'];
    $query2 = "update tbl_users set username='$username',email='$email' where uid=" . $userId;
    $result2 = mysqli_query($conn, $query2);
    if ($result2 == true) {
        $_SESSION['success'] = 'user was updated';
        header('Location:index.php?page=users');
        exit;
    } else {
        $_SESSION['error'] = 'there was a problems';
    }
}

?>

        <?php if (isset($_POST['editUser'])) : ?>
            <h1><i class="glyphicon glyphicon-edit"></i>Edit Users</h1>
            <hr>
            <div class="col-md-8">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="update_user_id" value="<?= $editUserData['uid'] ?>">
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" name="username" id="username" value="<?= $editUserData['username'] ?>"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="<?= $editUserData['email'] ?>"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="file" name="fileUpdate" >
                    </div>
                    <div class="form-group">
                        <button name="updateUser" class="btn btn-primary">Edit Record</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <img src="<?='../images/UserImages/'.$editUserData['image_name'] ?>" alt="image not found"
                     class="img-responsive thumbnail" style="margin-top: 20px">
            </div>
        <?php else: ?>
       <table class="table table-hover">
           <tr>
               <th>SN</th>
               <th>Username</th>
               <th>Email</th>
               <th>Gender</th>
               <th>Image</th>
               <th>Action</th>
           </tr>
           <?php foreach ($resultdata as $key=>$data):?>
               <td><?=++$key?></td>
               <td><?=$data['username']?></td>
               <td><?=$data['email']?></td>
               <td><?=$data['gender']?></td>
               <td><img src="http://localhost/OurNews/images/UserImages/<?=$data['image_name']?>"
                        alt="image not found" class="thumbnail" width="200"></td>
               <td>
                   <form action="" method="post">
                       <input type="hidden" name="de_user_id" value="<?=$data['uid']?>">
                       <button name="editUser" class="btn btn-primary btn-xs">Edit</button>
                       <button name="deleteUser" class="btn btn-danger btn-xs">Delete</button>
                   </form>
               </td>
           </tr>
           <?php endforeach; ?>
       </table>
        <?php endif;?>
