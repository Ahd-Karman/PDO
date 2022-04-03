<?php
session_start();
session_unset();
session_destroy();
?>

<html>
    <body>
        <script>
            window.location = 'adminItems.php?message=you logged out';
        </script>
    </body>
</html>