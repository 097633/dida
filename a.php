<?PHP
header('Content-Type: text/html; charset=utf-8');
getcontent($_REQUEST['url']);
function getcontent($url){
	$content = file_get_contents($url);
	if(is_utf8($content)){
		
	}else{
			$content = iconv("gbk","utf-8//IGNORE",$content);
	}
	preg_match('/<title>(.*)<\/title>/s',$content,$title);   
	$title = title($title[1]);
	$text['title'] = $title;

	if(strpos($url,'sohu')){
		preg_match('/<div class=\"text clear\" id=\"contentText\" collection=\"Y\">([\s\S]*?)<\/div>/s',$content,$con);
		$content = $con[1];
	}elseif(strpos($url,'sina')){

	}elseif(strpos($url,'qq.com')){

	}else{
		$content = grabArticleHtml($content,false);
	}	

	if(strlen($content)<800){
		$content = '';
	}
	$text['content'] = $content;
	echo '<div id="mytitle">'.$title.'</div>';
	echo '<div id="mycontent">'.$content.'</div>';
}
// returns XHTML
function grabArticleHtml($html, $with_title=true) {
    $contentNode = grabArticle($html, $with_title);
    return $contentNode->ownerDocument->saveXML($contentNode);
}

// returns DOMElement object
function grabArticle($html, $with_title=true) {
    // Replace all doubled-up <BR> tags with <P> tags, and remove fonts.
    $html = preg_replace('!<br ?/?>[ \r\n\s]*<br ?/?>!', '</p><p>', $html);
	$html = str_replace('<br>', '<p>', $html);
    $html = preg_replace('!</?font[^>]*>!', '', $html);
    $document = new DOMDocument();
    $html = mb_convert_encoding($html, 'HTML-ENTITIES', "UTF-8"); 
    @$document->loadHTML($html);

    $allParagraphs = $document->getElementsByTagName('p');
 
    $topDivCount = 0;
    $topDiv = null;
    $topDivParas;
    
    $articleContent = $document->createElement('div');
    if ($with_title) {
        $articleTitle = $document->createElement('h1');
        // Grab the title from the <title> tag and inject it as the title.
        //var_dump($document->getElementsByTagName('title')->item(0)->nodeValue);exit;
        $articleTitle->appendChild($document->createTextNode($document->getElementsByTagName('title')->item(0)->nodeValue));
        $articleContent->appendChild($articleTitle);
    } 
    // Study all the paragraphs and find the chunk that has the best score.
    // A score is determined by things like: Number of <p>'s, commas, special classes, etc.
    for ($j=0; $j < $allParagraphs->length; $j++) {
         $node = $allParagraphs->item($j);

        $parentNode = $allParagraphs->item($j)->parentNode;

        // Initialize readability data
        if (!$parentNode->hasAttribute('readability'))
        {
            $readability = $document->createAttribute('readability');
            $readability->value = 0;
            $parentNode->appendChild($readability);        

            // Look for a special classname
            if (classNameMatch($parentNode, '/(comment|meta|footer|footnote)/')) {
                $readability->value -= 50;
            } else if(classNameMatch($parentNode, '/((^|\s)(post|hentry|entry[-]?(content|text|body)?|blkContainerSblkCon|article[-]?(content|text|body)?)(\s|$))/')) {
                $readability->value += 25;
            }

            // Look for a special ID
            if (preg_match('/(comment|meta|footer|footnote)/', $parentNode->getAttribute('id'))) {
                $readability->value -= 50;
            } else if (preg_match('/^(post|hentry|entry[-]?(content|text|body)?|artibody|article[-]?(content|text|body)?)$/', $parentNode->getAttribute('id'))) {
                $readability->value += 25;
            }
        } else {
            $readability = $parentNode->getAttributeNode('readability');
        }

        // Add a point for the paragraph found
        if(strlen($allParagraphs->item($j)->textContent) > 10) {
            $readability->value++;
        }

        // Add points for any commas within this paragraph
        $readability->value += substr_count($allParagraphs->item($j)->textContent, ',');
    }
    // Assignment from index for performance. See http://www.peachpit.com/articles/article.aspx?p=31567&seqNum=5 
    $allElements = $document->getElementsByTagName('*');
    $topDiv = null;
    foreach ($allElements as $node) {
        if($node->hasAttribute('readability') && ($topDiv == null || (int)$node->getAttribute('readability') > (int)$topDiv->getAttribute('readability'))) {
            $topDiv = $node;
        }
    }

    if($topDiv == null) {
        $topDiv = $document->createElement('div', 'Sorry, readability was unable to parse this page for content.');
    } else {
        cleanStyles($topDiv);                    // Removes all style attributes
        $topDiv = killDivs($topDiv);                // Goes in and removes DIV's that have more non <p> stuff than <p> stuff
        $topDiv = killBreaks($topDiv);            // Removes any consecutive <br />'s into just one <br /> 

        // Cleans out junk from the topDiv just in case:
        $topDiv = clean($topDiv, 'form');
        $topDiv = clean($topDiv, 'object');
        $topDiv = clean($topDiv, 'table', 250);
        $topDiv = clean($topDiv, 'h1');
        //$topDiv = clean($topDiv, 'h2');
        $topDiv = clean($topDiv, 'iframe');
        $topDiv = clean($topDiv, 'script');
    }
    
    $articleContent->appendChild($topDiv);

    return $articleContent;
}

