@extends('admin.layout')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Form Submissions</h2>

    <table class="table-auto w-full border border-collapse border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Phone</th>
                <th class="border px-4 py-2">Submitted At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($submissions as $index => $submission)
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $submission->name }}</td>
                    <td class="border px-4 py-2">{{ $submission->email }}</td>
                    <td class="border px-4 py-2">{{ $submission->phone }}</td>
                    <td class="border px-4 py-2">{{ $submission->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border px-4 py-2 text-center">No submissions yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
