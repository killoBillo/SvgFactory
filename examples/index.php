<?php include_once '../class/init.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SVG Factory</title>

    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/prism.css" rel="stylesheet">

</head>

<body>
    <div class="jumbotron">
        <div class="container">
            <h1>SvgFactory</h1>
            <p class="lead">A PHP full set of classes for HTML5 Scalable Vector Graphics [ &lt;svg&gt; ].</p>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div id="content" class="col-xs-12 col-sm-12 col-md-10" role="main">
                <div class="bs-docs-section">
                    <h1 id="Introduction" class="page-header">Introduction</h1>
                    <p class="lead">SvgFactory is a full set of PHP classes designed to handle &lt;svg&gt; HTML5 elements in your PHP project. The purpose of this guide is to provide all necessary knowledge to use these classes, will therefore require a basic understanding of the svg elements, bases that are not covered by this reference.</p>
                </div>

                <div class="bs-docs-section">
                    <h1 id="Getting-Started" class="page-header">Getting Started</h1>
                    <h3 id="Includes">Includes</h3>
                    <p>Copy the whole "class" folder inside your project and include the init.php file. That's all!</p>
                    <pre><code class="language-php">&lt;?php include_once 'class/init.php'; ?&gt;</code></pre>
                    <h3 id="HTML5-doctype">HTML5 Doctype</h3>
                    <p>Remember that SVG requires an HTML5 doctype declaration</p>
                    <pre class="line-numbers"><code class="language-markup">&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
...
&lt;/html&gt;</code></pre>
                    <h3 id="Basic-usage">Basic Usage</h3>
                    <p>Instantiates an object of class "Svg"</p>
                    <pre><code class="language-php">$svg = SvgFactory::create('Svg');</code></pre>
                    <p>Instantiates any kinda element you need</p>
                    <pre><code class="language-php">$dodecahedron = SvgFactory::create('RegularPolygon');</code></pre>
                    <p>Style the element as you wish</p>
                    <pre><code class="language-php">$dodecahedron->setData(array('cx'=>40, 'cy'=>40, 'r'=>40, 'numSides'=>12, 'fill'=>'#129DBC'));</code></pre>
                    <p>Append the element to the svg instance</p>
                    <pre><code class="language-php">$svg->append($dodecahedron);</code></pre>
                    <p>Render the svg instance</p>
                    <pre><code class="language-php">$svg->render();</code></pre>
                    <p>Et voilà le jeux sont fait</p>
                    <?php
                        $svg = SvgFactory::create('Svg')->setAttribute('height', 80);
                        $dodecahedron = SvgFactory::create('RegularPolygon');
                        $dodecahedronData = array('cx'=>40, 'cy'=>40, 'r'=>40, 'numSides'=>12, 'fill'=>'#129DBC');
                        $dodecahedron->setData($dodecahedronData);
                        $svg->append($dodecahedron);
                        $svg->render();
                    ?>
                </div>

                <div class="bs-docs-section">
                    <h1 id="SVG-primitives" class="page-header">Primitives</h1>
                    <p class="lead">
                        SvgFactory supports all the &lt;svg&gt; elements existent in HTML5, as &lt;rect&gt;, &lt;line&gt;,
                        &lt;polygon&gt;, &lt;polyline&gt; and so on... For further information take a look at the following sections:
                    </p>

                    <h3 id="SVG-svg">SVG &lt;svg&gt;</h3>
                    <div>
                        <p>svg is the root element of all SVG images. You can create an svg node via SvgFactory this way:</p>
                        <pre><code class="language-php">$svg = SvgFactory::create('Svg');</code></pre>
                        <p>You could also assign to the $svg instance the two namespaces specific for the root element.</p>
                        <pre><code class="language-php">$svg->setData(array('xmlns'=>'http://www.w3.org/2000/svg', 'xmlns:xlink'=>'http://www.w3.org/1999/xlink'));</code></pre>
                        <p>SVG elements can be nested inside each other:</p>
                        <pre><code class="language-php">$svgChild = $svg->append(SvgFactory::create('Svg'));</code></pre>
                        <p>Let's go on to show you all the primitives elements you can append to the svg root element.</p>
                    </div>

                    <h3 id="SVG-g">SVG &lt;g&gt;</h3>
                    <div>
                        <p> The SVG &lt;g&gt; element is used to group SVG shapes together. Once grouped you can transform, style and reuse the whole group of shapes as if it was a single shape.</p>
                        <pre><code class="language-php">$g = $svg->append(SvgFactory::create('G'));</code></pre>
                        <p>Is possible to add an arbitrary number of elements to a &lt;g&gt; node</p>
                        <pre><code class="language-php">$g->append(SvgFactory::create('Polygon'))->setAttribute('fill', 'red');</code></pre>
                    </div>

                    <h3 id="SVG-rect">SVG &lt;rect&gt;</h3>
                        <div>
                            <p>The SVG &lt;rect&gt; represents a rectangle, you can style it using the "setData" method, as shown in the code below. Through the class "Rect" you can get any type of rectangle with sharp or rounded corners, as you can see in the image below.</p>
                            <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg');
$dataRect1 = array(
    'x'     =>10,
    'y'     =>10,
    'height'=>50,
    'width' =>50,
    'fill'  =>'transparent',
    'stroke'=>'tomato',
    'stroke-width'=>5
);
$dataRect2 = array(
    'x'     =>70,
    'y'     =>10,
    'height'=>50,
    'width' =>70,
    'fx'    =>10,
    'ry'    =>10,
    'fill'  =>'transparent',
    'stroke'=>'tomato',
    'stroke-width'=>5
);
$dataRect3 = array(
    'x'     =>150,
    'y'     =>10,
    'height'=>50,
    'width' =>30,
    'fx'    =>15,
    'ry'    =>15,
    'fill'  =>'transparent',
    'stroke'=>'tomato',
    'stroke-width'=>5
);
$rect1 = $svg->append(SvgFactory::create('Rect'))->setData($dataRect1);
$rect2 = $svg->append(SvgFactory::create('Rect'))->setData($dataRect2);
$rect3 = $svg->append(SvgFactory::create('Rect'))->setData($dataRect3);

