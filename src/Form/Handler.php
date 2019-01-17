<?php

namespace HTTPFriend\Form;

use HTTPFriend\Tags\Tag as Tag;

class Handler {

  public $subittedData;
  public $files;

  public function __construct(){
    $this->tag = new Tag;
  }

  public function open( $formSettings = [] ){

    if( !isset( $formSettings["method"] ) )
    {
      $attributes["method"] = "POST";
    }
    else{
      $attributes["method"] = trim( $formSettings["method"] );
    }

    if( isset( $formSettings["action"] ) ) {
      $attributes["action"] = $formSettings["action"];
    }
    else {
      $attributes["action"] = "./";
    }

    $formname = "http-friend-name-";

    if( isset( $formSettings["controller"] ) && isset( $formSettings["method"] ) )
    {
      $formname .= "-{$formSettings["controller"]}-{$formSettings["method"]}";
    }

    $formname .= "-{$this->formcount}";

    if( isset( $_POST[$formname] ) ){

      $this->processFormSubmission();
    }

    ob_start();
    $this->tag->output([ "tag" => "form", "attr" => $attributes ] );



    $this->tag->output([ "tag" => "input", "attr" => [ "type" => "hidden", "name" => "http-friend-name" ] ] );
    echo ob_get_clean();
  }

  public function close(){
    $this->tag->output( [ "tag" => "form", "close" => true ] );
  }


  public function processFormSubmission()
  {

  } 

  public function text( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function phone( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function email( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function number( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }
  
  public function button( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }  

  public function password( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }
  public function hidden( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }  

  public function checkbox( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function radio( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function file( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function image( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function color( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function date( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function datetimeLocal( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( str_replace( "L", "-l", __METHOD__) );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function month( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function range( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }  

  public function reset( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function search( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function tel( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function url( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function week( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function submit( $attr = [], $options = [] )
  {
    $attr["type"] = strtolower( __METHOD__ );
    $this->tag->output( [ "tag" => "input", "attr" => $attr ] );
  }

  public function textarea( $attr = [], $options )
  {

    $value = $attr["value"];
    unset( $attr["value"] );
    $this->tag->output( [ "tag" => "textarea", "attr" => $attr ] );
    echo $value;
    $this->tag->output( [ "tag" => "textarea", "close" => true ] );
  }

  public function select( $attr = [], $options = [] )
  {
    $value = $attr["value"];
    unset( $attr["value"] );
    $this->tag->output( [ "tag" => "select", "attr" => $attr ] );

    if( !empty( $options ) ) {

      foreach( $options as $ak => $av ){
        echo "<option ";
        if( isset( $attr["valueOnly"] ) ){
          echo " value=\"{$av}\" ";
        }
        else {
          echo " value=\"{$ak}\" ";
        }
        echo ">{$av}</option>";

      }

    }

    $this->tag->output( [ "tag", "close" => true ] );

  }

}