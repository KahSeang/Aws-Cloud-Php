<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <link rel="icon" href="logo/wow sport logo.png">
        <title>welcome to wow shop</title>    </head>
<style>

div.side{
    float: left;
    margin-top: 18%;
    margin-left: 1%;
}
div.side img{
    border-radius: 25px;
    padding-top: 10px;
}

div.main{
    margin: 10%;
    margin-top: 7%;
    margin-left: 2%;
    float: left;
}
div.sidebar{
    background-color: lightgrey;
    padding: 2%;
    border: 3px lightgrey solid;
    width: 25%;
    height: auto;
    margin-left: 2%;
    margin-top: 5%;
    margin-bottom: 10%;
    box-shadow: rgb(180, 172, 172) 1px 1px 10px;
    float: left;
}

div.buy select{
    margin-left: 10%;
    width: 80%;
    height: 30px;
    text-align: center;
    border-radius: 5px;
    background-color: rgb(232, 235, 235);
}

div.submit input{
    height: 50px;
    width: 100%;
    background-image: linear-gradient(10deg, grey,white);
    border-radius: 25px;
    cursor: pointer;
    border: 1px solid black;
}
div.submit input:hover{
    transform: scale(1.01,1.01);
    transition: all 0.5s linear;
    color: white;
    background-image: linear-gradient(70deg, rgba(0,0,0,0.8),white);
}

p.price span{
    font-size: 30px;
    text-align: center;
    width: 20%;
    border-radius: 5px;

}

p.price{    
    text-align: center;
    border-radius: 5px;
}
html{
    width: 1300px;
}



</style>

    <body>
               
        <div class="side">
            <img src="badmintoncourt1.png" alt="court" width="100px" height="100px"><br>
            <img src="badmintoncourt1.1.png" alt="court" width="100px" height="100px"><br>
            <img src="badmintoncourt1.2.png" alt="court" width="100px" height="100px"><br>
            <img src="badmintoncourt1.3.jpg" alt="court" width="100px" height="100px"><br>
        </div>

        <div class="main">
            <img src="badminton1.avif" alt="court" width="600px" height="600px" id="mainImage"> 
        </div>

        <script>
        
        const mainImAage = document.getElementById('mainImage');
            const sideImages = document.querySelectorAll('.side img');
        
            sideImages.forEach((sideImage) => {
                sideImage.addEventListener('mouseover', () => {
                    const newSrc = sideImage.getAttribute('src');
                    mainImage.setAttribute('src', newSrc);
                });
        
                sideImage.addEventListener('mouseout', () => {
                    // Reset the main image to its original source
                    mainImage.setAttribute('src', 'badminton1.avif');
                });
          
            });


        </script>
        <div class="sidebar">
            
            <p>Sport Category</p>
            <h1>Badminton</h1>

            <p class="price"><span style="background-color: rgb(250, 203, 73);">Badminton Court </span> /<caption>Rating</caption><span style="color: yellow;">&#9733;&#9733;&#9733;&#9733;&#9733;</span></p>

 
            <div class="buy">
                <form action="cart.html" method="get" onsubmit="return checkSelectedOption()">
                <label for="size">Time : </label> <br><br>
                <select name="size" id="size">
                    <option value="Time">Time</option>
                    <option value="9-11">9:00am-11:00am</option>
                    <option value="11-1">11:00am-1:00pm</option>
                    <option value="1-3">1:00pm-3:00pm</option>
                    <option value="3-5">3:00pm-5:00pm</option>
                    <option value="5-7">5:00pm-7:00pm</option>
                    <option value="7-9">7:00pm-9:00pm</option>
                    <option value ="7-10">7:00pm-10:00pm</option>
                </select>
            </div>

            <br> <br> <br>

            <div class="submit">
                <input type="submit" value="Booking" onclick="Comfirm Booking('New Balance 1906R', 689.00, document.getElementById('size').value, 'shoes/New Balance 1906R.webp')">
            </div>
            </form>
                
                <p> Monday to Friday 9am - 10pm</p>
                <p> Saturday to Sunday 9am - 7pm</p>
                <p> *Close on Public Holiday*</p>
          
           
            </div>

        </div>
   
          
         
    </body>
</html>