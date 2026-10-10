@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h3 class="mb-3 text-center">Register</h3>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" required></div>
            <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
            <div class="mb-3"><label>Username</label><input type="text" name="username" class="form-control" required></div>
            <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
            <div class="mb-3"><label>No HP</label><input type="text" name="no_hp" class="form-control" required></div>
            <div class="mb-3"><label>Alamat</label><textarea name="alamat" class="form-control" required></textarea></div>
            <button type="submit" class="btn btn-success w-100">Daftar</button>
        </form>
    </div>
</div>
@endsection