<?php
    class General_CMD
    {
        public function __construct()
        {

        }
        public static function countRowInTable($table)
        {
            include('../configs/config.php');
            $sql = 'SELECT count(*) FROM ' + strval($table);
            $result = $conn->query($sql);
            if (! $result->num_rows > 0)
            {
                echo '<script> alert("ok"); </script>';             
                return 0;
            }
            return (int)$result;
        }
        public static function AutoGetID($table, $prefix)
        {
            $num = General_CMD::countRowInTable($table);
            return (string)$prefix + strval($num);
        }
    }
?>