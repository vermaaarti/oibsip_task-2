<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $email = $subject = $message = "";
$name_err = $email_err = $subject_err = $message_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  // Validate username
if(empty(trim($_POST["name"]))){
$name_err = "Please enter a name.";
 } /*elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["name"]))){
 $name_err = "name can only contain letters, numbers, and underscores.";
 }*/
else{
  $name = $_POST["name"];
}
 /* else{
 // Prepare a select statement
$sql = "SELECT id FROM mytable WHERE name = ?";
        
 if($stmt = mysqli_prepare($link, $sql)){
 // Bind variables to the prepared statement as parameters

mysqli_stmt_bind_param($stmt, "s", $param_name);
            
// Set parameters
 $param_name = trim($_POST["name"]);
            
// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
 // store result 
 mysqli_stmt_store_result($stmt);
 } else{
echo "Oops! Something went wrong. Please try again later.";
            }

 // Close statement
 mysqli_stmt_close($stmt);
        }
    }*/
    
// Validate email
if(empty(trim($_POST["email"]))){
 $email_err = "Please enter an email.";     
    } else{
  $email = trim($_POST["email"]);
    }

 // Validate subject
if(empty($_POST["subject"])){
$subject_err = "Please enter a subject.";     
} else{
 $subject = $_POST["subject"];
}


 // Validate message
  if(empty($_POST["message"])){
$message_err = "Please enter a message.";     
 }else{
$message = $_POST["message"];
}
   
    
// Check input errors before inserting in database
 if(empty($name_err) && empty($email_err) && empty($message_err) && empty($subject_err)){
        
 // Prepare an insert statement
$sql = "INSERT INTO mytable (name, email, subject, message) VALUES (?, ?, ?, ?)";
         
 if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_email, $param_subject, $param_message);
            
 // Set parameters
$param_name = $name;
$param_email = $email ;
$param_subject = $subject;
$param_message = $message;
          
            
 // Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
// Redirect to login page
 header("location: myPortfolio.php");
 } else{
echo "Oops! Something went wrong. Please try again later.";
  }

 // Close statement
mysqli_stmt_close($stmt);
 }
 }
    
// Close connection
mysqli_close($link);
}
?>






<!--<
?php

 include_once 'config.php';

//declearing variable for storing values and errors
$name = $email = $subject = $message = "";
$name_err = $email_err = $subject_err = $message_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

//name validation
  if(empty(trim($_POST["name"]))){
 $name_err = "name field is required";
  
  }elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["name"]))){
    $name_err = "name only contains letters, numbers and underscores.";
  
  } else{
  // Prepare a select statement
     $sql = "SELECT id FROM mytable WHERE name = ?";
        
 if($stmt = mysqli_prepare($link, $sql)){
           
 // Bind variables to the prepared statement as parameters
   mysqli_stmt_bind_param($stmt, "s", $param_name);
            
 // Set parameters
 $param_name = trim($_POST["name"]);
            
 // Attempt to execute the prepared statement
 if(mysqli_stmt_execute($stmt)){

   /* store result */
 mysqli_stmt_store_result($stmt);
                
 if(mysqli_stmt_num_rows($stmt) == 1){
   $name_err = "This name is already taken.";
 } else{
   $name = trim($_POST["name"]);
                }
 } else{
 echo "Oops! Something went wrong. Please try again later.";
            }

// Close statement
mysqli_stmt_close($stmt);
        }

  //email validation

if(empty($_SESSION["email"])){
    $email_err = "email is required";
  }else{
    $_SESSION['$email'];
  }

  //subject validation
  if(empty($_SESSION["subject"])){
    $subject_err = "subject is required";
  }else{
    $_SESSION['$subject'];
  }

  //message validation
  if(empty($_SESSION["subject"])){
    $subject_err = "please drop me a message or suggestion";
  }else{
    $_SESSION['$subject'];
  }


// Check input errors before inserting in database
    if(empty($name_err) && empty($email_err) && empty($subject_err) && ($message_err)){
        
// Prepare an insert statement
$sql = "INSERT INTO mytable (name, email, subject, message) VALUES (?, ?, ?, ?)";
         
 if($stmt = mysqli_prepare($link, $sql)){

// Bind variables to the prepared statement as parameters
 mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_email, $param_subject, $param_message);
            
 // Set parameters
 $param_name = $name;
 $param_email = $email;
$param_subject = $subject;
 $param_message = $message;
            
// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){

// Redirect to login page
 header("location: login.php");
} else{
 echo "Oops! Something went wrong. Please try again later.";
}

 // Close statement
 mysqli_stmt_close($stmt);
        }
    }
    
