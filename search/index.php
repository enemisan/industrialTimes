<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/global/global.css">
    <link rel="stylesheet" href="../assets/global/flex.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Search Page</title>
</head>
<body>
<header>
        <nav>
            <a href = "../" class="logo">
                Industrial<span>Times</span>
            </a>
            
            <a href="search/" class="search-menu" id="search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </a>
        </nav>
    </header>
    <form method="POST">
        <!-- <label for="keyword">Keyword:</label> -->
        <input type="text" name="keyword" id="keyword" required>
        <button type="submit">Search</button>
    </form>

    <?php
    function searchFiles($directory, $keyword)
    {
        $results = [];

        $files = scandir($directory);
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $path = $directory . '/' . $file;

            if (is_dir($path)) {
                $results = array_merge($results, searchFiles($path, $keyword));
            } else {
                $extension = pathinfo($path, PATHINFO_EXTENSION);

                if ($extension === 'php') {
                    $content = file_get_contents($path);
                    if (stripos($content, $keyword) !== false) {
                        $results[] = $path;
                    }
                }
            }
        }

        return $results;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $keyword = $_POST['keyword'];

        // Perform search in the "news/" directory
        $results = searchFiles('../news', $keyword);

        if (count($results) > 0) {
            echo "<h2>Search Results:</h2>";
            foreach ($results as $result) {
                $content = file_get_contents($result);
                preg_match('/<h1>(.*?)<\/h1>/s', $content, $matches);
                $title = $matches[1];

                echo "<div class='title-author-date'>";
                echo "<h1><a href='{$result}'>{$title}</a></h1>";
                echo "</div>";
            }
        } else {
            echo "<p>No results found.</p>";
        }
    }
    ?>


<script src="https://kit.fontawesome.com/da98164faa.js" crossorigin="anonymous"></script>
</body>
</html>
