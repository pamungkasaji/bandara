<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .line-title{
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }
  </style>
</head>
<body>
  <img src="assets/images/logoaps.png" style="position: absolute; width: 150px; height: auto;">
  <br>
  <table style="width: 100%;">
    <tr>
      <td align="center">
        <span style="line-height: 1.6; font-weight: bold;">
          LAPORAN KERUSAKAN BARANG
          <br>ANGKASA PURA
        </span>
      </td>
    </tr>
  </table>

  <?php

  if(!empty($data))
  { 
    ?>
    <hr class="line-title">
    <br>
    <p>
      Jumlah kerusakan : <?php echo count($data); ?> <br>
    </p>
    <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>Keterangan</th>
        <th>Tanggal</th>
        <th>Area</th>
        <th>Subarea</th>
        <th>Gambar</th>
        <th>Status</th>
        
      </tr>
      <?php $no = 1; foreach ($data as $row): ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $row['tgl_kerusakan'] ?></td>
        <td><?php echo $row['keterangan'] ?></td>
        <td><?php echo $row['area'] ?></td>
        <td><?php echo $row['subarea'] ?></td>
        <td><img style="width: 100px;" src="<?php echo base_url().'gambar/'.$row['gambar'];?>"></td>
        <td><?php echo $row['status'] ?></td>
      </tr>
      <?php endforeach ?> -->

    </table>

    <?php
  }else{
    ?>
    <hr class="line-title">
    <br>
    <p>
      Data Kosong <br>
    </p>
    <?php
  }

  ?>
</body>
</html>