<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Interest $interest
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Interesses', 'url' => ['controller' => 'interests', 'action' => 'index']],
        ['title' =>'Editar']
    ]);
?>
<!-- Main content --> 
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- column -->
      <div class="col-md-10 offset-md-1">
        <!-- general form elements disabled -->
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Editar Interesse</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?= $this->Form->create($interest) ?>
                <div class="card-body">
                    <div class="form-group">
                        <?php
                            echo $this->Form->control('interesse', ['class' => 'form-control', 
                            'placeholder' => 'Interesse',
                            'label' => ['text' => 'Interesse', 'label' => 'control-label']]);
                        ?>    
                    </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?= $this->Form->button(__('Editar Interesse'),['class'=>'btn btn-primary w-15']) ?>
                </div>
            <?= $this->Form->end() ?>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->