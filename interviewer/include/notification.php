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



<?php if (isset($_SESSION['schedule'])): ?>
<div class="msg">

    <script>
    Swal.fire(
        'Welcome!',
        'Schedule Assigned',
    )
    </script>


    <?php 
			unset($_SESSION['schedule']);
		?>
</div>
<?php endif ?>


<?php if (isset($_SESSION['interview'])): ?>
<div class="msg">

    <script>
    Swal.fire(
        'QUALIFIED',
        'Interview Sucessfull',
    )
    </script>


    <?php 
			unset($_SESSION['interview']);
		?>
</div>
<?php endif ?>

<?php if (isset($_SESSION['waiting'])): ?>
<div class="msg">

    <script>
    Swal.fire(
        'Course Quota is Full',
        'This student is move to the waiting list',
    )
    </script>


    <?php 
			unset($_SESSION['waiting']);
		?>
</div>
<?php endif ?>