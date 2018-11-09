<?php
    $a = false;
    include_once '../controlers/airport-control.php';
    include 'header.php';
?>
<main>   
        <div style="border: 1px solid black; padding:5%; margin:5%">

            <?php if (isset($_POST['AddAirportButton'])) { ?>
        <!-- if has errors  -->
            <?php if ($hasErrors) { ?>
            <div class="alert alert-danger" role="alert">
                <ul>

                    <?php foreach ($arreyOfErrors as $error) { ?>
                    <li><strong><?php echo $error; ?></strong> </li>
                    <?php } ?>

                </ul>
            </div>
            <?php } ?>
        <!--  for successful -->
            <?php if ($successful) { ?>
            <div class="alert alert-success" role="alert">
                <ul>

                    <?php foreach ($arreyOfSuccess as $successful) { ?>
                    <li><strong></strong> <?php echo $successful; ?></li>
                    <?php } ?>

                </ul>
            </div>
            <?php } ?>
            <?php } ?>
<!-- add airport -->
            <h1 align="center">add airport</h1>

            <form action="../controlers/airport-control.php" method="POST">

                <div class="form-group">         
                    <select class="form-control" name="countryId" id="countryId">
                        <?php foreach($arrayOfCountry as $country) { ?>
                            <option value="<?php echo $country->getId();?>"><?php echo $country->getNmaeCountry();?></option>
                        <?php } ?>    
                    </select>
                </div> 

                <div class="form-group">            
                    <label for="nameAirport"></label>Airport
                    <input  id="nameAirport" class="form-control" name="nameAirport" type="text">
                </div>
                <div class="form-group">
                    <button class="btn btn-secondary btn-lg btn-block" name="AddAirportButton"  type="submit" onclick="return config()">Add airport</button>
                </div>
                
            </form>
        </div>
    </main>
<script>
    // function config(){
    //     var config=document.getElementById("nameAirport").value;
    //     alert(typeof(config))
    // }
    // if (window.confirm('Really go to another page?'))
    // {

    // }
    // else
    // {

    // }
</script>
</body>
</html>