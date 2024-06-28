<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Create new reminder</h1>
            </div>
        </div>
    </div>

    <div class="row">
            <div class="col-sm-auto">
            <form action="/reminders/create_reminder" method="post" >
            <fieldset>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input required type="text" class="form-control" name="username">
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Create</button>
            </fieldset>
            </form> 
        </div>
    </div>

    <?php require_once 'app/views/templates/footer.php' ?>