$svg->render();</code></pre>
                            <p>Take a look at the render() method at line#33, used to render the SVG image to the HTML page.</p>
                            <p>This code will generate the following output:</p>
                            <?php
                            $svg = SvgFactory::create('Svg')->setData(array('xmlns'=>'http://www.w3.org/2000/svg', 'xmlns:xlink'=>'http://www.w3.org/1999/xlink', 'height'=>70));
                            $dataRect1 = array(
                                'x'     =>10,
                                'y'     =>10,
                                'height'=>50,
                                'width' =>50,
                                'fill'  =>'transparent',
                                'stroke'=>'tomato',
                                'stroke-width'=>5
                            );
                            $dataRect2 = array(
                                'x'     =>70,
                                'y'     =>10,
                                'height'=>50,
                                'width' =>70,
                                'fx'    =>10,
                                'ry'    =>10,
                                'fill'  =>'transparent',
                                'stroke'=>'tomato',
                                'stroke-width'=>5
                            );
                            $dataRect3 = array(
                                'x'     =>150,
                                'y'     =>10,
                                'height'=>50,
                                'width' =>30,
                                'fx'    =>15,
                                'ry'    =>15,
                                'fill'  =>'transparent',
                                'stroke'=>'tomato',
                                'stroke-width'=>5
                            );
                            $rect1 = $svg->append(SvgFactory::create('Rect'))->setData($dataRect1);
                            $rect2 = $svg->append(SvgFactory::create('Rect'))->setData($dataRect2);
                            $rect3 = $svg->append(SvgFactory::create('Rect'))->setData($dataRect3);

                            $svg->render();
                            ?>
                        </div>

                    <h3 id="SVG-circle">SVG &lt;circle&gt;</h3>
                    <div>
                        <p>The SVG &lt;circle&gt; is used to draw circles</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg');
$circle = SvgFactory::create('Circle')->setData(array(
    'cx'=>35,
    'cy'=>35,
    'r'=>30,
    'style'=>'stroke:tomato; stroke-width:5; fill:transparent'
));
$svg->append($circle);
$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setAttribute('height', 70);
                        $circle = SvgFactory::create('Circle')->setData(array(
                            'cx'=>35,
                            'cy'=>35,
                            'r'=>30,
                            'style'=>'stroke:tomato; stroke-width:5; fill:transparent'
                        ));
                        $svg->append($circle);
                        $svg->render();
                        ?>
                    </div>

                    <h3 id="SVG-ellipse">SVG &lt;ellipse&gt;</h3>
                    <div>
                        <p>The SVG &lt;ellipse&gt; is used to draw ellipses. An ellipse is a circle where xradius and yradius are different.</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg')->setAttribute('height', 70);
$ellipse = SvgFactory::create('Ellipse')->setData(array(
    'cx'=>55,
    'cy'=>35,
    'rx'=>50,
    'ry'=>30,
    'style'=>'stroke:tomato; stroke-width:5; fill:transparent'
));
$svg->append($ellipse);
$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setAttribute('height', 70);
                        $ellipse = SvgFactory::create('Ellipse')->setData(array(
                            'cx'=>55,
                            'cy'=>35,
                            'rx'=>50,
                            'ry'=>30,
                            'style'=>'stroke:tomato; stroke-width:5; fill:transparent'
                        ));
                        $svg->append($ellipse);
                        $svg->render();
                        ?>
                    </div>

                    <h3 id="SVG-line">SVG &lt;line&gt;</h3>
                    <div>
                        <p>The SVG &lt;line&gt; is used to draw lines.</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg')->setAttribute('height', 70);
$line1 = SvgFactory::create('Line')->setData(array('x1'=>0, 'y1'=>10, 'x2'=>0, 'y2'=>100, 'stroke'=>'red'));
$line2 = SvgFactory::create('Line')->setData(array('x1'=>0, 'y1'=>10, 'x2'=>0, 'y2'=>100, 'stroke'=>'red'));
$svg->append($line1);
$svg->append($line2);
$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setAttribute('height', 70);
                        $line1 = SvgFactory::create('Line')->setData(array('x1'=>10, 'y1'=>10, 'x2'=>10, 'y2'=>100, 'stroke'=>'red', 'stroke-width'=>'4'));
                        $line2 = SvgFactory::create('Line')->setData(array('x1'=>30, 'y1'=>10, 'x2'=>100, 'y2'=>10, 'stroke'=>'red', 'stroke-width'=>'4'));
                        $svg->append($line1);
                        $svg->append($line2);
                        $svg->render();
                        ?>
                    </div>

                    <h3 id="SVG-polyline">SVG &lt;polyline&gt;</h3>
                    <div>
                        <p>The &lt;polyline&gt; element is used to create any shape that consists of only straight lines.</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg')->setAttribute('height', 70);
$polyline = SvgFactory::create('Polyline')->setData(array(
    "points"=>"20,20 40,25 60,40 80,120 120,140 200,180",
    "style"=>"fill:red; stroke:grey; stroke-width:5"
));
$svg->append($polyline);
$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setAttribute('height', 200)->setAttribute('width', 300);
                        $polyline = SvgFactory::create('Polyline')->setData(array("points"=>"20,20 40,25 60,40 80,120 120,140 200,180", "style"=>"fill:red; stroke:grey; stroke-width:5"));
                        $svg->append($polyline);
                        $svg->render();
                        ?>
                    </div>

                    <h3 id="SVG-polygon">SVG &lt;polygon&gt;</h3>
                    <div>
                        <p>The &lt;polygon&gt; element is used to create a graphic that contains at least three sides. Polygons are made of straight lines, and the shape is "closed" (all the lines connect up).</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg');