// Close connection
  mysqli_close($link);
}}
?>-->


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>PortFolio</title>
    <!--jQuery file-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!--adding animate.css file-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
 <!--adding css file-->
 <link rel="stylesheet" type="text/css" href="styling/myPortfolio.css">

 <!--font awesome file-->
<link rel="stylesheet" href="styling/fontawesome/css/all.min.css">
  </head>
  <body>
<div class="part1 container-fluid">
 <div class="row">
       <!--<main class="main" id="top">-->
 <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll" style="backdrop-filter:blur(8px);">
<div class="container"><img src="images/av.png" height="34" alt="logo" />
 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"> </span>
</button>
<div class="collapse navbar-collapse border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
<ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-lg-center align-items-start">
<li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page" href="#home"><b>Home</b></a></li>

<li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page" href="#about"><b>About</b></a></li>

 <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page" href="#resume"><b>Resume</b></a></li>

<li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page" href="#skills"><b>Skills</b></a></li>

<li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page" href="#portfolio"><b>Portfolio</b></a></li>

<li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page" href="#contact"><b>Contact</b></a></li>

<li class="nav-item px-3 px-xl-4 animate__animated animate__flipInX"><a class=" btn-outline-success btn order-1 order-lg-0 fw-medium dnld" href="Resume_AV.pdf">Download CV</a></li>

  </ul>
</div></div>
 </nav>  
  </div></div>
 <section style="padding-top: 7rem;"> 


<div id="home" class="part2 container pt-sm-4">
 <div class="row align-items-center">
  <div class="col-sm-6 float-start text-center">
<img class="" src="images/IMG_20220516_083434.jpg" style="max-width:70%; height: auto;" alt="myImage" class="img-responsive" /></div>
<div class="col-sm-6 pt-sm-5 text-center float-end">
  <h4 class="text-success mb-3">Hello i am....</h4>
 <h1 class="hero-title">Aarti Verma</h1>
<div class="d-inline-block">
  <ul><li>A Web Designer</li>
  <li>A Tech Student</li>
 <li>An FSD Enthusiast</li>
  </ul></div>

<p class="mb-4 fw-medium">I am a tech enthusiast, curious for learning new things and a passionate web developer.</p>
 <div class="text-center"> <a class="btn btn-success btn-lg border-0 primary-btn-shadow" href="#more" role="button">Find out more</a></div>
</div></div></div></section>


<!--about me section-->
<div id="about" class="part3 container">
  <div class="row justify-content-center mt-sm-5 mb-sm-5">
   <p class="text-center text-success pt-sm-5">Some Lines About My Self</p> 
   <h1 class="text-center">ABOUT ME</h1>
   <hr class="bg-success" style="width:80px;height: 5px;">
   <p class="text-center">This section shows you brief info about me.</p>
<div class="box1 mt-sm-3 mb-sm-5 clearfix">
  <div class="col-sm-6 float-start text-center rounded">
    <img src="images/Untitled-2.jpg" class="" style="max-width:70%; height: auto;"  />
  </div>
  <div class="col-sm-6 float-end p-sm-5 text-center">
   <!--  <h3 class="text-center m-sm-4">About Me</h3>
    <p class="text-center">Some information about me</p> -->
<!--<div class="btn-group" role="group" aria-label="Basic example" class="text-center">
 
  <button type="button" class="btn pl-sm-5 btn1 current" data-tab="tab-1" onclick="aboutme()">About Me</button>
  <button type="button" class="btn btn1" data-tab="tab-2" onclick="aboutme()">My Skills</button>
  <button type="button" class="btn btn1" data-tab="tab-3">Contact Details</button></div>-->

