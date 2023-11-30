<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Genie- FACILITIES</title>
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/> -->
    <?php require('inc/links.php'); ?>
    
    
    
    <style>
        .pop:hover{
            border-top-color: #0dfd00 !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
       
    </style>
</head>
<body>
   <?php require('inc/header.php'); ?>
   

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
            Nesciunt consectetur, excepturi aspernatur perspiciatis
             voluptatum vel sunt veritatis incidunt laboriosam ab.</p>
    </div>
    <div class="container">
        <div class="row">
            <?php 
            $res=selectAll('facilities');
            $path=FEATURES_IMG_PATH;
            
            while($row=mysqli_fetch_assoc($res)){
                echo<<<data
                    <div class="col-lg-4 col-md-6 mb-5 px-4">
                        <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                            <div class="d-flex align-items-center mb-2">
                                <img src="$path$row[icon]"  width="40px">
                                <h5 class="m-0 ms-3">$row[name]</h5>

                            </div>
                            <p>$row[description]</p>
                        </div>
                    </div>

                data;
            }
            
            
            ?>

            <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="images/facilities/wifi.svg"  width="40px">
                        <h5 class="m-0 ms-3"> Wifi</h5>

                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut quasi rerum quae magnam enim voluptas nostrum.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="images/facilities/wifi.svg"  width="40px">
                        <h5 class="m-0 ms-3"> Wifi</h5>

                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut quasi rerum quae magnam enim voluptas nostrum.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="images/facilities/wifi.svg"  width="40px">
                        <h5 class="m-0 ms-3"> Wifi</h5>

                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut quasi rerum quae magnam enim voluptas nostrum.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="images/facilities/wifi.svg"  width="40px">
                        <h5 class="m-0 ms-3"> Wifi</h5>

                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut quasi rerum quae magnam enim voluptas nostrum.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="images/facilities/wifi.svg"  width="40px">
                        <h5 class="m-0 ms-3"> Wifi</h5>

                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut quasi rerum quae magnam enim voluptas nostrum.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="images/facilities/wifi.svg"  width="40px">
                        <h5 class="m-0 ms-3"> Wifi</h5>

                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut quasi rerum quae magnam enim voluptas nostrum.</p>
                </div>
            </div> -->
        </div>
    </div>


    
    <?php require('inc/footer.php') ?>

    
  </script>
</body>
</html>