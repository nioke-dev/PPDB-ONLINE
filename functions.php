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
