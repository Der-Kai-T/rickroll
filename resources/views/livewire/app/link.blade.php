<div>
    <?php
        if(!isset($links)){
            $links = \App\Models\Link::all(); //code com
        }
        ?>
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2 float-end mt-1 mr-1" wire:click="clear">
        new Link
    </button>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>URL</th>
            <th>Weight</th>
            <th>Available from</th>
            <th>Available till</th>
        </tr>
        </thead>
        <tbody>
        @foreach($links->sortBy("name") as $link)
            <tr
                wire:click="load('{{ $link->id }}')"
            >
                <td>
                   {{ $link->name}}
                </td>
                <td>{{ $link->url }}</td>
                <td>{{ $link->weight}}</td>
                <td>
                    @if(!is_null($link->start))
                    {{ $link->start->format("d.m.Y H:i") }}
                    @endif
                </td>
                <td>
                    @if(!is_null($link->end))
                    {{ $link->end->format("d.m.Y H:i") }}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

<div>
<div class="p-2">
    <div class="card">
        <div class="card-header">
            create / update
        </div>
        <div class="card-body">
            <x-app.helper.form.input model="name"/>
            <x-app.helper.form.input model="url"/>
            <x-app.helper.form.input model="weight" type="numeric"/>
            <x-app.helper.form.input model="start" type="datetime-local" optional/>
            <x-app.helper.form.input model="end" type="datetime-local" optional/>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="create">Create new</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="update">Update</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" wire:click="delete">Delete</button>

        </div>
    </div>
</div>

</div>
</div>
