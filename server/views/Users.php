<?php require_once 'components/head.php'; ?>

<?php
    class Users {
        private $message;

        public function __construct()
        {
            
        }

        public function login($message) {
            $this->message = $message;
            if (!empty($this->message)) {
                echo $this->message;
            }

            echo
            '
                <form action="../controllers/users.php" method="POST">
                    <h2>Log In</h2>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required autocomplete="off">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                    <button type="submit" name="login">Log In</button>
                </form>
                <p>Dont have an account? <a href="' . URLROOT . '/server/controllers/users.php?user=reg">Register Here >></a></p>
            ';
        }

        public function register($message) {
            $this->message = $message;
            if (!empty($this->message)) {
                echo $this->message;
            }

            echo
            '
                <form action="../controllers/users.php" method="POST">
                    <h2>Registeration</h2>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required autocomplete="off">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required autocomplete="off">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                    <label for="repeatePassword">Repeate Password</label>
                    <input type="password" name="repeatePassword" id="repeatePassword" required>
                    <button type="submit" name="register">Register</button>
                </form>
                <p>Already have an account? <a href="' . URLROOT . '/server/controllers/users.php?user=login">Log In Here >></a></p>
            ';
        }
    }
?>

<?php require_once 'components/foot.php'; ?>