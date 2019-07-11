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
          <br>AREA BANDARA
        </span>
      </td>
    </tr>
  </table>

  <hr class="line-title"> 
  <p>
    Tanggal <br>
    <b>Angkatan 2018</b>
  </p>
  <table class="table table-bordered">
    <tr>
      <th>#</th>
      <th>id</th>
      <th>sub</th>
      <th>Tgl</th>
      <th>Skor</th>

    </tr>
    <?php $no = 1; foreach ($data as $row): ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $row['id_penilaian'] ?></td>
        <td><?php echo $row['id_subarea'] ?></td>
        <td><?php echo $row['tanggal'] ?></td>
        <td><?php echo $row['skor'] ?></td>
     
      </tr>
    <?php endforeach ?>
  </table>

</body>
</html>