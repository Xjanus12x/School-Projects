<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" />
    <link rel="stylesheet" href="CSS\list-of-restaurant-styles.css" />
    <title>List Of Restaurants</title>

</head>

<body>
    <nav class="navigation-container">
        <nav class="primary-navigation">
            <ul>
                <li><a href="/index.php"><img class="logo" src="images/logo.png" alt=""></a></li>
                <li class="push-left"><a href="/index.php">Home</a></li>
                <li><a href="/about-section.php">About</a></li>
                <li><a href="/list-of-restaurant.php">Restaurant List</a></li>
                <li><a href="/best-quality.php">Best Quality</a></li>
            </ul>
        </nav>
        <div class="navigation-title">
            <h1>Check some Restaurants!</h1>
            <p>BEST FOR YOU</p>
        </div>

        <form class="inputSearch" action="" method="POST">
            <h3>Search Keyword:</h3>
            <input type="text" name="search-box" placeholder="Search by">
            <input class="filter animation" type="submit" name="name" value="Name">
            <input class="filter animation" type="submit" name="cuisine" value="Cuisine">

        </form>

        <form class="button-content" action="" method="POST">
            <button class="brooklyn animation" name="brooklyn" type="submit">Brooklyn</button>
            <button class="queens animation" name="queens" type="submit">Queens</button>
            <button class="manhattan animation" name="manhattan" type="submit">Manhattan</button>
            <button class="bronx animation" name="bronx" type="submit">Bronx</button>
            <button class="staten-island animation" name="staten-island" type="submit">Staten island</button>
        </form>

    </nav>



    <table class="data-table">
        <tr>
            <th>Name</th>
            <th>Borough</th>
            <th>Cuisine</th>
            <th>Adress</th>
            <th>Grades</th>
        </tr>



        <?php



        include "connect-to-atlas.php";
        $cursor = $colResto->find([]);
        $searchBox = "";
        // if else for search box button

        if (isset($_POST['name'])) {
            if ($searchBox != "") {
                $searchBox = $_POST['search-box'];
                $cursor = $colResto->aggregate([
                    ['$match' => ['name' => ['$regex' => $searchBox, '$options' => 'i']]]
                ]);
            } else {
                echo "<script>alert('Error. Please enter a value.')</script>";
            }
        } else if (isset($_POST['cuisine'])) {
            $searchBox = $_POST['search-box'];
            if ($searchBox != "") {
                $cursor = $colResto->aggregate([
                    ['$match' => ['cuisine' => ['$regex' => $searchBox, '$options' => 'i']]]
                ]);
            } else {
                echo "<script>alert('Error. Please enter a value.')</script>";
            }
        }

        // if else for group button
        if (isset($_POST['brooklyn'])) {
            $cursor = $colResto->find(['borough' => 'Brooklyn']);
        } else if (isset($_POST['queens'])) {
            $cursor = $colResto->find(['borough' => 'Queens']);
        } else if (isset($_POST['manhattan'])) {
            $cursor = $colResto->find(['borough' => 'Manhattan']);
        } else if (isset($_POST['bronx'])) {
            $cursor = $colResto->find(['borough' => 'Bronx']);
        } else if (isset($_POST['staten-island'])) {
            $cursor = $colResto->find(['borough' => 'Staten Island']);
        }


        foreach ($cursor as $doc) {

        ?>

            <tr>

                <?php
                echo "<td>", $doc['name'], "</td>";
                echo "<td>", $doc['borough'], "</td>";
                echo "<td>", $doc['cuisine'], "</td>";

                echo
                "<td>";

                ?>
                <ul class="address-details">
                    <?php
                    echo "<li>", $doc['address']['building'], "</li>";
                    echo "<li>", $doc['address']['street'], "</li>";
                    echo "<li>", $doc['address']['zipcode'], "</li>";

                    ?>
                </ul>
                <?php
                echo "</td>";


                ?>
                <?php

                echo
                "<td>";

                ?>
                <ul class="grades-details">
                    <?php
                    echo "<li>", $doc['grades']['0']['date'], "</li>";
                    echo "<li>", $doc['grades']['0']['grade'], "</li>";
                    echo "<li>", $doc['grades']['0']['score'], "</li>";
                    ?>
                </ul>
            </tr>



        <?php
        }

        ?>


    </table>
</body>

</html>


<style></style>