$polygon = SvgFactory::create('Polygon')->setData(array(
    "points"=>"90.000000,50.000000 84.641016,70.000000 70.000000,84.641016 50.000000,90.000000 30.000000,84.641016 15.358984,70.000000 10.000000,50.000000 15.358984,30.000000 30.000000,15.358984 50.000000,10.000000 70.000000,15.358984 84.641016,30.000000",
    "style"=>"fill:none; stroke:tomato; stroke-width:5"
));
$svg->append($polygon);
$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setAttribute('height', 100)->setAttribute('width', 100);
                        $polygon = SvgFactory::create('Polygon')->setData(array("points"=>"90.000000,50.000000 84.641016,70.000000 70.000000,84.641016 50.000000,90.000000 30.000000,84.641016 15.358984,70.000000 10.000000,50.000000 15.358984,30.000000 30.000000,15.358984 50.000000,10.000000 70.000000,15.358984 84.641016,30.000000", "style"=>"fill:none; stroke:tomato; stroke-width:5"));
                        $svg->append($polygon);
                        $svg->render();
                        ?>
                    </div>
                    <h3 id="SVG-path">SVG &lt;path&gt;</h3>
                    <div>
                        <p>The &lt;path&gt; element is for defining arbitrary paths.</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg');
$path = SvgFactory::create('Path')->setData(array(
    "d"=>"M10,50 C10,10 50,10 50,50 S90,90 90,50",
    "style"=>"fill:none; stroke:grey; stroke-width:5"
));
$svg->append($path);
$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setAttribute('height', 100)->setAttribute('width', 100);
                        $path = SvgFactory::create('Path')->setData(array(
                            "d"=>"M10,50 C10,10 50,10 50,50 S90,90 90,50",
                            "style"=>"fill:none; stroke:grey; stroke-width:5"
                        ));
                        $svg->append($path);
                        $svg->render();
                        ?>
                    </div>

                    <h3 id="SVG-marker">SVG &lt;marker&gt;</h3>
                    <div>
                        <p>Line markers are simple shapes placed regularly along a path. This can be useful for giving directional arrows or marking distance at a set interval.</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg');
$defs = $svg->append(SvgFactory::create('Defs'));
$startMarker = $defs->append(SvgFactory::create('Marker'))->setData(array(
    "id"=>"StartMarker",
    "viewBox"=>"0 0 12 12",
    "refX"=>"12",
    "refY"=>"6",
    "markerWidth"=>"3",
    "markerHeight"=>"3",
    "stroke"=>"green",
    "stroke-width"=>"2",
    "fill"=>"none",
    "orient"=>"auto"
));
$startMarker->append(SvgFactory::create('Circle'))->setData(array('cx'=>6, 'cy'=>6, "r"=>5));

$endMarker = $defs->append(SvgFactory::create('Marker'))->setData(array(
    "id"=>"EndMarker",
    "viewBox"=>"0 0 10 10",
    "refX"=>"5",
    "refY"=>"5",
    "markerUnits"=>"strokeWidth",
    "markerWidth"=>"3",
    "markerHeight"=>"3",
    "stroke"=>"red",
    "stroke-width"=>"2",
    "fill"=>"none",
    "orient"=>"auto"
));
$endMarker->append(SvgFactory::create('Rect'))->setData(array('x'=>0, 'y'=>0, 'width'=>10, 'height'=>10));

$svg->append(SvgFactory::create('Path'))->setData(array(
    "d"=>"M10,50 C10,10 50,10 50,50 S90,90 90,50",
    "style"=>"fill:none; stroke:tomato; stroke-width:5",
    "marker-start"=>"url(#StartMarker)",
    "marker-end"=>"url(#EndMarker)",
));

$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setAttribute('height', 100)->setAttribute('width', 100);
                        $defs = $svg->append(SvgFactory::create('Defs'));
                        $startMarker = $defs->append(SvgFactory::create('Marker'))->setData(array(
                            "id"=>"StartMarker",
                            "viewBox"=>"0 0 12 12",
                            "refX"=>"12",
                            "refY"=>"6",
                            "markerWidth"=>"3",
                            "markerHeight"=>"3",
                            "stroke"=>"green",
                            "stroke-width"=>"2",
                            "fill"=>"none",
                            "orient"=>"auto"
                        ));
                        $startMarker->append(SvgFactory::create('Circle'))->setData(array('cx'=>6, 'cy'=>6, "r"=>5));

                        $endMarker = $defs->append(SvgFactory::create('Marker'))->setData(array(
                            "id"=>"EndMarker",
                            "viewBox"=>"0 0 10 10",
                            "refX"=>"5",
                            "refY"=>"5",
                            "markerUnits"=>"strokeWidth",
                            "markerWidth"=>"3",
                            "markerHeight"=>"3",
                            "stroke"=>"red",
                            "stroke-width"=>"2",
                            "fill"=>"none",
                            "orient"=>"auto"
                        ));
                        $endMarker->append(SvgFactory::create('Rect'))->setData(array('x'=>0, 'y'=>0, 'width'=>10, 'height'=>10));

                        $svg->append(SvgFactory::create('Path'))->setData(array(
                            "d"=>"M10,50 C10,10 50,10 50,50 S90,90 90,50",
                            "style"=>"fill:none; stroke:tomato; stroke-width:5",
                            "marker-start"=>"url(#StartMarker)",
                            "marker-end"=>"url(#EndMarker)",
                        ));

                        $svg->render();
                        ?>
                    </div>

                    <h3 id="SVG-text">SVG &lt;text&gt;</h3>
                    <div>
                        <p>The SVG &lt;text&gt; element is used to draw text in an SVG image.</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg')->setData(array('height'=>100, 'width'=>450));
