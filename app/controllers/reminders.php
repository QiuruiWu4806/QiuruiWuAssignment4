<?php

class Reminders extends Controller {

    public function index() {		
      $reminder = $this->model('Reminder');
      $reminders_list = $reminder->get_all_reminders();
      $this->view('reminders/index',['reminders' => $reminders_list]);
    }

    public function create() {
      $reminder = $this->model('Reminder');
      $this->view('reminders/create');
    }

  public function create_reminder(){
    
    $subject = $_REQUEST['subject'];
    
    $db = db_connect();
    $statement = $db->prepare("INSERT INTO reminders (user_id, subject) VALUES (:user_id, :subject);");
    
    
    $statement->bindValue(':user_id', $_SESSION['user_id']);
    $statement->bindValue(':subject', $subject);
    $statement->execute();

    header('Location: /reminders');
  }

  public function delete_reminder() {
    $reminder_id = $_REQUEST['id'];
    $db = db_connect();
    $statement = $db->prepare("DELETE FROM reminders WHERE id = :reminder_id;");
    $statement->bindValue(':reminder_id', $reminder_id);
    $statement->execute();
    
    header('Location: /reminders');
  }

  public function update_reminder () {
    $subject = $_REQUEST['subject'];
    $reminder_id = $_REQUEST['id'];
    
    $db = db_connect();
    $statement = $db->prepare("UPDATE reminders SET subject = :subject WHERE id = :reminder_id;");
    $statement->bindValue(':reminder_id', $reminder_id);
    $statement->bindValue(':subject', $subject);
    $statement->execute();
    header('Location: /reminders');
  }
}
