<?php
/**
 * Class SvgFactoryConcrete
 * author: Marco Chillemi
 * email: marco.chillemi@gmail.com
 * site: http://www.killodesign.com
 */
class SvgFactory implements ISvgFactory
{
    public static function create($svgType) {
        $svgType = ucfirst($svgType);

        if($svgType == 'Switch')
            $svgType = 'SvgSwitch';

        if($svgType == 'Use')
            $svgType = 'SvgUse';

        return new $svgType;
    }
}