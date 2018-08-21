<?php

function stripTags($string)
{
  //to delete the html and php tags in a string
	return strip_tags($string ,'<br><em><strong><i><b><p><div><ul><ol><li><section><content><span><h1><h2><h3><h4><h5><h6><body><html><title><abbr><form><input><textarea>');
}


//Function to make a text preview in home page

function createPreview($text, $limit) 
{
  $text = preg_replace('/\[\/?(?:b|i|u|s|center|quote|url|ul|ol|list|li|\*|code|table|tr|th|td|youtube|gvideo|(?:(?:size|color|quote|name|url|img)[^\]]*))\]/', '', $text);

  if (strlen($text) > $limit) return substr($text, 0, $limit) . "...";
  return $text;
}