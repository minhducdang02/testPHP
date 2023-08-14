<footer>
    <div class="info">
        <div class="about-web">
            <a href="./" class="logo"><img src="./src/img/logo1.jpg" alt="logo"></a>
            <div class="title">
                <div>Chuyên chung cấp các sản phầm đồng hồ chất lượng cao và uy tín</div>
                <div>Fuji Luxurry được phân bố trên toàn quốc và nước ngoài</div>
            </div>
        </div>
        <div class="about-us" id="about-us">
            <h3>Về chúng tôi</h3>
            <div class="title">
                <div>Chúng tôi là đội ngũ chuyên nghiệp, làm việc tận tâm.</div>
                <div>Thời gian làm việc từ 8h - 22h cùng ngày.</div>
                <div>SDT liên hệ: 077457842</div>
                <div class="contacts">
                    <a href="" target="blank"><i class="fa-brands fa-facebook-messenger"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="no-copy">
        <div>Copyright © 2023 FujiLuxurry.com</div>
    </div>
</footer>
<div class="modal"></div>
<div class="alert"></div>
<script src="./src/js/slideShow.js"></script>
<script src="./src/js/requests.js"></script>
<script src="./src/js/modal.js"></script>
<script src="./src/js/validate.js"></script>
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>
</body>

</html>