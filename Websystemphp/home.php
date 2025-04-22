<!DOCTYPE html>
<html>

<head>



    <link href="css/style.css" rel="stylesheet" />

    <style>
        
        
.custom_nav-container {
    display: flex;
    align-items: center; /* Align items vertically in the center */
}

.navbar-brand {
    margin-right: auto; /* Pushes the logo to the left */
}

.navbar-nav {
    display: flex;
    align-items: center; /* Align items vertically in the center */
    list-style: none;
    float:left;
    color:black; 
}

.navbar-nav .nav-item {
    margin-right: 15px; /* Adjust spacing between navigation items */
}

.btn-box {
    margin-left: 5px;
    display: flex;
    margin-top: 30px;
    box-sizing: border-box; 
    border: 2px solid buttonshadow; 
    transition: border-color 0.3s ease; 
    background-color: buttonshadow;
    width: 150px;
    padding: 10px;
    
    
}

.btn-box:hover {
    border-color: #7abaff;
    background-color: #fcf8e3;
    transition: border-color 0.3s ease; 
    padding: 20px 15px;
    -webkit-transition: all 0.3s;
}


footer {
    padding: 20px;
    position: absolute;
    bottom: 0;
    background-color: grey;
    text-align: center;
    right: 0;
    left: 0;
    display: block;
    width: 100%;
}
        
.container2{
    width: 100%;
    height: 100vh;
    display: flex;
    padding: 10px;
    box-sizing: border-box;
    position:relative;
 float: right;    
}
.box{
    flex: 1;
    overflow: hidden;
    margin: 0% 1.3%;
    transition: .8s;
}

.box img{
    width: 200%;
    height: 100%;
    object-fit: cover;
    transition: .8s;
}
.box:hover{
   flex: 1 1 50%;
   transition: .8s;
}
.box:hover img{
    width: 100%;
    height: 100%;
    transition: .8s;
}

.detail-box{
    margin-left:200px;
    margin-top:100px;
}




.wrapper {
float:right;
display:inline;
}

    </style>

</head>

<body>

    <div class="hero_area">

        <div class="hero_bg_box">
            <div class="bg_img_box">
                <img src="posterhome.jpg" alt="" style="width: 100%;opacity: 1.5;">
            </div>
        </div>
        

        <header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="index.html">
                <span>
                    <img class="logo" src="oklogo.png" alt="logo" style="width:150px;height:150px;">
                </span>
            </a>

            
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html"> About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.html">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="why.html">Why Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="team.html">Team</a>
                    </li>
                    <button class="btn">Login</button>
                </ul>
                
            </div>
        </nav>
            
            <div class="detail-box">
                                        <h1 style="font-weight:bold;font-size:55px;color:white;">
                                            Welcome to<br>
                                            OK Society
                                        </h1>
                                        <p style="color:white;">
                                            The concept of society is fundamental to our understanding of human civilization <br> and social interaction. At its core, society refers to a group of individuals who share <br> a common culture, territory, and identity, and who interact with one another within <br> a structured framework of norms, values, and institutions.
                                        </p>
                                        <div class="btn-box" style="font-size:18px;">
                                            <a href="" class="btn1" style="color:black;">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
    </div>
</header>

        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section ">


            <div class="wrapper" style="display:inline-block;">
            <div class="container2"> 
  <div class="box">
    <a href="first/faculty.php">
        <img src="sport.jpeg" alt="MEN">
    </a>  
  </div>
  <div class="box">
    <a href="first/talent.php">
    <img src="talent.jpeg" alt="Women">
  </a>
  </div>
  <div class="box">
    <a href="first/talk.php">
    <img src="talkshow.jpeg" alt="Kids">
  </a>
  </div>
  <div class="box">
    <a href="first/event.php">
    <img src="events.jpeg" alt="Catogeries"></a>
  </div>
</div>
 </div>
           
            
            
            
            
            
            <footer>
                <a href="https://www.instagram.com/tarumt_penang/" target="_blank"><ion-icon id="insta" name="logo-instagram"></ion-icon></a>
                <a href="https://www.facebook.com/tarumtpenang/?locale=ms_MY" target="_blank"><ion-icon name="logo-facebook"></ion-icon></a>
                <a href="https://twitter.com/KlTaruc" target="_blank"><ion-icon name="logo-twitter"></ion-icon></a>
                <p>77, Lorong Lembah Permai Tiga,<br>
                    TARUMT PHARMACY<br>
                     11200 Tanjong Bungah,<br>
                    Pulau Pinang, Malaysia.<br>
                    Tel: <a href="tel:(6)04-8995230" style="color:black;">(6)04-8995230</a><br>
                    Whatsapp: <a href="phone:+6011 1082 5618 /+60 13-898 8408" style="color:black;">+6011 1082 5618 /+60 13-898 8408</a><br>
                    Email: <a href="mailto:penang@tarc.edu.my" style="color:black;">penang@tarc.edu.my</a><br></p>
            </footer>

</body>

</html>
