<?php
    spl_autoload_register(function ($class_name) {
        include "classes/".$class_name . '.php';
    });
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Listings</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
    $carListingObj = new CarListing();
    $sortingOrder  = isset($_POST['price_sort']) ? $_POST['price_sort'] : 'asc';
    $carListings   = $carListingObj->getCarData($sortingOrder);
?>
<h2>Car Listings</h2>
<table>
    <thead>
        <tr>
            <th>Car Name</th>
            <th>
                <div class="float-left">
                Price
                </div>
                <div class="float-right">
                    <form method="POST">
                        <select name="price_sort" onchange="this.form.submit()">
                            <option value="asc" <?php if(isset($_POST["price_sort"]) && $_POST["price_sort"] == 'asc') {  echo "selected";} ?>>Ascending</option>
                            <option value="desc" <?php if(isset($_POST["price_sort"]) && $_POST["price_sort"] == 'desc') {  echo "selected";} ?>>Descending</option>
                        </select>
                    </form>
                </div>
            </th>
            <th>Discount</th>
            <th>Availability</th>
            <th>Hand</th>
            <th>
                <div class="float-left">Color</div>
                <div class="float-right pointer"> 
                    <span class="sort-toggle-asc" data-order="asc" onclick="sortByColor('asc')">▲</span>
                    <span class="sort-toggle-desc" data-order="desc" onclick="sortByColor('desc')">▼</span>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($carListings as $car): ?>
            <tr>
                <td><?= $car["car_name"]; ?></td>
                <td><?= $car["price"]; ?></td>
                <td><?= $car["discount"]; ?></td>
                <td><?= $car["availability"]; ?></td>
                <td><?= $car["hand"]; ?></td>
                <td><?= $car["color"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script src="js/script.js"></script>
</body>
</html>