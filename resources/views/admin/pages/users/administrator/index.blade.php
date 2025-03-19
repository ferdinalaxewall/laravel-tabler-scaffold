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
    <button type="button" class="btn btn-outline-primary btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Filter">
        <i class="bx bx-filter-alt"></i>
    </button>
    <a href="{{ route('admin.users.administrator.create') }}" class="btn btn-primary btn-5 ">
        <i class="bx bx-plus me-2"></i>
        Add Administrator
    </a>
</x:page.header>

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
