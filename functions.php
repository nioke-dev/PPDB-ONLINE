<?php
$koneksi = mysqli_connect("localhost", "root", "", "ppdb_online");

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function register($data)
{
    global $koneksi;
    $fullname = htmlspecialchars($data['fullname']);
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);

    $query = "INSERT INTO user VALUES('', '$fullname', '$email', '$password')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function login($data)
{
    global $koneksi;
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);

    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";


    if (query($query)) {
        $_SESSION['login'] = true;
        header("location: user-page.php");
        exit;
    }

    return [
        'pesan' => 'Email atau Password Salah',
        'error' => 'true'
    ];
}
