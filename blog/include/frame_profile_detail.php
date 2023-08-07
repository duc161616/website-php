<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Profile</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <!-- <div class="col-md-4 col-lg-4" align="center">
              <img alt="User Pic" src="https://static2.yan.vn/YanNews/2167221/202102/facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg">
            </div> -->
            <div class="col-md-9 col-lg-9">
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>Name</td>
                    <td><?php echo $row['firstname']; ?></td>
                  </tr>
                  <tr>
                    <td>User Handle</td>
                    <td><?php echo $row['username']; ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo $row['emailid']; ?></td>
                  </tr>
                  <tr>
                    <td>Star</td>
                    <td><?php echo $row['star']; ?></td>
                  </tr>
                </tbody>
              </table>
              <?php
              // Kiểm tra đăng nhập
              if (isset($_SESSION['username'])) {
                include("../db/dbconnect.php");

                $user = $_REQUEST['user'];
                $query = "SELECT * FROM users WHERE username='$user'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                  $profile = mysqli_fetch_assoc($result);

                  // Chỉ cho phép người dùng chủ sở hữu hoặc quản trị viên thực hiện thao tác
                  if ($_SESSION['username'] == $profile['username'] || $_SESSION['usertype'] == 'admin') {
                    echo '<a href="../posts/post.php?user='.$_REQUEST['user'].'" class="btn btn-default">Public Posts</a>';
                    echo '<a href="../posts/post_private.php?user='.$_REQUEST['user'].'" class="btn btn-default">Private Posts</a>';
                    echo '<a href="../users/transaction_history_user.php?user='.$_REQUEST['user'].'" class="btn btn-default">Transaction History</a>';
                    echo '<a href="../users/edit-profile.php?user='.$_REQUEST['user'].'" class="btn btn-default">Edit</a>';
                    echo '<a href="../users/edit-password.php?user='.$_REQUEST['user'].'" class="btn btn-default">Update Password</a>';
                  }
                  else{
                    echo '<a href="../users/give_star.php?user='.$_REQUEST['user'].'" class="btn btn-default">Give Star</a>';
                  }
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>