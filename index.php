<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>📚️ Search</title>
</head>


<body>

    <h1>📚️📚️ 🥵🥵 Book Search 🥵🥵 📖📖</h1>
    <h2>Enter a book to find:</h2>
    <form action="index.php" method="post">
        <label for="dropdown">Select search method</label>
        <select name = "dropdown" id = "dropdown">
            <option value="ISBN">ISBN</option>
            <option value="Title">Title</option>
            <option value="Author">Author</option>
        </select>

        <br>
        <label for="Search">Enter a word to search: </label>
        <input type="text" name="searchTerm" id="Search">
        
        <input type="submit" value="YES!!">
    </form>

    <?php

        //Make sure that the post method is set
        if(!isset($_POST['searchTerm']))
            exit;
        
        $searchType = $_POST['searchType'];
        $searchTerm = $_POST['searchTerm'];

        //Make sure that the search term is not blank
        if(!$searchTerm){
            echo '<p>You have not entered a search term, please try again</p>';
            exit;
        }

        @$db = new mysqli('localhost', 'root','mmljar', )

    ?>

</body>

</html>