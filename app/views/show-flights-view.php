<?php
include 'header.php'; 
include_once '../../Logic/business-logic-flight.php';
$bl = new BusinessLogicFlight;
$arrayOfFlight = $bl->get();
?>
<?php     
    
?>

    <main>
        <div style="border: 1px solid black; padding:5%; margin:5%">
            <h1 align="center" class="haeder">All Flights</h1>
            <table class="table">
                    <tr> 
                        <th>No</th>
                        <th>Flight From</th>
                        <th>Flight To</th>
                        <th>Pilot</th>
                    </tr>
                    <?php foreach ($arrayOfFlight as $item) {
                        ?>
                        <tr>
                                <td><?php echo $item->getNo()?></td>
                                <td><?php echo $item->getAirportModel()->getNmae()?></td>
                                <td><?php echo $item->getCountryModel()->getNmaeCountry()?></td>
                                <td><?php echo $item->getPilotModel()->getNmaepilot()?></td>
                        </tr>
                    <?php 
                }?>
            </table>
        </div>
    </maim>    
</body>
</html>