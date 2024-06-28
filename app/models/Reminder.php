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
      
    }

    public function delete_reminder ($reminder_id) {

    }

    public function create_reminder ($subject){
      $db = db_connect();
      $statement = $db->prepare("INSERT INTO reminders (user_id, subject) VALUES (:user_id, :subject);");
      
      $user_id = $db->prepare("select * from users WHERE username = :name;");
      $user_id -> bindValue(':name', $_SESSION['username']);
      $user_id -> execute();
      $rows = $user_id -> fetch(PDO::FETCH_ASSOC);
      
      $statement->bindValue(':user_id', $rows[id]);
      $statement->bindValue(':subject', $subject);
      $statement->execute();
    }
}