$svg->append(SvgFactory::create('Star'))->setData(array(
    'outerRadius'=>20,
    'innerRadius'=>-20,
    'fill'=>'orange',
));
$svg->append(SvgFactory::create('Text'))->setData(array(
    'x'=>50,
    'y'=>40,
    'stroke'=>'#000000',
    'fill'=>'tomato',
    'font-family'=>'Bitter',
    'font-size'=>'48px',
))->appendText('SvgFactory :]');
$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setData(array('height'=>70, 'width'=>650));
                        $svg->append(SvgFactory::create('Star'))->setData(array(
                            'outerRadius'=>20,
                            'innerRadius'=>-20,
                            'fill'=>'orange',
                        ));
                        $svg->append(SvgFactory::create('Text'))->setData(array(
                            'x'=>50,
                            'y'=>40,
                            'stroke'=>'none',
                            'fill'=>'tomato',
                            'font-family'=>'Bitter',
                            'font-size'=>'48px',
                        ))->appendText('SvgFactory :]');
                        $svg->render();
                        ?>
                    </div>

                    <h3 id="SVG-tspan">SVG &lt;tspan&gt;</h3>
                    <div>
                        <p>The &lt;tspan&gt; element makes it possible to position a line of text relatively to the previous line of text. </p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg')->setData(array('height'=>80));
$textData = array(
    'x'=>0,
    'y'=>20,
    'stroke'=>'none',
    'fill'=>'tomato',
    'font-family'=>'Bitter',
    'font-size'=>'15px',
);
$text = SvgFactory::create('Text')->setData($textData)->appendText('SvgFactory :]');
$text->append(SvgFactory::create('Tspan'))->setData($textData)->setData(array('x'=>60, 'y'=>40))->appendText('SvgFactory :]');
$text->append(SvgFactory::create('Tspan'))->setData($textData)->setData(array('x'=>120, 'y'=>60))->appendText('SvgFactory :]');

$svg->append($text);
$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setData(array('height'=>80));
                        $textData = array(
                            'x'=>0,
                            'y'=>20,
                            'stroke'=>'none',
                            'fill'=>'tomato',
                            'font-family'=>'Bitter',
                            'font-size'=>'15px',
                        );
                        $text = SvgFactory::create('Text')->setData($textData)->appendText('SvgFactory :]');
                        $text->append(SvgFactory::create('Tspan'))->setData($textData)->setData(array('x'=>60, 'y'=>40))->appendText('SvgFactory :]');
                        $text->append(SvgFactory::create('Tspan'))->setData($textData)->setData(array('x'=>120, 'y'=>60))->appendText('SvgFactory :]');

                        $svg->append($text);
                        $svg->render();
                        ?>
                    </div>

<!--                    <h3 id="SVG-tref">SVG &lt;tref&gt;</h3>-->
<!--                    <div>-->
<!--                        <p>The &lt;tref&gt; element is used to reference the text that is defined within the &lt;defs&gt; element, this way you can use the referenced text multiple times in your SVG image, without having it included into the code more than once.</p>-->
<!--                    </div>-->

                    <h3 id="SVG-textPath">SVG &lt;textPath&gt;</h3>
                    <div>
                        <p>The SVG &lt;textpath&gt; element is used to layout text along a path.</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg')->setData(array('height'=>200, 'width'=>200));
$defs =  $svg->append(SvgFactory::create('Defs'));
$path = $defs->append(SvgFactory::create('Path'))->setData(array(
    "id"=>"myPath",
    "d"=>"M10,150 A15 15 180 0 1 70 140 A15 25 180 0 0 130 130 A15 55 180 0 1 190 120",
    "style"=>"fill:none; stroke:grey; stroke-width:5",
));
$text = $svg->append(SvgFactory::create('Text'))->setData(array(
    "x"=>10,
    "y"=>75,
    "fill"=>"tomato",
));
$text->append(SvgFactory::create('TextPath'))
    ->setAttribute("xlink:href", "#myPath")
    ->appendText('text along a curve path text along a curve path text along a curve path !!');

$path1 = $svg->append(SvgFactory::create('Path'))->setData(array(
    "d"=>"M10,150 A15 15 180 0 1 70 140 A15 25 180 0 0 130 130 A15 55 180 0 1 190 120",
    "style"=>"fill:none; stroke:black; stroke-width:1",
    "stroke-dasharray"=>"10,5,10",
));

$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setData(array('height'=>200, 'width'=>200));
                        $defs =  $svg->append(SvgFactory::create('Defs'));
                        $path = $defs->append(SvgFactory::create('Path'))->setData(array(
                            "id"=>"myPath",
                            "d"=>"M10,150 A15 15 180 0 1 70 140 A15 25 180 0 0 130 130 A15 55 180 0 1 190 120",
                            "style"=>"fill:none; stroke:grey; stroke-width:5",
                        ));
                        $text = $svg->append(SvgFactory::create('Text'))->setData(array(
                            "x"=>10,
                            "y"=>75,
                            "fill"=>"tomato",
                        ));
                        $text->append(SvgFactory::create('TextPath'))
                            ->setAttribute("xlink:href", "#myPath")
                            ->appendText('text along a curve path text along a curve path text along a curve path !!');

                        $path1 = $svg->append(SvgFactory::create('Path'))->setData(array(
                            "d"=>"M10,150 A15 15 180 0 1 70 140 A15 25 180 0 0 130 130 A15 55 180 0 1 190 120",
                            "style"=>"fill:none; stroke:black; stroke-width:1",
                            "stroke-dasharray"=>"10,5,10",
                        ));

                        $svg->render();
                        ?>
                    </div>

                    <h3 id="SVG-switch">SVG &lt;switch&gt;</h3>
                    <div>
                        <p>The &lt;switch&gt; element enables you to show different shapes depending on what language the user of the SVG viewer is using. Typically you would use the &lt;switch&gt; element to show different texts, but you can also show different shapes.</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg')->setData(array('height'=>50, 'width'=>100));
$switch = $svg->append(SvgFactory::create('Switch'));
$switch->append(SvgFactory::create('G'))
    ->setAttribute("systemLanguage","en-UK")
    ->append(SvgFactory::create('Text'))
    ->setData(array('x'=>"0", 'y'=>"40", "fill"=>"tomato"))
    ->appendText('UK English');

$switch->append(SvgFactory::create('G'))
    ->setAttribute("systemLanguage","en")
    ->append(SvgFactory::create('Text'))
    ->setData(array('x'=>"0", 'y'=>"40", "fill"=>"tomato"))
    ->appendText('English');

