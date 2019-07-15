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
  <table style="width: 100%;">
    <tr>
      <td align="center">
        <span style="line-height: 1.6; font-weight: bold;">
          STANDARD CLEANLINESS AREA (SCA)
          <br>Area <?php echo $data[0]['nama_area']; ?>
        </span>
      </td>
    </tr>
  </table>

  <hr class="line-title">
  <p>
    Tanggal : <?php echo $data[0]['tanggal']; ?> <br>
    Jumlah material : <?php echo count($data); ?> <br>
  </p>
  <table class="table table-bordered">
    <tr>
      <th>No</th>
      <th>Area</th>
      <th>Subarea</th>
      <th>Material</th>
      <th>Penjelasan</th>
      <th>Tindak Lanjut</th>
      <th>Skor</th>
    </tr>
    <tr>
      <td rowspan="<?php echo count($data); ?>">1</td>
      <td rowspan="<?php echo count($data); ?>"><?php echo $data[0]['nama_area']; ?></td>
      <td rowspan="<?php echo count($data); ?>"><?php echo $data[0]['nama_subarea']; ?></td>
      <td><?php echo $data[0]['nama_material']; ?></td>
      <td><?php echo $data[0]['penjelasan']; ?></td>
      <td><?php echo $data[0]['tindak_lanjut']; ?></td>
      <td><?php echo $data[0]['skor']; ?></td>
    </tr>
    <?php 
    for ($x = 1; $x < count($data); $x++) { ?>
      <tr>
        <td><?php echo $data[$x]['nama_material']; ?></td>
        <td><?php echo $data[$x]['penjelasan']; ?></td>
        <td><?php echo $data[$x]['tindak_lanjut']; ?></td>
        <td><?php echo $data[$x]['skor']; ?></td>
      </tr>
    <?php } 
    ?>

    <!-- <?php $no = 1; foreach ($data as $row): ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $row['nama_area'] ?></td>
      <td><?php echo $row['nama_subarea'] ?></td>
      <td><?php echo $row['nama_material'] ?></td>
      <td><?php echo $row['penjelasan'] ?></td>
      <td><?php echo $row['tindak_lanjut'] ?></td>
      <td><?php echo $row['skor'] ?></td>
    </tr>
    <?php endforeach ?> -->

  </table>

</body>
</html>