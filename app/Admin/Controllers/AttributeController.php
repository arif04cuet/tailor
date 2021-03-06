<?php

namespace App\Admin\Controllers;

use App\Attribute;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AttributeController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {

        return Admin::content(function (Content $content) {

            $content->header('Manage Attributes');
            //$content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Attribute::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->machine_name("Machine Name");
            $grid->title("Title");
            $grid->type("Type");
            $grid->created_at();
            $grid->updated_at();

            //filter
            $grid->filter(function ($filter) {
                $filter->like('machine_name', 'Machine Name');
                $filter->between('created_at', 'Created Time')->date();
            });

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Attribute::class, function (Form $form) {

            //$form->display('id', 'ID');
            $form->text('machine_name', 'Machine Name');
            $form->text('title', 'Title');

            $types = [
                'text' => 'Text',
                'select' => 'Select'
            ];
            $form->select('type', 'Type')->options($types);
            $form->text('default_value', 'Default Value');
            $form->number('weight', 'Weight');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');

        });
    }
}
