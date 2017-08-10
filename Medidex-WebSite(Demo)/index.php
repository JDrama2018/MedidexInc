<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="img/favicon.png" type="image/png" sizes="32x32">
<meta name="description" content="">
<meta name="author" content="">
<title>Medidex</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

<!-- Theme CSS -->
<link href="css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="css/animate.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
  <div class="top_head">
    <div class="container">
      <ul>
        <!--<li><img src="img/call.png"> Call : 91-9406674767</li>-->
        <li><img src="img/mail.png"> E-Mail : info@themedidex.com</li>
      </ul>
    </div>
  </div>
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i> </button>
      <a class="navbar-brand page-scroll" href="#page-top"><img src="img/logo.png" class="img-responsive"></a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="hidden"> <a href="#page-top"></a> </li>
        <li> <a class="page-scroll" href="#page-top">Home</a> </li>
        <li> <a class="page-scroll" href="#about">About Us</a> </li>
        <li> <a class="page-scroll" href="#works">How it Works</a> </li>
        <li> <a class="page-scroll" href="#compatibility">Compatibility</a> </li>
        <!--<li> <a class="page-scroll" href="#team">Our Team</a> </li>-->
        <li> <a class="page-scroll" href="#contact">Contact Us</a> </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

<!-- Header -->
<header>
  <div class="container">
    <div class="intro-text">
      <div class="login_area wow bounceInUp" data-wow-delay="1.6s">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="">
              <div class="col-xs-6 remove_space"> <a href="#" class="active" id="login-form-link">Patients Login</a> </div>
              <div class="col-xs-6 remove_space"> <a href="#" id="register-form-link">Providers Login</a> </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form" method="post" action="/admin/dashboard/login" role="form" style="display: block;" class="login_smart">
                  <div class="form-group">
                    <label>User Name </label>
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="" value="">
                  </div>
                  <div class="form-group">
                    <label>Password </label>
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12">
                        <input type="submit" name="patient-submit" id="patient-submit" tabindex="4" class="form-control btn btn-login" value="LogIn">
                        <input type="submit" name="patient-submit" id="patient-submit" tabindex="4" class="form-control btn btn-signup" value="SignUp">
                      </div>
                    </div>
                  </div>
                </form>
                <form id="register-form" action="/admin/dashboard/login" method="post" role="form" style="display: none;" class="login_smart">
                  <div class="form-group">
                    <label>User Name </label>
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="" value="">
                  </div>
                  <div class="form-group">
                    <label>Password </label>
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12">
                        <input type="submit" name="provider-submit" id="provider-submit" tabindex="4" class="form-control btn btn-login" value="LogIn">
                        <input type="submit" name="provider-submit" id="provider-submit" tabindex="4" class="form-control btn btn-signup" value="SignUp">
                      </div>
                    </div>
                  </div>
                </form>
                <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger">
                  <?php echo $_SESSION['error'] ?>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="intro-lead-in wow fadeInUp"> Medidex Health </div>
      <div class="intro-heading wow fadeInUp" data-wow-delay="0.3s">Keep Track Of Electronic - Personal Health Records</div>
      <div class="button_sect"> <a href="demo.html"><img src="img/launch.png"> Launch Demo</a> <a href="" data-toggle="modal" data-target=".bs-example-modal-lg"><img src="img/play.png"> Play Video</a> </div>
      <a href="#about" class="page-scroll btn btn-xl wow bounceInUp"><img src="img/mouse.png"></a> </div>
  </div>
</header>

<!-- About Us Section -->
<section id="about">
  <div class="container">
    <div class="abt_area">
      <h2>About Us</h2>
      <p> The founding ideology of Medidex is providing a secure and user-friendly platform to the patients to easily manage their health records and share it with multiple doctors and other healthcare providers conveniently. We hope to empower patients in their ability to connect to digital and mobile health tools and democratize ownership of health records. For providers, we hope to help usher in and continuously innovate their practices and organizations to keep up with fast-paced digital changes.</p>
      <p> The services include but are not limited to Electronic Health Records (EHR), Practice Management, and Patient Portals which will include the communication tools, health record storage, health information, the recommendations regarding better managing health affairs.</p>
    </div>
  </div>
