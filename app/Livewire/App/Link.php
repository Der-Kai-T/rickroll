<?php

namespace App\Livewire\App;

use App\Livewire\Forms\App\LinkForm;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Link extends Component
{
    public $links;
    public LinkForm $form;

    public function mount()
    {
        $this->links = \App\Models\Link::all();
    }
    public function render()
    {
        return view('livewire.app.link', [
            'links' => $this->links
        ]);
    }

    public function load($linkId){
        if($this->form->loadLink($linkId)){
            //Toaster::success("ok");
        }else{
            Toaster::error("Error Loading Link");
        }
    }

    public function clear(){
        $this->form->clearLink();
    }

    public function create(){
        if($this->form->store()){
            Toaster::success("saved");
            $this->links = \App\Models\Link::all();
        }else{
            Toaster::error("Error Saving Link");
        }
    }

    public function update(){
        if($this->form->update()){
            Toaster::success("saved");
            $this->links = \App\Models\Link::all();
        }else{
            Toaster::error("Error Saving Link");
        }
    }

    public function delete(){
        if($this->form->delete()){
            Toaster::success("deleted");
            $this->links = \App\Models\Link::all();
        }else{
            Toaster::error("Error deleting Link");
        }
    }

}
