<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>
    <!-- Bootstrap core CSS -->
    <link href="/vnpay/assets/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/vnpay/assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="/vnpay/assets/jquery-1.11.3.min.js"></script>
</head>

<body>
    {{-- @include('client.payment.config') --}}
    <?php
    
    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = [];
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == 'vnp_') {
            $inputData[$key] = $value;
        }
    }
    
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = '';
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . urlencode($key) . '=' . urlencode($value);
        } else {
            $hashData = $hashData . urlencode($key) . '=' . urlencode($value);
            $i = 1;
        }
    }
    
    $secureHash = hash_hmac('sha512', $hashData, $config['vnp_HashSecret']);
    ?>
    <!--Begin display -->
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">VNPAY RESPONSE</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>

                <label><?php echo $_GET['vnp_TxnRef']; ?></label>
            </div>
            <div class="form-group">

                <label>Số tiền:</label>
                <label><?php echo number_format(floor($_GET['vnp_Amount'] / 100)); ?></label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label><?php echo $_GET['vnp_OrderInfo']; ?></label>
            </div>
            <div class="form-group">
                <label>Mã GD Tại VNPAY:</label>
                <label><?php echo $_GET['vnp_TransactionNo']; ?></label>
            </div>
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label><?php echo $_GET['vnp_BankCode']; ?></label>
            </div>

            <div class="form-group">
                <label>Kết quả:</label>
                <label>
                    <?php
                    if ($secureHash == $vnp_SecureHash) {
                        if ($_GET['vnp_ResponseCode'] == '00') {
                            echo "<span style='color:blue'>GD Thanh cong</span>";
                        } else {
                            echo "<span style='color:red'>GD Khong thanh cong</span>";
                        }
                    } else {
                        echo "<span style='color:red'>Chu ky khong hop le</span>";
                    }
                    ?>
                    @if (session()->has('msg'))
                        <span style="color:rgb(206, 2, 2)">{{ session()->get('msg') }}</span>
                    @endif

                    {{-- @if ($errors->any())
                        <span style="color:rgb(206, 2, 2)">{{ $errors->first() }}</span>
                    @endif
                    @if (session()->has('msg'))
                        <span style="color:rgb(36, 240, 13)">{{ session()->get('msg') }}</span>
                    @endif --}}
                </label>
            </div>
        </div>
        <p>
            &nbsp;
        </p>
        <button class="btn brn-primary">
            <a href="{{ route('cart.view') }}">Quay lại giỏ hàng</a>
        </button>
        <footer class="footer">
            <p>&copy; VNPAY <?php echo date('Y'); ?></p>
        </footer>
    </div>
</body>

</html>
