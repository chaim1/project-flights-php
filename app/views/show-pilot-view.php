<?php

include_once '../../Logic/business-logic-pilot.php';
$bl = new BusinessLogicPilot;
$arrayOfPilots = $bl->get();
?>
<?php     
    include 'header.php'; 
?>

    <main>
        <div style="border: 1px solid black; padding:5%; margin:5%">    
        <h1 align="center">All pilots</h1>
            <table class="table">
                    <tr> 
                        <th>Name</th>
                        <th>Picture</th>
                        <th>Level</th>
                    </tr>
                    <?php foreach ($arrayOfPilots as $item) {
                        ?>
                        <tr>
                                <td><?php echo $item->getNmaepilot()?></td>
                                <td><img src="<?php echo '../../pilotPictures/'.$item->getPicture_src()?>" class="img" alt="Responsive image"></td>
                                <td><?php echo $item-> getLevel()?></td>

                        </tr>
                    <?php 
                }?>
            </table>
        </div>
    </main>    
</body>
</html>