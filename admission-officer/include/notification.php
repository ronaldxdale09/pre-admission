<?php if (isset($_SESSION['login'])): ?>
<div class="msg">

    <script>
    Swal.fire(
        'Welcome!',
        'Login Successfully',
    )
    </script>


    <?php 
			unset($_SESSION['login']);
		?>
</div>
<?php endif ?>



<?php if (isset($_SESSION['update'])): ?>
<div class="msg">

    <script>
    Swal.fire(
        'Settings Updated',
        'Successfully',
    )
    </script>


    <?php 
			unset($_SESSION['update']);
		?>
</div>
<?php endif ?>
