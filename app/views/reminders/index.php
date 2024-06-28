<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Reminders</h1>
                <p><a href="/reminders/create">Create a new reminder</a></p>
            </div>
        </div>
    </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Subject</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $db = db_connect();
                $R = $db->prepare("select * from reminders;");
                $R->execute();
                $reminders = $R->fetchAll(PDO::FETCH_ASSOC);
                foreach ($reminders as $reminder): ?>
                    <tr>
                        <td><?php echo $reminder['subject']; ?></td>
                        <td><p><a href="/reminders/create">Update</a></p></td>
                        <td><p><a href="/reminders/create">Delete</a></p></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php require_once 'app/views/templates/footer.php' ?>