{{-- Suspend Student Modal --}}
<div class="modal fade" id="modal-restore-{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-popin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Restore {{$info->name}}.</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <form action="/restore_user/{{$info->id}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="block-content">
                        <p>The user <b>"{{$info->name}}'s"</b> account will be restored and they will receive an email notifying them of the following action.</p>
                        @if($info->role == "teacher") <p class="text-success">The users respective classes will be restored too. </p>@endif

                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-alt-success">
                                <i class="fa fa-check"></i> Restore
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Suspend Student Modal --}}
