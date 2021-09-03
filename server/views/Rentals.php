<?php require_once 'components/head.php'; ?>

<?php
    class Rentals {
        private $message;

        public function __construct() {
            
        }

        public function viewRentals($rentalCars) {
            require_once 'components/bar.php';

            echo
            '
                <div class="rentalBanner">
                    <h1 class="rentalTitle">It\'s Not The Destination<br/> <b style="margin-left: 4.5em;">It\'s The Journey</b></h1>
                </div>
            ';
            
            require_once 'components/nav.php';
            echo
            '
                <div class="rentalContainer">
                    <div class="rentalWrapper">
                        <a class="rentOffer" href="'. URLROOT .'/server/controllers/rentals.php?rental=new">Rental Car Offer</a>
                        <div class="rentalGrid">
            ';

            if ($rentalCars) {
                foreach($rentalCars as $rentalCar) {
                    echo
                    '
                        
                        <div class="rentalCard">
                            <div class="rentalCarImg">
                                <img src="../../' . $rentalCar[7] . '" alt="' . $rentalCar[2] . '"/>
                                <h3>' . $rentalCar[2] . '</h3>
                                <a class="btn-delete" href="'. URLROOT .'/server/controllers/rentals.php?rental=delete&id='. $rentalCar[0] .'">Remove</a>
                            </div>
                            <div class="rentalCarDesc">
                                <table>
                                    <tr>
                                        <th>Year</th>
                                        <td>'. $rentalCar[3] .'</td>
                                    </tr>
                                    <tr>
                                        <th>Transmission</th>
                                        <td>'. $rentalCar[4] .'</td>
                                    </tr>
                                    <tr>
                                        <th>Passengers</th>
                                        <td>'. $rentalCar[5] .'</td>
                                    </tr>
                                    <tr>
                                        <th>Doors</th>
                                        <td>'. $rentalCar[6] .'</td>
                                    </tr>
                                </table>
                    ';

                    if ($rentalCar[1] == "Rental") {
                        echo'<a class="btn-book" href="'. URLROOT .'/server/controllers/rentals.php?rental=book&id='. $rentalCar[0] .'">Book</a>';
                    } else if ($rentalCar[1] == "Booked") {
                        echo'<a class="btn-booked" href="'. URLROOT .'/server/controllers/rentals.php?rental=booked&id='. $rentalCar[0] .'">Booked</a>';
                    }

                    echo
                    '
                            </div>
                        </div>
                    ';
                }
            } else {
                echo
                '
                    <div class="landing">
                        <h1>No car rentals are avaliable :(</h1>
                        <img src="' . URLROOT . '/public/images/tow.svg" alt="tow"/>
                    </div>
                ';
            }

            echo
            '
                        </div>
                    </div>
                </div>
            ';
            require_once 'components/footer.php';
        }

        public function newRental($message) {
            echo
            '
                <div class="rentalForm">
                    <form action="../controllers/rentals.php" method="POST" enctype="multipart/form-data">
                        <a href="' . URLROOT . '/"><img src="' . URLROOT . '/public/images/caRent.png" alt="caRent" style="position: absolute; width: 200px; top: 1.2em; background: #111; border-radius: 10px;"/></a>
                        <h2>Rental Car Offer</h2>
            ';

            $this->message = $message;
            if (!empty($this->message)) {
                echo
                '
                    <p class="errorMessage">' . $this->message . '</p>
                ';
            }

            echo
            '           <div style="margin: 1.5em 0; width: 550px; display: flex; align-tiems: center; justify-content: space-between;">
                            <sapn>
                                <label for="name">Car Model</label>
                                <input id="name" type="text" name="name" autocomplete="off" required style="width: 400px;">
                            </sapn>
                            <sapn>
                                <label for="year">Year</label>
                                <input id="year" type="number" min="1900" max="2099" step="1" value="2021" name="year" required style="width: 100px;">
                            </sapn>
                        </div>

                        <div style="margin: 1.5em 0;">
                            <label for="transmission">Transmission Type</label>
                            <select id="transmission" name="transmission" required>
                                <option value="" selected disabled>Select Transmission Type</option>
                                <option value="automatic">Automatic</option>
                                <option value="manual">Manual</option>
                            </select>
                        </div>

                        <div style="margin: 1.5em 0;">
                            <label for="passengers">Passengers Seats</label>
                            <select id="passengers" name="passengers" required>
                                <option value="" selected disabled>Select Number of Seats</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                            </select>
                        </div>

                        <div style="margin: 1.5em 0;">
                            <label for="doors">Doors</label>
                            <select id="doors" name="doors" required>
                                <option value="" selected disabled>Select Number of Doors</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>

                        <div style="margin: 1.5em 0;">
                            <label for="image">Vehicle Image</label>
                            <input id="" type="file" name="image" required style="width: 400px; background: #FFF;"/>
                        </div>

                        <button type="submit" name="offer">Offer</button>
                    </form>
                </div>
            ';

            require_once 'components/footer.php';
        }
    }
?> 

<?php require_once 'components/foot.php'; ?>