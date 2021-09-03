<?php
    require_once '../views/Rentals.php';
    require_once '../models/rental.php';
    $message = "";

    if (isset($_REQUEST['rental'])) {
        if ($_REQUEST['rental'] == "view") {
            $objModel = new Rental();
            $rentalCars = $objModel->getRentalCars();
            $objView = new Rentals();
            $objView->viewRentals($rentalCars);
        }

        if ($_REQUEST['rental'] == "new") {
            $objView = new Rentals();
            $objView->newRental($message);
        }

        if ($_REQUEST['rental'] == "book") {
            $id = $_REQUEST['id'];
            $status = "Booked";
            $objModel = new Rental();
            $objModel->setStatus($id, $status);
            echo('<script>location.href="rentals.php?rental=view";</script>');
        }

        if ($_REQUEST['rental'] == "booked") {
            $id = $_REQUEST['id'];
            $status = "Rental";
            $objModel = new Rental();
            $objModel->setStatus($id, $status);
            echo('<script>location.href="rentals.php?rental=view";</script>');
        }

        if ($_REQUEST['rental'] == "delete") {
            $id = $_REQUEST['id'];
            $objModel = new Rental();
            $objModel->deleteCar($id);
            echo('<script>location.href="rentals.php?rental=view";</script>');
        }
    }

    if (isset($_REQUEST['offer'])) {
        $var1 = rand(1111,9999);  // generate random number in $var1 variable
        $var2 = rand(1111,9999);  // generate random number in $var2 variable
        $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
        $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number
        $image = $_FILES["image"]["name"];
        $dst = "../../uploaded_images/".$var3.$image;
        $dst_db = "uploaded_images/".$var3.$image;
        move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name

        $status = "Rental";
        $name = $_REQUEST['name'];
        $year = $_REQUEST['year'];
        $transmission = $_REQUEST['transmission'];
        $passengers = $_REQUEST['passengers'];
        $doors = $_REQUEST['doors'];

        $objModel = new Rental();
        $objModel->setRentalCar($status, $name, $year, $transmission, $passengers, $doors, $dst_db);
        echo('<script>location.href="rentals.php?rental=view";</script>');
    }
?>