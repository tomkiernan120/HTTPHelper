<?php

namespace HTTPFriend\Tags;

class Css extends Tag {

  public function __construct()
  {
    parent::__construct();
  }

  public function css( $options = [] )
  {
    $options["rel"] = "stylesheet";
    $options["type"] = "text/css";
    $this->output( [ "tag" => "link", "attr" => $options, "selfClosing" => true ] );
  }

}