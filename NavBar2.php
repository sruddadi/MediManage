<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <!--For responsive    -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>MediManage</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />


  <!--Bootstra CSS  -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

  <!--Custom Style CSS  -->
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap');
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

    .navbar-brand {
      margin-top: 5px;
    }

    a,
    a:hover,
    a:focus {
      text-decoration: none;
    }

    body {
      background: url(http://wrbbradio.org/wp-content/uploads/2016/10/grey-background-07.jpg) no-repeat center fixed;
      background-size: cover;
    }

    ul {
      margin: 0px;
      padding: 10px;
    }

    li {
      list-style: none;
    }

    img {
      max-width: 100%;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-weight: 700;
    }

    h2 {
      font-size: 44px;
      margin-bottom: 15px;
    }

    h3 {
      font-size: 24px;
      line-height: 32px;
      font-weight: 600;
    }

    .container {
      position: relative;

    }

    .lead {
      font-weight: 500;
    }


    /*Header*/

    header {
      background: black;
      position: fixed;
      width: 100%;
      height: 10%;
      z-index: 1;
    }




    .active:hover {
      color: #000;
    }



    .btn-more {
      padding: 10px 20px;
      display: inline-block;
      font-size: 16px;
      font-weight: 600;
      text-transform: uppercase;

      color: #f5f5f5;
    }

    .more-btn {
      color: white;
    }

    .more-btn:hover {
      background-color: white;
      color: black;
      border-radius: 5px;
    }

    .cent {
      margin: auto;
      width: 50%;
      padding-top: 37px;
      font-family: verdana;
      font-size: 12px;
      padding-left: 22px;
    }

    .containerr {
      background: rgb(0, 0, 0, 0.9);
      width: 450px;
      height: 400px;
      padding-bottom: 20px;
      position: absolute;
      border-radius: 20px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      margin: auto;
      padding: 50px 15px 20px 40px;
    }


    .fl {
      float: left;
      width: 110px;
      line-height: 35px;
    }

    .fontLabel {
      color: white;
    }

    .fr {
      float: right;
    }

    .clr {
      clear: both;
    }

    .box {
      width: 360px;
      height: 35px;
      margin-top: 10px;
      font-family: verdana;
      font-size: 12px;
    }

    .box h1 {
      color: whitesmoke;
      text-align: center;
      margin-top: -50px;
      margin-bottom: 40px;
    }

    .textBox {
      margin: 10px 0;
      padding: 10px;
      height: 35px;
      width: 280px;
      border: none;
      padding-left: 10px;

    }

    .new {
      float: left;
    }

    .forgot {
      margin-top: 5px;
    }

    .forgot a {
      color: #adadad;
      font-size: small;
      text-decoration: underline;
    }

    .forgot a:hover {
      color: white;
    }

    .active11 {
      color: #000;
      border-radius: 5px;
      font-size: 16px;
      font-weight: 600;
      text-transform: uppercase;
      display: inline-block;
      padding: 10px 20px;
      background-color: #fff;
    }

    .active11:hover {
      color: #000;
    }

    .iconBox {
      height: 35px;
      margin: 10px 0;
      width: 40px;
      line-height: 38px;
      text-align: center;
      background: #ff6600;
    }

    .radio {
      color: white;
      background: #2d3e3f;
      line-height: 38px;
    }

    .terms {
      line-height: 35px;
      text-align: center;
      background: #2d3e3f;
      color: white;
    }

    .submit {
      border: none;
      color: white;
      width: 360px;
      height: 35px;
      background: #ff6600;
      text-transform: uppercase;
      margin-top: 40px;
      border-radius: 5px;
      font-weight: 800;
      cursor: pointer;
    }

    .center {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 200px;
      border: 3px solid green;
    }

    .boxterms {
      width: 357px;
      height: 0px;
      margin-top: 100px;
      font-family: verdana;
      font-size: 12px;
      line-height: 35px;
      text-align: center;
      color: white;
      padding-top: 31px;
    }

    .signup_link {
      margin: 20px 0;
      margin-left: -40px;
      text-align: center;
      font-size: 16px;
      color: #a0a0a0;
    }

    .signup_link a {
      color: white;
      text-decoration: none;
    }

    .signup_link a:hover {
      text-decoration: underline;
    }


    @media (max-width:991px) {
      .active11 {
        color: #5A5A5A;
        font-weight: bolder;
        font-size: larger;
        background-color: #00000000;
      }

      .active11:hover {
        color: #5A5A5A;
      }
    }
  </style>

</head>



<body>
  <div>
    <header>

      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="http://localhost:3000">
              <img src="img/logo.png" alt="" width="300" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item2">
                  <a class="btn-more more-btn" href="http://localhost:3000">Home</a>
                </li>
                <li class="nav-item2">
                  <a class="btn-more more-btn" href="http://localhost:3000/#about-section">About</a>
                </li>

                <li class="nav-item2">
                  <a class="btn-more more-btn" href="http://localhost:3000/#services-section">Services</a>
                </li>
                <li class="nav-item2">
                  <a class="btn-more more-btn" href="http://localhost:3000/#team-section">Our Doctors</a>
                </li>

                <li class="nav-item2">
                  <a class="btn-more more-btn" href="http://localhost:3000/#booking-section">Contact Us</a>
                </li>
                <li class="nav-item2">
                  <a class="active11" href="register.php">Sign Up</a>
                </li>
                <li class="nav-item2">
                  <a class="btn-more more-btn" href="login.php">Sign In</a>
                </li>



              </ul>

            </div>
          </div>
        </nav>
      </div>


    </header>
    <!--End Header  -->



    <!--Start Hero Banner -->
</body>

</html>