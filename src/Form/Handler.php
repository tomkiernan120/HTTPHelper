<?php

namespace HTTPFriend\Form;

use HTTPFriend\Tags\Tag as Tag;

class Handler
{

  public $subittedData;
  public $files;

  public function __construct()
  {
    $this->tag = new Tag;
  }

  public function open($formSettings = [])
  {

    if (!isset($formSettings["method"])) {
      $attributes["method"] = "POST";
    } else {
      $attributes["method"] = trim($formSettings["method"]);
    }

    if (isset($formSettings["action"])) {
      $attributes["action"] = $formSettings["action"];
    } else {
      $attributes["action"] = "./";
    }

    $formname = "http-friend-name-";

    if (isset($formSettings["controller"]) && isset($formSettings["controllerMethod"])) {
      $formname .= "-{$formSettings["controller"]}-{$formSettings["controllerMethod"]}";
    }

    $formname .= "-{$this->formcount}";

    if (isset($_POST[$formname])) {

      $returnData = $this->processFormSubmission($_POST, $formSettings);
      return $returnData;
    }

    ob_start();
    $this->tag->output(["tag" => "form", "attr" => $attributes]);

    $this->tag->output(["tag" => "input", "attr" => ["type" => "hidden", "name" => $formname]]);
    echo ob_get_clean();
    return $this;
  }

  public function close()
  {
    $this->tag->output(["tag" => "form", "close" => true]);
  }


  public function processFormSubmission($data = [], $settings)
  {
    $returnData = [];
    if (isset($settings["controller"]) && class_exists($settings["controller"])) {

      $controller = new $settings["controller"](@$settings["controllerPassin"]);

      if (isset($settings["controllerMethod"]) && method_exists($controller, $settings["controllerMethod"])) {
        $returnData = $controller->{$settings["controllerMethod"]}(@$settings["passin"]);
      } else {
        throw new Exception("No method defined for {$settings["controller"]}:{$settings["controllerMethod"]}");
      }
    } else {
      throw new Exception("Could not find {$settings["controller"]}");
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