<?php 

    session_start();

    // to unset session variable. i.e to remove name
     if($_SERVER['QUERY_STRING'] == 'noname') {
         unset($_SESSION['name']);
         // session_unset(); // to unset all
     }

    $name = $_SESSION['name'] ?? 'Guest'; //null coalesce operator if $_SESSION['name'] does not exist. Guest becomes default

    // get cookie
    $gender = $_COOKIE['gender'] ?? 'Unknown';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Farm</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style type = "text/css">
       
        form{
            max-width: 50%;
            margin: 20px auto;
            padding: 20px;
        }
       
    </style>
</head>
<body>
   <!-- navbar -->
   <nav class="navbar navbar-expand-md pt-4 pb-4 bg-dark navbar-dark">
    <div class="container-xxl">
      <!-- navbar brand / title -->
      <a class="navbar-brand" href="index.php">
        <span class="text-secondary fw-bold">
          <i class="bi bi-book-half"></i>
          Smart Farm
        </span>
      </a>
      >

      <!-- navbar links -->
      <div class="justify-content-end align-center" id="main-nav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link ">Hello <?php echo htmlspecialchars($name); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link">(<?php echo htmlspecialchars($gender); ?>)</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-secondary btn-lg" href="user_registration.php">User Registration</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary btn-lg" href="create_project.php">Create Project</a>
          </li>
          
          
        </ul>
      </div>
    </div>
  </nav>  

