<?php
session_start();
$_SESSION['login'] = false;
?>
<script type="text/javascript">
	window.setTimeout("location='../index.php';",0);
</script>