<?php echo $this->Flash->render('positive'); ?>

<div class="warper container-fluid" style="margin-bottom:100px;">
          
    <div class="page-header"><h1>Edit Menu
    <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Menus', 'action' => 'menulist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></h1></div>
            
            
    <div class="row">
      <div class="col-md-1">
      </div>
      <div class="col-md-10">
        <div class="panel panel-default">
          <div class="panel-heading">Edit Menu</div>
          <div class="panel-body"><br>
            <?php echo $this->Form->create('Menu',array('controller'=>'Menus','action'=>'menuedit','class'=>"validator-form",'id'=>"wizardForm")); ?>
                
            <div class="row">                 
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <?php echo $this->Form->input('Menu.name', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Name')); ?>
                 
                </div>
              </div>
            </div>
            <div class="row">                 
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <?php echo $this->Form->input('Menu.menu_order', array('type'=>'number','class'=>'form-control','required'=>'required','label'=>'Order')); ?>
                 
                </div>
              </div>
            </div>


            <div class="row">                 
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <?php echo $this->Form->input('Menu.link', array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'Link')); ?>
                 
                </div>
              </div>
            </div>

            <div class="row">                 
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <?php echo $this->Form->input('Menu.icon', array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'Icon','placeholder'=>'fa fa-user')); ?>
                 
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <?php echo $this->Form->button('Update Menu', array('class' => 'btn btn-success pull-left')); ?>
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