<div class="container pb-sm-5">

  <ul class="tabs pl-sm-5 justify-content-center text-center">
    <li class="tab-link current text-center" data-tab="tab-1">about</li>
    <li class="tab-link text-center" data-tab="tab-2">skills</li>
    <li class="tab-link text-center" data-tab="tab-3">contact</li>
  </ul>
  <hr class="bg-success" style="width:340px;height: 5px;">

  <div id="tab-1" class="tab-content current px-sm-5">
<div>
  <div class="row">
  <div class="">
<p><b>Name:</b> Aarti Verma</p>
<p><b>Age:</b> 21</p>
<p><b>Address:</b> Chhattisgarh, INDIA</p>
  </div>
  </div>
</div>
  </div>

<div id="tab-2" class="tab-content px-sm-5">
<div class="skills-content ps-lg-4">HTML,CSS,Bootstrap 
 <div class="progress  bg-success">
<span class="skill">
<i class="val">90-95%</i>
 </span>
<div class="progress-bar-wrap">
<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
</div></div></div><br>
<div class="skills-content ps-lg-4">PHP,jQuery,js 
 <div class="progress  bg-success">
<span class="skill">
<i class="val">75-80%</i>
 </span>
<div class="progress-bar-wrap">
<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
</div>
</div>
</div>
  </div>

<div id="tab-3" class="tab-content px-sm-5">
    <div class="row">
<div style="width:'50%;' height:'50%;'">
 </div>
    <p><b><i class="fa-regular fa-envelope"></i>Email:</b><br>
     Main Email: example.com</p>
    </div>
    <div class="row">
 <div style="width:'50%;' height:'50%;'">
 </div>
  <p><b> <i class="fa-solid fa-link"></i>Website Link:</b><br>
     Website: <a href="" style="color: green;">yourwebsite.com</a></p>
    </div></div>

</div>



 <!--<hr class="bg-success" style="width:340px;height: 5px;">-->







  </div></div>
  </div></div>


<!--my resume section-->
<div id="resume" class="part4 container">
  <div id="more" class="row">
    <p class="text-center text-success mt-lg-1 mt-5">About My Experience & Education</p>
  <h1 class="text-center">MY RESUME</h1>
  <hr class="bg-success justify-content-center mx-auto" style="width:140px;height: 5px;">
    <p class="text-center">These are some of my experience and education.</p>
<div>
  <div class="col-sm-6 float-start">
     <!--left sides content that is experience -->
    <h3><b>Experience</b></h3>

<div><div class="bg-success btn">2020-2021</div>
<div class="box2 p-sm-5 m-sm-4"><div class="rounded d-inline-block">
 <img src="images/fccl.png" style="height: 45px;" class="rounded" />
 <p><b><h4>Responsive Web Designing</h4>freecodecamp</b></p>
</div>
<p>freecodecamp is an organisation from where I have completed my responsive web designing course.</p></div>
</div><br>
<div class=""><div class="bg-success btn">2022-2022</div>
<br>
<div class="box2 p-sm-5 m-sm-4"><div class="rounded d-inline-block">
 <img src="images/JSlogo.jfif" style="height: 45px;" class="rounded" />
<p><b><h4> Web Development Intern</h4>Jain Software</b></p>
</div>
<p>JSF is an organisation from where I am currently learning web development stuff. </p>
<p>This web Development stuff includes HTML, CSS, Bootstrap, JS, jQuery, PHP, mySQL, wordpress, magento and many more things.</p></div></div><br>

  </div>
  <!--left sides content that is education -->
  <div class="col-sm-6 ml-sm-5 float-end">
    <h3><b>Education</b></h3>
<div class=""><div class="bg-success btn">2019-2023</div>
<br>
<div class="box2 p-sm-5 m-sm-4"><div class="rounded d-inline-block">
 <img src="images/geclogo.jpg" style="height: 45px;" class="rounded" />
 <p><b><h4>Government Engineering College Raipur</h4>CSVTU</b></p>
