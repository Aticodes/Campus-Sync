<?php
include "db.php";

// Function to backup MySQL database
function backupDatabaseTables($server, $user, $pass, $db, $tables = '*') {
    $link = mysqli_connect($server, $user, $pass, $db);
    
    // Get all tables
    if ($tables == '*') {
        $tables = array();
        $result = mysqli_query($link, 'SHOW TABLES');
        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }
    } else {
        $tables = is_array($tables) ? $tables : explode(',', $tables);
    }
    
    // Loop through tables
    $return = '';
    foreach ($tables as $table) {
        $result = mysqli_query($link, 'SELECT * FROM ' . $table);
        $num_fields = mysqli_num_fields($result);
        
        $return .= 'DROP TABLE IF EXISTS ' . $table . ';';
        $row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE ' . $table));
        $return .= "\n\n" . $row2[1] . ";\n\n";
        
        for ($i = 0; $i < $num_fields; $i++) {
            while ($row = mysqli_fetch_row($result)) {
                $return .= 'INSERT INTO ' . $table . ' VALUES(';
                for ($j = 0; $j < $num_fields; $j++) {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = preg_replace("/\n/", "\\n", $row[$j]);
                    if (isset($row[$j])) {
                        $return .= '"' . $row[$j] . '"';
                    } else {
                        $return .= '""';
                    }
                    if ($j < ($num_fields - 1)) {
                        $return .= ',';
                    }
                }
                $return .= ");\n";
            }
        }
        $return .= "\n\n\n";
    }
    
    // Save backup to file
    $backup_file = $db . '_' . date("Ymd_His") . '.sql';
    $handle = fopen($backup_file, 'w+');
    fwrite($handle, $return);
    fclose($handle);
    
    return $backup_file;
}

// Backup the database when the button is clicked
if(isset($_POST['backup'])) {
    $backup_file = backupDatabaseTables($server, $user, $pass, $db);
    // Prompt the user to download the backup file
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"" . basename($backup_file) . "\""); 
    readfile($backup_file);
    
    exit;
}

?>
