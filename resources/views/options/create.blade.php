@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <div class="row sameheight-container">
        <div class="col col-12 col-sm-12 col-md-12 col-xl-12">
            <div class="card sameheight-item" data-exclude="xs">
                <div class="card-block">
                    <div class="title-block">
                        <h4 class="title">Create New Option</h4>
                    </div>
                    <form method="POST" action="{{ route('laravelSelectOption.store') }}">
                        @csrf
                        @include('laravel-select-option::options.form', [
                            'option' => new Devfaysal\SelectOption\Models\Option(),
                            'buttonText' => 'Create'
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection