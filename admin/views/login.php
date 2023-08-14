<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../client/src/css/default.css">
    <link rel="stylesheet" href="../client/src/css/modal.css">
    <title>Login page</title>
</head>

<body>
    <div class="modal" style="visibility: unset;">
        <div class="main">
            <div class="title">
                <div>Đăng nhập với quyền quản trị viên</div>
                <i class="fa-solid fa-xmark" id="close-modal"></i>
            </div>
            <form>
                <div class="label">Email</div>
                <input type="text" name="email">
                <div class="label">Mật khẩu</div>
                <input type="password" name="password">
                <div class="show-pass remember label">
                    <input type="checkbox" name="remember">
                    <div class="title">Ghi nhớ đăng nhập</div>
                </div>
                <div class="label" id="notify"></div>
                <button type="button" class="btn" id="btn-login">Đăng nhập</button>
            </form>
        </div>
    </div>
</body>
<script>
    $('#btn-login').click(function(e) {
        let email = document.getElementsByName("email");
        let pass = document.getElementsByName("password");
        let element = document.querySelector("#notify");
        $.ajax({
            type: "post",
            url: "./api/login.php",
            data: {
                email: email[0].value,
                password: pass[0].value
            },
            success: function(response) {
                let obj = JSON.parse(response);
                if (obj.status == "success") {
                    element.classList.add("success");
                    element.classList.remove("error");
                    element.innerHTML = obj.data;
                    window.location.reload();
                } else {
                    element.classList.remove("success");
                    element.classList.add("error");
                }
                element.innerHTML = obj.data;
            }
        });
    });
</script>

</html>