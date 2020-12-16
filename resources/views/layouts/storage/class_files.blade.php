{{-- Loops through the public folder to get the size of all files stored in a class --}}
    @forelse(\Illuminate\Support\Facades\Storage::disk('public')->allFiles('class-'.$class->id) as $key => $dir)
        <div class="d-none">{{$sum += \Illuminate\Support\Facades\Storage::disk('public')->size($dir)}}</div>
    @empty
    @endforelse
    <div class="js-pie-chart pie-chart" data-percent="{{($sum/1000)/10}}" data-line-width="2" data-size="100" data-bar-color="#ef5350" data-track-color="#e9e9e9" data-scale-color="#d9d9d9">
        <span>{{$sum/100}}<br><small class="text-muted">KB</small></span>
    </div>
{{-- End --}}
