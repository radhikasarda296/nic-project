<script
    src="https://cdn.jsdelivr.net/npm/xlsx@0.16.8/dist/xlsx.full.min.js"
    integrity="sha256-Ic7HP804IrYks4vUqX1trFF1Nr33RjONeJESZnYxsOY="
    crossorigin="anonymous"
>
</script>
    <div class="container">
        @extends("layouts.layout")
        @section("title", "Dashboard Page")
        @section("content")
        <h2>Import Excel</h2>
            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('uploader'))
            <form class="excel-form" method="post" enctype="multipart/form-data" action="{{ route('import.scheme') }}">
                @csrf
                <div class="form-group">
                    <input type="file" name="file" id="file" accept=".xlsx" class="form-control">
                    @error("file")
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <table class="table table-bordered" id="preview"></table>
                </div>
                <div class="form-group">
                    <button type="submit" id="importExcel" class="btn btn-primary" style="display:none;">Import Excel</button>
                </div>
            </form>
            @else
                <p>You don't have permission to import Excel files.</p>
            @endif
    </div>

    <script>
        document.getElementById('file').addEventListener('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var data = new Uint8Array(e.target.result);
                    var workbook = XLSX.read(data, { type: 'array' });
                    var sheetName = workbook.SheetNames[0];
                    var sheet = workbook.Sheets[sheetName];
                    var html = XLSX.utils.sheet_to_html(sheet);
                    document.getElementById('preview').innerHTML = html;
                    document.getElementById('importExcel').style.display = 'block';
                };
                reader.readAsArrayBuffer(file);
            }
        });
    </script>
@endsection
