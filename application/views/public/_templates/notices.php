<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php if ($this->session->flashdata('success')) { ?>
	<script>
		swal({
				title: "Sukses",
				text: "<?php echo $this->session->flashdata('success'); ?>",
				timer: 2000,
				showConfirmButton: true,
				type: "success",
				icon: "success"
		});
	</script>
<?php } ?>

<?php if ($this->session->flashdata('update')) { ?>
	<script>
		swal({
				title: "Sukses",
				text: "<?php echo $this->session->flashdata('update'); ?>",
				timer: 2000,
				showConfirmButton: true,
				type: "success",
				icon: "success"
		});
	</script>
<?php } ?>

<?php if ($this->session->flashdata('delete')) { ?>
	<script>
		swal({
				title: "Sukses",
				text: "<?php echo $this->session->flashdata('delete'); ?>",
				timer: 2000,
				showConfirmButton: true,
				type: "success",
				icon: "success"
		});
	</script>
<?php } ?>

<?php if ($this->session->flashdata('error')) { ?>
	<script>
		swal({
			title: "Error",
			text: "<?php echo $this->session->flashdata('error'); ?>",
			timer: 2000,
			showConfirmButton: true,
			type: "error",
			icon: "error"
		});
	</script>
<?php } ?>