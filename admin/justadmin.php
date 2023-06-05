<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page
    header("Location: ./");
    exit;
}

// Set the session timeout to 1 hour (60 minutes)
$sessionTimeout = 60 * 60; // 1 hour

// Check if the session variable storing the last activity time exists
if (isset($_SESSION['last_activity'])) {
    // Calculate the time difference between the current time and the last activity time
    $elapsedTime = time() - $_SESSION['last_activity'];

    // Check if the elapsed time exceeds the session timeout
    if ($elapsedTime > $sessionTimeout) {
        // Unset all session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        // Redirect the user to the login page
        header("Location: ./");
        exit;
    }
}

// Update the last activity time in the session
$_SESSION['last_activity'] = time();

include "../conn/dbh.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user inputs
    $image = $_FILES['image'];
    $article = $_POST['article'];
    $centralWords = $_POST['central_words'];
    $author = $_POST['author'];
    $title = $_POST['title'];
    $currentDate = date("d - m - Y");

    // Validate input fields
    if (empty($image['name']) || empty($article) || empty($centralWords) || empty($author) || empty($title)) {
        echo 'Please fill in all the fields.';
        exit();
    } 

    // Generate a random page name from central words
    $centralWords = explode(',', $centralWords);
    $pageName = getRandomPageName($centralWords);

    // Save the uploaded image with an incremented index
    // $imageName = getUniqueImageName('blog-image');
    // $uploadPath = '../news/assets/images/' . $imageName;
    // move_uploaded_file($image['tmp_name'], $uploadPath);

    // Generate HTML page
    $html = '<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/global/global.css">
        <link rel="stylesheet" href="../assets/global/flex.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>' . $pageName . '</title>
        <style>
            header {
                background: linear-gradient(180deg, rgba(0, 0, 0, 0.6) 0%, rgb(0, 0, 0) 85%, rgb(0, 0, 0) 100%), url(   );
                background-size: cover;
                background-position: center;
            }
        </style>    
    </head>
    
    <body>
        <header>
            <nav>
                <a href="../" class="logo">
                    Industrial<span>Times</span>
                </a>
                
                <a href="../search/" class="search-menu" id="search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </a>
            </nav>
    
            <div class="title-author-date">
                <h1>' . $title . '</h1>
                <div class="author-date">
                    <p>' . $author . '</p>
                    <div class="line"></div>
                    <p class="date">' . $currentDate . '</p>
                </div>
            </div>
        </header>
    
        <section class="post-ctn">
            <p class="post">' . nl2br(htmlspecialchars($article)) . '</p>
            <p class="share">Kindly share this story <span><i class="fa-brands fa-whatsapp"></i> <i class="fa-brands fa-facebook-f"></i><i class="fa-brands fa-twitter"></i> </span></p>
            <p class="rights">All rights reserved. This material, and other digital content on this website, may not be reproduced, published, broadcast, rewritten or redistributed in whole or in part without prior express written permission from Industrial Times.</p>
        </section>
    
        <footer>
            <div class="footer-logo">
                Industrial<span>Times</span>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, laborum nihil.<br>Numquam quod illum
                cumque molestias facere officiis commodi maiores!</p>
            <ul>
                <li><a href="../association/">Association</a></li>
                <li><a href="#">Commerce</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Contacts</a></li>
                <li><a href="../">Home</a></li>
            </ul>
            <div class="footer-socials">
                <i class="fa fa-facebook" aria-hidden="true"></i>
                <i class="fa fa-instagram" aria-hidden="true"></i>
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </div>
        </footer>
    
        <script src="https://kit.fontawesome.com/da98164faa.js" crossorigin="anonymous"></script>
    </body>
    
    </html>';

    // Save the generated HTML to a file
    // Check if page name already exists and increment with index if necessary
    $filePath = "../news/";
    $index = 0;
    $fileName = $filePath . strtolower(str_replace(' ', '_', $pageName)) . '.php';
    while (file_exists($fileName)) {
        $index++;
        $fileName = $filePath . strtolower(str_replace(' ', '_', $pageName)) . '_' . $index . '.php';
    }
    file_put_contents($fileName, $html);

    // Call the addContentDiv function
    $landingPageFileName = "news/" . strtolower(str_replace(' ', '_', $pageName)) . '.php';
    $existingPagePath = "../news-global/f-links.php"; // Replace with the path to your existing page
    // addContentDiv($existingPagePath, $imageName, $landingPageFileName, $title);
    // addLandingContentDiv($imageName, $landingPageFileName, $title);
    // addTodayContentDiv($imageName, $landingPageFileName, $title);

    $success = 0;

    if (!(empty($image['name']) || empty($article) || empty($centralWords) || empty($author) || empty($title))) {
        // Check if the file was uploaded without errors
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $uploadImage = file_get_contents($_FILES["image"]["tmp_name"]);

            // // Prepare the SQL statement
            // $stmt = mysqli_prepare($conn, "INSERT INTO news (image) VALUES (?)");
            // mysqli_stmt_bind_param($stmt, "s", $uploadImage);

            // // Execute the statement
            // if (mysqli_stmt_execute($stmt) === false) {
            //     die("Error uploading image: " . mysqli_error($conn));
            // } else {
            //     $imageSuccess = 1;
            // }

            // Prepare and execute the query
            $stmt = mysqli_prepare($conn, "INSERT INTO news (title, author, article, image, pagelink, date) VALUES (?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "ssssss", $title, $author, $article, $uploadImage, $landingPageFileName, $currentDate);

            if (mysqli_stmt_execute($stmt)) {
                echo "Form data uploaded successfully.";
                $success = 1;
            } else {
                echo "Error uploading form data: " . mysqli_error($conn);
            }

            // Close the statement
            mysqli_stmt_close($stmt);


        } else {
            echo "Error uploading image.";
        }

        if ($success == 1) {
            // Run the function to select data and write to file
            selectDataAndWriteToFile($conn);
            // Redirect the user to the newly created page
            header("Location: " . $fileName);
        }
        
    }


    ;
}

