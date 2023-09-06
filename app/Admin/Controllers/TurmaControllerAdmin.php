<?php

namespace App\Admin\Controllers;

use App\Models\Turma;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TurmaControllerAdmin extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Turma';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Turma());

        $grid->column('id', __('Id'));
        $grid->column('nome', __('Nome'));
        $grid->column('professor.nome', __('Direitor De Turma'));
        $grid->column('created_at', __('Criado em'));
        $grid->column('updated_at', __('Actualizado em'));

        // Aplique o filtro personalizado
        $grid->filter(function ($filter) {
            $filter->like('nome', 'Nome');
            $filter->like('professor.nome', 'Direitor de Turma');
        });

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
        $show = new Show(Turma::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nome', __('Nome'));
        $show->field('professor.nome', __('Diretor De Turma'));
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
        $form = new Form(new Turma());

        $form->text('nome', __('Nome'));
        // $form->number('professorId', __('Direitor De Turma'));


        // 
        $professor = \App\Models\Professor::pluck('nome', 'idProfessor');
        $form->select('professorId', __('Direitor De Turma'))->options($professor)->required();

        return $form;
    }
}
