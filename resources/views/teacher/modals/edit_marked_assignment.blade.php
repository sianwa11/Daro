<div class="modal fade" id="edit_marks-{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Edit {{$student->name}}'s submission</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <p class="text-black">Edit <strong>{{$student->name}}'s </strong> submission, they will be notified once you do so</p>

                    <form action="/student/{{$student->id}}/assignment/{{$assignment->id}}/" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        <input type="number" step="any" class="form-control @error('mark') is-invalid @enderror"
                                               name="mark" value="{{old('mark')}}" placeholder="0.0">
                                    </div>
                                </div>
                                @error('mark')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-alt-primary">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
