<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Photos - Grace Cottage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #f65003;
            color: black;
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h2 {
            color: #333;
        }
        .uploaded-photos {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .uploaded-photos img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .delete-button {
            display: inline-block;
            margin-top: 5px;
            padding: 5px 10px;
            background-color: #d9534f; /* Danger color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none; /* Remove underline from link */
        }
    </style>
</head>
<body>

    <header>
        <h1>View Photos</h1>
    </header>
    
    <div class="container">
        <h2>Uploaded Photos</h2>
        <div class="uploaded-photos">
            <?php
            $category = 'celebrations'; // Change as necessary for different categories
            $photosDir = "uploads/$category/";

            if (is_dir($photosDir)) {
                foreach (scandir($photosDir) as $file) {
                    if ($file !== '.' && $file !== '..') {
                        echo "<div style='position: relative;'>";
                        echo "<img src='$photosDir$file' alt='$file'>";
                        echo "<form action='delete_photo.php' method='POST' style='display: inline;'>";
                        echo "<input type='hidden' name='file' value='$file'>";
                        echo "<input type='hidden' name='category' value='$category'>";
                        echo "<button type='submit' class='delete-button'>Delete</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                }
            } else {
                echo "<p>No photos uploaded yet.</p>";
            }
            ?>
        </div>
    </div>

</body>
</html>
