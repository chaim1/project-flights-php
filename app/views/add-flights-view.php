<?php
    include_once '../controlers/add-flight-control.php';
?>
<?php     
    include 'header.php'; 
?>

    <main>
        <div style="border: 1px solid black; padding:5%; margin:5%">
            <h1 style="" align="center">Add Flight</h1>
            <form action="../controlers/add-flight-control.php" method="GET">
                <div class="form-group">From 
                    <select  class="form-control" name="airport" id="airport">
                        <?php foreach($arrayOfAirport as $airport) {?>
                            <option value='<?php echo $airport->getId()?>'><?php echo $airport->getNmae()?></option>
                        <?php } ?>
                    </select>
                </div>   

                <div class="form-group">  To          
                    <select class="form-control" name="country" id="country">
                        <?php foreach($arrayOfCountry as $Country) { ?>
                            <option value='<?php echo $Country->getId()?>'><?php echo $Country->getNmaeCountry()?></option>
                        <?php } ?>    
                    </select>
                </div>  

                <div class="form-group">Pilot         
                    <select class="form-control" name="pilot" id="pilot">
                        <?php foreach($arrayOfPilot as $pilot) { ?>
                            <option value="<?php echo $pilot->getId()?>"><?php echo $pilot->getNmaepilot()?></option>
                        <?php } ?>    
                    </select>
                </div>   

                <div class="form-group">         
                    <label for="datetime">datetime</label>
                    <input class="form-control" name="datetime" placeholder="yyyy-mm-dd hh:mm:ss"  type="text">
                </div>   
                    
                <div class="form-group">  
                    <label for="no">flight no</label> 
                    <input class="form-control" type="text" name="no"> 
                </div>  

                <div>        
                    <button  type="submit" class="btn btn-secondary btn-lg btn-block">Add flight</button>
                </div>             
            </form>
        </div>
    </main>    
</body>
</html>

