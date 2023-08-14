function getProduct($id)
{
    $.ajax({
        type: "post",
        url: "./api/getProduct.php",
        data: {id: $id},
        success: function (response) {
            console.log(response);
            (new Modal()).repairProduct(response);
        }
    });
}
function addProduct($name, $image, $prices, $pricem, $pricel, $amount)
{
    $.ajax({
        type: "post",
        url: "./api/setProduct.php",
        data: {name: $name, image: $image,prices: $prices, pricem: $pricem, pricel: $pricel, amount: $amount},
        success: function (response) {
            location.reload();
        }
    });
}
function updateProduct($id, $name, $image, $prices, $pricem, $pricel, $amount)
{
    $.ajax({
        type: "post",
        url: "./api/updateProduct.php",
        data: {id: $id, name: $name, image: $image,prices: $prices, pricem: $pricem, pricel: $pricel, amount: $amount},
        success: function (response) {
            location.reload();
        }
    });
}
function deleteProduct($id)
{
    $.ajax({
        type: "post",
        url: "./api/deleteProduct.php",
        data: {id: $id},
        success: function (response) {
            location.reload();
        }
    });
}
function deleteUser($id)
{
    $.ajax({
        type: "post",
        url: "./api/deleteUser.php",
        data: {id: $id},
        success: function (response) {
            location.reload();
        }
    });
}