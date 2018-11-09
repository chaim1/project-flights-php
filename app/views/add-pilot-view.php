<?php     
    include 'header.php'; 
    include_once '../controlers/add-pilot-controler.php';

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

            <h1 align="center">Add Pilot</h1>
                <form action="../controlers/add-pilot-controler.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="pilotName"></label>Name
                    <input class="form-control" name="pilotName" type="text">
                </div> 
                <div class="form-group">   
                    <label for="level"></label>level
                    <input class="form-control" name="level" type="number">
                </div> 
                <!-- <div class="form-group"> 
                    <label for="picture_src"></label>picture
                    <input class="form-control" name="picture_src" type="text">
                </div>  -->
                <div class="form-group">
                    <label for="filePicture"></label> Picture
                    <input style="border:none" class="form-control" type="file" name="filePicture">
                </div>
                <input class="d-none" name="valid" type="text" value="1">
                <div class="form-group">
                    <button class="btn btn-secondary btn-lg btn-block" type="submit" name="AddPilot">Add pilot</button>
                </div>     
                </form>
        </div>
    </main>    
</body>
</html> 