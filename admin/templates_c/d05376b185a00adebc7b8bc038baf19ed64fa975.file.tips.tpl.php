<?php /* Smarty version Smarty-3.1.8, created on 2012-04-08 08:58:32
         compiled from "templates/tips.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6010696914f7efd571fcde2-24902082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd05376b185a00adebc7b8bc038baf19ed64fa975' => 
    array (
      0 => 'templates/tips.tpl',
      1 => 1333874089,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6010696914f7efd571fcde2-24902082',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f7efd57282be3_88600646',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7efd57282be3_88600646')) {function content_4f7efd57282be3_88600646($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Klikevent.com",'jquery'=>"true",'tips'=>true), 0);?>


<div class="section ">
    <h1> Tips </h1>
    <div class="row">
    </div>
</div>

<div class="row text-center">
    <div class="span12 ">
        <div class="tabbable ">
            <ul class="nav nav-tabs">
                <li class="active other "><a href="#umum" data-toggle="tab">Umum</a></li>
                <li class=" "><a href="#pemilik-event" data-toggle="tab">Pemilik Event</a></li>
                <li class="other "><a href="#feedback" data-toggle="tab">Feedback</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="row add-min-height add-bottom text-center">
  <div class="row">
    <div class="tab-content">

      <!-- TAB FOR umum -->
      <div class="tab-pane active" id="umum">
        <div class="span6 offset3">
          <div class="alert alert-info">
            <a class="close" data-dismiss="alert">x</a>
            <h3 class="alert-heading">Perhatian!</h3>
            Input dengan tanda * harus diisi
          </div>
          <form class="form-horizontal" action="process-tips-anon.php" method="POST">
            <fieldset>
              <div id="legend" class="">
                <legend class="">Form tips ini untuk Siapapun yang ingin memberikan tips ke KlikEvent</legend>
              </div>
              <div class="control-group">
                <label class="control-label error"  for="input01">Nama</label>
                <div class="controls">
                  <input type="text" name="nama" placeholder="" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label error"  for="input01">Email</label>
                <div class="controls">
                  <input type="text" name="email" placeholder="" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">    
                <label class="control-label">Tips *</label>
                <div class="controls">
                  <textarea class="input-xlarge" name="content" rows="10"></textarea>
                </div>
              </div>
            </fieldset> 
            <button class="btn-large btn-primary" >Submit</button>
          </form>
        </div>
      </div>

      <!-- TAB FOR umum -->
      <div class="tab-pane" id="pemilik-event">
        <div class="span6 offset3">

          <div class="alert alert-info">
            <a class="close" data-dismiss="alert">x</a>
            <h3 class="alert-heading">Perhatian!</h3>
            Input dengan tanda * harus diisi
          </div>

          <form class="form-horizontal" action="process-tips-event-owner.php" method="POST"  enctype="multipart/form-data" >
    <fieldset id="form-event-owner">
      <div id="legend" class="">
        <legend class="">Form tips ini untuk Pemilik Event yang ingin memberikan tips kepada KlikEvent</legend>
      </div>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label error" for="input01">Nama *</label>
          <div class="controls">
            <input type="text" placeholder="" name="nama" class="input-xlarge">
            
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Email *</label>
          <div class="controls">
            <input type="text" placeholder="" name="email" class="input-xlarge">
        
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Nama Event *</label>
          <div class="controls">
            <input type="text" placeholder="" name="eventTitle" class="input-xlarge">
            <p class="help-block">Maksimal 50 Karakter</p>
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Lokasi / Alamat Event *</label>
          <div class="controls">
            <input type="text" placeholder="" name="location1" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01"></label>
          <div class="controls">
            <input type="text" placeholder="" name="location2" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div><div class="control-group">     

          <!-- Select Basic -->
          <label class="control-label">Kategori *</label>     
          <div class="controls">
            <select class="input-xlarge" name="category[]">
      <option>Paid</option>
      <option>Free</option>
    </select>
      
          </div>

        </div><div class="control-group">     

          <!-- Select Basic -->
          <label class="control-label"></label>     
          <div class="controls">
            <select class="input-xlarge" name="category[]">
      <option>Day</option>
      <option>Night</option>
      <option>All Day</option>
</select>
          </div>

        </div><div class="control-group">     

          <!-- Select Basic -->
          <label class="control-label"></label>     
          <div class="controls">
            <select class="input-xlarge" name="category[]">
      <option>Art and Hobby</option>
      <option>Exhibition</option>
      <option>Education</option>
      <option>Others</option>
    </select>
          </div>

        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Tanggal *</label>
          <div class="controls">
            <input type="text" placeholder="" name="date1" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div>
        <div class="control-group">    
          <label class="control-label">Deskripsi Pendek (Max 300 kata) *</label>


          <div class="controls">
            <textarea class="input-xlarge" name="eventShortDescription" rows="10"></textarea>
          </div>
        </div>
        <div class="control-group">    
          <label class="control-label">Deskripsi Event *</label>


          <div class="controls">
            <textarea class="input-xlarge" name="eventDescription" rows="10"></textarea>
          </div>
        </div>
        <div class="control-group">    
          <label class="control-label">Foto / Poster </label>

          <!-- File Upload --> 
          <div class="controls">
            <input class="input-file" id="fileInput"  name="imgfile[]" type="file">
          </div>
        </div>
        <div class="add-bottom">
            <a onClick="javascript:addPhotoForm();">tambah foto</a>
        </div>
        
      </fieldset>
        <button class="btn-large btn-primary">Submit</button>
        
  </form>

        </div>
      </div>

      <!-- TAB FOR umum -->
      <div class="tab-pane" id="feedback">
        <div class="span6 offset3">
          <div class="alert alert-info">
            <a class="close" data-dismiss="alert">x</a>
            <h3 class="alert-heading">Perhatian!</h3>
            Input dengan tanda * harus diisi
          </div>
          <form class="form-horizontal" action="process-feedback.php" method="POST">
            <fieldset>
              <div id="legend" class="">
                <legend class="">Form ini untuk Siapapun yang ingin memberikan feedback ke KlikEvent</legend>
              </div>
              <div class="control-group">
                <label class="control-label error" for="input01">Nama</label>
                <div class="controls">
                  <input type="text" name="nama" placeholder="" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label error" for="input01">Email</label>
                <div class="controls">
                  <input type="text" name="email" placeholder="" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">    
                <label class="control-label">Feedback *</label>
                <div class="controls">
                  <textarea name="content" class="input-xlarge" rows="10"></textarea>
                </div>
              </div>
            </fieldset> 
            <button class="btn-large btn-primary" >Submit</button>
          </form>
        </div>
      </div>

    </div>
  </div> 
</div>

<script type="text/javascript">

function addPhotoForm()
{

  target = document.getElementById('form-event-owner').innerHTML;
  var newDiv = document.createElement('div');
  newDiv.className="control-group";
  newDiv.innerHTML = "<label class='control-label'>Foto Tambahan</label><div class='controls'><input class='input-file' id='fileInput'  name='imgfile[]' type='file'></div>";

  document.getElementById('form-event-owner').appendChild(newDiv);

}

</script>


<div class="clear-float"></div>
<hr/>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>