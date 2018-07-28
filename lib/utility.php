<?php
class utility
{
	public function stripTags($string)
	{
		return strip_tags($data['content'], '<br><em><strong><i><b><p><div><ul><ol><li><section><content><span><h1><h2><h3><h4><h5><h6><body><html><title><abbr><form><input><textarea>')
	}

	public function()
	
}
/*
<!-- faire une fonction pour le strip_tags et le mettre dans toute les vues-->

            <!-- function stripTags($string){

                return strip_tags($data['content'], '<br><em><a><p><div><strong>')
                

                  fare un fichier utilities.php oà mettre tous les fonctions et l'inclure dans index.php

                  l'appeler comme ça stripTags($data['content'])  au lieu de  strip_tags($data['content'], '<br> <em>' ecc)} -->*/