// Function to generate a random page name from central words
function getRandomPageName($centralWords)
{
    $index = array_rand($centralWords);
    return $centralWords[$index];
}

// Function to generate a unique image name by incrementing index
function getUniqueImageName($prefix)
{
    $uploadPath = '../news/assets/images/';
    $index = 0;
    do {
        $index++;
        $imageName = $prefix . '_' . $index . '.jpg';
    } while (file_exists($uploadPath . $imageName));
    return $imageName;
}

// Function to add content div to an existing page
/**
 * Summary of addContentDiv
 * @param mixed $existingPagePath
 * @param mixed $imageFilename
 * @param mixed $pageLink
 * @param mixed $title
 * @return void
 */
function addContentDiv($existingPagePath, $imageFilename, $pageLink, $title)
{
    $dom = new DOMDocument();
    $dom->loadHTMLFile($existingPagePath);
    $contentDivs = $dom->getElementById('content')->getElementsByTagName('a');

    // Remove the first div if there are already four divs
    if ($contentDivs->length >= 4) {
        $firstDiv = $contentDivs->item(0);
        $firstDiv->parentNode->removeChild($firstDiv);
    }

    // Create the new content div
    $contentDiv = $dom->createElement('a');
    $contentDiv->setAttribute('class', 't-column-flex');
    $contentDiv->setAttribute('href', $pageLink);
    $contentDiv->setAttribute('target', '_blank');

    $h1 = $dom->createElement('h1', $title);
    $contentDiv->appendChild($h1);

    $imgDiv = $dom->createElement('div');
    $contentDiv->appendChild($imgDiv);

    $img = $dom->createElement('img');
    $img->setAttribute('src', "news/assets/images/{$imageFilename}");
    $img->setAttribute('alt', $title);
    $imgDiv->appendChild($img);

    // $a = $dom->createElement('a', $title);
    // $a->setAttribute('href', $pageLink);
    // $a->setAttribute('target', '_blank');
    // $contentDiv->appendChild($a);

    // Append the new content div to the existing divs
    $dom->getElementById('content')->appendChild($contentDiv);

    // Save the modified HTML back to the file
    file_put_contents($existingPagePath, $dom->saveHTML());
}

