<?php

namespace App\Livewire\Forms\App;

use App\Models\Link;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LinkForm extends Form
{
    #[Validate(['required'])]
    public $name = '';

    #[Validate(['required'])]
    public $url = '';

    #[Validate(['required', 'integer'])]
    public $weight = '';

    #[Validate(['nullable', 'date'])]
    public $start = '';

    #[Validate(['nullable', 'date'])]
    public $end = '';

    public $link;

    public function loadLink($linkId){
        $link = \App\Models\Link::find($linkId);
        if(is_null($link)){
            return false;
        }

        $this->link = $link;
        $this->name = $link->name;
        $this->url = $link->url;
        $this->weight = $link->weight;
        $this->start = $link->start->format('Y-m-d H:i');
        $this->end = $link->end->format('Y-m-d H:i');
        return true;
    }

    public function clearLink(){
        $this->name = '';
        $this->url = '';
        $this->weight = '';
        $this->start = '';
        $this->end = '';
        $this->link = null;
    }

    public function store(){
        $this->validate();
        return Link::create($this->except("link"));
    }

    public function update(){
        $this->validate();
       return $this->link->update($this->except("link"));
    }
    public function delete(){
        return $this->link->delete();
    }
}
