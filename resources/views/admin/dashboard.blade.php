@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<section class="dashboard-section active" id="section-messages">
  <div class="section-header d-flex justify-content-between align-items-center mb-4">
    <h1>messages</h1>
  </div>


  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
                <th>ID</th>

        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Business</th>
        <th>Features</th>
        <th>descrption</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($messages as $message)
      <tr>
                <td>{{ $message->id }}</td>

        <td>{{ $message->name }}</td>
        <td>{{ $message->email }}</td>
        <td>{{ $message->phone }}</td>
        <td>{{ $message->business }}</td>
        <td>{{ $message->features }}</td>
        <td>{{ $message->message }}</td>

      </tr>
      @empty
      <tr>
        <td colspan="8" class="text-center">No messages found.</td>
      </tr>
      @endforelse
    </tbody>
  </table>

  <div class="d-flex justify-content-center mt-4">
    {{ $messages->links() }}
  </div>
</section>
@endsection
