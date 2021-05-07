

<img class="secondCompare" value="one" src="assets/images/gorgoroth/gorgoroth_hotel.jpg" alt='ork standing on a mountain with gorgoroth in the background'>
<section class='comparedText'>
    <p><span>R<?php echo $newBooking->getGorgorothCompare(); ?></span> at <span>The Gorgoroth Hotel</span></p>
    <br>
    <p>Activities include -</p>
    <br>
    <div class='listedActivities'>
        <?php $gorgorothActivities->getActivities(); ?>
    </div>    
    <div class='buttonContainer'>
        <a href='gorgoroth.php' target='_blank'><button>More Information</button></a>
        <form action="Booknow.php" method="post">
            <input type="submit" value="book now" name="gorgorothHotel"></input>
        </form>
    </div>
</section>
