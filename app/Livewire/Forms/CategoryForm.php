<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CategoryForm extends Form
{
    public ?Category $category;

    #[Locked]
    public $id = '';

    #[Rule('required|min:3')]
    public $name = '';

    #[Rule('required|in:income,expense')]
    public $type = 'income';

    #[Rule('nullable')]
    public $icon = 'fa fa-link';

    public function store()
    {
        $this->validate();

        Category::create($this->except(['id']));
    }

    public function setCategory($category)
    {
        $this->category = $category;
        $this->id = $category->id;
        $this->name = $category->name;
        $this->type = $category->type;
        $this->icon = $category->icon;
    }

    public function update()
    {
        $this->validate();

        $this->category->update($this->all());
    }
}