</div>
<p>Government Engineering College Raipur is my institute from where I am pursuing my B.Tech in Computer Science Branch.</p>
<p>My expected year of graduation is 2023.</p></div><br>
<div class=""><div class="bg-success btn">2022-2022</div>
<br>
<div class="box2 p-sm-5 m-sm-4"><div class="rounded d-inline-block">
 <img src="images/oasis2.jpg" style="height: 45px;" class="rounded" />
 <p><h4><b>Web Development Intern</h4>Oasis Infobyte</b></p>
</div>
<p>Oasis Infobyte is an organisation from where I am currently learning web development stuff. </p>
</div></div>
</div><br></div>
  </div></div>



<!--my skills section-->
  <div id="skills" class="part5 container">
    <div class="row justify-content-center">
      <p class="text-center mt-sm-5 text-success">What I Offer You</p>
      <h1 class="text-center">MY Skills</h1>
      <hr class="bg-success" style="width:40px;height: 5px;">
      <p class="text-center mb-sm-5">These are my skills which includes front-end, back-end and programming language. </p>
 
 <!--<div class="col-sm-3 m-sm-3 box6">
  <div class="p-sm-4">
<div style="width:50%; height: 50%;"><i class="fa-solid fa-code"></i>
<img src="images/fccl.png" style="height: 45px;" /></div>
  <h3>Web Solution</h3>
  <p>Need A Project Completed By An Expert? Let’s Go! Access A Human Resources Consultant To Answer Questions</p>
  </div>
 </div>

 <div class="col-sm-3 m-sm-3 box7">
   <div class="p-sm-4"> 
<div style="width:50%; height: 50%;"><i class="fa-solid fa-code"></i>
  <img src="images/fccl.png" style="height: 45px;" /></div>
  <h3>Web Solution</h3>
  <p>Need A Project Completed By An Expert? Let’s Go! Access A Human Resources Consultant To Answer Questions</p>
  </div>
 </div>

 <div class="col-sm-3 m-sm-3 box8">
   <div class="p-sm-4">
<div style="width:50%; height: 50%;"><i class="fa-solid fa-code"></i>
<img src="images/fccl.png" style="height: 45px;" /></div>
  <h3>Web Solution</h3>
  <p>Need A Project Completed By An Expert? Let’s Go! Access A Human Resources Consultant To Answer Questions</p>
  </div></div>-->
<div class="row p-4 m-3">
<div class="col-lg-3 col-sm-6 animate__bounceIn wow"  >
<i class="fa-brands fa-html5 fa-7x"></i>
  </div>
  <div class="col-lg-3 col-sm-6 animate__bounceIn wow"  >
 <i class="fa-brands fa-css3-alt fa-7x"></i>
  </div>
  <div class="col-lg-3 col-sm-6 animate__bounceIn wow"  >
 <i class="fa-brands fa-bootstrap fa-7x"></i>
  </div>
  <div class="col-lg-3 col-sm-6 animate__bounceIn wow" >
 <i class="fa-brands fa-js-square fa-7x"></i>
  </div>
</div>

<div class="row p-sm-2 m-sm-3">
  <div class="col-sm-3 animate__bounceIn wow">
 <img src="images/cpp.png" style="height:150px;width:150px;" />
  </div>
  <div class="col-sm-3 animate__bounceIn wow">
  <img src="images/php.jfif" style="height:150px;width:150px;"/>
  </div>
  <div class="col-sm-3 animate__bounceIn wow">
   <img src="images/jquery.png" style="height:150px;width:150px;"/>
  </div>
  <div class="col-sm-3 animate__bounceIn wow">
  <img src="images/mysql.png" style="height:150px;width:150px;"/>
  </div>
</div>


</div></div>



<!--my latest work section-->
<div id="portfolio" class="part6 container">
<div class="row justify-content-center">
    <p class="text-center text-success mt-5">Some Samples From My Recent Project</p>
    <h1 class="text-center">MY Portfolio</h1>
    <hr class="bg-success" style="width:40px;height: 5px;">
   <p class="text-center mb-sm-5">Here are my few projects.</p>
   
 <div class="btn-group tbs" role="group" aria-label="Basic example">
 <!--  <button type="button" class="btn btn4 tb-link current active p-1" data-tab="tb-1">All</button> -->
  <button type="button" class="btn btn5 tb-link p-1 current" data-tab="tb-2">Informational Sites</button>
 <button type="button" class="btn btn6 tb-link p-1" data-tab="tb-3">E-Commerce</button>
  <button type="button" class="btn btn7 tb-link p-1" data-tab="tb-4">Portfolio</button>
  <button type="button" class="btn btn7 tb-link p-1" data-tab="tb-5">Other</button>
