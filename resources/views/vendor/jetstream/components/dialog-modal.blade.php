@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ $title }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
<<<<<<< HEAD
           
        </div>
        <div class="modal-footer bg-light">
            {{ $footer}}
=======
            {{ $content }}
        </div>
        <div class="modal-footer bg-light">
            {{ $footer }}
>>>>>>> parent of 91d6fff (Merge commit '00ffa3b580c11166d0a21db33b579ab2aab36cb5' into localmarck)
        </div>
    </div>
</x-jet-modal>
