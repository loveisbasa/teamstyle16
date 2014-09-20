<?php
//require 'application/libs/Session.php';
// get the feedback (they are arrays, to make multiple positive/negative messages possible)
$feedback_positive = Session::get('feedback_positive');
$feedback_negative = Session::get('feedback_negative');
//$row = Session::get('row_count');

//echo '<br/>'.(int)$row.'COUNTED<br/>';

// echo out positive messages
if (isset($feedback_positive)) {
    foreach ($feedback_positive as $feedback) {
        echo '<div class="alert alert-success role="alert">'.$feedback.'</div>';
    }
}

// echo out negative messages
if (isset($feedback_negative)) {
    foreach ($feedback_negative as $feedback) {
        echo '<div class="alert alert-danger" role="alert">'.$feedback.'</div>';
    }
}

