<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>现金贷后台管理系统</title>
</head>
<body>
<form action="<?php echo site_url('authority/update');?>" method="post">
  <table border="0" align="center">
    <input type="hidden" name="id" value="<?php echo $current_user['id'];?>" />
    <tr>
      <td>用户名：</td>
      <td><input type="text" name="adm_username" value="<?php echo $current_user['adm_username']; ?>"></td>
    </tr>
    <tr>
      <td>密码：</td>
      <td><input type="text" name="adm_password" value="<?php echo $current_user['adm_password']; ?>" /></td>
    </tr>
    <tr>
      <td>所属角色</td>
      <td>
        <select name="role_name">
          <option value="">请选择</option>
          <?php 
          if(!empty($all_roles)){
            foreach ($all_roles as $k => $v) {
          ?>
          <option value="<?php echo $v['id'];?>" <?php if($current_user['role_id'] == $v['id']){?> selected <?php } ?>><?php echo $v['role_name'];?></option>
          <?php
            }
          }?>
        </select>
      </td>
    </tr>
  </table>

  <table align="center">  
    <tr>  
      <td><input type="submit" value="确定修改" /></td>  
    </tr>  
  </table>
</form>
</body>
</html>