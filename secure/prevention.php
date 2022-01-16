<?php
    // digunakan selalu pas awal pembuka untuk memulai session 
    // atau membuka session
    session_start();

    // memberitahu kapan user terakhir login
    $_SESSION['last_access'] = time();

    function last_access_time() {
        // mengecek terakhir kali user login jika lebih dari satu jam maka dapat
        // meminta session baru
        $limit = 60*60;
        if(!isset($_SESSION['last_access'])) {
            // menggunakan unset dan destroy untuk compatibility dengan semua browser dan semua versi PHP
            // digunakan juga untuk menghilangkan session file lama atau yang sudah expire secara rutin
            // logout out
            session_unset();
            session_destroy();
            return false;
        }
        return(($_SESSION['last_access']+ $limit)>=time());
    }

    // Membuat ulang SESSION ID dan membatalkan SESSION ID sebelumnya
    // setiap login berhasil, dan mempertahankan setiap informasi sesi yang ada, hanya
    // indentifikasi saja yang disegarkan atau direfresh
    // direfresh terus agar dapat menjaga session id selalu baru, bila tercuri maka penyerang 
    // terpaksa untuk selalu menganti session id
    function after_login() {
        session_regenerate_id();
        $_SESSION['logged_in'] = true;
        $_SESSION['last_access'] = time();
    }

    // menyimpan user-agent pada session file sehingga bila menggunakan user-agent yang berbeda
    // user terpaksa untuk melogin ulang
    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
    // cek user agent
    function user_agent_match() {
        if (!isset($_SESSION['user_agent'])) {
            session_unset();
            session_destroy();
            return false;
        }
        if(!isset($_SERVER['HTTP_USER_AGENT'])) {
            session_unset();
            session_destroy();
            return false;
        }
        return ($_SESSION['user_agent'] === $_SERVER['HTTP_USER_AGENT']);
    }

    // sama seperti fungsi user_agent_match diatas hanya berbeda di IP address saja
    // fungsi ini digunakan untuk menyimpan ip address pada session file sehingga bila ip address berbeda
    // maka user terpaksa untuk melogin ulang
    // tidak terlalu disarankan karena IP address pengguna dapat berubah,
    // seperti ketika kita mengalihkan koneksi dari WIFI ke mobile data
    $_SESSION['ip_address'] = $_SERVER['REMOTE_ADDR'];
    // cek ip address and remote address
    function ip_address_match() {
        if (!isset($_SESSION['ip_address'])) {
            session_unset();
            session_destroy();
            return false;
        }
        if(!isset($_SERVER['REMOTE_ADDR'])) {
            session_unset();
            session_destroy();
            return false;
        }
        return ($_SESSION['ip_address'] === $_SERVER['REMOTE_ADDR']);
    }
?>