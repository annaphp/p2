<?php
//generates password by calling other helper fuctions
function generate_password($words_num,$spc_char,$numbers){
  $result_pswrd = '';
  if($spc_char == 'on' && $numbers == 'on'){
    $result_pswrd = pick_words($words_num).pick_spec_char(1).pick_numbr(1);
  }elseif($spc_char == 'on'){
    $result_pswrd = pick_words($words_num).pick_spec_char(1);
  }elseif ($numbers == 'on') {
    $result_pswrd = pick_words($words_num).pick_numbr(1);
  }else {
    $result_pswrd = pick_words($words_num);
  }
  return $result_pswrd;
}

#### Helper Functions ####
//load_array reads text file content and loads it into an array
function load_array ($file_name){
  $words_ar = array();
  $content = file_get_contents($file_name);
  $words_ar = explode("\n", $content);
  return $words_ar;
}
//pick_spec_char returns a randomly picked special character
function pick_spec_char($char_num){
  $spec_char_ar = array('~','!','@','#','$','%','^','&','*','(',')','+','=');
  $rand_char = $spec_char_ar[array_rand($spec_char_ar,$char_num)];
  return $rand_char;
}
//pick_numbr returns a randomly picked number
function pick_numbr($num){
  $numbers_ar = array('1','2','3','4','5','6','7','8','9','0');
  $rand_num = $numbers_ar[array_rand($numbers_ar,$num)];
  return $rand_num;

}

//pick_words returns randomly picked words
function pick_words($words_num){
  $words_ar = load_array("words.txt");
  $random_words=array();
  $result_str = '';
  if($words_num == NULL || $words_num == '0'){
    $result_str = '';
  }
  elseif (intval($words_num)==0) {
    $result_str = '';
  }
  else {
    $random_words = array_rand($words_ar, intval($words_num));
    if(sizeof($random_words)== 1){
      $result_str = $words_ar[$random_words];
    }else {
      $result_str = $words_ar[$random_words[0]];
      for($i = 1; $i < count($random_words); $i++){
        $result_str = $words_ar[$random_words[$i]].'-'.$result_str;
      }
    }
  }
  return $result_str;
}
?>
