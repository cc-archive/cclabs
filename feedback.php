<?php
include_once "_header.php";
echo('<h3 align="center">');

$ref = $_SERVER["HTTP_REFERER"];
if (strpos($ref,'http://labs.creativecommons.org/') === 0
    || strpos($ref,'http://labt.creativecommons.org/') === 0) {

  $email = $HTTP_POST_VARS[email];
  $mailto = "labs@creativecommons.org";
  $mailsubj = "Labs Feedback";
  $mailhead = "From: $email\n";
  reset ($HTTP_POST_VARS);
  $mailbody = "Submitted from " . $ref . "\n";
  while (list ($key, $val) = each ($HTTP_POST_VARS)) { $mailbody .= "$key : $val\n"; }
  if (!eregi("\n",$HTTP_POST_VARS[email])) { mail($mailto, $mailsubj, $mailbody, $mailhead); }
 echo('Thanks for your feedback!');
} else {
 echo('Thranks for the feedback!');
}
echo('</h3>');

include_once "_footer.php";
?>