$switch->append(SvgFactory::create('G'))
    ->setAttribute("systemLanguage","es")
    ->append(SvgFactory::create('Text'))
    ->setData(array('x'=>"0", 'y'=>"40", "fill"=>"tomato"))
    ->appendText('Spanish');

$switch->append(SvgFactory::create('G'))
    ->setAttribute("systemLanguage","it")
    ->append(SvgFactory::create('Text'))
    ->setData(array('x'=>"0", 'y'=>"40", "fill"=>"tomato"))
    ->appendText('Italian');

$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setData(array('height'=>50, 'width'=>100));
                        $switch = $svg->append(SvgFactory::create('Switch'));
                        $switch->append(SvgFactory::create('G'))->setAttribute("systemLanguage","en-UK")->append(SvgFactory::create('Text'))->setData(array('x'=>"0", 'y'=>"40", "fill"=>"tomato"))->appendText('UK English');
                        $switch->append(SvgFactory::create('G'))->setAttribute("systemLanguage","en")->append(SvgFactory::create('Text'))->setData(array('x'=>"0", 'y'=>"40", "fill"=>"tomato"))->appendText('English');
                        $switch->append(SvgFactory::create('G'))->setAttribute("systemLanguage","es")->append(SvgFactory::create('Text'))->setData(array('x'=>"0", 'y'=>"40", "fill"=>"tomato"))->appendText('Spanish');
                        $switch->append(SvgFactory::create('G'))->setAttribute("systemLanguage","it")->append(SvgFactory::create('Text'))->setData(array('x'=>"0", 'y'=>"40", "fill"=>"tomato"))->appendText('Italian');
                        $svg->render();
                        ?>
                    </div>

                    <h3 id="SVG-image">SVG &lt;image&gt;</h3>
                    <div>
                        <p>The SVG &lt;image&gt; element allows for raster images to be rendered within an SVG object.</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg')->setData(array('height'=>240, 'width'=>320));
$svg->append(SvgFactory::create('Image'))->setData(array(
    'xlink:href'=>'img/img.jpg',
    'x'=>0,
    'y'=>0,
    'height'=>'240',
    'width'=>'320',
));
$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setData(array('height'=>240, 'width'=>320));
                        $svg->append(SvgFactory::create('Image'))->setData(array(
                            'xlink:href'=>'img/img.jpg',
                            'x'=>0,
                            'y'=>0,
                            'height'=>'240',
                            'width'=>'320',
                        ));
                        $svg->render();
                        ?>
                    </div>

                    <h3 id="SVG-a">SVG &lt;a&gt;</h3>
                    <div>
                        <p>The SVG &lt;a&gt; element is used to create links in SVG images. SVG links work just like HTML links. </p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg')->setData(array('height'=>80, 'width'=>300));
$a = $svg->append(SvgFactory::create('A'))->setAttribute('xlink:href', 'http://www.google.com');
$a->append(SvgFactory::create('Text'))
    ->setData(array('x'=>0, 'y'=>40, 'fill'=>'tomato'))
    ->appendText('This is a link to "http://www.google.com"');

$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setData(array('height'=>80, 'width'=>300));
                        $a = $svg->append(SvgFactory::create('A'))->setAttribute('xlink:href', 'http://www.google.com');
                        $a->append(SvgFactory::create('Text'))->setData(array('x'=>0, 'y'=>40, 'fill'=>'tomato'))->appendText('This is a link to "http://www.google.com"');

                        $svg->render();
                        ?>
                    </div>

                    <h3 id="SVG-defs">SVG &lt;defs&gt;</h3>
                    <div>
                        <p>The SVG &lt;defs&gt; element is used to embed definitions that can be reused inside an SVG image. For instance, you can group SVG shapes together and reuse them as a single shape.</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg')->setData(array('height'=>100, 'width'=>300));

$defs = $svg->append(SvgFactory::create('Defs'));

$group = $defs->append(SvgFactory::create('G'))
    ->setAttribute('id', 'myGroup');

$group->append(SvgFactory::create('Rect'))
    ->setData(array('x'=>50, 'y'=>50, 'width'=>50, 'height'=>50, 'fill'=>'tomato'));

$group->append(SvgFactory::create('Circle'))
    ->setData(array('cx'=>50, 'cy'=>50, 'r'=>50, 'fill'=>'tomato'));

$svg->append(SvgFactory::create('Use'))->setData(array(
    'xlink:href'=>'#myGroup',
    'x'=>0,
    'y'=>0
));

$svg->append(SvgFactory::create('Use'))->setData(array(
    'xlink:href'=>'#myGroup',
    'x'=>120,
    'y'=>0
));

$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setData(array('height'=>100, 'width'=>300));

                        $defs = $svg->append(SvgFactory::create('Defs'));

                        $group = $defs->append(SvgFactory::create('G'))
                            ->setAttribute('id', 'myGroup');

                        $group->append(SvgFactory::create('Rect'))
                            ->setData(array('x'=>50, 'y'=>50, 'width'=>50, 'height'=>50, 'fill'=>'tomato'));

                        $group->append(SvgFactory::create('Circle'))
                            ->setData(array('cx'=>50, 'cy'=>50, 'r'=>50, 'fill'=>'tomato'));

                        $svg->append(SvgFactory::create('Use'))->setData(array(
                           'xlink:href'=>'#myGroup',
                            'x'=>0,
                            'y'=>0
                        ));

                        $svg->append(SvgFactory::create('Use'))->setData(array(
                            'xlink:href'=>'#myGroup',
                            'x'=>120,
                            'y'=>0
                        ));

                        $svg->render();
                        ?>
                    </div>

                    <h3 id="SVG-symbol">SVG &lt;symbol&gt;</h3>
                    <div>
                        <p>The SVG &lt;symbol&gt; element is used to define reusable symbols. The shapes nested inside a &lt;symbol&gt; are not displayed unless referenced by a &lt;use&gt; element.</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg')->setData(array('height'=>60, 'width'=>80));
