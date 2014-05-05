<?php
/**
 * Interface SvgType
 * author: Marco Chillemi
 * email: marco.chillemi@gmail.com
 * site: http://www.killodesign.com
 */
interface ISvgType
{
    public function setData($data);

    public function setAttribute($attribute, $value);

    public function getHTML();

    public function render();
}