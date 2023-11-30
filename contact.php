<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Genie- CONTACT</title>
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/> -->
    <?php require('inc/links.php'); ?>
    
    
    
   
</head>
<body>
   <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
            Nesciunt consectetur, excepturi aspernatur perspiciatis
             voluptatum vel sunt veritatis incidunt laboriosam ab.</p>
    </div>

    <?php 
        // require('admin/inc/db_config.php');

        $q="SELECT * FROM `contact_details` WHERE `sr_no`=?";
        $values=[1];
        $res=select($q,$values,"i");
        $contact_r=mysqli_fetch_assoc($res);
        
        // print_r($json_data);
        // echo $json_data;
    
    ?> 
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 ">
                <iframe  class="w-100 rounded" height="380px" src="<?php echo $contact_r['iframe']?>"   loading="lazy" ></iframe>
                    <h5>Address</h5>
                    <a href="<?php echo $contact_r['gmap']?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2"><i class="bi bi-geo-alt-fill"></i><?php echo $contact_r['address']?></a>
                    <h5 class="mt-4">
                    Call us
                    </h5>
                    <a href="tel: +91<?php echo $contact_r['pn1']?>" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +91 <?php echo $contact_r['pn1']?></a>
                    <br>
                    <a href="tel: +91<?php echo $contact_r['pn2']?>" class="d-inline-block text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +91 <?php echo $contact_r['pn2']?></a>
                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: <?php echo $contact_r['email']?>" class="d-inline-block text-decoration-none text-dark mb-2" ><i class="bi bi-envelope-at-fill"></i> <?php echo $contact_r['email']?></a>
                    <h5 class="mt-4">
                    Follow Us
                    </h5>
                    <a href="<?php echo $contact_r['tw']?>" class="d-inline-block mb-3 text-dark fs-5 me-2 "><i class="bi bi-twitter-x me-1"></i></a>
                    
                    <a href="<?php echo $contact_r['fb']?>" class="d-inline-block mb-3 text-dark fs-5 me-2"><i class="bi bi-facebook me-1"></i></a>
                    <a href="<?php echo $contact_r['insta']?>" class="d-inline-block text-dark fs-5 "><i class="bi bi-instagram me-1"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6  px-4">
                <div class="bg-white rounded shadow p-4 ">
                    <form method="POST">
                        <h5>Send a message</h5>
                        <div class="mt-3">
                                <label  class="form-label" style="font-weight: 500;">Name</label>
                                <input name="name" required type="text" class="form-control shadow-none">   
                        </div>
                        <div class="mt-3">
                                <label  class="form-label" style="font-weight: 500;">Email</label>
                                <input name="email" required type="email" class="form-control shadow-none">   
                        </div>
                        <div class="mt-3">
                                <label  class="form-label" style="font-weight: 500;">Subject</label>
                                <input name="subject" required type="text" class="form-control shadow-none">   
                        </div>
                        <div class="mt-3">
                                <label  class="form-label" style="font-weight: 500;">Message</label>
                                <textarea name="message" required  class="form-control shadow-none"  rows="5" style="resize:none;"></textarea> 
                        </div>
                        <button type="submit" name="send" class="btn text-white custom-bg mt-3 ">SEND</button>
                    </form>
                    
                </div>
           
            </div>
        </div>
    </div>
    <?php 
        if(isset($_POST['send'])){
            $frm_data=filteration($_POST);
            $q="INSERT INTO `user_queries`( `name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
            $values=[$frm_data['name'], $frm_data['email'], $frm_data['subject'],$frm_data['message']];
            $res=insert($q,$values,'ssss');
            if($res==1){
                alert('success','MAIL SENT!');            
            }
            else{
                alert('error','failed to sent');
               
            }
        }
    
    
    
    ?>

    
    <?php require('inc/footer.php') ?>

    
  </script>
</body>
</html>