function classNameMatch($node, $pattern) {
    if (!$node->hasAttribute('class')) return false;
    $class = $node->attributes->getNamedItem('class')->nodeValue;
    return preg_match($pattern, $class);
}

function classNameHas($node, $classNames) {
    if (!$node->hasAttribute('class')) return false;
    $class = $node->attributes->getNamedItem('class')->nodeValue;
    $class = explode(' ', $class);
    foreach ($class as $classValue) {
        if (in_array(trim($classValue), $classNames)) return true;
    }
    return false;
}

function cleanStyles($node) {
    $elems = $node->getElementsByTagName('*');
    foreach ($elems as $elem) {
        $elem->removeAttribute('style');
    }
}

function killDivs ($node) {
    $divsList = $node->getElementsByTagName('div');
    $curDivLength = $divsList->length;
    
    // Gather counts for other typical elements embedded within.
    // Traverse backwards so we can remove nodes at the same time without effecting the traversal.
    for ($i=$curDivLength-1; $i >= 0; $i--) {
        $p = $divsList->item($i)->getElementsByTagName('p')->length;
        $img = $divsList->item($i)->getElementsByTagName('img')->length;
        $li = $divsList->item($i)->getElementsByTagName('li')->length;
        $a = $divsList->item($i)->getElementsByTagName('a')->length;
        $embed = $divsList->item($i)->getElementsByTagName('embed')->length;
        // If the number of commas is less than 10 (bad sign) ...
        if (substr_count($divsList->item($i)->textContent, ',') < 10) {
            // And the number of non-paragraph elements is more than paragraphs 
            // or other ominous signs :
            if ( $img > $p || $li > $p || $a > $p || $p == 0 || $embed > 0) {
                $divsList->item($i)->parentNode->removeChild($divsList->item($i));
            }
        }
    }
    return $node;
}

function killBreaks ($node) {
    $pattern = '!(<br\s*/?>(\s|&nbsp;)*){1,}!';
    $xml = $node->ownerDocument->saveXML($node);
    $xml = preg_replace($pattern, '<br />', $xml);
    $f = $node->ownerDocument->createDocumentFragment();
    @$f->appendXML($xml); // @ to prevent PHP warnings
    $node->parentNode->replaceChild($f,$node); 
    return $node;
}

function clean($node, $tag, $minWords=1000000) {
    $targetList = $node->getElementsByTagName($tag);
    $_len = $targetList->length;

    for ($y=$_len-1; $y >=0; $y--) {
        // If the text content isn't laden with words, remove the child:
        if (substr_count($targetList->item($y)->textContent, ' ') < $minWords) {
            $targetList->item($y)->parentNode->removeChild($targetList->item($y));
        }
    }
    return $node;
}


function title($title){
    $rule = array(',','，','.','-','--','_','|','—');
    foreach($rule as $val){
        $tmp = explode($val,$title);
        if($tmp[0] != ''){
           $title = $tmp[0];
        }
    }
return $title;
}

function is_utf8($word)    
{    
    if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$word) == true)    
    {    
    return true;    
    }    
    else    
    {    
    return false;    
    }    
  
} 
?>