</section>

<!-- Loreum Grid Section -->
<section id="works" class="mid_area">
  <div class="container">
    <div class="col-lg-4 wow fadeInLeft"><img src="img/phone_thumb.png" class="img-responsive"></div>
    <div class="col-lg-8 wow fadeInRight">
      <div class="mid_sect">
        <h2>How it works</h2>
        <p>Medidex is an application that be run online, on a phone, on a tablet, or on a computer. Once a patient signs up they can begin using several tools Medidex has such as a prescription tracker, and find doctor features without connecting their medical records. If a patient wants to have constant access to their medical records they can connect Medidex to the existing electronic health record (EHR) system of their providers. We are compatible with most existing EHR systems in the United States  and can seemlessly upload your in depth and complex medical history right to your phone or computer. If your provider's EHR system doesn't allow Medidex to connect to them or your provider still uses paper records we will go the extra mile to get your records unto the Medidex platform at no cost to you.</p>
        <p>Once your records are on the platform, that is where the fun begins! With you records in digital form, under your ownership, you can begin to use our many other tools such as virtual visits, connecting your prescriptions electronically to your pharmacy, and connecting your health monitoring devices (such as blood pressure machines, glucose monitors, and many more) to the platform and easily share this info with your providers.</p>
        <p>Medidex can also be used as a powerful tool for providers such as nurses to keep track of their patients and help monitor their health conveniently. Providers can remotely access lab results, and patient health changes without the hassle. Also, by maintaining a digital log of records we are able to consolidate this information for providers to automatically develop reimbursement paperwork forms and info.</p>
      </div>
    </div>
  </div>
</section>
<!--Compatibility-->
<section id="compatibility">
  <div class="container">
    <div class="col-lg-12 text-center">
      <h2 class="section-heading">Medidex Compatibility</h2>
      <div class="col-lg-12">
        <p>Our platform is compatible with the following electronic health record systems and many more.
          We are working to continuously add to this list to meet our patients needs.</p>
      </div>
      <div class="col-lg-2 wow fadeInUp"> <a href="http://www.epic.com/" target="_blank"><img src="img/compatible/Epic.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="0.3s"> <a href="https://www.cerner.com/" target="_blank"><img src="img/compatible/cerner.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="0.6s"> <a href="http://www.mckesson.com/" target="_blank"><img src="img/compatible/McKesson.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="0.9s"> <a href="http://as.allscripts.com/" target="_blank"><img src="img/compatible/Allscripts.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="1.2s"> <a href="http://www.athenahealth.com/" target="_blank"><img src="img/compatible/athenahealth.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="1.5s"> <a href="https://www.eclinicalworks.com/" target="_blank"><img src="img/compatible/ecw.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="1.8s"> <a href="https://www.nextgen.com/" target="_blank"><img src="img/compatible/Nextgen.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="2.1s"> <a href="http://www3.gehealthcare.com/en/products/categories/healthcare_it/electronic_medical_records/centricity_emr" target="_blank"><img src="img/compatible/GE.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="2.4s"> <a href="https://ehr.meditech.com/" target="_blank"><img src="img/compatible/meditech.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="2.7s"> <a href="http://www.greenwayhealth.com/" target="_blank"><img src="img/compatible/Greenway.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="3.0s"> <a href="https://www.drchrono.com/" target="_blank"><img src="img/compatible/drchrono.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="3.3s"> <a href="http://www.cpsinet.com/" target="_blank"><img src="img/compatible/CPSI_logo.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="3.6s"> <a href="https://www.advancedmd.com/" target="_blank"><img src="img/compatible/advancedmd.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="3.9s"> <a href="http://www.allmeds.com/" target="_blank"><img src="img/compatible/allmeds.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="4.2s"> <a href="http://changehealthcare.com/" target="_blank"><img src="img/compatible/Change_Healthcare.jpg" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="4.5s"> <a href="http://www.orchardsoft.com/" target="_blank"><img src="img/compatible/orchard-lis.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="4.8s"> <a href="http://srs-health.com/" target="_blank"><img src="img/compatible/SRSsoft_logo.png" ></a></div>
      <div class="col-lg-2 wow fadeInUp" data-wow-delay="5.1s"> <a href="https://www.healthfusion.com/" target="_blank"><img src="img/compatible/meditouch-logo.jpg" ></a></div>
    </div>
  </div>
