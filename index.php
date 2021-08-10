<?php error_reporting(E_ALL);
ini_set('display_errors', 1); ?>

<?php include 'simple_html_dom.php';?>

<?php

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://www.lecho.be/");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);
  // echo $response;

  $html = new simple_html_dom();
  $html->load($response);

 ?>

  <!DOCTYPE html>
  <html lang="fr" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
      <?php
      echo "<ul>";
        foreach ($html->find('a.c-articleteaser__link') as $link) {
          foreach ($html->find('.c-articleteaser__title') as $linke ) {
            echo "<li><a href='https://www.lecho.be/" . $link->href . "'>" . $linke->plaintext . "</a></li>";
          }
        }

        // foreach($html->find('a.c-articleteaser__link') as $article) {
        //
        //     $item['catego']= $article->find('.c-articleteaser__category', 0)->plaintext;
        //     $item['title']= $article->find('.c-articleteaser__title', 0)->plaintext;
        //     $item['link']= $article->href;
        //     $articles[] = $item;
        // }
        // print_r($articles);





        // $regex = '/<div class="o-hpgrid__block">(.*?)<\/div>/s';
        // if ( preg_match($regex, $response, $list) )
        //     echo $list[0];
        // else
        //     print "Not found";
        echo "</ul>";
       ?>

    </body>
  </html>
