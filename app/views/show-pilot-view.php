<?php

include_once '../../Logic/business-logic-pilot.php';
include_once '../controlers/add-pilot-controler.php';    
include 'header.php'; 
?>



    <main>
        <div style="border: 1px solid black; padding:5%; margin:5%">   

        <!-- if has errors  -->
        <?php if ($hasErrors) { ?>
            <div class="alert alert-danger" role="alert">
                <ul>

                    <?php foreach ($arreyOfErrors as $error) { ?>
                    <li><strong></strong> <?php echo $error; ?></li>
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

        <h1 align="center">All pilots</h1>
            <table class="table">
<!-- for filter -->  
                    <form action="../controlers/add-pilot-controler.php" method="post">
                        <tr>
                            <th colspan="2"><input name="filterName" placeholder="By Name" class="form-control" type="text"></th>
                            
                            <th colspan="2"><input name="filterLevel" placeholder="By Level" class="form-control" type="text"></th>
                            <th colspan="1">
                                <button name="filterPilots" class="btn btn-primary btn-block" type="submit">
                                    <i class="fa fa-search">Filter</i>
                                </button>
                            </th>
                        </tr>
                    </form>     

                    <!-- for seatch -->
                    <tr>
                        <th colspan="5">
                            <form action="../controlers/add-pilot-controler.php" method="post">   
                                <div class="input-group">
                                    <input name="contentSearchPilots" type="text" class="form-control" placeholder="Search Into pilot">
                                    <div class="input-group-append">
                                    <button name="searchInPilots" class="btn btn-primary" type="submit">
                                        <i class="fa fa-search">Search</i>
                                    </button>
                                    </div>
                                </div>
                            </form>  
                        </th>
                    </tr>       

                    <tr> 
                        <th>Name</th>
                        <th>Picture</th>
                        <th>Level</th>
                    </tr>
                    <?php foreach ($arrayOfPilots as $item) {
                        ?>

                        <tr>
                        <?php if(isset($_POST['updatePIlot'])&&!empty($_POST['idOfPilot'])&& $_POST['idOfPilot']== $item->getId()){ ?>

                            <form action="../controlers/add-pilot-controler.php" method="post">
                                <input name="idOfPilotUpdate" style="display:none" type="number" value="<?php echo $item->getId()?>">
                                <td><input class="form-control" name="nameUpdate" type="text" value="<?php echo $item->getNmaepilot()?>"></td>
                                <td><img src="<?php echo '../../pilotPictures/'.$item->getPicture_src()?>" class="img" alt="Responsive image"></td>
                                <td><input  class="form-control"name="levelUpdate" type="number" value="<?php echo $item->getLevel()?>"></td>
                                <td><button name="SaveUpdatePilot"  type="submit" class="btn btn-warning btn-sm">save</button></td>
                            </form>
                            <?php }else{?>
                                <form action="../controlers/add-pilot-controler.php" method="post">
                                    <input name="idOfPilot" style="display:none" type="number" value="<?php echo $item->getId()?>">

                                    <td ><?php echo $item->getNmaepilot()?></td>
                                    <td><img src="<?php echo '../../pilotPictures/'.$item->getPicture_src()?>" class="img" alt="Responsive image"></td>
                                    <td><?php echo $item-> getLevel()?></td>
                                    <td><button name="updatePIlot"  type="submit" class="btn btn-info btn-sm">Update</button></td>
                                </form>

                                <form action="../controlers/add-pilot-controler.php" method="post">
                                    <input name="idOfPilotDelete" style="display:none" type="number" value="<?php echo $item->getId()?>">
                                    <td><button name="deletePilot"  type="submit" class="btn btn-danger btn-sm">Delete</button></td>
                                </form>
                        

                        </tr>
                    <?php }?>
                <?php } ?>
            </table>
        </div>
    </main>    
</body>
</html>