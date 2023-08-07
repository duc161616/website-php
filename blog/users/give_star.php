<?php
include("../include/url_users.php");
include("../include/bootstrap_cdn.php");

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
    header("Location: /posts/posts.php");
    exit;
}

// Kết nối đến cơ sở dữ liệu
include("../db/dbconnect.php");

// Xử lý khi người dùng nhấn nút "Transfer"
if (isset($_POST['submit'])) {
    $sender = $_SESSION['username'];
    $receiver = $_GET['user'];
    $amount = $_POST['amount'];

    // Kiểm tra số dư của người chuyển
    $balanceQuery = "SELECT star FROM users WHERE username = '$sender'";
    $balanceResult = mysqli_query($conn, $balanceQuery);
    $senderBalance = mysqli_fetch_assoc($balanceResult)['star'];

    if ($senderBalance < $amount) {
        echo "<script>alert('Insufficient balance')</script>";
    } else {
        // Thực hiện chuyển sao
        $transferQuery = "INSERT INTO transfer_star (sender, receiver, amount) VALUES ('$sender', '$receiver', $amount)";
        $updateSenderBalanceQuery = "UPDATE users SET star = star - $amount WHERE username = '$sender'";
        $updateReceiverBalanceQuery = "UPDATE users SET star = star + $amount WHERE username = '$receiver'";

        mysqli_query($conn, $transferQuery);
        mysqli_query($conn, $updateSenderBalanceQuery);
        mysqli_query($conn, $updateReceiverBalanceQuery);

        echo "<script>alert('Money sent successfully!')</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Transfer Stars</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2>Transfer Stars</h2>
                <form method="POST">
                    <div class="form-group">
                        <label>Sender</label>
                        <input type="text" class="form-control" value="<?php echo $_SESSION['username']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Receiver</label>
                        <input type="text" class="form-control" value="<?php echo $_GET['user']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" name="amount" min="0" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit">Transfer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>