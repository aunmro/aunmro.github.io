<?php
$curl = curl_init("https://api.github.com/repos/aunmro/aunmro.github.io/contents/blogs");

//curl_setopt($curl, CURLOPT_FILE, $file);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0); //不显示返回结果
curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);

$blog_json = curl_exec($curl);
$blogs = json_decode($blog_json);
curl_close($curl);

$doc = new DOMDocument();
$doc->loadHTMLFile('index.html');
$ul = $doc->getElementsByTagName('ul')[1];

while($fc=$ul->firstChild) {
    $ul->removeChild($fc);
}

foreach($blogs as $blog) {
    $blog_title = str_replace('-', ' ', $blog->name);
    $blog_title = str_replace('.ipynb', '', $blog_title);
    $blog_title = ucfirst($blog_title);
    $ul_li = $doc->createElement('li');
    $ul_li = $ul->appendChild($ul_li);
    $ul_li_a = $doc->createElement('a', $blog_title);
    $ul_li_a_href = $doc->createAttribute('href');
    $ul_li_a_href->value = 'https://nbviewer.jupyter.org/github/aunmro/aunmro.github.io/blob/master/blogs/'.$blog->name;
    $ul_li_a->appendChild($ul_li_a_href);
    $ul_li_a = $ul_li->appendChild($ul_li_a);
}

$doc->saveHTMLFile('index.html');
