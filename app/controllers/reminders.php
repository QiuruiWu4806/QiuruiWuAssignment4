<?php

class Reminders extends Controller {

    public function index() {		
      $reminder = $this->model('Reminder');
      $reminders = $reminder->get_all_reminders();
      print_r($reminders);
      $this->view('reminders/index');
    }
}
