{{-- Delete Modal --}}
<div class="modal fade" id="modal-delete-{{$classes->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideup" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Delete {{$classes->class_name}} ?</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <form action="virtual_class/{{$classes->id}}/delete" method="post">
                    @csrf
                    <div class="block-content">
                        <p class="text-black">You will no longer have access to the content you posted in this class</p>
                        <p class="text-danger">This action cannot be undone</p>
                        <p class="text-danger">Do you wish to continue?</p>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-alt-danger">
                                <i class="fa fa-trash"></i> <b class="text-danger">Delete</b>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--End Delete Modal --}}
