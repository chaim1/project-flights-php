<?php
    include_once '../controlers/airport-control.php';
    include 'header.php';
?>
<main>   
        <div style="border: 1px solid black; padding:5%; margin:5%">
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
                    <button  type="submit" onclick="return config()">Add airport</button>
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
{

}
else
{

}
</script>
</body>
</html>