</div>
<!-- <div id="tb-1" class="tab-content current justify-content-center text-center mt-sm-5">
 <img src="images/cpp.png">
 <img src="images/css.jfif">
<img src="images/bootstrap.jfif">
<img src="images/jquery.png">
</div> -->
<div id="tb-1" class="tab-content justify-content-center text-center mt-sm-4">
<!-- <div class="img-responsive m-1"><img src="images/Screenshot(60).png" style="width:15rem"></div>
<div class="img-responsive m-1"><img src="images/Screenshot(92).png" style="width:15rem"></div></br>
<div class="img-responsive m-1"><img src="images/Screenshot(91).png" style="width:15rem"></div>
<div class="img-responsive m-1"><img src="images/Screenshot(73).png" style="width:15rem"></div> -->
</div>
<div id="tb-2" class="tab-content justify-content-center text-center mt-sm-4 current">
<div class="img-responsive m-1"><img src="images/Screenshot(91).png" style="width:15rem"></div>
</div>
<div id="tb-4" class="tab-content justify-content-center text-center mt-sm-4">
<div class="img-responsive m-1"><img src="images/Screenshot(92).png" style="width:15rem"></div>
</div>
<div id="tb-3" class="tab-content justify-content-center text-center mt-sm-4">
<div class="img-responsive m-1"><img src="images/Screenshot(73).png" style="width:15rem"></div>
</div>
<div id="tb-5" class="tab-content justify-content-center text-center mt-sm-4">
<div class="img-responsive m-1"><img src="images/Screenshot(60).png" style="width:15rem"></div>
</div>

  </div>
</div>




<!--contact me section-->
<div id="contact" class="part7 container">
  <div class="row justify-content-center mt-sm-5">
   <h1 class="text-center pt-sm-5 mt-sm-5">Contact Me</h1> 
   <hr class="bg-success" style="width:40px;height: 5px;">
   <p class="text-center mb-sm-5">Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
   <div class="col-sm-6 ">
    <!-- <div class="bg-light box10 p-sm-4">
<div style="width:50%; height:50%"></div>
<h2 class="text-center">Social Profiles</h2>
<div></div>
<div></div>
<div></div>
<div></div>
     </div>
     <div>
       <div class="bg-light box11">
   <div></div>
  <h2 class="text-center">Email Me</h2>
  <p class="text-center">contact@example.com</p>
  </div>
   <div class="bg-light box12">
     <div></div>
  <h2 class="text-center">Call Me</h2>
  <p class="text-center">+91xxxxxxxxxx</p>
   </div>
     </div>-->
     <div class="box10 p-sm-3  bg-light" style="border:0px solid gray;">
<div class="bg-outline-success">
 <!-- <i class="fa-regular fa-share-nodes"></i>-->
</div>
  <h4 class="text-center pt-3 pb-3">Social Profiles</h4>
<!--<div><i class="fa-brands fa-facebook fa-3x"></i></div>
<div><i class="fa-brands fa-whatsapp fa-4x"></i></div>
<div><i class="fa-brands fa-instagram fa-4x"></i></div>
<div><i class="fa-brands fa-twitter fa-3x"></i></div>-->
<ul class="text-center">
<li class="d-inline-block p-sm-3"><a href="https://m.facebook.com/"><i class="fa-brands fa-facebook fa-3x  fa-bounce i-fb" ></i></a></li>
<li class="d-inline-block p-sm-3"><a href="https://www.linkedin.com/in/aarti-verma-83939a1b6/"><i class="fa-brands fa-linkedin-in fa-3x fa-bounce i-in"></i></a></li>
<li class="d-inline-block p-sm-3"><a href="https://www.instagram.com/?hl=en"><i class="fa-brands fa-instagram fa-3x fa-bounce i-insta"></i></a></li>
<li class="d-inline-block p-sm-3"><a href="https://mobile.twitter.com/home"><i class="fa-brands fa-twitter fa-3x fa-bounce i-twt"></i></a></li>
<!--<li class="d-inline-block p-sm-2"><i class="fa-brands fa-whatsapp fa-3x fa-bounce"></i></li>-->

