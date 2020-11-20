<div class="modal fade" id="modal-joinclass" tabindex="-1" role="dialog" aria-labelledby="modal-joinclass" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Join {{$class_preview->class_name}}</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">

                    <p>You can copy the class code and share with anyone who wishes to join the class</p>
                    <form action="/join_class/{{$class_preview->id}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="block block-themed">
                                <div class="block-content">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <label>Class code</label>
                                                <input type="text" class="form-control" name="class_code" value="{{$class_preview->class_code}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-alt-success">
                                <i class="fa fa-check"></i> Confirm
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
