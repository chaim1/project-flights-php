<?php     
    include 'header.php'; 
?>

    <main>
        <div style="border: 1px solid black; padding:5%; margin:5%">
            <h1 align="center">add country</h1>
                <form action="../controlers/country-control.php" method='GET'>
                    <div class="form-group">
                        <label for="countryName">Country name</label>
                        <input class="form-control" name="countryName" type="text">
                    </div>
                    <input class="d-none" name="valid" type="text" value="1">
                    <div  class="form-group">
                        <button class="btn btn-secondary btn-lg btn-block" type="subnit">Add country</button>
                    </div>
                </form>
        </div>
    </main>    
</body>
</html>