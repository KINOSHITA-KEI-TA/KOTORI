<?php
/**
 * XSS対策：エスケープ処理
 * 
 * @param string $str 対象の文字列
 * @return string 処理された文字列
 */
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}