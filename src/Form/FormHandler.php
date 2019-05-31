<?php

namespace HTTPFriend\Form;

use HTTPFriend\Tags\Tag as Tag;

class FormHandler
{

  public $subittedData;
  public $rawSubmittedData;
  public $files;
  public $formcount;
  public $returnData;

  public function __construct()
  {
    $this->tag = new Tag;
  }

  public function open( $formSettings = [])
  {

    $attributes = [];

    if (!isset($formSettings["method"])) {
      $attributes["method"] = "POST";
    } 
    else {
      $attributes["method"] = trim($formSettings["method"]);
    }

    if (isset($formSettings["action"])) {
      $attributes["action"] = $formSettings["action"];
    } 
    else {
      $attributes["action"] = "./";
    }


    $attributes = array_merge( $attributes, is_array( $formSettings["attributes"] ) ? $formSettings["attributes"] : [] ); 

    $formname = "http-friend-name-";

    if( isset( $formSettings["controller"] ) && is_string( $formSettings["controller"] ) ) {
      $formname .= "{$formSettings["controller"]}-";
    }
    else if( is_object( $formSettings["controller"] ) ){
      $formname .= get_class( $formSettings["controller"] )."-";
    }

    if( isset( $formSettings["controllerMethod"] ) && is_string( $formSettings["controllerMethod"] ) ) {
      $formname .= "-{$formSettings["controllerMethod"]}";
    }

    $formname .= "-{$this->formcount}";

    if( strtolower( $attributes["method"] ) == "post" ) {
      $_POST = array_map('htmlspecialchars', $_POST);
      $this->submittedData = $_POST;
      $this->submittedData["files"] = $_FILES;

      if( $attributes["enctype"] == "multipart/form-data" ) {
        $raw = http_build_query( $_POST );
      }
      else {
        $raw = file_get_contents( "php://input" );
      }
    }
    else {
      $_GET = array_map('htmlspecialchars', $_GET);
      $this->submittedData = $_GET;
      $raw = $_SERVER["QUERY_STRING"];
    }

    $this->rawSubmittedData = [];

    if( strlen( $raw ) ) {
      $raw  = explode( "&", $raw );

      foreach( $raw as $d ) {
        $d = explode( "=", $d );
        $this->rawSubmittedData[urlencode( $d[0] )] = urlencode( $d[1] );
      }
    }

    if( isset( $formSettings["controller"] ) ){
      $this->returnData = $this->processFormSubmission( $this->submittedData, $formSettings );
    }



    ob_start();

    $this->tag->output(["tag" => "form", "attr" => $attributes ]);

    $this->tag->output(["tag" => "input", "attr" => ["type" => "hidden", "name" => $formname]]);

    $this->formcount++;

    echo ob_get_clean();

    return $this;
  }

  public function close()
  {
    $this->tag->output(["tag" => "form", "close" => true]);
  }


  public function processFormSubmission( $data = [], $settings )
  {
    $returnData = [];
    if (isset($settings["controller"]) && is_string( $settings["controller"] ) && class_exists($settings["controller"]) ) {
      $controller = new $settings["controller"](@$settings["controllerPassin"]);
    }
    else if( isset( $settings["controller"] ) && is_object( $settings["controller"] ) ){
      $controller = $settings["controller"];
    }
     else if( !isset( $settings["controller"] ) ) {
      throw new \Exception("No Controller passed to form");
    }
    else {
      throw new \Exception("Could not find {$settings["controller"]}");
    }

    if (isset($settings["controllerMethod"]) && method_exists( $controller, $settings["controllerMethod"])) {
      $returnData = $controller->{$settings["controllerMethod"]}(@$settings["passin"]);
    } else {
      throw new \Exception("No method defined for {$settings["controller"]}:{$settings["controllerMethod"]}");
    }

    return $returnData;
  } 
   


  public function text($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function phone($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function email($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function number($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function button($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function password($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }
  public function hidden($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function checkbox($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function radio($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function file($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function image($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function color($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function date($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function datetimeLocal($attr = [], $options = [])
  {
    $attr["type"] = strtolower(stFUNCTIONe("L", "-l", __METHOD__));
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function month($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function range($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function reset($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function search($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function tel($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function url($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function week($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function submit($attr = [], $options = [])
  {
    $attr["type"] = strtolower(__FUNCTION__);
    $this->tag->output(["tag" => "input", "attr" => $attr]);
  }

  public function textarea($attr = [], $options)
  {

    $value = $attr["value"];
    unset($attr["value"]);
    $this->tag->output(["tag" => "textarea", "attr" => $attr]);
    echo $value;
    $this->tag->output(["tag" => "textarea", "close" => true]);
  }

  public function select($attr = [], $options = [])
  {
    $value = $attr["value"];
    unset($attr["value"]);
    $this->tag->output(["tag" => "select", "attr" => $attr]);

    if (!empty($options)) {

      foreach ($options as $ak => $av) {
        echo "<option ";
        if (isset($attr["valueOnly"])) {
          echo " value=\"{$av}\" ";
        } else {
          echo " value=\"{$ak}\" ";
        }
        echo ">{$av}</option>";

      }

    }

    $this->tag->output(["tag", "close" => true]);

  }

}