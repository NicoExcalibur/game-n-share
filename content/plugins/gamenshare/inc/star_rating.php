<?php

class Star_rating {

    public function custom_table_rating()
  {
    global $wpdb;

    $this->wpdb = $wpdb;
    $this->table = $wpdb->prefix . 'rating';

    // function that creates the custom_table
    $sql = "CREATE TABLE {$this->table} (
    `id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `post_id` INT NOT NULL,
    `rating` int(2) NOT NULL,
    `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
    PRIMARY KEY (id)
    );";
        
    $this->wpdb->query($sql);
  }

  // function that drops(delete) the custom_table
  public function custom_table_rating_uninstall()
  { 
    global $wpdb;

    $this->wpdb = $wpdb;
    $this->table = $wpdb->prefix . 'rating';
    
    $sql = "DROP TABLE {$this->table};";

    $this->wpdb->query($sql);
  }

  // callbacks
  public function activation()
  {
    $this->custom_table_rating();
  }

  public function deactivation()
  {
    $this->custom_table_rating_uninstall();
  }
}