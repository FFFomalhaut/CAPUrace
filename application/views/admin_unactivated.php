<div class="indcontainer">
    <h3>待审核&审核未通过高校列表</h3>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>学校名称</th>
            <th>协会名称</th>
            <th>所在地区</th>
            <th>邮寄地址</th>
            <th>邮政编码</th>
            <th>领队姓名</th>
            <th>电子邮箱</th>
            <th>手机号</th>
            <th>审核状态</th>
            <th>驳回原因（不驳回则不填）</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($unactivated as $user): ?>
            <tr class="school">
                <td class="school_id"><?=$user['id']?></td>
                <td class="school_name"><?=$user['school']?></td>
                <td><?=$user['association_name']?></td>
                <td><?=$GLOBALS['PROVINCES_SHORT'][$user['province']]?></td>
                <td><?=$user['address']?></td>
                <td><?=$user['zipcode']?></td>
                <td><?=$user['leader']?></td>
                <td class="school_mail"><?=$user['mail']?></td>
                <td><?=$user['tel']?></td>
                <td><?=$GLOBALS['REJECTED'][$user['rejected']]?></td>
                <td class="reason">
                <input type="test" id="reason" placeholder="数据库只预留了30字空间！" value="<?=$user['reason']?>">
                </td>
                <td>
                <?php if (! $user['rejected']): ?>
                    <button class="btn-xs btn-danger btn-reject">审核驳回</button>
                    <button class="btn-xs btn-success btn-pass">审核通过</button>
                    <!-- <button class="btn-xs btn-danger btn-delete">删除用户</button> -->
                <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    // $(".btn-delete").click(function () {
    //   var id = $(this).closest(".school").find(".school_id").text();
    //   var school = $(this).closest(".school").find(".school_name").text();
    //   var data = {
    //       id: parseInt(id),
    //       operation: 'delete',
    //   };
    //   if (confirm('确认删除' + school + '的注册信息？此操作将不可恢复！')) {
    //       $.post("<?//=site_url('admin/unactivated')?>", data, function (response) { });
    //       window.location.reload();
    //   }
    // });
    $(".btn-reject").click(function () {
      var id = $(this).closest(".school").find(".school_id").text();
      var school = $(this).closest(".school").find(".school_name").text();
      var reason = $(this).closest(".school").find(".reason").children().val();
      if (reason.length >= 30) {
        alert('请精简原因至30字以内。');
        return;
      }
      var data = {
          id: parseInt(id),
          reason: reason,
          operation: 'reject',
      };
      if (confirm('确认驳回' + school + '的注册信息？')) {
          $.post("<?=site_url('admin/unactivated')?>", data, function (response) { });
          window.location.reload();
      }
    });
    $(".btn-pass").click(function () {
      var id = $(this).closest(".school").find(".school_id").text();
      var school = $(this).closest(".school").find(".school_name").text();
      var mail = $(this).closest(".school").find(".school_mail").text();
      var data = {
          id: parseInt(id),
          mail: mail,
          operation: 'pass',
      };
      if (confirm('确认通过' + school + '的注册信息？此操作不可恢复！')) {
          $.post("<?=site_url('admin/unactivated')?>", data, function (response) { });
          window.location.reload();
      }
    })
</script>
