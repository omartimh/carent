<?php require_once 'components/head.php'; ?>

<?php
    class Users {
        private $message;

        public function __construct()
        {
            
        }

        public function login($message) {
            echo
            '
                <div class="formContainer">
                    <form action="../controllers/users.php" method="POST">
                        <a href="' . URLROOT . '/"><img class="logo" src="' . URLROOT . '/public/images/caRent.png" alt="caRent"/></a>
                        <h2>Log In</h2>
            ';

            $this->message = $message;
            if (!empty($this->message)) {
                echo
                '
                    <p class="errorMessage">' . $this->message . '</p>
                ';
            }

            echo
            '
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required autocomplete="off">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                        <button type="submit" name="login">Log In</button>
                        <p class="switch">Don\'t have an account? <a href="' . URLROOT . '/server/controllers/users.php?user=reg" style="text-decoration: underline;">Sign Up Here</a></p>
                    </form>
                </div>
            ';

            require_once 'components/footer.php';
        }

        public function register($message) {
            echo
            '
                <div class="formContainer">
                    <form action="../controllers/users.php" method="POST">
                        <a href="' . URLROOT . '/"><img class="logo" src="' . URLROOT . '/public/images/caRent.png" alt="caRent"/></a>
                        <h2>Sign Up</h2>
            ';

            $this->message = $message;
            if (!empty($this->message)) {
                echo
                '
                    <p class="errorMessage">' . $this->message . '</p>
                ';
            }

            echo
            '
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" required autocomplete="off">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required autocomplete="off">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                        <label for="repeatePassword">Repeate Password</label>
                        <input type="password" name="repeatePassword" id="repeatePassword" required>
                        <button type="submit" name="register">Sign Up</button>
                        <p class="switch">Already have an account? <a href="' . URLROOT . '/server/controllers/users.php?user=login" style="text-decoration: underline;">Log In Here</a></p>
                    </form>
                </div>
            ';

            require_once 'components/footer.php';
        }
    }
?>

<?php require_once 'components/foot.php'; ?>