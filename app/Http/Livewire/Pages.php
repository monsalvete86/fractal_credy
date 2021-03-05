<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Pages extends Component
{
    public $modalFormVisible = false;
    public $modelId;
    public $slug;
    public $title;
    public $content;

    /**
     * The validation rules
     * 
     * @return void
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages', 'slug')],
            'content' => 'required',
        ];
    }

    /**
     * Runs everytime the title
     * variable is updated.
     * 
     * @param mixed $value
     * @return void
     */

    public function updatedTitle($value)
    {
        $this->generateSlug($value);
    }
    /**
     * The create function.
     * 
     * @return void
     */
    public function create()
    {
        $this->validate();
        page::created($this->modelData());
        $this->modalFormVisible = false;
        $this->resetVars();
    }

    /**
     * The read funtion.
     * 
     * @return void
     */
    public function read()
    {
        return Page::paginate(5);
    }

    public function update()
    {
        dd("Updating...");
    }

    /**
     * shows the form modal
     * of the create fuction.
     * 
     * @return void
     */
    public function createShowModal()
    {
        $this->resetVars();
        $this->modalFormVisible = true;
    }

    /**
     * Shows the form model
     * in update mode.
     * 
     * @param mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }

    /**
     * Loads the model data
     * of this component.
     * 
     * @return void
     */
    public function loadModel()
    {
        $data = Page::find($this->modelId);
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->content = $data->content;
    }

    /**
     * The data for the model mapped
     * in this component.
     * 
     * @return void
     */
    public function modelData()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
        ];
    }

    /**
     * Resets all the variables
     * to null.
     * 
     * @return void
     */
    public function resetVars()
    {
        $this->modelId = null;
        $this->title = null;
        $this->slug = null;
        $this->content = null;
    }

    /**
     * generate a url slug 
     * base on the title. 
     * 
     * @param mixed $value
     * @return void
     */
    private function generateSlug($value)
    {
        $process1 = str_replace('', '-', $value);
        $process2 = strtolower($process1);
        $this->slug = $process2;
    }

    /**
     * the livewire render fuction.
     * 
     * @return void
     */
    public function render()
    {
        return view('livewire.pages', [
            'data' => $this->read(),
        ]);
    }
}
