<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>UNIVERSITY Talent Showcase</title>
        <link rel="stylesheet" href="nav.css">
     </head>
    <body class="home page-template page-template-page-templates page-template-master-home page-template-page-templatesmaster-home-php page page-id-24 group-blog">
        <div id="page" class="hfeed site clearfix">
              <header id="header" class="navbar">
                 <div class="container header-container">
                    <div class="row header-container-row">
                        <div id="site-logo">
                            <h1 align="center" class="sr-only">UNIVERSITY TALENT SHOWCASE</h1>
                        </div>
                    </div>
                 </div>
            </header>
            <nav id="primary-navbar" class="navbar" role="navigation" style="background-color:  #F68B1F;">
              <div class="container primary-navbar-container">
                <div class="collapse navbar-collapse navbar-primary-collapse">
                  <ul id="menu-primary" class="nav navbar-nav">
                    
                    <li id="menu-item-login" class="menu-item dropdown">
                      <a title="Log In" href="#" >LOGIN</a>
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

           <section style="padding-top: 100px;">
             <div class="slideshow-container">

                <div class="mySlides fade">
                  <div class="numbertext">1 / 3</div>
                  <img src="uploads/marsrover.jpg" style="width:100%">
                  <div class="text">Caption Text</div>
                </div>

                <div class="mySlides fade">
                  <div class="numbertext">2 / 3</div>
                  <img src="uploads/promo.jpg" style="width:100%">
                  <div class="text">Caption Two</div>
                </div>

                <div class="mySlides fade">
                  <div class="numbertext">3 / 3</div>
                  <img src="uploads/panda.jpg" style="width:100%">
                  <div class="text">Caption Three</div>
                </div>

              </div>
                <br>

                <div style="text-align:center">
                  <span class="dot"></span>
                  <span class="dot"></span>
                  <span class="dot"></span>
                </div>

                <script>
                  let slideIndex = 0;
                  showSlides();

                  function showSlides() {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");
                    let dots = document.getElementsByClassName("dot");
                    for (i = 0; i < slides.length; i++) {
                      slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {slideIndex = 1}
                    for (i = 0; i < dots.length; i++) {
                      dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex-1].style.display = "block";
                    dots[slideIndex-1].className += " active";
                    setTimeout(showSlides, 3000); // Change image every 2 seconds
                  }
                  </script>
                  <style>

                        .mySlides {display: none;}
                        img {vertical-align: middle;}

                        /* Slideshow container */
                        .slideshow-container {
                          max-width: 1000px;
                          position: relative;
                          margin: auto;
                        }

                        /* Caption text */
                        .text {
                          color: #f2f2f2;
                          font-size: 15px;
                          padding: 8px 12px;
                          position: absolute;
                          bottom: 8px;
                          width: 100%;
                          text-align: center;
                        }

                        /* Number text (1/3 etc) */
                        .numbertext {
                          color: #f2f2f2;
                          font-size: 12px;
                          padding: 8px 12px;
                          position: absolute;
                          top: 0;
                        }

                        /* The dots/bullets/indicators */
                        .dot {
                          height: 15px;
                          width: 15px;
                          margin: 0 2px;
                          background-color: #bbb;
                          border-radius: 50%;
                          display: inline-block;
                          transition: background-color 0.6s ease;
                        }

                        .active {
                          background-color: #717171;
                        }

                        /* Fading animation */
                        .fade {
                          animation-name: fade;
                          animation-duration: 1.5s;
                        }

                        @keyframes fade {
                          from {opacity: .4}
                          to {opacity: 1}
                        }

                        /* On smaller screens, decrease text size */
                        @media only screen and (max-width: 300px) {
                          .text {font-size: 11px}
                        }
                  </style>
           </section>

    <section style="padding-top:50px">
      <h1 style="text-align:center">Top News</h1>
      <img src="uploads/marsrover1.jpg" alt="img" class="im">
      <style>

        .im {
        display: block;
        margin-left: auto;
        margin-right: auto;
        padding-top: 20px;
        width: 50%;
        }
      </style>
      <h3 style="text-align:center">UIU MARSROVER</h3>

      <p style="padding-top:10px; text-align:center;padding-left:200px;padding-right:200px">
        UIU's Mars rover – nicknamed "MAVEN" – ranked 1st among Asian countries and 13th among 36 global finalists at the University Rover Challenge (URC) 2022. The event was organised by the Mars Society, a US-based non-profit organisation that advocates and encourages human and robotic exploration on Mars, and also seeks to establish a permanent human presence on the Red Planet. The three-day world final round of the event took place from June 2-4 at the Mars Desert Research Station (MDRS) in southern Utah.

        Before the final round, the UIU Mars Rover team competed with 98 other universities from all around the world to secure a place in the finals. MAVEN achieved an outstanding score of 90.92 out of 100 to be selected as one of the 36 finalists from 10 countries including the USA, Canada, Australia, India, Poland, Columbia, Egypt, Mexico, and Turkey.In the initial round, the team had to submit a System Acceptance Review (SAR) video to the competition. This video focused on the various capabilities of the rover, and its ability to perform a variety of missions like terrain traversal and delivery, equipment servicing, and autonomous mission. MAVEN also performed a variety of scientific tests where it analysed soil and rock samples to detect the presence of life. The video also went through MAVEN's core electronic and communication systems, as well as its testing and operation capabilities
      </p>

      <img src="uploads/debate.jpg" alt="img" class="im">
      <h3 style="text-align:center">UIU DEBATECLUB</h3>

      <p style="padding-top:10px;text-align:center;padding-left:200px;padding-right:200px"> text-align:center">UIU Debate Club became Champion in the 6th Gold Bangladesh National Debate Fest 2022
          United International University Debate Club (UIUDC) became the Unbeaten National Champion in Martyred Dr. Shamsuzzoha Memorial 6th Gold Bangladesh National Debate Fest 2022 by defeating Jahangirnagar University by 9-0 ballots. The Fest was held in Rajshahi University on 2-3 September 2022. A team of three members from UIUDC participated in this fest. They are M M Tasnim, Dept. of Economics, Abdullah Al Habib Badhon, Dept. of CSE and K. M. Ismail Safa, Dept. of Economics. Among them, Abdullah Al Habib Badhon became ‘Debater of the Tournament’ and ‘Debater of the Final’ at a time.
          In this fest, 28 private and public Universities including Dhaka University, Jahangirnagar University, Jagannath University, Rajshahi University, Khulna University, Rajshahi College, East West University, Stamford University, Premier University, CUET, RUET participated in this national debate fest. Professor Golam Shabbir Sattar, honorable Vice-Chancellor of Rajshahi University was the Chief Guest and handed over the Champion trophy to the winners. Professor Md. Sultan-Ul-Islam, Pro Vice-Chancellor of Rajshahi University was the Special Guest. Among others, Prof. Dr. Pradip Kumar Panday, Dept. of Mass Communication and Journalism, Prof. Dr. Md. Rabiul Islam, Dept. of Social Work, University of Rajshahi, Tasmia Haque, President of Gold Bangladesh and other prominent persons were also present there.</p>
      </p>
    </section>




        <section style="padding-top:50px">
            <h1 style="text-align:center">About Us</h1>
            <p style="text-align:center;padding-left:200px;padding-right:200px;padding-top:20px">United International University is a private university approved by the Government of the People’s Republic of Bangladesh and University Grants Commission (UGC).
              United International University is established with the generous support and patronage of the United Group, a very successful conglomerate operating in diverse business areas in Bangladesh.
              <br>
              <u style="text-align:center">Vision:</u> The vision of UIU is to become the center of excellence in teaching, learning and research in the South Asian region.
              <br>
              <u style="text-align:center">Mission:</u> The mission of UIU is to create excellent human resources with intellectual, creative, technical, moral and practical skills to serve community, industry and region. We do it by developing integrated, interactive, involved and caring relationships among teachers, students, guardians and employers.
              <br>
              <br>
              <u style="text-align:center">UIU ranking</u> <br>
              . THE Impact Ranking 2020 & 2021 and 2022 UIU is in 32nd position in the world on SDG 8 (Decent Work and Economic Growth)
              <br>
              . QS Asia University Ranking 2019, 2020, 2021 & 2022, UIU has been ranked among the top 350
              universities in Asia.
            </p>
        </section>

        <footer>
            <div id="footer-area" style="text-align: center;">
              <section id="footer-widgets" class="clearfix">
                <div class="container container-footer-widgets" style="display: flex; justify-content: center;">
                  <div class="footer-widget-area">
                    <div class="footer-widget" role="complementary">
                      <div id="text-2" class="widget widget_text">
                        <h3 class="widget-title">Quick Contact</h3>
                        <div class="textwidget">
                          <p>United City, Madani Avenue, Badda, Dhaka 1212, Bangladesh.</p>
                          <p>Phone: <a href="tel:+8809604-848-848">+88 09604-848-848</a></p>
                          <p>info@uiu.ac.bd<br />
                          Admission Office: <a href="tel:+8801759039498">+8801759039498</a>, 
                          <a href="tel:+8801759039451">+8801759039451</a>, 
                          <a href="tel:+8801759039465">+8801759039465</a>, 
                          <a href="tel:+8801914001470">+8801914001470</a></p>
                          <p>Office Time: Sat-Wed 8:30 AM to 4:30 PM</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </footer>
     </body>
</html>
