
<?php
if (isset($_SESSION['message'])): ?>
	<script>
		// Make an AJAX request to display the toastr notification
		var type = "<?php echo $_SESSION['alert-type']; ?>";
		var message = "<?php echo $_SESSION['message']; ?>";

		switch (type) {
			case 'info':
				toastr.info(message);
				break;
			case 'success':
				toastr.success(message);
				break;
			case 'warning':
				toastr.warning(message);
				break;
			case 'error':
				toastr.error(message);
				break;
		}
	</script>
	<?php
	// Remove the message and alert type from session after displaying
	unset($_SESSION['message']);
	unset($_SESSION['alert-type']);
	?>
<?php endif; 
?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="/public/assets/main.js"></script>

<script src="/public/assets/validate.min.js"></script>
<script src="/public/assets/validate.js"></script>
</body>
</html>