<?php
$koneksi = mysqli_connect("localhost", "root", "", "data_siswa");

function inputSiswa($siswa)
{
  global $koneksi;
  $nama        = htmlspecialchars($siswa["nama"]);
  $kelas      = htmlspecialchars($siswa["kelas"]);
  $alamat     = htmlspecialchars($siswa["alamat"]);
  $agama = htmlspecialchars($siswa["agama"]);
  $telepon   = htmlspecialchars($siswa["telepon"]);

  $query = "INSERT INTO siswa VALUES('','$nama','$kelas','$alamat','$agama','$telepon')";
  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}

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

function ubah($data)
{
  global $koneksi;
  $nisn     = $data["nisn"];
  $nama          = htmlspecialchars($data["nama"]);
  $kelas       = htmlspecialchars($data["kelas"]);
  $nama_sekolah        = htmlspecialchars($data["nama_sekolah"]);
  $alamat        = htmlspecialchars($data["alamat"]);
  $agama        = htmlspecialchars($data["agama"]);
  $jenis_kelamin   = htmlspecialchars($data["jenis_kelamin"]);
  $telepon     = htmlspecialchars($data["telepon"]);


  // kirim data baru ke database
  $query = "UPDATE siswa SET nama = '$nis', nama = '$kelas', nama_sekolah = '$alamat', agama = '$jenis_kelamin', telepon = '$telepon' WHERE id_siswa = $id_siswa";
  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}

function hapus($id)
{
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM alumni WHERE id_alumni = $id");
  return mysqli_affected_rows($koneksi);
}
