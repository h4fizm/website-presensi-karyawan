<?php

$ci = &get_instance();

function getInitial($name)
{
  if (!isset($name)) {
    return "HK";
  }

  $str_arr = explode(' ', $name);
  $count = str_word_count($name);

  if ($count == 1) {
    return strtoupper(substr($name, 0, 2));
  } else {
    return strtoupper(substr($str_arr[0], 0, 1) . substr($str_arr[1], 0, 1));
  }
}
function active_page($page, $class)
{
  $_this = &get_instance();
  if ($page == $_this->uri->segment(1)) {
    return $class;
  }
}
function is_active_page($page, $class)
{
  $_this = &get_instance();
  if ($page == $_this->uri->segment(1) || $page == $_this->uri->segment(2)) {
    return $class;
  }
}