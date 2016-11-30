<?php
  class Post {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $author;
    public $content;

    public function __construct($id, $author, $content) {
      $this->id      = $id;
      $this->author  = $author;
      $this->content = $content;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "SELECT * FROM posts";
      $req = $mysqli->query($sql_query);
      
      // we create a list of Post objects from the database results
      //PROBLEM PROBABLY
      foreach($req as $post) {
        $list[] = new Post($post['id'], $post['author'], $post['content']);
      }

      $mysqli->close();

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      $mysqli = $db->getConnection();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $mysqli->prepare('SELECT * FROM posts WHERE id = ?');
      // the query was prepared, now we replace :id with our actual $id value
      #$req->execute(array('id' => $id));
      $req->bind_param("s", $id);
      $req->execute();
      $req->bind_result($post['id'], $post['author'], $post['content']);
      $req->fetch();

      return new Post($post['id'], $post['author'], $post['content']);
    }
  }


  #$db = Database::getInstance();
#$mysqli = $db->getConnection(); 
#$sql_query = "SELECT foo FROM .....";
#$result = $mysqli->query($sql_query);
?>