@extends('admin.layouts.master')
@section('title', 'Administrator')

@section('content')
<x:page.header title="Administrator" subtitle="Users">
    <div class="dropdown">
        <a href="#" class="btn btn-outline-secondary btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bx bx-download"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end" style="">
            <a class="dropdown-item text-muted" href="#">
                Excel
            </a>
            <a class="dropdown-item text-muted" href="#">
                CSV
            </a>
            <a class="dropdown-item text-muted" href="#">
                PDF
            </a>
        </div>
    </div>
    <a role="button" href="#filterCanvas" class="btn btn-outline-primary" data-bs-toggle="offcanvas" aria-controls="filterCanvas">
        <i class="bx bx-filter-alt me-2"></i>
        Filter
    </button>
    <a href="{{ route('admin.users.administrator.create') }}" class="btn btn-primary btn-5 ">
        <i class="bx bx-plus me-2"></i>
        Add Administrator
    </a>
</x:page.header>


<div class="offcanvas offcanvas-end" tabindex="-1" id="filterCanvas" aria-labelledby="filterCanvas">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title" id="offcanvasEndLabel">Filter</h2>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="" class="row" method="GET" id="filter-form">
            <div class="col-12 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
            <div class="col-12 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" email="email" placeholder="Enter email">
            </div>
        </form>
    </div>
    <div class="offcanvas-footer row">
        <div class="col-md-6">
            <button type="button" class="btn btn-outline-secondary w-100" id="reset-filter-button">Reset</button>
        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-primary w-100" id="save-filter-button">Filter</button>
        </div>
    </div>
</div>

<div class="row row-cards">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table simple-dataTable">
                    <thead>
                        <tr>
                            <th class="w-1">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Created</th>
                            <th class="w-5"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-secondary text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="text-secondary">{{ $item->email }}</td>
                                <td class="text-secondary">{{ $item->created_at?->format('d/m/Y') ?? '-' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="link-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <a class="dropdown-item text-muted" href="{{ route('admin.users.administrator.edit', $item->id) }}">
                                                <i class="bx bx-edit"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item text-muted" href="{{ route('admin.users.administrator.delete', $item->id) }}">
                                                <i class="bx bx-trash"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>
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
