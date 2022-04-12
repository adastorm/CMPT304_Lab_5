<!-- Jonah Watts
Worked with Judah Starkey -->

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>NOT_NAPSTER</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>


<body>

    <h1> 😺 NAPPER </h1>
    <h3><a href="page2.php">Link to New Entry Page</a></h3>
    <h2>Enter a book to find:</h2>
    <div id="forumJS"></div>
    <form action="index.php" method="post">
        <fieldset>
            <legend>Search For:</legend>
            <select name="dropdownType" id="dropdownType">
                <option value="name">Name</option>
                <option value="artist">Artist</option>
                <option value="year">Year</option>
                <option value="price">Price</option>
            </select>
            <select name="dropdownCond" id="dropdownCond">
                <option class="equal" value="equal"> = </option>
                <option class="toRemove" value="less">
                    < </option>
                <option class="toRemove" value="lessEqual"> &le; </option>
                <option class="toRemove" value="greater"> > </option>
                <option class="toRemove" value="greaterEqual"> &ge; </option>
            </select>
            <input type="text" name="searchTerm" id="Search">
        </fieldset>
        <fieldset>
            <legend>Order Results By:</legend>
            <select name="dropdownTypeOrder" id="dropdownTypeOrder">
                <option value="name">Name</option>
                <option value="artist">Artist</option>
                <option value="year">Year</option>
                <option value="price">Price</option>
            </select>
            <input type="radio" id="acending" name="sorting">Acending</input>
            <input type="radio" id="decending" name="sorting">Decending</input>
        </fieldset>
        <input type="submit" value="Search!">
    </form>
    <script>
        $(".toRemove").hide();

        function hideOperators() {
            if ($("#dropdownType").val() === "Year" || $("#dropdownType").val() === "Price")
                $(".toRemove").show();
            else
                $(".toRemove").hide();
        }

        var toHide = document.querySelector("#dropdownType");
        toHide.addEventListener("change", hideOperators, false);
    </script>
    <?php


    if (!isset($_POST['searchterm']))
        exit;


    $searchtype = $_POST['dropdownType'];
    $searchterm = $_POST['searchTerm'];
    $searchcondition = $_POST['dropdownCond'];

    $ordertype = $_POST['dropdownTypeOrder'];
    $orderorder = $_POST['sorting'];



    if (!$searchterm) { //ensures search is set before querying database
        echo '<p>You have not entered search details.<br/>try searching something.</p>';
        exit;
    }

    // whitelist the searchtype
    if ($searchtype !== 'Title' && $searchtype !== 'Author' && $searchtype !== 'ISBN') {
        echo '<p>That is not a valid search type. <br/>
            Please go back and try again.</p>';
        exit;
    }

    //make the connection to the appropriate database while surpressing errors
    @$db = new mysqli('localhost', 'root', 'poop', 'musicdepot');
    //handle the error if one comes up
    if (mysqli_connect_errno()) {
        echo "<p>Error: could not connect
            to database.<br> Please try again.</p>";
    }

    //build our actual query, leaving a ? in place of $seachterm for now (leave off ; at the end!)
    $query = "SELECT ISBN, Title, Author, Price FROM books WHERE $searchtype = ?";
    //make a mysqli_statement object out of the query
    $stmt = $db->prepare($query);
    //sub $seachterm in for ? in query
    $stmt->bind_param('s', $seachterm);

    //query MySQL
    $stmt->execute();
    //store the result
    $stmt->store_result();
    //store the results in appropriate variables for displaying
    $stmt->bind_result($name, $artist, $year, $price);
    //echo number of books found
    echo "<p>Number of records found</p>";
    //echo out each book in the format we choose
    while ($stmt->fetch()) {
        echo "<p><stong>Record Name: " . $name . "</stong>";
        echo "<br>Artist: " . $artist;
        echo "<br>Year:" . $year;
        echo "<br>Price: \$" . number_format($price, 2) . "</p>";
    }
    //free up the result
    $stmt->free_result();
    //close the connection to the database
    $db->close();
    ?>

    < /body>

        < /html>