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
                        <td><?php echo $reminder['id']; ?></td>
                        <td><?php echo $reminder['subject']; ?></td>
                        
                    <td><form action="/reminders/update_reminder" method="POST";">
                    <input type="hidden" name="id" value="<?php echo $reminder['id']; ?>">
                    <button type="submit" class="btn btn-danger">Update</button>
                    </form></td>
                        
                    <td><form action="/reminders/delete_reminder" method="POST";">
                    <input type="hidden" name="id" value="<?php echo $reminder['id']; ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php require_once 'app/views/templates/footer.php' ?>