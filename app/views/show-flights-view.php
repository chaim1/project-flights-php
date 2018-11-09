<?php
include 'header.php'; 
include_once '../controlers/add-flight-control.php';
?>
    <main>
        <div style="border: 1px solid black; padding:5%; margin:5%">  
                
        
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

            <h1 align="center" class="haeder">All Flights</h1>
            <table class="table">

                        

                    <!-- for filter -->  
                    <form action="../controlers/add-flight-control.php" method="post">
                        <tr>
                            <th><input name="contentNo" class="form-control" type="text"></th>
                            <th>
                                <select  class="form-control" name="airportFilter" id="airport">
                                    <option></option>
                                        <?php foreach($arrayOfAirport as $airport) {?>
                                            <option value='<?php echo $airport->getId()?>'><?php echo $airport->getNmae()?></option>
                                        <?php } ?>
                                </select>
                            </th>
                            <th>
                                <select class="form-control" name="countryFilter" id="country">
                                    <option></option>
                                        <?php foreach($arrayOfCountry as $Country) { ?>
                                            <option value='<?php echo $Country->getId()?>'><?php echo $Country->getNmaeCountry()?></option>
                                        <?php } ?>    
                                </select>
                            </th>
                            <th><input name="contentDateTimeFilter" class="form-control" type="text"></th>
                            <th>
                                <select class="form-control" name="pilotFilter" id="pilot">
                                    <option></option>
                                        <?php foreach($arrayOfPilot as $pilot) { ?>   
                                            <option value="<?php echo $pilot->getId()?>" ><?php echo $pilot->getNmaepilot()?></option>    
                                        <?php } ?>    
                                </select>
                            </th>
                            <!-- <th>
                            </th> -->
                            <th colspan="2">
                                <button name="filter" class="btn btn-primary btn-block" type="submit">
                                    <i class="fa fa-search">Filter</i>
                                </button>
                            </th>
                        </tr>
                    </form>     

                    <!-- for seatch -->
                    <tr>
                        <th colspan="7">
                            <form action="../controlers/add-flight-control.php" method="post">   
                                <div class="input-group">
                                    <input name="contentSearch" type="text" class="form-control" placeholder="Search Into Flight">
                                    <div class="input-group-append">
                                    <button name="search" class="btn btn-primary" type="submit">
                                        <i class="fa fa-search">Search</i>
                                    </button>
                                    </div>
                                </div>
                            </form>  
                        </th>
                    </tr>           

<!-- show update & delete flights -->
                    <tr> 
                        <th>No</th>
                        <th>Flight From</th>
                        <th>Flight To</th>
                        <th>Date Time</th>
                        <th>Pilot</th>
                    </tr>
                    <?php foreach ($arrayOfFlight as $item) {?>
                            <tr>
                        <?php if(!empty($_POST['idOfFlight'])&&!empty($_POST['idOfAirport'])&&!empty($_POST['idOfcountry'])&&!empty($_POST['idOfPilot'])&& $_POST['idOfFlight']== $item->getId()){?>

                            <form action="../controlers/add-flight-control.php" method="post">
                                <input name="idOfFlightUpdate" style="display:none" type="number" value="<?php echo $item->getId()?>">

                                <td><input class="form-control" name="noUpdate" type="text" value="<?php echo $item->getNo()?>"></td>

                                <td class="form-group">
                                    <select  class="form-control" name="airportUpdate" id="airport">
                                        <?php foreach($arrayOfAirport as $airport) {?>
                                            <?php if($airport->getId() == $_POST['idOfAirport']) {?>
                                                <option value='<?php echo $airport->getId()?>' selected><?php echo $airport->getNmae()?></option>
                                        <?php }else{ ?>
                                                <option value='<?php echo $airport->getId()?>'><?php echo $airport->getNmae()?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </td> 

                                <td class="form-group">          
                                    <select class="form-control" name="countryUpdate" id="country">
                                    <?php foreach($arrayOfCountry as $Country) { ?>
                                        <?php if($Country->getId() == $_POST['idOfcountry']) {?>
                                                <option value='<?php echo $Country->getId()?>' selected><?php echo $Country->getNmaeCountry()?></option>
                                        <?php }else{ ?>
                                                <option value='<?php echo $Country->getId()?>'><?php echo $Country->getNmaeCountry()?></option>
                                            <?php } ?>
                                        <?php } ?>    
                                    </select>
                                </td>

                               <td><input class="form-control" name="dateTimeUpdate" type="text" value="<?php echo $item->getFlightDatetime()?>"></td>

                                <td class="form-group">         
                                    <select class="form-control" name="pilotUpdate" id="pilot">
                                        <?php foreach($arrayOfPilot as $pilot) { ?>
                                            <?php if($pilot->getId() == $_POST['idOfPilot']) {?>
                                                <option value="<?php echo $pilot->getId()?>" selected><?php echo $pilot->getNmaepilot()?></option>
                                            <?php }else{ ?>
                                                <option value="<?php echo $pilot->getId()?>" ><?php echo $pilot->getNmaepilot()?></option>
                                            <?php } ?>
                                        <?php } ?>    
                                    </select>
                                </td>                

                                <td><button name="save"  type="submit" class="btn btn-warning btn-sm">save</button></td>

                            </form>
                        <?php }else{ ?>
                            <form action="../controlers/add-flight-control.php" method="post">
                                <input name="idOfFlight" style="display:none" type="number" value="<?php echo $item->getId()?>">
                                <input name="idOfAirport" style="display:none" type="number" value="<?php echo $item->getAirportModel()->getId()?>">
                                <input name="idOfcountry" style="display:none" type="number" value="<?php echo $item->getCountryModel()->getId()?>">
                                <input name="idOfPilot" style="display:none" type="number" value="<?php echo $item->getPilotModel()->getId()?>">

                                <td><?php echo $item->getNo()?></td>
                                <td><?php echo $item->getAirportModel()->getNmae()?></td>
                                <td><?php echo $item->getCountryModel()->getNmaeCountry()?></td>
                                <td><?php echo $item->getFlightDatetime()?></td>
                                <td><?php echo $item->getPilotModel()->getNmaepilot()?></td>
                                <td><button name="updateFlight"  type="submit" class="btn btn-info btn-sm">Update</button></td>
                            </form>

                            <form action="../controlers/add-flight-control.php" method="post">
                                <input name="idOfFlightDelete" style="display:none" type="number" value="<?php echo $item->getId()?>">
                                <td><button name="deleteFlight"  type="submit" class="btn btn-danger btn-sm">Delete</button></td>
                            </form>
                        <?php } ?>
                        </tr>
                    <?php 
                }?>
            </table>
        </div>
    </maim>   
    <script src="main.js"></script> 
</body>
</html>