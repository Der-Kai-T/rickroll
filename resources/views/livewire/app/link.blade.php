<div>
    <?php
        if(!isset($links)){
            $links = \App\Models\Link::all(); //code com
        }
        ?>
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2 float-end mt-1 mr-1" data-bs-toggle="modal" data-bs-target="#createLinkModal" wire:click="clear">
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
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($links as $link)
            <tr
                wire:click="load('{{ $link->id }}')"
                data-bs-toggle="modal"
                data-bs-target="#updateLinkModal"
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
                <td>
                    <span
                        class="btn btn-sm btn-danger"
                        wire:click="load('{{ $link->id }}')"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteLinkModal"
                    >del</span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



    <!-- Modal -->
    <x-app.helper.modal
     name="createLinkModal"
     headline="create new Link"
     submit-function="create"
    >
      <x-app.helper.form.input model="name"/>
      <x-app.helper.form.input model="url"/>
      <x-app.helper.form.input model="weight" type="numeric"/>
      <x-app.helper.form.input model="start" type="datetime-local" optional/>
      <x-app.helper.form.input model="end" type="datetime-local" optional/>
    </x-app.helper.modal>

    <x-app.helper.modal
        name="updateLinkModal"
        headline="update Link"
        submit-function="update"
    >
        <x-app.helper.form.input model="name"/>
        <x-app.helper.form.input model="url"/>
        <x-app.helper.form.input model="weight" type="numeric"/>
        <x-app.helper.form.input model="start" type="datetime-local" optional/>
        <x-app.helper.form.input model="end" type="datetime-local" optional/>
    </x-app.helper.modal>

    <x-app.helper.modal
        name="deleteLinkModal"
        headline="Confirm deletion"
        submit-function="delete"
        submit-label="Delete"
        submit-class="btn-danger"
    >
        Are you sure to delete that?
    </x-app.helper.modal>

</div>
