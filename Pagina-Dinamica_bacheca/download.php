<?php
if (isset($_GET['file'])) {
    $file = basename($_GET['file']);
    $file_path = 'allegati/' . $file;

    if (file_exists($file_path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_path));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));
        flush(); 
        readfile($file_path);
        exit;
    } else {
        echo "File non trovato.";
    }
} else {
    echo "Nessun file specificato.";
}
?>