$symbol = $svg->append(SvgFactory::create('Symbol'))
    ->setAttribute('id', 'mySymbol')
    ->append(SvgFactory::create('Rect'))
    ->setData(array(
        'width'=>50,
        'height'=>50,
        'fill'=>'tomato'
    ));

$svg->append(SvgFactory::create('Use'))
    ->setData(array(
        'xlink:href'=>'#mySymbol',
        'x'=>0,
        'y'=>0
    ));

$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setData(array('height'=>60, 'width'=>80));
                        $symbol = $svg->append(SvgFactory::create('Symbol'))->setAttribute('id', 'mySymbol')
                            ->append(SvgFactory::create('Rect'))
                            ->setData(array(
                                'width'=>50,
                                'height'=>50,
                                'fill'=>'tomato'
                            ));

                        $svg->append(SvgFactory::create('Use'))->setData(array(
                            'xlink:href'=>'#mySymbol',
                            'x'=>0,
                            'y'=>0
                        ));

                        $svg->render();
                        ?>
                    </div>

                    <h3 id="SVG-use">SVG &lt;use&gt;</h3>
                    <div>
                        <p>The &lt;use&gt; element takes nodes from within the SVG document including &lt;g&gt; elements and &lt;symbol&gt; elements, and duplicates them somewhere else. The reused shape can be defined inside the &lt;defs&gt; element (which makes the shape invisible until used) or outside. For security reasons, some browsers could apply a same-origin policy on use elements and could refuse to load a cross-origin URI within the "xlink:href" attribute.</p>
                        <p>You can see a working example of SVG &lt;use&gt;, <a href="#SVG-defs">here</a> and <a href="#SVG-symbol">here</a>.</p>
                    </div>

                    <h3 id="SVG-clipPath">SVG &lt;clipPath&gt;</h3>
                    <div>
                        <p>The &lt;clipPath&gt; element restricts the region to which paint can be applied. Conceptually, any parts of the drawing that lie outside of the region bounded by the currently active clipping path are not drawn.</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg')->setData(array(
    'height'=>60,
    'width'=>80,
    'viewPort'=>"0 0 120 120",
));
$clipPath = $svg->append(SvgFactory::create('Defs'))
    ->append(SvgFactory::create('ClipPath'))
    ->setAttribute('id', 'myClip');

$clipPath->append(SvgFactory::create('Circle'))->setData(array(
    'cx'=>40,
    'cy'=>30,
    'r'=>20,
));

$clipPath->append(SvgFactory::create('Circle'))->setData(array(
    'cx'=>70,
    'cy'=>50,
    'r'=>20,
));

$svg->append(SvgFactory::create('Rect'))->setData(array(
    'x'=>10,
    'y'=>10,
    'width'=>100,
    'height'=>100,
    'fill'=>'tomato',
    'clip-path'=>'url(#myClip)'
));

$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setData(array(
                            'height'=>60,
                            'width'=>80,
                            'viewPort'=>"0 0 120 120",
                        ));
                        $clipPath = $svg->append(SvgFactory::create('Defs'))
                            ->append(SvgFactory::create('ClipPath'))
                            ->setAttribute('id', 'myClip');

                        $clipPath->append(SvgFactory::create('Circle'))->setData(array(
                            'cx'=>40,
                            'cy'=>30,
                            'r'=>20,
                        ));

                        $clipPath->append(SvgFactory::create('Circle'))->setData(array(
                            'cx'=>70,
                            'cy'=>50,
                            'r'=>20,
                        ));

                        $svg->append(SvgFactory::create('Rect'))->setData(array(
                            'x'=>10,
                            'y'=>10,
                            'width'=>100,
                            'height'=>100,
                            'fill'=>'tomato',
                            'clip-path'=>'url(#myClip)'
                        ));

                        $svg->render();
                        ?>
                    </div>

                    <h3 id="SVG-mask">SVG &lt;mask&gt;</h3>
                    <div>
                        <p>The SVG masking feature makes it possible to apply a mask to an SVG shape. The mask determines what parts of the SVG shape that is visible, and with what transparency. You can think of an SVG mask as a more advanced version of a clip path.</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg')->setData(array('height'=>240, 'width'=>240));
$mask = $svg->append(SvgFactory::create('Mask'))->setData(array(
    'id'=>'myMask',
    'x'=>0,
    'y'=>0,
    'width'=>240,
    'height'=>240,
));
$mask->append(SvgFactory::create('RegularPolygon'))->setData(array(
    'numSides'=>8,
    'cx'=>120,
    'cy'=>120,
    'r'=>120,
    'fill'=>'#FFFFFF',
    'transform'=>'rotate(-90 120 120)'
));
$svg->append(SvgFactory::create('Image'))->setData(array(
    'xlink:href'=>'img/img.jpg',
    'x'=>'-40',
    'y'=>0,
    'height'=>'240',
    'width'=>'320',
    'mask'=>'url(#myMask)'
));

$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setData(array('height'=>240, 'width'=>240));
                        $mask = $svg->append(SvgFactory::create('Mask'))->setData(array(
                            'id'=>'myMask',
                            'x'=>0,
                            'y'=>0,
                            'width'=>240,
                            'height'=>240,
                        ));
                        $mask->append(SvgFactory::create('RegularPolygon'))->setData(array(
                            'numSides'=>8,
                            'cx'=>120,
                            'cy'=>120,
                            'r'=>120,
                            'fill'=>'#FFFFFF',
                            'transform'=>'rotate(-90 120 120)'
                        ));
                        $svg->append(SvgFactory::create('Image'))->setData(array(
                            'xlink:href'=>'img/img.jpg',
                            'x'=>'-40',
                            'y'=>0,
                            'height'=>'240',
                            'width'=>'320',
                            'mask'=>'url(#myMask)'
                        ));

                        $svg->render();
                        ?>
                    </div>

                    <h3 id="SVG-filters">SVG &lt;filter&gt;</h3>
                    <div>
                        <p class="alert alert-warning">Not yet implemented in SvgFactory 1.0</p>
                    </div>

                    <h3 id="SVG-animation">SVG &lt;animation&gt;</h3>
                    <div>
                        <p class="alert alert-warning">Not yet implemented in SvgFactory 1.0</p>
                    </div>
                </div><!-- /bs-docs-section -->

                <div class="bs-docs-section">
                    <h1 id="Advanced-classes" class="page-header">Advanced Classes</h1>
                    <p class="lead">In SvgFactory are included a few classes that simplify the use of the base elements, helping the developer to design complex polygons without having to calculate the coordinates that compose them. In other words, for instance, you can draw an hexagon passing to class "RegularPolygon" just the number of sides that will have your polygon, without having to worry about calculating all the points that compose it.</p>

                    <h3 id="RegularPolygon-class">RegularPolygon class</h3>
                    <div>
                        <p>The regular polygon class makes it possible to draw a polygon without having to calculate every single point, but let the machine doing the dirty work in your place.</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg')->setData(array('height'=>240, 'width'=>240));