function addLandingContentDiv($imageFilename, $pageLink, $title)
{
    // Generate HTML content for the new page
    $html = '<a href="' . $pageLink . '">
                <div class="t-image">
                    <img src="news/assets/images/' . $imageFilename . '">
                </div>
                <h1>' . $title . '</h1>
                <a href="' . $pageLink . '"><button>Read More</button></a>
            </a>';

    // Save the generated HTML to a file
    $filePath = "../news-global/f-landing-links.php";
    file_put_contents($filePath, $html);
}

function addTodayContentDiv($imageFilename, $pageLink, $title)
{
    // Specify the maximum number of entries to keep
    $maxEntries = 6;

    // Create a new DOMDocument
    $dom = new DOMDocument();

    // Create the <a> element
    $aElement = $dom->createElement('a');
    $aElement->setAttribute('href', $pageLink);
    $aElement->setAttribute('class', 't-column-flex');

    // Create the <h1> element
    $h1Element = $dom->createElement('h1');
    $h1Element->nodeValue = $title;

    // Create the <div> element
    $divElement = $dom->createElement('div');

    // Create the <img> element
    $imgElement = $dom->createElement('img');
    $imgElement->setAttribute('src', 'news/assets/images/' . $imageFilename);
    $imgElement->setAttribute('alt', '');

    // Append the <img> element to the <div> element
    $divElement->appendChild($imgElement);

    // Append the <h1> and <div> elements to the <a> element
    $aElement->appendChild($h1Element);
    $aElement->appendChild($divElement);

    // Append the <a> element to the document
    $dom->appendChild($aElement);

    // Convert the DOMDocument to HTML string
    $html = $dom->saveHTML();

    // Retrieve existing entries if the file exists
    $filePath = "../news-global/f-today-links.php";
    $existingEntries = [];

    if (file_exists($filePath)) {
        $existingEntries = file($filePath, FILE_IGNORE_NEW_LINES);
    }

    // Remove the earliest entry if the maximum number of entries is reached
    if (count($existingEntries) >= $maxEntries) {
        array_shift($existingEntries);
    }

    // Append the new entry to the existing entries
    $existingEntries[] = $html;

    // Save the updated entries to the file
    file_put_contents($filePath, implode("\n", $existingEntries));
}

// Function to select data from 'news' table and write to external file
function selectDataAndWriteToFile($conn)
{
    // Select the data from the row with the second highest ID in the 'news' table
    $sql = "SELECT title, pagelink, image FROM news WHERE id = (SELECT MAX(id) FROM news WHERE id < (SELECT MAX(id) FROM news))";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the row data
        $row = mysqli_fetch_assoc($result);

        // Extract the values
        $title = $row['title'];
        $pageLink = $row['pagelink'];
        $imageData = $row['image'];

        // Convert image data to base64
        $imageBase64 = base64_encode($imageData);
        $imageSrc = 'data:image/jpeg;base64,' . $imageBase64;

        // Generate the HTML code
        $html = '<a href="' . $pageLink . '">
            <div class="t-image">
                <img src="' . $imageSrc . '">
            </div>
            <h1>' . $title . '</h1>
            <a href="' . $pageLink . '"><button>Read More</button></a>
        </a>';

        // Write the HTML code to the external file and overwrite its contents
        $filePath = "../news-global/f-landing-links.php";
        file_put_contents($filePath, $html);

        echo "Data written to file successfully.";
    } else {
        echo "No data found in the 'news' table.";
    }
}







 

// Close the connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/global/global.css">
    <link rel="stylesheet" href="../assets/global/flex.css">
    <link rel="stylesheet" href="assets/css/jadmin.css">
    <title>Create Page</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
        <label for="image" class="file-input">Image:</label>
        <input type="file" name="image" id="image" required>

        <label for="article">article:</label>
        <textarea name="article" id="article" required></textarea>

        <label for="central_words">Central Words (comma-separated):</label>
        <input type="text" name="central_words" id="central_words" required>

        <label for="author">Author:</label>
        <input type="text" name="author" id="author" required>

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>

        <input type="submit" name="submit" value="Create Page">
        <a href="logout.php">logout</a>
    </form>


    
</body>
</html>
