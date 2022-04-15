<form id="enroll-student-form" class="enroll-student-form">
    <div class="form-group mb-4">
        <label>Estudiante</label>
        <div wire:ignore="" class="w-100">
            <select id="select-student" class="form-control basic @error('student_id') is-invalid @enderror select2" name="student_id" data-model="student_id">
                <option selected value="">Elige uno...</option>
                @foreach($students as $student)
                    <option value="{{$student->id}}">{{$student->name}}</option>
                @endforeach
            </select>
        </div>
        @error('student_id')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <button wire:click.prevent="enrollStudent" style="display: none;" class="enroll-student"></button>
</form>

@push('custom-scripts')
    <script>
        $("#select-student").select2();
        $('#select-student').val(null).trigger('change');
        $('#select-student').on('change', function (e) {
            var data = $(this).select2("val");
            var model = $(this).attr("data-model");
            @this.set(model, data);
        });
    </script>
@endpush
