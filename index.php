<!DOCTYPE html>
<html>
<head>
<title>image gallery</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="cssfiles/swiper.min.css"></link>
<link rel="stylesheet" type="text/css" href="cssfiles/style.css"></link>

</head>
<body>
    <?php
      if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
          
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"images/".$file_name);
           //echo "Success";
        }else{
           print_r($errors);
        }
      }
    ?>
    <div>

        <div class="audiosec">
            <audio controls>
                <source src="audiofol/imagine.mp3" type="audio/mp3">
            </audio>
            <p style="color: whitesmoke; font-family: 'Times New Roman', Times, serif; font-size: 18px;"><i>Because it's more better with music</i></p>
        </div>

        <h1 style="color:whitesmoke;" id="upfil">Upload Files</h1>
        <form method="post" action="" enctype="multipart/form-data">
          <input class="chosfil" type="file" name="image"/><br><br>
          <button class="upbutton"><input onclick="uploadedfil()" type="submit" value="Upload File" name="submit"></button>
        </form>
    </div>

    

    <?php
      $directory = "images/";
      $images = glob($directory . "/*.jpg");
    ?>

    <div class="swiper-container">
        <div class="swiper-wrapper">
          <?php foreach($images as $image){?>
          <div class="swiper-slide">
              <div class="imgBx">
                  <img src="<?php echo $image ?>">
              </div>
          </div>
          <?php };?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
      </div>

      <br>
      <br>

      <!--<div class="viewvalue">
          <button onclick="view1Flip()">view 1</button>
          <button onclick="view2()">view 2</button>
          <button onclick="view3()">view 3</button>
          <button onclick="view4()">view 4</button>
      </div>-->

      <!--<div>
        <button onclick="clickCounter()" type="button">Click me!</button>
        <div id="result"></div>
        <p>Click the button to see the counter increase.</p>
      </div>-->

      <div>
        <h3 style="color:whitesmoke;">Steps</h3>
        <p style="color:whitesmoke;"> step 1: Choose a file</p><br>
        <p style="color:whitesmoke;"> step 2: Click Upload file button to upload file</p><br>
        <p style="color:whitesmoke;"> step 3: Your image will be added to the responsive slider</p>
      </div>

    <script src="javascriptfiles/script.js"></script>
    <script type="text/javascript" src="javascriptfiles/swiper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script>
       const myForm = document.getElementById("myForm");
       const inpFile = document.getElementById("inpFile")

       myForm.addEventListener("submit", e => {
         e.preventDefault();

         const endpoint = "phpfiles/upload.php";
         const formData = new FormData();
         alert(inpFile);

         formData.append("inpFile", inpFile.files[0]);

         fetch(endpoint, {
           method: "post",
           body: formData
         }).catch(console.error);
       });
    </script> -->

    <script>

          var swiper = new Swiper('.swiper-container', {
          effect: 'coverflow',
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: 'auto',
          coverflowEffect: {
            rotate: 20,
            stretch: 0,
            depth: 200,
            modifier: 1,
            slideShadows : true,
          },
          pagination: {
            el: '.swiper-pagination',
          },
          loop:true,
          autoplay:{
            delay: 1500,
            disableInteraction: true,
          },
        });
      </script>
</body>
</html>