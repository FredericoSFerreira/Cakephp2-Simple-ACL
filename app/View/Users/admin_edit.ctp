<?php
if(empty($id)){
include_once('admin_index.ctp');
 }else{ 
include_once('admin_add.ctp');

 } ?>

 <script type="text/javascript">
    Controllers.push("Users.edit");
</script>