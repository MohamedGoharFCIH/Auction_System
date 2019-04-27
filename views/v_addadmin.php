<?php?>
<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Admin</h1>
        </div>
    </div> <!--/.row-->

    <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Full Name</label>
                <div class="col-sm-10">
                    <input type="text" name="fullname" class="form-control" id="inputEmail3" placeholder="Full Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">User Name</label>
                <div class="col-sm-10">
                    <input type="text" name="username"class="form-control" id="inputEmail3" placeholder="User Name">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name ="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>




            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>
             <div class="form-group row">
                <label for="inputvisanum4" class="col-sm-3 col-form-label">Visa Number</label>
                <div class="col-sm-10">
                    <input type="number" name="visanum" class="form-control" id="inputvisanum4" placeholder="visanum">
                </div>
            </div>
            <input type="hidden" value="1" name="groupid">
            <input type="hidden" value="1" name="approved">
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <input class="form-control btn-primary" type="submit" name="add" value="Add"/>
                </div>
            </div>
        
        
        </form>