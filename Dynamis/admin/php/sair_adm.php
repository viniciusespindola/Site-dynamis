<?php
session_start();
$_SESSION['admin'] = false;
?>
<script type="text/javascript">
	window.setTimeout("location='../admin.php';",0);
</script>