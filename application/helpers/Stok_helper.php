<?php

function chek_session()
{
    $CI = &get_instance();
    $session = $CI->session->userdata;
    if ($session['status_login'] != 'oke') {
        redirect('auth/login');
    }
}

function chek_role()
{
    $CI = &get_instance();
    $session = $CI->session->userdata;
    if ($session['status_login'] != 'oke') {
        redirect('auth/login');
    } else if ($session['akses'] != 1 & 2) {
        show_error('Hanya administrator yang dapat mengakses halaman ini', 403, 'akses terlarang');
    }
}


// function angka_ke_kata($angka)
// {
//     $kata = '';

//     // Logika konversi angka ke kata-kata disini
//     switch ($angka) {
//         case 1:
//             $kata = 'Transfer';
//             break;
//         case 2:
//             $kata = 'DP';
//             break;
//             // Tambahkan kondisi lain sesuai kebutuhan
//         default:
//             $kata = 'Case';
//             break;
//     }

//     return $kata;
// }