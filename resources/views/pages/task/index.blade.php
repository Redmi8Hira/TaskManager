@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">My Task List</h1>
            </div>
            <div class="col-lg-12 mt-5">
                <form action="{{ route('task.store') }}" method="post" enctype="multipart/form">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control" name="title" type="text" placeholder="Enter Task">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="description" type="text" placeholder="Enter Description">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="priority">
                            <option selected>Select Priority</option>
                            <option value="1">Low</option>
                            <option value="2">Medium</option>
                            <option value="3">High</option>
                          </select>
                    </div>
                    <div class="mb-3">
                        <input type="datetime-local" class="from-control" name="due_date" placeholder="date">
                    </div>



                      <button type="create" class="btn btn-primary">Create</button>
                </form>
            </div>
            <div class="col-lg-12 mt-5">
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Title</th>
                              <th scope="col">Description</th>
                              <th scope="col">Priority</th>
                              <th scope="col">Due Date</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($tasks as $key => $task)
                            <tr>
                                <th scope="row">{{++$key }}</th>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->priority }}</td>
                                <td>{{ $task->due_date }}</td>
                                <td>
                                    @if ($task->status == 0)
                                      <span class="badge bg-warning">Not Completed</span>

                                    @else
                                    <span class="badge bg-success">Completed</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('task.delete',$task->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i> </a>
                                    <a href="{{ route('task.status',$task->id) }}" class="btn btn-success"><i class="fas fa-check-square"></i></a>
                                </td>

                            </tr>
                            @endforeach
                          </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .page-title {
            padding-top: 0vh;
            font-size: 2rem;
            color: rgb(18, 7, 224);
        }
    </style>
@endpush
