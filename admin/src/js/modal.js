class Modal {
    constructor() {
        this.checkModal = document.querySelector('.modal .main');
        this.modal = document.querySelector('.modal');
        this.main = document.createElement('div');
        this.modal.style.visibility = 'unset';
    }
    addProduct() {
        if (!!this.checkModal == true) {
            this.checkModal.remove();
        }
        this.main.classList.add('main');
        this.main.innerHTML = `
    <div class="title">
        <div>Thêm sản phẩm</div>
        <i class="fa-solid fa-xmark" id="close-modal"></i>
    </div>
        <form>
            <div class="label">Ảnh(*)</div>
            <input type="text" name="image">
            <div class="label">Tên sản phẩm(*)</div>
            <input type="text" name="name">
            <div class="label">Giá Size(*)</div>
            <div class="show-pass label">
                <div class="label">S</div>
                <input type="text" name="price_s" value="">
                <div class="label">M</div>
                <input type="text" name="price_m" value="">
                <div class="label">L</div>
                <input type="text" name="price_l" value="">  
            </div>
            <div class="label">Số lượng(*)</div>
            <input type="number" name="amount" value="100">
            <div class="label" id="notify"></div>
            <button type="button" class="btn" id="add-product">Thêm sản phẩm</button>
            </form>
    `;
        this.modal.appendChild(this.main);
    }
    repairProduct(response) {
        if (!!this.checkModal == true) {
            this.checkModal.remove();
        }
        let obj = JSON.parse(response);
        this.main.classList.add('main');
        this.main.innerHTML = `
        <div class="title">
        <div>Sửa sản phẩm</div>
        <i class="fa-solid fa-xmark" id="close-modal"></i>
    </div>
            <input type="text" name="id" hidden value="`+ obj.data.id + `">
            <div class="label">Ảnh(*)</div>
            <input type="text" name="image" value="`+ obj.data.image + `">
            <div class="label">Tên sản phẩm(*)</div>
            <input type="text" name="name" value="`+ obj.data.name + `">
            <div class="label">Giá Size(*)</div>
            <div class="show-pass label">
                <div class="label">S</div>
                <input type="text" name="price_s" value="`+ obj.data.price_s + `">
                <div class="label">M</div>
                <input type="text" name="price_m" value="`+ obj.data.price_m + `">
                <div class="label">L</div>
                <input type="text" name="price_l" value="`+ obj.data.price_l + `">  
            </div>
            <div class="label">Số lượng(*)</div>
            <input type="number" name="amount" value="`+ obj.data.amount + `">
            <div class="label" id="notify"></div>
            <button type="button" class="btn" id="repair-product">Xác nhận</button>
    `;
        this.modal.appendChild(this.main);
    }
    viewOrder() {
        if (!!this.checkModal == true) {
            this.checkModal.remove();
        }
        //let obj = JSON.parse(response);
        this.main.classList.add('main');
        this.modal.appendChild(this.main);
    }
    close() {
        let modal = document.querySelector('.modal .main');
        modal.style.animationName = 'modal-hide';
        this.modal.style.visibility = 'hidden';
        setTimeout(function () {
            modal.remove();
        }, 1000);
    }
}
//click cua modal
document.querySelector('body').addEventListener('click', function (e) {
    if (e.target.closest('#close-modal')) {
        (new Modal()).close();
    }
    if (e.target.closest('#repair-product')) {
        let id = document.getElementsByName("id")[0].value;
        let name = document.getElementsByName("name")[0].value;
        let image = document.getElementsByName("image")[0].value;
        let prices = document.getElementsByName("price_s")[0].value;
        let pricem = document.getElementsByName("price_m")[0].value;
        let pricel = document.getElementsByName("price_l")[0].value;
        let amount = document.getElementsByName("amount")[0].value;
        updateProduct(id, name, image, prices, pricem, pricel, amount);
    }
    if (e.target.closest('#add-product')) {
        let name = document.getElementsByName("name")[0].value;
        let image = document.getElementsByName("image")[0].value;
        let prices = document.getElementsByName("price_s")[0].value;
        let pricem = document.getElementsByName("price_m")[0].value;
        let pricel = document.getElementsByName("price_l")[0].value;
        let amount = document.getElementsByName("amount")[0].value;
        addProduct(name, image, prices, pricem, pricel, amount);
    }
    if (e.target.closest('#alow-order')) {
        let id_order = document.querySelector('#alow-order').dataset.id;
        $.ajax({
            type: "post",
            url: "./api/actionOrder.php",
            data: { action: 1, id: id_order },
            success: function (response) {
                location.reload();
            }
        });
    }
    if (e.target.closest('#unalow-order')) {
        let id_order = document.querySelector('#unalow-order').dataset.id;
        $.ajax({
            type: "post",
            url: "./api/actionOrder.php",
            data: { action: 2, id: id_order },
            success: function (response) {
                location.reload();
            }
        });
    }
});
//event click
$('.add-product').click(function (e) {
    (new Modal()).addProduct();
});
$('.repair-product').click(function (e) {
    let id = $(this).data('id');
    getProduct(id);
});
$('.delete-product').click(function (e) {
    let id = $(this).data('id');
    let con = confirm("Bạn có chắc chắn muốn xóa không ?");
    if (con) {
        deleteProduct(id);
    }
});
$('.delete-user').click(function (e) {
    let id = $(this).data('id');
    let con = confirm("Bạn có chắc chắn muốn xóa không ?");
    if (con) {
        deleteUser(id);
    }
});
$('.view-order').click(function (e) {
    (new Modal()).viewOrder();
    let id_order = $(this).data('id');
    $('.modal .main').load("./api/getOrderList.php?id_order=" + id_order);
});
$('#alow-order').click(function (e) {
    let id_order = $(this).data('id');
    $.ajax({
        type: "post",
        url: "./api/actionOrder.php",
        data: { action: 1, id: id_order },
        success: function (response) {

        }
    });
});