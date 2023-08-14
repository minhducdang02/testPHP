class Alert {
    create(action, title) {
        switch (action) {
            case 'success':
                this.icon = 'check';
                break;
            case 'error':
                this.icon = 'xmark';
                break;
            case 'waitting':
                this.icon = 'exclamation';
                break;
        }
        this.alert = document.querySelector('.alert');
        let main = document.createElement('div');
        main.classList.add('main');
        main.classList.add(action);
        main.innerHTML = `
        <div class="title">
            <i class="fa-solid fa-circle-`+ this.icon + `"></i>
            <div class="text">`+ title + `</div>
        </div>
        <div class="process"></div>`;
        this.alert.appendChild(main);
        setTimeout(function () {
            main.style.animationName = 'alert-hide';
        }, 3000);
        setTimeout(function () {
            main.remove();
        }, 8000);
    }
}
let priceS, priceM, priceL;
class Modal {
    constructor() {
        this.checkModal = document.querySelector('.modal .main');
        this.modal = document.querySelector('.modal');
        this.main = document.createElement('div');
    }
    login() {
        if (!!this.checkModal == true) {
            this.checkModal.remove();
        }
        this.modal.style.visibility = 'unset';
        this.main.classList.add('main');
        this.main.innerHTML = `
    <div class="title">
        <div>Đăng nhập</div>
        <i class="fa-solid fa-xmark" id="close-modal"></i>
    </div>
        <form>
            <div class="label">Email(*)</div>
            <input type="text" name="email">
            <div class="label">Mật khẩu(*)</div>
            <input type="password" name="password">
            <div class="show-pass remember label">
                <input type="checkbox" name="remember">
                <div class="title">Ghi nhớ đăng nhập</div>
            </div>
            <div class="label" id="notify"></div>
            <button type="button" class="btn" id="btn-login">Đăng nhập</button>
            </form>
        <div class="or">hoặc</div>
        <button type="button" class="btn btn-register">Đăng ký</button>
    `;
        this.modal.appendChild(this.main);
    }
    register() {
        if (!!this.checkModal == true) {
            this.checkModal.remove();
        }
        this.modal.style.visibility = 'unset';
        this.main.classList.add('main');
        this.main.innerHTML = `
        <div class="title">
            <div>Đăng ký</div>
            <i class="fa-solid fa-xmark" id="close-modal"></i>
        </div>
            <form>
                <div class="label">Họ và tên(*)</div>
                <input type="text" name="name">
                <div class="label">Email(*)</div>
                <input type="email" name="email">
                <div class="label">Mật khẩu(*)</div>
                <input type="password" name="password">
                <div class="show-pass remember label">
                    <input type="checkbox" id="show-pass">
                    <div class="title">Hiện mật khẩu</div>
                </div>
                <div class="label" id="notify"></div>
                <button type="button" class="btn" id="btn-register">Đăng ký</button>
            </form>
        <div class="or">hoặc</div>
        <button type="button" class="btn btn-login">Đăng nhập</button>
    `;
        this.modal.appendChild(this.main);
    }
    orderDetail(data) {
        if (!!this.checkModal == true) {
            this.checkModal.remove();
        }
        this.modal.style.visibility = 'unset';
        this.main.classList.add('main');
        this.main.classList.add('order-detail');
        let product = "";
        let sum = 0;
        for (let i in data) {
            product += `
            <div class="container">
                <img src="`+ data[i]['image'] +`" alt="photo">
                <div class="info">
                    <div class="name">`+ data[i]['name'] + '('+ data[i]['size'] +')' +`</div>
                    <div class="info">`+ ((data[i]['sugar'] == 1) ? "Có" : "Không") +`</div>
                    <div class="price">`+ data[i]['amount'] + ' x ' + new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(data[i]['price']) +`</div>
                </div>
            </div>`;
            sum += parseInt(data[i]['price']) * parseInt(data[i]['amount']); 
        }
        this.main.innerHTML = `
        <div class="title">
            <div>Đặt hàng</div>
            <i class="fa-solid fa-xmark" id="close-modal"></i>
        </div>
        <div class="row">
            <form>
                <div class="label">Tên người nhận(*)</div>
                <input type="text" name="name">
                <div class="label">Số điện thoại người nhận(*)</div>
                <input type="text" name="phone">
                <div class="label">Địa chỉ(*)</div>
                <input type="text" name="address">
                <div class="label">Ghi chú</div>
                <input type="text" name="note">
                <div class="label"></div>
            </form>
            <div class="product-info">
                `+ product +`
            </div>
        </div>
        <div class="bill">Tổng cộng: `+ new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(sum) +`</div>
        <button type="button" class="btn" id="btn-order">Đặt hàng</button>
        `;
        this.modal.appendChild(this.main);
    }
    productDetail(data) {
        if (!!this.checkModal == true) {
            this.checkModal.remove();
        }
        this.modal.style.visibility = 'unset';
        let obj = JSON.parse(data);
        priceL = obj.price_l;
        priceM = obj.price_m;
        priceS = obj.price_s;
        this.main.classList.add('main');
        this.main.classList.add('product-detail');
        this.main.innerHTML =  `
        <div class="title">
        <div>Sản phẩm</div>
        <i class="fa-solid fa-xmark" id="close-modal" onclick='(new Modal()).close();'></i>
    </div>
    <div class="product">
        <img src="`+ obj.image + `" alt="photo">
        <div class="product-info">
            <div class="title">` + obj.name + `</div>
            <div class="price">` + new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(obj.price_s) + `</div>
            <div class="amount">
                <i class="fa-solid fa-circle-minus"></i>
                <div id="amount">1</div>
                <i class="fa-solid fa-circle-plus"></i>
            </div>
            <button type="button" class="add-to-cart" id="add-to-cart" data-id="`+ obj.id + `">Thêm vào giỏ hàng</button>
        </div>
    </div>
    <form>
        <div class="label">Chất liệu kính</div>
        <div class="type">
            <input type="radio" name="sugar" id="sugar" value="1" checked="">
            <label for="sugar">Sapphire</label>
            <input type="radio" name="sugar" id="not-sugar" value="0">
            <label for="not-sugar">Mineral Glass</label>
        </div>
        <div class="label">Kích cỡ</div>
        <div class="size">
            <input type="radio" name="size" id="s" value="s" checked>
            <label for="cool">40.00 x 40.00mm(S)</label>
            <input type="radio" name="size" id="m" value="m">
            <label for="not-cool">43.00 x 43.00mm(M)</label>
            <input type="radio" name="size" id="l" value="l">
            <label for="not-cool">46.40 x 46.40mm(L)</label>
        </div>
    </form>
    `;
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
//event click modal
document.querySelector('body').addEventListener('click', function (ev) {
    let element = ev.target;
    if (!!element.closest('.btn-error')) {
        (new Alert()).create('error', 'Có lỗi sảy ra');
    }
    if (!!element.closest('.btn-waitting')) {
        (new Alert()).create('waitting', 'Chức năng chưa ra mắt');
    }
    if (!!element.closest('.btn-login')) {
        (new Modal()).login();
    }
    if (!!element.closest('.btn-register')) {
        (new Modal()).register();
    }
    if (!!element.closest('#close-modal')) {
        (new Modal()).close();
    }
    //add to cart
    if (!!element.closest('#add-to-cart')) {
        addToCart();
    }
    //tang giam so luong
    if (!!element.closest('.product-detail .fa-circle-minus')) {
        let amount = document.querySelector('#amount');
        if (amount.innerHTML != 1)
            amount.innerHTML = parseInt(amount.innerHTML) - 1;
        setPrice(parseInt(amount.innerHTML));
    }
    if (!!element.closest('.product-detail .fa-circle-plus')) {
        let amount = document.querySelector('#amount');
        amount.innerHTML = parseInt(amount.innerHTML) + 1;
        setPrice(parseInt(amount.innerHTML));
    }
    //chon size
    if (!!element.closest('.product-detail form')) {
        let amount = document.querySelector('#amount');
        setPrice(parseInt(amount.innerHTML));
    }
    //hien dat hang
    if (!!element.closest('#order')) {
        getMyCart();
    }
    //dang ki
    if(!!element.closest('#btn-register')){
        if(validate(['email','password','name']))
        {
            register();
        }
    }
    if(!!element.closest('#btn-login')){
        if(validate(['email','password']))
        {
            login();
        }
    }
    //order
    if(!!element.closest('#btn-order')){
        if(validate(['name','phone','address']))
        {
            order();
        }
    }

});
function setPrice(hesotien) {
    let size = $('input:radio[name=size]:checked').val();
    let price = document.querySelector('.product-detail .product .price');
    if (size == 's') {
        price.innerHTML = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(priceS * hesotien);
    }
    else if (size == 'm') {
        price.innerHTML = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(priceM * hesotien);
    }
    else {
        price.innerHTML = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(priceL * hesotien)
    }
}
//show modal product detail
$('.add-to-cart').click(function (e) {
    getProduct($(this).data('id'));
});
//delete cart
$('.delete-cart').click(function (e) { 
    deleteCart($(this).data('id'));
});