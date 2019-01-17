<?php

namespace HTTPFriend\Tags;

class Link extends Tag {

  public function __construct( ){
    parent::__construct();
  }

  public function link( $options = [] )
  {
    $this->output( [ "tag" => "script", "attr" => $options, "selfClosing" => true ] ); 
  }
    
}