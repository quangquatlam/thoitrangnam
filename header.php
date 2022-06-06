  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="thoitrangnam.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="thoitrangnam.js"></script>
</head>
<body>
  <section>
    <nav class="navbar navbar-fixed-top navbar-default navbar-expand-lg">
      <div class="container-fluid" id="header-fashion">
        <div class="navbar-header" style="height: 65px;">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="thoitrangnam.php">
            <img src="img/logo.png" alt="logo">
          </a>
        </div>
        <div class="collapse navbar-collapse navbar-left" id="myNavbar">
          <ul class="nav navbar-nav" id="header-fashion-content">
            <li><a href="thoitrangnam.php">Trang chủ</a></li>
            <li><a href="hangmoive.php">Hàng mới về <i class="badge bg-danger">new</i></a></li>
            <li><a href="sieusale.php">Siêu sale <i class="badge bg-danger">hot</i></a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh mục sản phẩm  <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="loaisp.php?id=1">Áo sơ mi nam</a></li>
                <li><a href="loaisp.php?id=2">Áo khoác nam</a></li>
                <li><a href="loaisp.php?id=3">Áo thun nam</a></li>
                <li>
                  <a href="loaisp.php?id=4">Phụ kiện nam</a>
                  
                </li>
                <li><a href="loaisp.php?id=5">Quần nam</a></li>
              </ul>
            </li>
          </ul>
          <div class="navbar-right"style="background-color :white;display: flex;">
            <ul class="nav navbar-nav navbar-right" style="background-color: white;padding-top: 8px;">
              <li>
                <form action="searchsp.php" class="navbar-form navbar-left form-group" name="search" method="get"required on style="background-color: white;">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Bạn cần tìm gì ?" name="search-on">
                </div>
                <button type="submit" class="btn btn-default" name="searchbtn">
                <span class="glyphicon glyphicon-search"></span>
                </button>
              </form>
              </li>
              <li><a href="giohang.php" class="glyphicon glyphicon-shopping-cart" style="font-size: 25px;"></a></li>
              <li style="display: flex;"><a href="dangnhap.php"><span class=" fas fa-user-circle" style="font-size: 25px;"></span>
                <?php
                if(empty($_SESSION['username']))
                {
                  echo 'Sign up';
                }
                else{
                  echo $_SESSION['username'];
                ?>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">  <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="logout.php">Đăng xuất</a></li>
                <?php
              }
                ?>
              </a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </section>