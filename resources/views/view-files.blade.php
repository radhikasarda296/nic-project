<div class="container">
@extends('layouts.layout')

@section('title', 'View Files')

@section('content')

        <h2>Uploaded Files</h2>
        @if ($files->count() > 0)
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Original Name</th>
                    <th>Stored Name</th>
                    <th>Path</th>
                    <th>Uploaded At</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($files as $file)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $file->original_name }}</td>
                        <td>{{ $file->stored_name }}</td>
                        <td>{{ $file->path }}</td>
                        <td>{{ $file->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No files uploaded yet.</p>
        @endif
    </div>
@endsection
