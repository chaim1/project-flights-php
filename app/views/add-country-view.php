<?php     

    include 'header.php';
    include_once '../controlers/country-control.php'; 
?>

    <main>
        <div style="border: 1px solid black; padding:5%; margin:5%">
            <?php if (isset($_GET['addCountry'])) { ?>
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

        
            <h1 align="center">add country</h1>
                <form action="../controlers/country-control.php" method='GET'>
                    <div class="form-group">
                        <label for="countryName">Country name</label>
                        <input class="form-control" name="countryName" type="text">
                    </div>
                    <input class="d-none" name="valid" type="text" value="1">
                    <div  class="form-group">
                        <button name="addCountry" class="btn btn-secondary btn-lg btn-block" type="submit">Add country</button>
                    </div>
                </form>
        </div>
    </main>    
</body>
</html>