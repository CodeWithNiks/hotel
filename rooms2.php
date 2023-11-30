<?php 
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();

    if (isset($_GET['seen'])) {
        $frm_data=filteration($_GET);
        if($frm_data['seen']=='all'){
            $q="UPDATE `user_queries` SET `seen`=? ";
            $values=[1];
            if(update($q,$values,'i')){
                alert('success','Mark  all as read !');
            }
            else{
                alert('error','Operation Failed');
            }

        }
        else{
            $q="UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
            $values=[1,$frm_data['seen']];
            if(update($q,$values,'ii')){
                alert('success','Mark as read !');
            }
            else{
                alert('error','Operation Failed');
            }
        }
    }
    
    if (isset($_GET['del'])) {
        $frm_data=filteration($_GET);
        if($frm_data['del']=='all'){
            $q="DELETE FROM `user_queries`" ;
           
            if(mysqli_query($con,$q)){
                alert('success','All deleted !');
            }
            else{
                alert('error','Operation Failed');
            }

        }
        else{
            $q="DELETE FROM `user_queries`  WHERE `sr_no`=?";
            $values=[$frm_data['del']];
            if(delete($q,$values,'i')){
                alert('success','Message deleted !');
            }
            else{
                alert('error','Operation Failed');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL- FEATURES & FACILITIES</title>
    <?php require('inc/links.php') ?>
</head>
<body class="bg-light">
    <?php require('inc/header.php') ?>
    


    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
               <h3 class="mb-4">ROOMS</h3>
               


            <!--features team section -->
            <div class="card border-0 shadow mb-4" >
                <div class="card-body">
                    <div class="text-end mb-4">
                        
                        <button type="button" class="btn btn-dark btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#add-room"><i class="bi bi-plus-circle"></i>Edit</button>
                    </div>
                    
                    <div class="table-responsive-lg" style="height: 450px; overflow-y:scroll;">
                    <table class="table table-hover border">
                        <thead  >
                            <tr class="bg-dark text-light">
                            <th scope="col">Sl</th>
                            <th scope="col">Name</th>                            
                            <th scope="col">Area</th>
                            <th scope="col">Guests</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="room-data">
                            
                        </tbody>
                    </table>
                    </div>
                    
                        
                    
                    
                    
                    
                </div>
                
            </div>
            <!--add room modal -->
                <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="add_room_form" >

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" >Add Room</h5>
                                    
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label  class="form-label fw-bold">Name</label>
                                            <input type="text"name="name" required " class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label  class="form-label fw-bold">Area</label>
                                            <input type="number" min="1" name="area" required " class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label  class="form-label fw-bold">Price</label>
                                            <input type="number"min="1"name="price" required " class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label  class="form-label fw-bold">Quantity</label>
                                            <input type="number"min="1"name="quantity" required " class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label  class="form-label fw-bold">Adult (Max.)</label>
                                            <input type="number"min="1" name="adult" required " class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label  class="form-label fw-bold">Children (Max.)</label>
                                            <input type="number"min="1"name="children" required " class="form-control shadow-none">
                                        </div>
                                    
                                        <div class="col-12 mb-3">
                                            <label  class="form-label fw-bold">Features</label>
                                            <div class="row">
                                            <?php 
                                                $res=selectAll('features');
                                                while($opt=mysqli_fetch_assoc($res)){
                                                    echo"
                                                        <div class='col-md-3 mb-1'>
                                                            <label>
                                                                <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                                                $opt[name]
                                                            </label>
                                                        </div>
                                                    ";
                                                }
                                            ?> 
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label  class="form-label fw-bold">Facilities</label>
                                            <div class="row">
                                            <?php 
                                                $res=selectAll('facilities');
                                                while($opt=mysqli_fetch_assoc($res)){
                                                    echo"
                                                        <div class='col-md-3 mb-1'>
                                                            <label>
                                                                <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                                                $opt[name]
                                                            </label>
                                                        </div>
                                                    ";
                                                }
                                            ?> 
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label fw-bold">Description</label>
                                            <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                                        </div>

                                        
                                    </div>
                                </div>                    
                            
                                    
                                   
                            
                                <div class="modal-footer">
                                    <button type="reset"  class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit"   class="btn custom-bg text-white shadow-none">SAVE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- edit room modal -->
                <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="edit_room_form" >

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" >Edit room</h5>
                                    
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label  class="form-label fw-bold">Name</label>
                                            <input type="text"name="name" required " class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label  class="form-label fw-bold">Area</label>
                                            <input type="number" min="1" name="area" required " class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label  class="form-label fw-bold">Price</label>
                                            <input type="number"min="1"name="price" required " class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label  class="form-label fw-bold">Quantity</label>
                                            <input type="number"min="1"name="quantity" required " class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label  class="form-label fw-bold">Adult (Max.)</label>
                                            <input type="number"min="1" name="adult" required " class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label  class="form-label fw-bold">Children (Max.)</label>
                                            <input type="number"min="1"name="children" required " class="form-control shadow-none">
                                        </div>
                                    
                                        <div class="col-12 mb-3">
                                            <label  class="form-label fw-bold">Features</label>
                                            <div class="row">
                                            <?php 
                                                $res=selectAll('features');
                                                while($opt=mysqli_fetch_assoc($res)){
                                                    echo"
                                                        <div class='col-md-3 mb-1'>
                                                            <label>
                                                                <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                                                $opt[name]
                                                            </label>
                                                        </div>
                                                    ";
                                                }
                                            ?> 
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label  class="form-label fw-bold">Facilities</label>
                                            <div class="row">
                                            <?php 
                                                $res=selectAll('facilities');
                                                while($opt=mysqli_fetch_assoc($res)){
                                                    echo"
                                                        <div class='col-md-3 mb-1'>
                                                            <label>
                                                                <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                                                $opt[name]
                                                            </label>
                                                        </div>
                                                    ";
                                                }
                                            ?> 
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label fw-bold">Description</label>
                                            <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                                        </div>
                                        <input type="hidden" name="room_id">

                                        
                                    </div>
                                </div>                    
                            
                                    
                                   
                            
                                <div class="modal-footer">
                                    <button type="reset"  class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit"   class="btn custom-bg text-white shadow-none">SAVE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                                               

                
          
    



            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        let add_room_form=document.getElementById('add_room_form');
        add_room_form.addEventListener('submit',function(e){
            e.preventDefault();
            add_room();

        })
        
        function add_room(){
            let data =new FormData();
            data.append('add_room','');  
            data.append('name',add_room_form.elements['name'].value);
            data.append('area',add_room_form.elements['area'].value);           
            data.append('price',add_room_form.elements['price'].value); 
            data.append('quantity',add_room_form.elements['quantity'].value); 
            data.append('adult',add_room_form.elements['adult'].value); 
            data.append('children',add_room_form.elements['children'].value); 
            data.append('desc',add_room_form.elements['desc'].value); 

            let features=[];
            add_room_form.elements['features'].forEach(el =>{
                if(el.checked){
                    features.push(el.value);
                }
            });
            let facilities=[];
            add_room_form.elements['facilities'].forEach(el =>{
                if(el.checked){
                    facilities.push(el.value);
                }
            });
            data.append('features',JSON.stringify(features));
            data.append('facilities',JSON.stringify(facilities));
            
            let xhr=new XMLHttpRequest();
            xhr.open("POST","ajax/rooms.php",true);
           
            

            xhr.onload =function(){
                
                var myModal= document.getElementById('add-room');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();
                

                if(this.responseText=='1')
                {
                    alert('success','New room added');
                    add_room_form.reset();
                    
                    get_all_rooms();
                    
                    
                }
                
                else
                {
                    alert('error','server down');
                   
                    get_all_rooms();
                    

                }               
            }
            xhr.send(data);

        }
        function get_all_rooms(){
            let xhr=new XMLHttpRequest();
            xhr.open("POST","ajax/rooms.php",true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            

            xhr.onload =function(){
                document.getElementById('room-data').innerHTML=this.responseText;           
            }
            xhr.send('get_all_rooms');

        }
        let edit_room_form=document.getElementById('edit_room_form');
        function edit_details(id){
           
            let xhr=new XMLHttpRequest();
            xhr.open("POST","ajax/rooms.php",true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded')
            

            xhr.onload =function(){
                let data=JSON.parse(this.responseText);
                edit_room_form.elements['name'].value=data.roomdata.name;
                edit_room_form.elements['area'].value=data.roomdata.area;
                edit_room_form.elements['price'].value=data.roomdata.price;
                edit_room_form.elements['quantity'].value=data.roomdata.quantity;
                edit_room_form.elements['adult'].value=data.roomdata.adult;
                edit_room_form.elements['children'].value=data.roomdata.children;
                edit_room_form.elements['desc'].value=data.roomdata.desc;
                edit_room_form.elements['room_id'].value=data.roomdata.id;
                
                edit_room_form.elements['features'].forEach(el =>{
                    if(data.features.includes(Number(el.value))){
                        el.checked=true;
                    }
                });
                edit_room_form.elements['facilities'].forEach(el =>{
                    if(data.facilities.includes(Number(el.value))){
                        el.checked=true;
                    }
                });



            }
            xhr.send('get_room='+id);

        }
        






        function toggle_status(id,val){
            let xhr=new XMLHttpRequest();
            xhr.open("POST","ajax/rooms.php",true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            

            xhr.onload =function(){
                if(this.responseText==1)
                {
                    alert('success','status toggled');
                    get_all_rooms();
                    
                    
                    
                }
                
                else
                {
                    alert('error','server down');
                    get_all_rooms();
                  
                    
                    

                }     
            }
            xhr.send('toggle_status='+id+'&value='+val);

        }
        window.onload=function(){
            get_all_rooms();
        }

    </script>
    
    
</body>
</html>