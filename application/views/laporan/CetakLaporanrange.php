<html>
  <head>
   <style>
     @page { margin: 180px 50px; }
     #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; background-color: orange; text-align: center; }
     #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; background-color: lightblue; }
     #footer .page:after { content: counter(page, upper-roman); }
   </style>
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
   <div id="header">
     <h1>Widgets Express</h1>
   </div>
   <div id="footer">
     <p class="page">Page <?php $PAGE_NUM ?></p>
   </div>
   <div id="content">
     <p>the first page</p>
     <p style="page-break-before: always;">the second page</p>
   </div>
 </body>
 </html>