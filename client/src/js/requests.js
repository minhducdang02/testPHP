function getProduct($id) {
    $.ajax({
        type: "post",
        url: "./api/getProducts.php",
        data: { id: $id },
        success: function (response) {
            (new Modal()).productDetail(response);
        }
    });
}
function loadCart() {
    $.ajax({
        type: "post",
        url: "./api/myCart.php",
        success: function (response) {

        }
    });
}
function addToCart() {
    let size = $('input:radio[name=size]:checked').val();
    let sugar = $('input:radio[name=sugar]:checked').val();
    let amount = $('.product #amount').html();
    let id = $('#add-to-cart').data('id');
    $.ajax({
        type: "post",
        url: "./api/addToCart.php",
        data: { size: size, sugar: sugar, id: id, amount: amount },
        success: function (response) {
            let obj = JSON.parse(response);
            if (obj.status = "success") {
                (new Alert()).create('success', 'Thêm vào giỏ hàng thành công');
                let element = document.querySelector("header li .count");
                let count = parseInt(element.innerHTML);
                if (!count) {
                    count = 0;
                }
                element.innerHTML = count + parseInt(document.querySelector('#amount').innerHTML);
                loadCart();
            }
            else {
                (new Alert()).create('error', 'Có lỗi xảy ra');
            }
        }
    });
}
function deleteCart(key) {
    $.ajax({
        type: "post",
        url: "./api/addToCart.php",
        data: { action: "delete", key: key },
        success: function (response) {
            window.location.reload();
        }
    });
}
function getMyCart() {
    $.ajax({
        type: "post",
        url: "./api/getMyCart.php",
        success: function (response) {
            let data = JSON.parse(response);
            (new Modal()).orderDetail(data);
        }
    });
}
function register() {
    let name = document.getElementsByName("name");
    let email = document.getElementsByName("email");
    let pass = document.getElementsByName("password");
    let element = document.querySelector("#notify");
    $.ajax({
        type: "post",
        url: "./api/register.php",
        data: { name: name[0].value, email: email[0].value, password: pass[0].value },
        success: function (response) {
            if (response != "") {
                let obj = JSON.parse(response);
                if (obj.status == "success") {
                    element.classList.add("success");
                    element.classList.remove("error");
                    element.innerHTML = obj.data;
                    name[0].value = "";
                    email[0].value = "";
                    pass[0].value = "";
                }
                else {
                    element.classList.remove("success");
                    element.classList.add("error");
                }
                element.innerHTML = obj.data;
            }
            else {
                element.classList.remove("success");
                element.classList.add("error");
                element.innerHTML = "Có lỗi xảy ra";
            }
        }
    });
}
function login() {
    let email = document.getElementsByName("email");
    let pass = document.getElementsByName("password");
    $.ajax({
        type: "post",
        url: "./api/login.php",
        data: { email: email[0].value, password: pass[0].value },
        success: function (response) {
            let element = document.querySelector("#notify");
            let obj = JSON.parse(response);
            if (obj.status == "success") {
                element.classList.add("success");
                element.classList.remove("error");
                element.innerHTML = obj.data;
                (new Alert()).create("success", "Chuyển hướng sau 3 giây");
                setTimeout(function () {
                    window.location.reload();
                }, 3000);
                //load cart
                loadCart();
            }
            else {
                element.classList.remove("success");
                element.classList.add("error");
            }
            element.innerHTML = obj.data;
        }
    });
}
function order() {
    let name = document.getElementsByName('name')[0].value;
    let phone = document.getElementsByName('phone')[0].value;
    let address = document.getElementsByName('address')[0].value;
    let note = document.getElementsByName('note')[0].value;
    $.ajax({
        type: "post",
        url: "./api/order.php",
        data: { name: name, phone: phone, address: address, note: note },
        success: function (response) {
            let obj = JSON.parse(response);
            if (obj.status == "error") {
                (new Alert()).create("error", obj.data);
            }
            else {
                document.querySelector("#cart").innerHTML = `<div class="empty-cart"><img src="./src/img/empty-cart.png" alt=""></div>`;
                (new Alert()).create("success", obj.data);
                (new Modal()).close();
            }
        }
    });
}