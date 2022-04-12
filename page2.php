<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>NOT_NAPSTER</title>
    </title>
</head>


<body>

    <h1> 😺 NAPPER </h1>
    <h3><a href="index.php">Link to Search</a></h3>
    <h2>New Record Entry</h2>
    <form action="page2.php" method="post">
        <fieldset>
            <legend>Search For:</legend>
            <label for="Name">Name</label>
            <input type="text" name="name" id="name">
            <br>
            <label for="Artist">Artist</label>
            <input type="text" name="artist" id="Search">
            <br>
            <label for="Year">Year</label>
            <input type="text" name="year" id="Search">
            <br>
            <label for="Price">Price</label>
            <input type="text" name="price" id="Search">
            <br>

        </fieldset>
        <input type="submit" value="Add!">
    </form>

    <?php

    //Make sure that the post method is set
    if (!isset($_POST['name']) || !isset($_POST['artist']) || !isset($_POST['year']) || !isset($_POST['price'])) {
        echo "<p>You have not entered all the information for the record, please try again</p>";
        exit;
    }

    $name = $_POST['name'];
    $year = $_POST['artist'];
    $price = $_POST['year'];
    $artist = $_POST['price'];
    $price = doubleval($price);
    $year = intval($year);

    @$db = new mysqli('localhost', 'root', 'poop', 'musicdepot');
    if (mysqli_connect_errno()) {
        echo "<p>Error: Could not connect to database.<br/> Please try again later.</p>";
        exit;
    }

    $query = "INSERT INTO records VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ssid', $name, $artist, $year, $price);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "<p>New Record Has Been Inserted.</p>";
    } else {
        echo "<p>An error has occurred.<br/>The item was not added.</p>";
    }
    $db->close();

    ?>

</body>

</html>