</ul>



     </div>
     <div class="row m-sm-4">
       <div class=" col float-start box11  bg-light m-sm-2">
         <div class="p-sm-3 m-sm-3 text-center"><i class="fa-solid fa-envelope fa-3x fa-shake"></i></div>
  <h4 class="text-center">Email Me</h4>
  <p class="text-center">contact@example.com</p>
   </div>

       <div class=" col float-end box12  bg-light m-sm-2">
         <div class="p-sm-3 m-sm-2 text-center"><i class="fa-solid fa-mobile fa-3x fa-shake"></i></div>
  <h4 class="text-center">Call Me</h4>
  <p class="text-center">+91xxxxxxxxxx</p>
       </div>
     </div>
   </div>
   






 <div class="col-sm-6 p-sm-5 bg-light box9">
  <div>
 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"> 
 <div class="row justify-content-center">      
 <div class="col float-start mb-sm-4 form-group">
 <input placeholder="your name" type="text" name="name"  class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>"  value="<?php echo $name; ?>" id="">
<span class="invalid-feedback"><?php echo $name_err; ?></span><br>
</div>

 <div class="col float-end mb-sm-4 form-group">
 <input placeholder="your email" type="email" name="email"  class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"  value="<?php echo $email; ?>" id="">
 <span class="invalid-feedback"><?php echo $email_err; ?></span><br>

</div></div>

<div><input placeholder="subject" type="text" name="subject" class="mb-sm-4 col-sm-12 form-control <?php echo (!empty($subject_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $subject; ?>" id="">
<span class="invalid-feedback"><?php echo $subject_err; ?></span><br>

</div>

 <div><textarea placeholder="message" name="message" class="mb-sm-4 col-sm-12 form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $message; ?>" id=""  rows="6" cols="50"></textarea>
 <span class="invalid-feedback"><?php echo $subject_err; ?></span><br>

    </div>

 <div class="">
<div class=" mb-sm-5">
 <div class="form-group">
<div class="text-center"> <button type="submit" class="btn btn-success mb-5">Send Message</button></div>
</div></div></div>
</form>
 </div></div>
 </div></div>



  <!--footer section-->
 <div class="part8 container-fluid bg-dark mt-sm-2 ms-0 me-0 bg-dark">
  <div class="row  mt-sm-5">
  <!--<img src="images/footer2Final.png" style="width:100%;" /> -->
<!-- <p class="text-light text-center h4 mt-5 mb-5">Designed and Maintained by Aarti Verma</p> -->
<!-- <div class="card text-white">
  <img src="images/footer2Final.png" class="card-img" alt="footerImage">
  <div class="card-img-overlay justify-content-center"> -->
    <h4 class="text-center text-secondary p-3">Designed and maintained by Aarti Verma</h4>
  </div>
</div>

  </div>
</div>

<!--about me content load-->
<!--tabber for about me content load-->
<script>
 $(document).ready(function(){
  
  $('ul.tabs li').click(function(){
    var tab_id = $(this).attr('data-tab');

    $('ul.tabs li').removeClass('current');
    $('.tab-content').removeClass('current');

    $(this).addClass('current');
    $("#"+tab_id).addClass('current');
  })

});
</script>



<!--tabber for portfolio section-->
<script>
 $(document).ready(function(){
  
  $('.btn-group.tbs button').click(function(){
    var tab_id = $(this).attr('data-tab');

    $('.btn-group.tabs button').removeClass('current');
    $('.tab-content').removeClass('current');

    $(this).addClass('current');
    $("#"+tab_id).addClass('current');
  })

});
</script>




<!--wow.js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

<!--wow.js code-->
<script>
 new WOW().init();
</script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>