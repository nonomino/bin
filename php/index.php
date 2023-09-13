<!DOCTYPE html>
<html>
<head>
    <title>Image Search Engine</title>
    <style>
        .rowimg {
            display: flex;
            flex-wrap: wrap;
            padding: 0 4px;
        }

        /* Create three equal columns that sit next to each other */
        .columnimg {
            flex: 33.33%;
            max-width: 33.33%;
            padding: 0 4px;
        }

        .columnimg img {
            margin-top: 8px;
            vertical-align: middle;
            width: 100%;
        }
    </style>
</head>
<body>
    <form method="GET">
        <label for="search">Search Keyword:</label>
        <input type="text" name="search" id="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <input type="submit" value="Search">
    </form>

    <div class="rowimg">
        <?php
        // Define the directory where your images are located
        $imageDirectory = './content/panels/image_search/images/';

        // Get the search keyword from the form input
        $searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';

        // Scan the image directory for image files
        $imageFiles = scandir($imageDirectory);

        // Initialize a counter for displayed images
        $displayedImages = 0;

        foreach ($imageFiles as $imageFile) {
            if ($displayedImages >= 9) {
                break;
            }

            // Check if the image filename contains the search keyword
            if (strpos($imageFile, $searchKeyword) !== false) {
                $imageUrl = $imageDirectory . $imageFile;
                echo '<div class="columnimg"><img src="' . $imageUrl . '" style="width:100%;"></div>';
                $displayedImages++;
            }
        }
        ?>
    </div>
</body>
</html>