<?php $this->load->view("inc_view/inc_style"); ?>

<div class="container">
</center>
    <h3>Kullanıcı Ekleme Formu</h3>
    <br />
    <button class="btn btn-success" onclick="add_user()"><i class="glyphicon glyphicon-plus"></i> Kullanıcı Ekle</button>
    <br />
    <br />
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
            <th>ID</th>
            <th>TC</th>
            <th>Adı</th>
            <th>Soyadı</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Cinsiyeti</th>
            <th>İl</th>
            <th>Doğum Tarihi</th>
            <th>Görevi</th>
            <th>Kayıt No</th>
            <th>Kayıt Tarihi</th>
            <th>Durum</th>
            <th style="width=125px;">İşlemler</th>
        </tr>
      </thead>
      <tbody>
				<?php foreach($users as $user){?>
				     <tr>
				         <td><?php echo $user->UserId;?></td>
				         <td><?php echo $user->UserTC;?></td>
                         <td><?php echo $user->UserName;?></td>
                         <td><?php echo $user->UserSurname;?></td>
                         <td><?php echo $user->Email;?></td>
                         <td><?php echo $user->Password;?></td>
                         <td><?php echo $user->Telephone;?></td>
                         <td><?php echo $user->Gender;?></td>
                         <td><?php echo $user->CityId;?></td>
                         <td><?php echo $user->DateofBirth;?></td>
                         <td><?php echo $user->TaskId;?></td>
                         <td><?php echo $user->RecorderId;?></td>
                         <td><?php echo $user->DateofRecord;?></td>
                         <td><?php echo $user->IsAccept;?></td>

								<td>
									<button class="btn btn-info" onclick="user_show(<?php echo $user->UserId;?>)"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
									<button class="btn btn-warning" onclick="edit_user(<?php echo $user->UserId;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
									<button class="btn btn-danger" onclick="delete_user(<?php echo $user->UserId;?>)"><i class="glyphicon glyphicon-remove"></i></button>


								</td>
				      </tr>
				     <?php }?>



      </tbody>

      <tfoot>
        <tr>
            <th>ID</th>
            <th>TC</th>
            <th>Adı</th>
            <th>Soyadı</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Cinsiyeti</th>
            <th>İl</th>
            <th>Doğum Tarihi</th>
            <th>Görevi</th>
            <th>Kayıt No</th>
            <th>Kayıt Tarihi</th>
            <th>Durum</th>
          <th>İşlemler</th>
        </tr>
      </tfoot>
    </table>

  </div>

  <?php $this->load->view('inc_view/inc_script'); ?>


  <script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
    var save_method; //for save method string
    var table;


    function add_user()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_user(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('user/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="UserId"]').val(data.UserId);
            $('[name="UserTC"]').val(data.UserTC);
            $('[name="UserName"]').val(data.username);
            $('[name="UserSurname"]').val(data.usersurname);
            $('[name="Email"]').val(data.Email);
            $('[name="Password"]').val(data.Password);
            $('[name="Telephone"]').val(data.Telephone);
            $('[name="Gender"]').val(data.Gender);
            $('[name="CityId"]').val(data.CityId);
            $('[name="DateofBirth"]').val(data.DateofBirth);
            $('[name="TaskId"]').val(data.TaskId);
            $('[name="RecorderId"]').val(data.RecorderId);
            $('[name="DateofRecord"]').val(data.DateofRecord);
            $('[name="IsAccept"]').val(data.IsAccept);



            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Düzenle'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
	
	    function user_show(id)
    {
      show_method = 'show';
      

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('user/user_show/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="UserId"]');
            $('[name="UserTC"]').val(data.UserTC);
            $('[name="UserName"]').val(data.username);
            $('[name="UserSurname"]').val(data.usersurname);
            $('[name="Email"]').val(data.Email);
            $('[name="Password"]').val(data.Password);
            $('[name="Telephone"]').val(data.Telephone);
            $('[name="Gender"]').val(data.Gender);
            $('[name="CityId"]').val(data.CityId);
            $('[name="DateofBirth"]').val(data.DateofBirth);
            $('[name="TaskId"]').val(data.TaskId);
            $('[name="RecorderId"]').val(data.RecorderId);
            $('[name="DateofRecord"]').val(data.DateofRecord);
            $('[name="IsAccept"]').val(data.IsAccept);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Bilgi Görüntüleme'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }



    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('user/user_add')?>";
      }
      else
      {
        url = "<?php echo site_url('user/user_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_user(id)
    {
      if(confirm('Bu kaydı silemeye emin misiniz?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('user/user_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Kayıt silinirken hata oluştu');
            }
        });

      }
    }

  </script>

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Kullanıcı Ekle</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="UserId"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">TC No</label>
              <div class="col-md-9">
                <input name="UserTC" placeholder="TC No" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">İsim</label>
              <div class="col-md-9">
                <input name="UserName" placeholder="İsim" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Soyisim</label>
              <div class="col-md-9">
								<input name="UserSurname" placeholder="Soyisim" class="form-control" type="text">

              </div>
            </div>
						<div class="form-group">
							<label class="control-label col-md-3">Email</label>
							<div class="col-md-9">
								<input name="Email" placeholder="Email" class="form-control" type="text">

							</div>
						</div>

              <div class="form-group">
                  <label class="control-label col-md-3">Şifre</label>
                  <div class="col-md-9">
                      <input name="Password" placeholder="Şifre" class="form-control" type="text">

                  </div>
              </div>

          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Kaydet</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->


    </body>
</html>