</section>
<section class="our-goal">
  <div class="container">
    <div class="col-lg-4 wow fadeInLeft"> <img src="img/success.png" class="img-responsive mission_img"> </div>
    <div class="col-lg-8 mission wow fadeInRight">
      <h2>Mission Statement</h2>
      <p> "Our mission is to make patient's lives easier by providing easy access on mobile and web based platforms to record and transfer their past medical data under an innovative and secure system." </p>
      <br>
      <h2>Goals</h2>
      <ul>
      <li> Ownership of records will be democratized into the patients hands (and reduce HIPAA liability for providers)</li>
      <li> Patients will get high level of convenience and responsive access through the platform to their medical records</li>
      <li> The platform will make it easy for doctors to get access to all the past medical records of patients to understand and visualize the patients medical history quickly and easily</li>
      <li> Create a more personable healthcare system by opening channels of communication between providers and patients</li>
      <li> Improve overall efficiency of the healthcare process</li>
      <li>Reduce waste in the healthcare system such as fraud and redundancy of tests</li>
      <li>Help providers go paperless and automate insurance reimbursement paperwork</li>
      </ul>
    </div>
  </div>
</section>
<!-- About Section --> 
<!--<section id="team">
  <div class="container">
    
      <div class="col-lg-12 text-center">
        <h2 class="section-heading">Our Team</h2>
     
     <div class="col-lg-3">
     <div class="team_box wow fadeInLeft" data-wow-delay="0.0s">
     <img src="img/team_dp1.png">
     <h2>John Doe</h2>
     <h3>Chief Technology Officer</h3>
     </div>
     </div>
     
     <div class="col-lg-3">
     <div class="team_box wow fadeInLeft" data-wow-delay="0.3s">
     <img src="img/team_dp2.png">
     <h2>John Doe</h2>
     <h3>Chief Technology Officer</h3>
     </div>
     </div>
     
     <div class="col-lg-3">
     <div class="team_box wow fadeInRight" data-wow-delay="0.6s">
     <img src="img/team_dp3.png">
     <h2>John Doe</h2>
     <h3>Chief Technology Officer</h3>
     </div>
     </div>
     
     <div class="col-lg-3">
     <div class="team_box wow fadeInRight" data-wow-delay="0.9s">
     <img src="img/team_dp4.png">
     <h2>John Doe</h2>
     <h3>Chief Technology Officer</h3>
     </div>
     </div>
        
     
    </div>
    
  </div>
</section>-->

<div class="digits">
  <div class="container">
    <h2>Some Fact digits</h2>
    <div class="col-lg-3">
      <div class="digit_circle wow bounceInUp" data-wow-delay="0.0s">23</div>
      <h3 class="digit_head">% Loreum Lipsum</h3>
    </div>
    <div class="col-lg-3">
      <div class="digit_circle wow bounceInUp" data-wow-delay="0.2s">23</div>
      <h3 class="digit_head">% Loreum Lipsum</h3>
    </div>
    <div class="col-lg-3">
      <div class="digit_circle wow bounceInUp" data-wow-delay="0.4s">23</div>
      <h3 class="digit_head">% Loreum Lipsum</h3>
    </div>
    <div class="col-lg-3">
      <div class="digit_circle wow bounceInUp" data-wow-delay="0.6s">23</div>
      <h3 class="digit_head">% Loreum Lipsum</h3>
    </div>
  </div>
