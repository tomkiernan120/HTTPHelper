<?php

namespace HTTPFriend\Tags;

class Meta extends Tag {
  
  public function __construct(){
    parent::__construct(  );
  }

  public function meta( $options = [] ) 
  {
    $this->output( [ "tag" => "meta",  "attr" => $options, "selfClosing" => true ] );
  }

}