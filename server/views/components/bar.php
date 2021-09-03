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