<?php
// Pastikan file ini tidak dapat diakses langsung
if (!defined('ABSPATH')) {
	exit;
}
?>
<html>

<body>
<div id="popup-container"></div>
</body>
wdasdwas

<!-- Vue.js -->
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="<?php echo plugin_dir_url(__FILE__); ?>assets/js/popup.js"></script>

<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__); ?>assets/css/popup.css">
</html>
