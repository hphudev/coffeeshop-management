<?php
    class General_CMD
    {
        public function __construct()
        {

        }
        public static function countRowInTable($table)
        {
            include('../configs/config.php');
            $sql = 'SELECT count(*) as total FROM ' . strval($table);
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
                //echo '<script> alert("ok"); </script>';
                $data = mysqli_fetch_assoc($result);            
                return $data['total'] + 1;
            }
            return 0;
        }
        public static function AutoGetID($table, $prefix)
        {
            $num = General_CMD::countRowInTable($table);
            return (string)$prefix . strval($num);
        }
    }
?>