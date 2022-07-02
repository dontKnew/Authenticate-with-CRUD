<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-dark text-light">

<nav class="navbar navbar-light bg-light m-2 ">
  <div class="container-fluid">
    
  <div class="navbar-brand mb-0 h1">Dashboard</div>
  <div class="d-flex">
    <?php if(session('logged_in')) : ?>
        <a href="logout" class="btn btn-dark"> Logout <span class="text-danger"> |</span> <?= session('user_name') ?> </span> </a> 
    <?php endif ?>
    <?php if(!session('logged_in')) : ?>
        <a href="login" class="btn btn-dark"> Login :) </a> 
    <?php endif ?> 
  </div>

  </div>
</nav>

<?= $this->renderSection("body") ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>