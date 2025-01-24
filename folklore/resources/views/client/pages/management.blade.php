@extends('client.layouts.masterlayout')
@section('content')


<link rel="stylesheet" href="style/management.css">
<div class="page-header">
        <h1>Folklore Management Page</h1>
    </div>

    <div class="container_management">
        <section class="management_card">
            <h2>Add New Folklore</h2>
            <form id="addFolkloreForm">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" placeholder="Title...." required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" placeholder="description...." required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Add Folklore</button>
                </div>
            </form>
        </section>

        <section class="management_card">
            <h2>Manage Folklore</h2>
            <ul id="folkloreList"></ul>
        </section>
    </div>
<script src="style/management.js"></script>



    @endsection
