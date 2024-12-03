<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>United International University (UIU) | Top Ranked Private University</title>
        <link rel="stylesheet" href="nav.css">
      </head>
    <body class="home page-template page-template-page-templates page-template-master-home page-template-page-templatesmaster-home-php page page-id-24 group-blog">
    <div id="page" class="hfeed site clearfix">
              <header id="header" class="navbar">
                 <div class="container header-container">
                    <div class="row header-container-row">
                        <div id="site-logo">
                            <h1 align="center" class="sr-only">UNITED INTERNATIONAL UNIVERSITY (UIU)</h1>
                        </div>
                    </div>
                 </div>
            </header>
            <nav id="primary-navbar" class="navbar" role="navigation" style="background-color: gray;">
              <div class="container primary-navbar-container">
                <div class="collapse navbar-collapse navbar-primary-collapse">
                  <ul id="menu-primary" class="nav navbar-nav">
                    <li id="menu-item-faculty" class="menu-item">
                      <a title="Faculty Members" href="facultymembers.php">FACULTY MEMBERS</a>
                    </li>
                    <li id="menu-item-login" class="menu-item dropdown">
                      <a title="Log In" href="#">LOGIN</a>
                      <ul role="menu" class="dropdown-menu">
                        <li class="menu-item"><a title="Admin" href="a_login.php">ADMIN</a></li>
                        <li class="menu-item"><a title="Faculty" href="f_login.php">FACULTY</a></li>
                        <li class="menu-item"><a title="Student" href="s_login.php">STUDENT</a></li>
                      </ul>
                    </li>
                    <li id="menu-item-signup" class="menu-item dropdown">
                      <a title="Sign Up" href="#">SIGN UP</a>
                      <ul role="menu" class="dropdown-menu">
                        <li class="menu-item"><a title="Faculty" href="f_signup.php">FACULTY</a></li>
                        <li class="menu-item"><a title="Student" href="s_signup.php">STUDENT</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>

           <section style="padding-top: 50px;padding-left:200px;padding-right:200px">
             <?php
                require_once "database.php";
                $sql = "SELECT * FROM f_users ORDER BY type = 'Lecturer' ASC";
                $sql_run = mysqli_query($conn,$sql);
              ?>
              <h3 style="text-align: center;padding-bottom:70px"><span class="label label-warning"><strong>All Faculty Members List</strong></span></h3>
              <table class="table">
                <tbody>
                  <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Official Email</th>
                  </tr>
                  <?php
                      $s = 1;
                      foreach ($sql_run as $row) {
                   ?>
                  <tr>
                  <td><?php echo $s; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['type']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  </tr>
                  <?php
                  $s++;
                }
                   ?>
              </table>
           </section>
     </body>
</html>
