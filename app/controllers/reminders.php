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
}
