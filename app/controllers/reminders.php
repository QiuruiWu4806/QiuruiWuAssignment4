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
      $reminder = $this->model('Reminder');
      $subject = $_REQUEST['subject'];
      $reminder->create_reminder($subject);
    }
}
