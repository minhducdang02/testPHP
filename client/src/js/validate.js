const regexEmail = /^[a-zA-Z0-9]+\@[a-zA-Z]+\.[a-zA-Z]+(\.[a-zA-Z]+)?$/;
const regexPhone = /^[0-9]{10}$/;
const regexName = /[!@#$%^&*()_+0-9]/;
const regexPass = /^.{6}/;
function isEmpty($string) {
    if ($string.length == 0)
        return true;
    return false;
}
function setOutLine($element) {
    $element.style.border = "1px solid red";
}
function unSetOutLine($element) {
    $element.style.border = "none";
}
function validate($arr) {
    let element;
    let value = '';
    let empty = false;
    let isTrue = true;
    for (i in $arr) {
        let check = true;
        element = document.getElementsByName($arr[i])[0];
        value = element.value;
        empty = isEmpty(value);
        if ($arr[i] == 'address') {
            if (!!value == false) {
                setOutLine(element);
                isTrue = false;
                check = false;
                continue;
            }
        }
        if ($arr[i] == 'email') {
            if (!regexEmail.test(value) || empty) {
                setOutLine(element);
                isTrue = false;
                check = false;
                continue;
            }
        }
        if ($arr[i] == 'phone') {
            if (!regexPhone.test(value) || empty)
            {
                setOutLine(element);
                isTrue = false;
                check = false;
                continue;
            }
        }
        if ($arr[i] == 'name') {
            if (regexName.test(value) || empty) {
                setOutLine(element);
                isTrue = false;
                check = false;
                continue;
            }
        }
        if ($arr[i] == 'password') {
            if (!regexPass.test(value) || empty) {
                setOutLine(element);
                isTrue = false;
                check = false;
                continue;
            }
        }
        if(check)
        {
            unSetOutLine(element);
        }
    }
    return isTrue;
}