$svg->append(SvgFactory::create('RegularPolygon'))->setData(array(
    'numSides'=>18,
    'cx'=>120,
    'cy'=>120,
    'r'=>120,
    'fill'=>'tomato',
    'transform'=>'rotate(-90 120 120)'
));

$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setData(array('height'=>240, 'width'=>240));
                        $svg->append(SvgFactory::create('RegularPolygon'))->setData(array(
                            'numSides'=>18,
                            'cx'=>120,
                            'cy'=>120,
                            'r'=>120,
                            'fill'=>'tomato',
                            'transform'=>'rotate(-90 120 120)'
                        ));

                        $svg->render();
                        ?>
                    </div>

                    <h3 id="Star-class">Star class</h3>
                    <div>
                        <p>The Star class makes it possible to draw a star without having to calculate every single point, but let the machine doing the dirty work in your place.</p>
                        <pre class="line-numbers"><code class="language-php">$svg = SvgFactory::create('Svg')->setData(array('height'=>240, 'width'=>240));
$svg->append(SvgFactory::create('Star'))->setData(array(
    'outerRadius'=>120,
    'innerRadius'=>-120,
    'cx'=>120,
    'cy'=>120,
    'fill'=>'tomato',
));

$svg->render();</code></pre>
                        <p>This code will generate the following output:</p>
                        <?php
                        $svg = SvgFactory::create('Svg')->setData(array('height'=>240, 'width'=>240));
                        $svg->append(SvgFactory::create('Star'))->setData(array(
                            'outerRadius'=>120,
                            'innerRadius'=>-120,
                            'cx'=>120,
                            'cy'=>120,
                            'fill'=>'tomato',
                        ));

                        $svg->render();
                        ?>
                    </div>
                </div><!-- /bs-docs-section -->

