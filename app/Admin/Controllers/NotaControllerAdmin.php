<?php

namespace App\Admin\Controllers;

use App\Models\Nota;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NotaControllerAdmin extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Nota';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Nota());

        $grid->column('id', __('Id'));
        $grid->column('aluno.nome', __('Estudante'));
        $grid->column('disciplina.nome', __('Disciplina'));
        $grid->column('trimestre', __('Trimestre'));
        $grid->column('mac', __('Mac'));
        $grid->column('pp', __('Pp'));
        $grid->column('pt', __('Pt'));
        $grid->column('mt', __('Mt'));
        $grid->column('mt1', __('Mt1'));
        $grid->column('mt2', __('Mt2'));
        $grid->column('mt3', __('Mt3'));
        $grid->column('mfd', __('Mfd'));
        $grid->column('faltas', __('Faltas'));
        // $grid->column('created_at', __('Criado em'));
        // $grid->column('updated_at', __('Actualizado em'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Nota::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('aluno.nome', __('Estudante'));
        $show->field('disciplina.nome', __('Disciplina'));
        $show->field('trimestre', __('Trimestre'));
        $show->field('mac', __('Mac'));
        $show->field('pp', __('Pp'));
        $show->field('pt', __('Pt'));
        $show->field('mt', __('Mt'));
        $show->field('mt1', __('Mt1'));
        $show->field('mt2', __('Mt2'));
        $show->field('mt3', __('Mt3'));
        $show->field('mfd', __('Mfd'));
        $show->field('faltas', __('Faltas'));
        $show->field('created_at', __('Criado em'));
        $show->field('updated_at', __('Actualizado em'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Nota());


        // Obtém os Student 
        $estudante = \App\Models\Student::pluck('nome', 'IdAluno');
        $form->select('AlunoId', __('Estudante'))->options($estudante)->required();


        // Obtém os disciplinas
        $disciplina = \App\Models\Disciplina::pluck('nome', 'id');
        $form->select('disciplinaId', __('Disciplina'))->options($disciplina)->required();

        $form->select('trimestre', __('Trimestre'))->options([
            '1' => '1º Trimestre',
            '2' => '2º Trimestre',
            '3' => '3º Trimestre',
        ]);
        $form->number('mac', __('Mac'));
        $form->number('pp', __('Pp'));
        $form->number('pt', __('Pt'));
        $form->number('mt', __('Mt'));
        $form->decimal('mt1', __('Mt1'));
        $form->decimal('mt2', __('Mt2'));
        $form->decimal('mt3', __('Mt3'));
        $form->decimal('mfd', __('Mfd'));
        $form->number('faltas', __('Faltas'));





        return $form;
    }
}
