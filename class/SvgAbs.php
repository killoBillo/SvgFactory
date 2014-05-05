<?php
abstract class SvgAbs implements ISvgType
{
    protected $htmlAttributes = array();


    public function __construct(){}

    public function setData($data){
        foreach($data as $attr=>$val) {
            $this->htmlAttributes[$attr] = $val;
        }

        return $this;
    }

    public function setAttribute($attribute, $value) {
        $this->htmlAttributes[$attribute] = $value;

        return $this;
    }

    public function getHTML(){
        $html = '';

        foreach($this->htmlAttributes as $attr=>$val) {
               $html.= $attr."=\"$val\" ";
        }

        return sprintf(static::HTML_OUTPUT, $html);
    }

    public function render() {
        print $this->getHTML();
    }
}