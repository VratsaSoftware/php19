<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pageTtile; ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto navbar-dark">
      <li class="nav-item active">
          <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="admin.php?mode=airline"><i class="fas fa-plus-square"></i> Add/Edit Airline</a>
      </li>
            <li class="nav-item active">
        <a class="nav-link" href="admin.php?mode=country"><i class="fas fa-plus-square"></i> Add/Edit Country</a>
      </li>
            <li class="nav-item active">
        <a class="nav-link" href="admin.php?mode=company"><i class="fas fa-plus-square"></i> Add/Edit Company</a>
      </li>
            <li class="nav-item active">
        <a class="nav-link" href="admin.php?mode=destination"><i class="fas fa-plus-square"></i> Add/Edit Destinations</a>
      </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="deletes.php"><i class="fas fa-plus-square"></i> Restor AirLines</a>
      </li>
    </ul>
  </div>
</nav>
    <body>
        