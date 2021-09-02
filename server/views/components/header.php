<header>
    <div class="barContainer">
        <div class="barWrapper">
            <?php
                if (!isset($_SESSION['userId'])) {
                    echo '<a href="' . URLROOT . '/server/controllers/users.php?user=login">Log In</a>';
                } else {
                    echo '<a href="' . URLROOT . '/server/controllers/users.php?user=logout" style="color: red">Log Out</a>';
                }
            ?>
        </div>
    </div>
    <div class="bannerContainer">
        <div class="bannerWrapper">
            <img src="public/images/caRent.png" alt="caRent"/>
            <a href="#" class="btn">Car Request</a>
        </div>
    </div>
</header>