<!-- SCORE ACTION -->
<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">INTERVIEW SCORE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="function/update_settings.php" method="POST">

                <div class="modal-body">


                <input type="name" name="id" id="course_id" hidden>

                    <div class="form-group">
                        <label>Course :</label>
                        <input type="name" name="course" id="course_name" class="form-control" readonly>
                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <label for="IDofInput">CET REQUIREMENTS</label>
                            <input type="number" name="cet" id="cet" class="form-control" >
                        </div>
                        <div class="col-md-6">
                            <label for="IDofInput2">GPA REQUIREMENTS</label>
                            <input type="number" name="gpa" id="gpa" class="form-control" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="IDofInput">SLOTS</label>
                            <input type="text" name="slot" id="slot" class="form-control" >
                        </div>
                        <div class="col-md-6">
                            <!-- <label for="IDofInput2">GPA REQUIREMENTS</label>
                            <input type="name" name="fname" id="fname1" class="form-control" > -->
                        </div>
                    </div>



                    <hr> <br>



                    <!-- attached -->


                </div>
                <div class="modal-footer">

                    <button type="accept" name="update" class="btn btn-success">UPDATE</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>

                </div>
            </form>

        </div>
    </div>
</div>


<!-- ASSIGN SCHEDULE AND INSTRUCTOR -->