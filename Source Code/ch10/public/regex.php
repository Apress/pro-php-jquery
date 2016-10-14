<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type"
          content="text/html;charset=utf-8" />
    <title>Regular Expression Demo</title>
    <style type="text/css">
        em {
            background-color: #FF0;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
        }
    </style>
</head>

<body>
<?php

/*
 * Store the sample set of text to use for the examples of regex
 */
$string = <<<TEST_DATA

<h2>Regular Expression Testing</h2>
<p>
    In this document, there is a lot of text that can be matched 
    using regex. The benefit of using a regular expression is much
    more flexible &mdash; albeit complex &mdash; syntax for text
    pattern matching.
</p>
<p>
    After you get the hang of regular expressions, also called 
    regexes, they will become a powerful tool for pattern matching.
</p>
<hr />
TEST_DATA;

/*
 * Use regex to highlight any occurence of the letters a-c
 */
$pattern = "/([a-c]{2})/i";
echo preg_replace($pattern, "<em>$1</em>", $string);

//        /(reg(ular expressions?|ex(es)?))/i

/*
 * Output the pattern you just used
 */
echo "\n<p>Pattern used: <strong>$pattern</strong></p>";

?>

</body>

</html>
