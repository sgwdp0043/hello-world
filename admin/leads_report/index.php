<!DOCTYPE html>
<html>
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
        <title>Otonomic User Submissions</title>
        <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables-responsive.css">
        <link rel="stylesheet" type="text/css" href="media/css/styles.css">
        <link rel="stylesheet" type="text/css" href="media/css/dataTables.tableTools.min.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.responsive.js"></script>
        <script type="text/javascript" language="javascript" src="media/js/dataTables.tableTools.min.js"></script>
        <script type="text/javascript" src="media/js/custom.js" language="javascript" class="init"></script>
        <style type="text/css">
			body {
				font-family: arial, sans-serif;
				font-size: 12px;
			}
		</style>
        </head>
        <body class="dt-example">
        <div class="parentContainer">
          <h2>User Submissions</h2>
          <section>
            <table id="data-user-submissions" class="display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="all">Site ID</th>
                  <th>User ID</th>
                  <th class="all">Site Name</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Category</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>IP</th>
                </tr>
              </thead>
              <tbody>
                <?php
				include('model/db.php');
				$db = new Processdb();
				$results = $db->select("otonomic_user_submission",array());
				if(count($results['data']) > 0)
				{
					foreach($results['data'] as $result)
					{
						$meta_value = $result['meta_value'];
						$meta_obj = json_decode($meta_value);
						$meta_arr = (array)$meta_obj;
				?>
                <tr>
                  <td><?php echo $result['site_id']; ?></td>
                  <td><?php echo $result['user_id']; ?></td>
                  <td><?php if(!empty($meta_arr['site_name'])){echo $meta_arr['site_name'];} ?></td>
                  <td><?php if(!empty($meta_arr['user'])){echo $meta_arr['user'];} ?></td>
                  <td><?php if(!empty($meta_arr['email'])){echo $meta_arr['email'];} ?></td>
                  <td><?php if(!empty($meta_arr['category'])){echo $meta_arr['category'];} ?></td>
                  <td><?php if(!empty($meta_arr['phone'])){echo $meta_arr['phone'];} ?></td>
                  <td><?php if(!empty($meta_arr['address'])){echo $meta_arr['address'];} ?></td>
                  <td><?php if(!empty($meta_arr['ip'])){echo $meta_arr['ip'];} ?></td>
                </tr>
                <?php
					}
				}
				?>
              </tbody>
            </table>
          </section>
        </div>
</body>
</html>
