<form method="POST" enctype="multipart/form-data" >
    <div class="form-group">
        <label>Full Name </label>
        <input type="text" class="form-control" name="fullname" value="<?php echo $userData['fullname'];?>">
    </div>

    <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" name="email" value="<?php echo $userData['email'];?>">
    </div>

    <div class="form-group">
        
        <input  class="form-control"   type="hidden" name="oldpassword" value="<?php echo $userData['Password'];?>"/>
    </div>
    <div class="form-group">
        <label> Password </label>
        <input   class="form-control" type="password" name="newpassword" placeholder="Leave Blank If you dont need  to Change It  "/>
    </div>
    <div class="form-group">
        <label> Visa Number</label>
        <input  type="number" class="form-control" name="visanum" value= "<?php echo $userData['visanum'];?>" />
    </div>
    <div class="form-group">
        <img style="width: 200px; height: 200px ; margin-bottom: 20px"src="<?php echo '../../app/layout/uploads/'.$userData['photo'];?>" alt="Photo">
        
        <input class="form-control" type="file" name="photo"/>
    </div>
    
    <input  type="submit" name="update" value="Update" class="btn btn-primary"/>
</form>