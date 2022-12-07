<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" />
    <link rel="stylesheet" href="CSS\list-of-restaurant-styles.css" />
    <title>Best Quality</title>

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
            <h1>Top ISO Scorrer Restaurants</h1>
        </div>
        <form class="inputSearch" action="" method="POST">
            <h3>Search Keyword:</h3>
            <input type="text" name="search-box" placeholder="Search by">
            <input class="filter animation" type="submit" name="name" value="Name">
            <input class="filter animation" type="submit" name="cuisine" value="Cuisine">

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
        $cursor = $colResto->aggregate([[
            '$project' => [
                'id' => 1, 'borough' => 1, 'cuisine' => 1,
                'address' => 1, 'grades' => 1, 'name' => 1, 'totalValue' =>
                ['$sum' => ['$sum' => '$grades.score']]
            ]
        ]]);

        if (isset($_POST['name'])) {
            $searchBox = $_POST['search-box'];
            if ($searchBox != "") {
                $cursor = $colResto->aggregate([
                    [
                        '$project' => [
                            'id' => 1, 'borough' => 1, 'cuisine' =>
                            'Bakery', 'address' => 1, 'grades' => 1, 'name' => 1,
                            'totalValue' => ['$sum' => ['$sum' => '$grades.score']]
                        ]
                    ],
                    ['$match' => ['name' => ['$regex' => $searchBox, '$options' => 'i']]]
                ]);
            } else {
                echo "<script>alert('Error. Please enter a value.')</script>";
            }
        } else if (isset($_POST['cuisine'])) {
            $searchBox = $_POST['search-box'];
            if ($searchBox != "") {
                $cursor = $colResto->aggregate([
                    [
                        '$project' => [
                            'id' => 1, 'borough' => 1, 'cuisine' =>
                            'Bakery', 'address' => 1, 'grades' => 1, 'name' => 1,
                            'totalValue' => ['$sum' => ['$sum' => '$grades.score']]
                        ]
                    ],
                    ['$match' => ['cuisine' => ['$regex' => $searchBox, '$options' => 'i']]]
                ]);
            } else {
                echo "<script>alert('Error. Please enter a value.')</script>";
            }
        }



        foreach ($cursor as $doc) {

        ?>

            <tr>

                <?php
                if ($doc['totalValue'] > 90) {


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
                    echo "<li>", $doc['totalValue'], "</li>";
                }
                    ?>
                    </ul>

            </tr>



        <?php
        }

        ?>


    </table>
</body>

</html>