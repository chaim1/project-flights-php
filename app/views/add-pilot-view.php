<?php     
    include 'header.php'; 
?>
    <main>
        <div style="border: 1px solid black; padding:5%; margin:5%">
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
                    <input style="border:none" class="form-control" value="" type="file" name="filePicture">
                </div>
                <input class="d-none" name="valid" type="text" value="1">
                <div class="form-group">
                    <button class="btn btn-secondary btn-lg btn-block" type="submit" name-"submit">Add pilot</button>
                </div>     
                </form>
        </div>
    </main>    
</body>
</html> 