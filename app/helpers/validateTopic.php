
<?php
function validateTopic($topic)
{
    $errors = array();

    if (empty($topic['name'])) {
        array_push($errors, 'Name is Required');
    }
   
   // $existingTopic = selectOne('topics', ['name' => $topic['name']]);
    //if ($existingTopic) {
       // array_push($errors, 'Name Already Exists');
   // }


   $existingTopic = selectOne('topics', ['name' => $topic['name']]);
   if ($existingTopic) {
       if (isset($topic['update-topic']) && $existingTopic['id'] != $topic['id']) {
            array_push($errors, 'Name Already Exists');
       }

       if (isset($topic['add-topic'])) {
            array_push($errors, 'Name Already Exists');
       }
       
       }
  
    return $errors;
}
