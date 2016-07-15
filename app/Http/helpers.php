<?php

function pre($data, $exit = false) {
    echo "<pre>";
    print_r($data);
    if ($exit) {
        exit;
    }
}

function isLoggedIn() {
    $user_email = session('user_email');
    if (!empty($user_email)) {
        return true;
    } else {
        return false;
    }
}
