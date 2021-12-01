<?php
$data_url = 'http://localhost:8080/cms';
$json = file_get_contents( $data_url );
$obj = json_decode( $json );
?>

<html>
    <head>
        <title>Demo App</title>
        <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    </head>
    <body>
        <header>
            <h1>Content Managment Systems</h1>
        </header>

        <main>
            <p>Most popular:</p>
            <ul>
                <?php foreach( $obj as $row ): ?>
                <li><?php echo $row->name; ?>
                <?php endforeach; ?>
            </ul>
        </main>

        <footer>
            <p>Website deployed with Buddy</p>
        </footer>
    </body>
</html>