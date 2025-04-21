<?php
return[
    'designation_fields'=>array('id','designation','created_at','updated_at'),
    'users_fields'=>array('id','user_name','email','phone_number','type','designation_id','status','image','password','remember_token','created_at','updated_at'),
     'priority'=> array('3'=>'low','2'=>'medium','1'=>'high'),
     'task_fields'=>array('id','title','assigned_to','priority','deadline','status','description','attachments','created_at','updated_at'),
     'status'=> array('2'=>'completed','1'=>'pending'),
];