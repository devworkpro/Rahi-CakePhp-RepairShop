<?php echo $this->Flash->render('positive'); ?>


<link href="<?php echo $this->webroot.'Plugins/summernote-master/summernote.css'?>" rel="stylesheet" type="text/css"/>
<script src="<?php echo $this->webroot.'Plugins/summernote-master/summernote.min.js'?>"></script>

<div class="warper container-fluid" style="margin-bottom:100px;">
          
    <div class="page-header"><h1>Editing Wiki Page
    <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Wikis', 'action' => 'wikilist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></h1></div>
            
            
        <div class="row">
            <div class="col-md-1">
            
            </div>
            <div class="col-md-10">
              <div class="panel panel-default">
                    <div class="panel-heading">Editing Wiki</div>
                    <div class="panel-body"><br>
                <?php echo $this->Form->create('Wiki',array('controller'=>'Wikis','action'=>'Wikiedit','class'=>"validator-form",'id'=>"wizardForm")); ?>
          
                <div class="row">                 
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <?php echo $this->Form->input('Wiki.name', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Name')); ?>
                        
              </div>
            </div>
          </div>
          <div class="row">                 
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">          
              <?php echo $this->Form->input('Wiki.body', array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'Body','id'=>'summernote')); ?>
                
              </div>
            </div>
          </div>


          

          <div class="row">
              <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                      <?php echo $this->Form->button('Update Wiki Page', array('class' => 'btn btn-success pull-left save')); ?>
                  </div>
                  </div>
          </div>

              <?php echo $this->Form->end(); ?>
          </div>
        </div>
      </div>

      <div class="col-md-1">
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#summernote').summernote({
      height: 350,
    });
});
</script>
