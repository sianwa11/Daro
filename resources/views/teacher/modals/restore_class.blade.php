<!-- Slide Up Modal -->
<div class="modal fade" id="modal-restore-{{$classes->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideup" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Restore {{$classes->class_name}}? </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <form action="virtual_class/{{$classes->id}}/restore" method="post">
                    @csrf
                    <div class="block-content">
                        <p>You and all participants will be able to view this class</p>
                        <p>This class will appear in the "My classes" page</p>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-alt-success">
                                <i class="fa fa-undo"></i> Restore
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Slide Up Modal -->
