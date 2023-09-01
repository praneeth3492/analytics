<?php
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["file"])) {
    $pdfFilePath = 'pdf/' . $_GET["file"];

    if (file_exists($pdfFilePath)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($pdfFilePath) . '"');
        header('Content-Length: ' . filesize($pdfFilePath));
        readfile($pdfFilePath);
        exit;
    }
}

// Handle invalid requests
header('HTTP/1.0 404 Not Found');
exit;
