<?php

class Add_favorite {

    public function custom_table_fav()
  {
    global $wpdb;

    $this->wpdb = $wpdb;
    $this->table = $wpdb->prefix . 'favorites';

    // function that creates the custom_table
    $sql = "CREATE TABLE {$this->table} (
    `id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `post_id` INT NOT NULL, 
    PRIMARY KEY (id)
    );";
        
    $this->wpdb->query($sql);
  }

  // function that drops(delete) the custom_table
  public function custom_table_fav_uninstall()
  { 
    global $wpdb;

    $this->wpdb = $wpdb;
    $this->table = $wpdb->prefix . 'favorites';
    
    $sql = "DROP TABLE {$this->table};";

    $this->wpdb->query($sql);
  }

  // callbacks
  public function activation()
  {
    $this->custom_table_fav();
  }

  public function deactivation()
  {
    $this->custom_table_fav_uninstall();
  }
}