</div>

<!-- Send Us MSG Section -->
<section id="contact" class="">
  <div class="container">
    <div class="col-lg-6">
      <h2 class="send_msg">Send us a Message</h2>
      <form class="send_msg_form">
        <div class="fld_cntrl wow fadeInUp" data-wow-delay="0.0s">
          <label>Your Full Name<span class="red">*</span></label>
          <input type="text" placeholder="Enter Your Full Name Here">
        </div>
        <div class="fld_cntrl wow fadeInUp" data-wow-delay="0.3s">
          <label>Your Company Name*<span class="red">*</span></label>
          <input type="text" placeholder="Enter Your Company Name Here">
        </div>
        <div class="fld_cntrl wow fadeInUp" data-wow-delay="0.6s">
          <label>Your Email Address*<span class="red">*</span></label>
          <input type="text" placeholder="Enter Your Email Address Here">
        </div>
        <div class="fld_cntrl wow fadeInUp" data-wow-delay="0.9s">
          <label>Your Contact Details*<span class="red">*</span></label>
          <input type="text" placeholder="Enter Your Contact Details Here">
        </div>
        <div class="fld_cntrl wow fadeInUp" data-wow-delay="1.2s">
          <label>Your Message*<span class="red">*</span></label>
          <input type="text" placeholder="Enter Your Message Here">
        </div>
        <button class="btn_submit">Submit</button>
      </form>
    </div>
    <div class="col-lg-6"> <img src="img/msg_side_img.png" class="img-responsive wow fadeInRight"> </div>
  </div>
</section>
<footer>
  <div class="container">
    <div class="col-lg-3">
      <div class="foot_nav">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="#">Loreum Lipsum</a></li>
          <li><a href="#">Loreum Lipsum</a></li>
          <li><a href="#">Loreum Lipsum</a></li>
          <li><a href="#">Loreum Lipsum</a></li>
        </ul>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="foot_nav">
        <h3>Popular Links</h3>
        <ul>
          <li><a href="#">Loreum Lipsum</a></li>
          <li><a href="#">Loreum Lipsum</a></li>
          <li><a href="#">Loreum Lipsum</a></li>
          <li><a href="#">Loreum Lipsum</a></li>
        </ul>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="foot_nav">
        <h3>Subscribe Us</h3>
        <input type="text" placeholder="Enter Your Email Id here">
        <button>Subscribe</button>
        <br>
        <h3>Follow Us</h3>
        <div class="social_media"> <a target="_blank" href="https://www.facebook.com/themedidex"><img src="img/facebook.png"></a> <a target="_blank" href="https://plus.google.com/u/0/107757597562829520245"><img src="img/google.png"></a> <a target="_blank" href="https://twitter.com/theMedidex"><img src="img/tweeter.png"></a> <a target="_blank" href="https://www.linkedin.com/company/medidexinc.">linkedin</a> <a target="_blank" href="https://www.pinterest.com/pin/683913893383726003">pinterest</a> </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="foot_nav">
        <h3>Video</h3>
        <img src="img/video.png" class="wow fadeInUp"> </div>
    </div>
  </div>
</footer>
<div class="bottom_line">Copyright 2017, All Rights Reserved</div>

<!-- jQuery --> 
<script src="js/jquery.min.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/wow.min.js"></script> 
<script>
              new WOW().init();
              </script> 
<!-- Plugin JavaScript --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script> 

<!-- Contact Form JavaScript --> 

<!-- Theme JavaScript --> 
<script src="js/agency.min.js"></script> 

<!-- Modal  -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/o4ZrEKuUdDQ" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
</body>
</html>