<!--                <div class="bs-docs-section">-->
<!--                    <h1>Maschera</h1>-->
<!--                    <svg height="250" width="250" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">-->
<!--                        <mask id="mask1">-->
<!--                            <polygon points="99.9999999999999,196 16.8615612366939,148 16.8615612366939,52 100,4 183.138438763306,52 183.138438763306,148" style="fill:#FFFFFF"/>-->
<!--                        </mask>-->
<!---->
<!--                        <image width="250" height="250" xlink:href="img/img2.jpg" mask="url(#mask1)"/>-->
<!--                    </svg>-->
<!--                </div>-->
<!---->
<!--                <div class="bs-docs-section">-->
<!--                    <h1>Gruppi e poligoni</h1>-->
<!--                    --><?php
//                    $dataSVG = array(
//                        'xmlns'=>'http://www.w3.org/2000/svg',
//                        'xmlns:xlink'=>'http://www.w3.org/1999/xlink',
//                        'width'=>200,
//                        'height'=>200,
//                    );
//                    $svg = SvgFactory::create('Svg');
//                    $svg->setData($dataSVG);
//
//                    $group = SvgFactory::create('G');
//
//                    $dataPoly = array(
//                        'points'=>'99.9999999999999,196 16.8615612366939,148 16.8615612366939,52 100,4 183.138438763306,52 183.138438763306,148',
//                        'style'=>'fill:red;',
//                    );
//                    $poly = SvgFactory::create('Polygon');
//                    $poly->setData($dataPoly);
//
//                    $dataCircle = array(
//                        'cx'=>'100',
//                        'cy'=>'100',
//                        'r'=>'60',
//                        'style'=>'stroke:red; fill:white;',
//                    );
//                    $circle = SvgFactory::create('Circle');
//                    $circle->setData($dataCircle);
//
//                    $group->append($poly);
//                    $group->append($circle);
//                    $svg->append($group);
//
//                    $svg->render();
//                    ?>
<!--<pre class="line-numbers"><code class="language-php">$dataSVG = array(-->
<!--    'xmlns'=>'http://www.w3.org/2000/svg',-->
<!--    'xmlns:xlink'=>'http://www.w3.org/1999/xlink',-->
<!--    'width'=>200,-->
<!--    'height'=>200,-->
<!--);</code></pre>-->
<!--                </div>-->
<!---->
<!--                <div class="bs-docs-section">-->
<!--                    <h1>Poligono regolare</h1>-->
<!--                    --><?php
//                    $dataSVG2 = array(
//                        'xmlns'=>'http://www.w3.org/2000/svg',
//                        'xmlns:xlink'=>'http://www.w3.org/1999/xlink',
//                        'width'=>300,
//                        'height'=>300,
//                    );
//                    $svg2 = SvgFactory::create('Svg');
//                    $svg2->setData($dataSVG2);
//
//                    $dataRegPoly = array(
//                        'numSides'=>16,
//                        'cx'=>110,
//                        'cy'=>110,
//                        'r'=>100,
//                        'fill'=>'black',
//                        'stroke'=>'green',
//                        'stroke-width'=>4,
//                        'transform'=>'rotate(90 110 110)',
//                    );
//                    $regPoly = SvgFactory::create('RegularPolygon');
//                    $regPoly->setData($dataRegPoly);
//
//                    $svg2->append($regPoly);
//                    $svg2->render();
//                    ?>
<!--                </div>-->
<!---->
<!--                <div class="bs-docs-section">-->
<!--                    <h1>Scrittura abbreviata</h1>-->
<!--                    --><?php
//                    $svg3 = SvgFactory::create('Svg');
//                    $svg3->append(SvgFactory::create('RegularPolygon'))
//                        ->setData(array('fill'=>'red', 'numSides'=>8))
//                        ->setAttribute('stroke', 'black');
//
//                    $svg3->setData(array('height'=>300))->render();
//                    ?>
<!--                </div>-->
<!---->
<!--                <div class="bs-docs-section">-->
<!--                    <h1>Stella</h1>-->
<!--                    --><?php
//                    $svg4 = SvgFactory::create('Svg')->setAttribute('height', 300);
//                    $svg4->append(SvgFactory::create('Star'));
//                    $svg4->render();
//                    ?>
<!--                </div>-->
<!---->
<!--                <div class="bs-docs-section">-->
<!--                    <h1>Text</h1>-->
<!--                    --><?php
//                    $svg5 = SvgFactory::create('Svg');
//                    $svg5->append(SvgFactory::create('Text'))->setData(array('x'=>"20", 'y'=>"40"))->appendText('I\'m a text');
//                    $svg5->render();
//
//                    $svg6 = SvgFactory::create('Svg');
//                    $switch = $svg6->append(SvgFactory::create('Switch'));
//                    $switch->append(SvgFactory::create('G'))->setAttribute("systemLanguage","en-UK")->append(SvgFactory::create('Text'))->setData(array('x'=>"20", 'y'=>"40"))->appendText('UK English');
//                    $switch->append(SvgFactory::create('G'))->setAttribute("systemLanguage","en")->append(SvgFactory::create('Text'))->setData(array('x'=>"20", 'y'=>"40"))->appendText('English');
//                    $switch->append(SvgFactory::create('G'))->setAttribute("systemLanguage","es")->append(SvgFactory::create('Text'))->setData(array('x'=>"20", 'y'=>"40"))->appendText('Spanish');
//                    $switch->append(SvgFactory::create('G'))->setAttribute("systemLanguage","it")->append(SvgFactory::create('Text'))->setData(array('x'=>"20", 'y'=>"40"))->appendText('Italian');
//                    $svg6->render();
//                    ?>
<!--                </div>-->
            </div><!-- /content -->


            <div id="leftCol" class="col-xs-12 col-sm-12 col-md-2">
                <div class="bs-docs-sidebar hidden-print" role="complementary">
                    <ul id="sidebar" class="nav bs-docs-sidenav">
                        <li><a href="#Introduction">Introduction</a></li>
                        <li><a href="#Getting-Started">Getting Started</a>
                            <ul class="nav">
                                <li><a href="#Includes">Includes</a></li>
                                <li><a href="#HTML5-doctype">HTML5 Doctype</a></li>
                                <li><a href="#Basic-usage">Basic Usage</a></li>
                            </ul>
                        </li>
                        <li><a href="#SVG-primitives">Primitives</a>
                            <ul class="nav">
                                <li><a href="#SVG-svg">SVG &lt;svg&gt;</a></li>
                                <li><a href="#SVG-g">SVG &lt;g&gt;</a></li>
                                <li><a href="#SVG-rect">SVG &lt;rect&gt;</a></li>
                                <li><a href="#SVG-circle">SVG &lt;circle&gt;</a></li>
                                <li><a href="#SVG-ellipse">SVG &lt;ellipse&gt;</a></li>
                                <li><a href="#SVG-line">SVG &lt;line&gt;</a></li>
                                <li><a href="#SVG-polyline">SVG &lt;polyline&gt;</a></li>
                                <li><a href="#SVG-polygon">SVG &lt;polygon&gt;</a></li>
                                <li><a href="#SVG-path">SVG &lt;path&gt;</a></li>
                                <li><a href="#SVG-marker">SVG &lt;marker&gt;</a></li>
                                <li><a href="#SVG-text">SVG &lt;text&gt;</a></li>
                                <li><a href="#SVG-tspan">SVG &lt;tspan&gt;</a></li>
<!--                                <li><a href="#SVG-tref">SVG &lt;tref&gt;</a></li>-->
                                <li><a href="#SVG-textPath">SVG &lt;textPath&gt;</a></li>
                                <li><a href="#SVG-switch">SVG &lt;switch&gt;</a></li>
                                <li><a href="#SVG-image">SVG &lt;image&gt;</a></li>
                                <li><a href="#SVG-a">SVG &lt;a&gt;</a></li>
                                <li><a href="#SVG-defs">SVG &lt;defs&gt;</a></li>
                                <li><a href="#SVG-symbol">SVG &lt;symbol&gt;</a></li>
                                <li><a href="#SVG-use">SVG &lt;use&gt;</a></li>
                                <li><a href="#SVG-clipPath">SVG &lt;clipPath&gt;</a></li>
                                <li><a href="#SVG-mask">SVG &lt;mask&gt;</a></li>
                                <li><a href="#SVG-filter">SVG &lt;filter&gt;</a></li>
                                <li><a href="#SVG-animation">SVG &lt;animation&gt;</a></li>
                            </ul>
                        </li>
                        <li><a href="#Advanced-classes">Advanced Classes</a>
                            <ul class="nav">
                                <li><a href="#RegularPolygon-class">RegularPolygon class</a></li>
                                <li><a href="#Star-class">Star class</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /sidebar -->

        </div><!-- /row -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div id="footer">
                    <p class="pull-left">SvgFactory is a product developed by <a href="http://www.killodesign.com">Marco Chillemi</a>, killodesign &copy; <?php echo date('Y'); ?> Rome - Italy</p>
                    <p class="pull-right"><span class="badge"><small>Ver. 1.0</small></span></p>
                </div>
            </div>
        </div>
    </div><!-- /container -->





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="js/prism.js"></script>
    <script src="js/sidebar.js"></script>
</body>
</html>