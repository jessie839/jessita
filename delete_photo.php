<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];
    $file = $_POST['file'];
    
    $filePath = "uploads/$category/$file";
    
    // Check if the file exists and delete it
    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            echo "Photo deleted successfully.";
        } else {
            echo "Error deleting photo.";
        }
    } else {
        echo "Photo not found.";
    }
    
    // Redirect back to the view photo page
    header("Location: view_photo.php?category=$category");
    exit();
}
?>
