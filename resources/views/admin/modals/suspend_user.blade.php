{{-- Suspend Student Modal --}}
<div class="modal fade" id="modal-suspend-{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-popin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Suspend {{$info->name}}.</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <form action="/suspend_user/{{$info->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="block-content">
                        <p>By suspending the following user, they will not have access to their account until the action is reversed</p>
                        <p>The user <b>"{{$info->name}}"</b> will receive an email notifying them of the following action.</p>
                        @if($info->role == "teacher") <p class="text-danger">The users respective classes will be suspended too. </p>@endif
                        <p>Do you wish to continue?</p>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-alt-danger">
                                <i class="fa fa-trash"></i> Suspend
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Suspend Student Modal --}}
