   <div class="rowimg">
        <div class="columnimg">
            <?php
            $imageDirectory = './content/panels/image_search/images/';
            $searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';
            $imageFiles = scandir($imageDirectory);
            $displayedImages = 0;
            foreach ($imageFiles as $imageFile) {
                if ($displayedImages >= 9) {
                    break;
                }
                if (strpos($imageFile, $searchKeyword) !== false) {
                    $imageUrl = $imageDirectory . $imageFile;
                    echo '<img src="' . $imageUrl . '" style="width:100%; height: 25%;">';
                    $displayedImages++;
                }
            }
            ?>
        </div>
        <div class="d-flex py-2" style="float: right;"><button class="btn btn-outline-primary">More Images</button></div>
    </div>