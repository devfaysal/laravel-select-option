@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <div class="row sameheight-container">
        <div class="col col-12 col-sm-12 col-md-12 col-xl-12">
            <div class="card sameheight-item" data-exclude="xs">
                <div class="card-block">
                    <div class="title-block">
                        <h4 class="title">Edit Option</h4>
                    </div>
                    <form method="POST" action="{{ route('laravelSelectOption.update', $option->id) }}">
                        @csrf
                        @method('PATCH')
                        @include('laravel-select-option::options.form', [
                            'option' => $option,
                            'buttonText' => 'Update',
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection