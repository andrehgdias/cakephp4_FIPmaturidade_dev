<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Idea[]|\Cake\Collection\CollectionInterface $ideas
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Ideias', 'url' => ['controller' => 'ideas', 'action' => 'index']]
    ]);
?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <?= $this->Html->link("Nova Ideia", ['action' => 'add'], ['class' => 'btn btn-sm btn-primary float-right']) ?>
                <h2 class="card-title">Lista de Ideias</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th><?= $this->Paginator->sort('titulo') ?></th>
                <th><?= $this->Paginator->sort('user.nome_completo') ?></th>               
                <th class="actions"><?= 'Ações' ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ideas as $idea): ?>
                <tr>
                    <td><?= h($idea->titulo) ?></td>
                    <td><?= h($idea->owner->nome_completo) ?></td>
                    <td><?= $this->Html->link('Avaliadores', ['action' => 'vincular_avaliadores', $idea->id], ['class' => 'btn btn-outline-primary btn-sm', 'escape' => false]) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="far fa-eye"></i> visualizar', ['action' => 'view', $idea->id], ['class' => 'btn btn-info btn-sm', 'escape' => false]) ?>
                        <?= $this->Html->link('<i class="far fa-edit"></i> editar', ['action' => 'edit', $idea->id], ['class' => 'btn btn-warning btn-sm', 'escape' => false]) ?>
                        <?= $this->Form->postLink('<i class="far fa-trash-alt"></i> excluir', ['action' => 'delete', $idea->id], ['confirm' => __("Are you sure you want to delete '".$idea->titulo."'?"), 'class' => 'btn btn-danger btn-sm', 'escape' => false]) ?>
                        <?= $this->Html->link('<i class="far fa-user"></i> avaliadores', ['controller' => 'Ideas', 'action' => 'vincularAvaliadores', $idea->id], ['class' => 'btn btn-primary btn-sm', 'escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                <th><?= $this->Paginator->sort('titulo') ?></th>
                <th><?= $this->Paginator->sort('link_video') ?></th>  
                <th><?= $this->Paginator->sort('autor_nome') ?></th>
                <th class="actions"><?= 'Ações' ?></th>
                </tr>
                </tfoot>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->        
        <?= $this->element('pagination') ?>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->



