<?php /* Smarty version Smarty-3.1.8, created on 2012-04-01 15:38:21
         compiled from "templates/tips.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20829035274f753f01ae6334-27047968%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd05376b185a00adebc7b8bc038baf19ed64fa975' => 
    array (
      0 => 'templates/tips.tpl',
      1 => 1333270291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20829035274f753f01ae6334-27047968',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f753f01b69620_56926422',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f753f01b69620_56926422')) {function content_4f753f01b69620_56926422($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Klikevent.com",'jquery'=>"true",'tips'=>true), 0);?>


<div class="row">
<div class="span6 offset3">

<div class="alert alert-info">
    <a class="close" data-dismiss="alert">x</a>
    <h3 class="alert-heading">Perhatian!</h3>
    Semua input harus di isi untuk dapat di proses
</div>
  <form class="form-horizontal">
    <fieldset>
      <div id="legend" class="">
        <legend class="">Enter Your Tips!</legend>
      </div>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label error" for="input01">Nama</label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
     
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Email</label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
        
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Nama Event</label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
            <p class="help-block">Maksimal 50 Karakter</p>
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Lokasi / Alamat</label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01"></label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01"></label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div><div class="control-group">     

          <!-- Select Basic -->
          <label class="control-label">Kategori</label>     
          <div class="controls">
            <select class="input-xlarge">
      <option>Enter</option>
      <option>Your</option>
      <option>Options</option>
      <option>Here!</option></select>
          </div>

        </div><div class="control-group">     

          <!-- Select Basic -->
          <label class="control-label"></label>     
          <div class="controls">
            <select class="input-xlarge">
      <option>Enter</option>
      <option>Your</option>
      <option>Options</option>
      <option>Here!</option></select>
          </div>

        </div><div class="control-group">     

          <!-- Select Basic -->
          <label class="control-label"></label>     
          <div class="controls">
            <select class="input-xlarge">
      <option>Enter</option>
      <option>Your</option>
      <option>Options</option>
      <option>Here!</option></select>
          </div>

        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Tanggal</label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div><div class="control-group">    
          <label class="control-label">Foto / Poster</label>

          <!-- File Upload --> 
          <div class="controls">
            <input class="input-file" id="fileInput" type="file">
          </div>
        </div>
        <div class="control-group">    
          <label class="control-label">Deskripsi Event</label>


          <div class="controls">
            <textarea class="input-xlarge" rows="10"></textarea>
          </div>
        </div>

      </fieldset>
        <button class="btn-large btn-primary">Submit</button>
        
  </form>
</div>
</div>
<div class="clear-float"></dov>
<hr/>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>