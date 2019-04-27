<?php
?>
<br>
<form method="POST" action="" enctype="multipart/form-data">


    <div class="form-group row">
        <label class="col-2 col-form-label">KM</label>
        <div class="col-10">
            <input name="km" class="form-control" type="number" placeholder="Number Of KM" required>
        </div>
    </div>

    <div class="form-group row">
        <label  class="col-2 col-form-label">Fuel Capacity</label>
        <div class="col-10">
            <input name="fuelcapacity" class="form-control" type="number" required />
        </div>
    </div>
    <div class="form-group row">
        <label  class="col-2 col-form-label">Max Speed</label>
        <div class="col-10">
            <input class="form-control" type="number" name="maxspeed" required>
        </div>
    </div>


    <div class="form-group row">
        <label  class="col-2 col-form-label">Start Price</label>
        <div class="col-10">
            <input class="form-control" type="number" name="startprice" required>
        </div>
    </div>



    <fieldset class="form-group row">

        <legend class="col-form-legend col-sm-2">Kind OF Driving</legend>
        <div class="col-sm-10">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="kindofdriving" id="gridRadios1" value="manual" required>
                    Manual
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="kindofdriving" value="automatic" required>
                    AutoMatic </label>
            </div>
        </div>
    </fieldset>

    <div class="form-group row">
        <label for="example-email-input"  class="col-2 col-form-label">Start Date Auction</label>
        <div class="col-10">
            <input name="dateofstartbid" class="form-control" type="date"  required>
        </div>
    </div>
    <div class="form-group row">
        <label for="example-email-input"  class="col-2 col-form-label">End Date Auction</label>
        <div class="col-10">
            <input name="dateofend" class="form-control" type="date" required>
        </div>
    </div>
    <div class="form-group ">
        <label class="col-2 col-form-label">Fuel Kind</label>
        <select class="form-control" name="fuelkind" required >
            <option value="98">98</option>
            <option value="95">95</option>
            <option value="92">92</option>
            <option value="80">80</option>
        </select>
    </div>


    <div class="form-group">
        <label for="exampleSelect1">Year of issue </label>
        <select class="form-control" name="year" required>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleSelect1">Color </label>
        <select class="form-control"name="color" required >
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="white">White</option>
            <option value="yellow">Yellow</option>
            <option value="black">Black</option>
            <option value="blue">Blue</option>
        </select>

        <div class="form-group">
            <label for="exampleSelect1"> Type Your car </label>
            <select name="module" class="form-control" id="exampleSelect1" required>

                <option value="sedan">Sedan</option>
                <option value="ford">Ford</option>
                <option value="toyota">Toyota</option>
                <option value="nissan">Nissan</option>
                <option value="kia">Kia</option>
                <option value="hyundai">Hyundai</option>
                <option value="honda">Honda </option>
                <option value="volkswagenbeetle">Volkswagen Beetle</option>
                <option value="chevy">Chevy</option>
            </select>
        </div>


        <div class="form-group">
            <label for="exampleTextarea">Write About your Product</label>
            <textarea class="form-control" id="exampleTextarea" rows="3" name="describition" required></textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Product Image</label>
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="photo" required>
        </div>
        <input type="submit" name="send" class="btn btn-primary" value="Send"/>
    </div>

</form>


