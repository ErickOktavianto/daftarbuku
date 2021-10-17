<?php
// koneksi ke database
$conn = mysqli_connect("sql306.epizy.com", "epiz_30090123", "bX3KIr6kDVwsLci", "epiz_30090123_phpdasar");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
        $tanggalTerbit =htmlspecialchars($data["Tanggal"]);
        $judul =htmlspecialchars( $data["Judul"]);
        $pengarang =htmlspecialchars ($data["Pengarang"]);
        $penerbit =htmlspecialchars( $data["Penerbit"]);

        // upload gambar
        $gambar = upload();
        if(!$gambar){
            return false; 
        }


         $query = "INSERT INTO buku
                    VALUES
            ('','$judul','$tanggalTerbit', '$pengarang', '$penerbit', '$gambar')
        ";
         mysqli_query($conn, $query);

         return mysqli_affected_rows($conn);
    
}
function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    // cek apakah tidak ada gambar yang diupload
    if($error === 4){
        echo "
            <script>
            alert('Pilih Gambar Terlebih Dahulu');
            </script>";
        return false;
    }

    // cek yg diupld gambar/bukan
    $ekstensiGambarValid = ['jpg','jpeg','png','jfif'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "
        <script>
        alert('Yang Anda Upload Bukan Gambar');
        </script>";
    return false;
    }

    // cek jika ukurannya terlalu besar
    if($ukuranFile > 1000000 ) {
        echo "
        <script>
        alert('Ukuran Gambar Terlalu Besar');
        </script>";
    return false;
    }
    // generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    // lolos pengecekkan
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;

}



function hapus ($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah ($data) {
    global $conn;
    $id = $data["id"];
    $tanggalTerbit =htmlspecialchars($data["Tanggal"]);
    $judul =htmlspecialchars( $data["Judul"]);
    $pengarang =htmlspecialchars ($data["Pengarang"]);
    $penerbit =htmlspecialchars( $data["Penerbit"]);
    $gambarLama = htmlspecialchars( $data['gambarLama'])    ;
    // cek apakah user pilih gambar baru / tidak
    if($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else{
        $gambar = upload();    
    }
 

     $query = "UPDATE buku SET
                tgl = '$tanggalTerbit',
                jdl = '$judul',
                pengarang = '$pengarang',
                penerbit = '$penerbit',
                gambar = '$gambar'
                WHERE id = $id
                 ";
     mysqli_query($conn, $query);

     return mysqli_affected_rows($conn);
    
}

function cari($keyword) {
    $query = "SELECT * FROM buku
                WHERE 
            jdl LIKE '%$keyword%' OR
            tgl LIKE '%$keyword%' OR
            pengarang LIKE '%$keyword%' OR
            penerbit LIKE '%$keyword%'
            ";
            return query($query);}


function registrasi($data)  {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE
                    username = '$username'");
    if( mysqli_fetch_assoc($result)){
        echo "<script>
                alert('username yang ada masukkan sudah terdaftar !')
              </script>";
              return false;
    }

    // cek konfirmasi password
    if($password !== $password) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
              </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password')");

    return mysqli_affected_rows($conn);


}









?>