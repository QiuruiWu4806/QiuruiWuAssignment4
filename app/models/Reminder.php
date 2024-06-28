<?php

class Reminder {
  
    public function __construct() {

    }

    public function get_all_reminders () {
      $db = db_connect();
      $statement = $db->prepare("select * from reminders;");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function update_reminder ($reminder_id) {
      $db = db_connect();
      $statement = $db->prepare("UPDATE reminders SET subject = :subject WHERE reminder_id = :id;");
      $statement->bindValue(':subject', '1');
      $statement->bindValue(':id', $reminder_id);
      $statement->execute();
    }

    public function delete_reminder ($reminder_id) {
      
    }

    public function create_reminder ($subject){
      $db = db_connect();
      $statement = $db->prepare("INSERT INTO reminders (user_id, subject) VALUES (:user_id, :subject);");
      
      $statement->bindValue(':user_id', $_SESSION['user_id']);
      $statement->bindValue(':subject', $subject);
      $statement->execute();
    }
}