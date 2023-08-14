<?php
    session_start();
    echo json_encode($_SESSION['cart'],JSON_UNESCAPED_UNICODE);
?>