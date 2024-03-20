<?php
    class databaseclose extends dbh{
        function dbclose() {
            $this->connect()->close();
        }
    }
?>