<?php

namespace HTTPFriend\Tags;

class Js extends Tag {

  public function __construct()
  {
    parent::__construct();
  }

  public function js( $options = [] )
  {

    $this->output( [ "tag" => "script", "attr" => $options ] ); 
    $this->output( [ "tag" => "script", "close" => true ] ); 
  }

}