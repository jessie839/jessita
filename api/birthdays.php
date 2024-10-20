<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header("Location: login.php");
    exit();
}

$birthdaysDir = 'uploads/birthdays/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthdays - Grace Cottage</title>
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
        .upload-section {
            margin: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="file"] {
            display: none;
        }
        button {
            background-color: #f65003;
            color: black;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .uploaded-photos {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .photo-container {
            position: relative;
            display: inline-block;
        }
        .uploaded-photos img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .delete-button {
            display: block;
            margin-top: 5px;
            padding: 5px 10px;
            background-color: #d9534f; /* Danger color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none; /* Remove underline from link */
            text-align: center; /* Center the text in the button */
        }
    </style>
</head>
<body>

    <header>
        <h1>Birthday Celebrations</h1>
    </header>
    
    <div class="container">
        <h2>Upload Birthday Photo</h2>
        <div class="upload-section">
            <form action="upload-photo.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="category" value="birthdays">
                <input type="file" id="birthday-photo" name="photo" accept="image/*" required>
                <button type="button" onclick="document.getElementById('birthday-photo').click();">Choose File</button>
                <button type="submit">Upload Photo</button>
            </form>
        </div>
        
        <h2>Uploaded Photos</h2>
        <div class="uploaded-photos">
            <?php
            $birthdaysDir = 'uploads/birthdays/';
            if (is_dir($birthdaysDir)) {
                foreach (scandir($birthdaysDir) as $file) {
                    if ($file !== '.' && $file !== '..') {
                        echo "<div class='photo-container'>";
                        echo "<img src='$birthdaysDir$file' alt='Birthday Photo'>";
                        echo "<form action='delete_photo.php' method='POST'>";
                        echo "<input type='hidden' name='file' value='$file'>";
                        echo "<input type='hidden' name='category' value='birthdays'>";
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

    <script>
        document.getElementById('birthday-photo').addEventListener('change', function() {
            const fileName = this.files[0] ? this.files[0].name : 'No file chosen';
            document.querySelector('button[onclick="document.getElementById(\'birthday-photo\').click();"]').textContent = fileName;
        });
    </script>
</body>
</html>
